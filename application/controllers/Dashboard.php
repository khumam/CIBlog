<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model', 'post');
        $this->load->model('Settings_model', 'settings');
        $this->load->model('Stats_model', 'stats');

        if (!$this->session->userdata('username')) {
            redirect('home');
        }
    }

    public function index()
    {
        $data['judul'] = "Dashboard";
        $data['webData'] = $this->settings->getWebData();
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));
        $data['countPosts'] = $this->post->getCountAllPost();
        $data['countPostsUser'] = $this->post->getCountAllPostByUser($this->session->userdata('id'));
        $data['totalKunjungan'] = $this->stats->getTotalKunjungan();
        $data['dataKunjungan'] = $this->stats->getAllDataLimit();
        $data['totalPenayangan'] = $this->stats->getCountPenayangan();
        $data['lastPost'] = $this->post->getLastPost();

        $this->load->view('newdb/dbheader', $data);
        $this->load->view('newdb/dbwrapper', $data);
        $this->load->view('newdb/dbnav', $data);
        $this->load->view('newdb/index', $data);
        $this->load->view('newdb/dbstatspengunjung', $data);
        $this->load->view('newdb/dbfooter', $data);
        $this->load->view('newdb/dbchartspengunjung', $data);
    }

    public function logout()
    {
        $userdata = [
            'username',
            'fullname',
            'role',
            'id'
        ];

        $this->session->unset_userdata($userdata);
        redirect('home');
    }

    public function posts()
    {
        $data['judul'] = "Dashboard";
        $this->load->library('pagination');
        $data['webData'] = $this->settings->getWebData();
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));

        $config['base_url'] = base_url() . 'dashboard/posts/';
        $config['total_rows'] = $this->post->getCountAllPost();
        $config['per_page'] = 6;

        $data['start'] = $this->uri->segment('3');
        $data['posts'] = $this->post->getPostByUserId($config['per_page'], $data['start'], $this->session->userdata('id'));

        $this->pagination->initialize($config);

        $this->load->view('newdb/dbheader', $data);
        $this->load->view('newdb/dbwrapper', $data);
        $this->load->view('newdb/dbnav', $data);
        $this->load->view('newdb/post/index', $data);
        $this->load->view('newdb/dbfooter', $data);
    }

    public function addpost()
    {
        $data['judul'] = "Dashboard";
        $this->load->library('form_validation');
        $data['categories'] = $this->post->getAllCategories();
        $data['webData'] = $this->settings->getWebData();
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));

        $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[postingan.judul]');
        $this->form_validation->set_rules('subjudul', 'Sub Judul', 'required');
        $this->form_validation->set_rules('artikel', 'Artikel', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('image', 'Gambar', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('newdb/dbheader', $data);
            $this->load->view('newdb/dbwrapper', $data);
            $this->load->view('newdb/dbnav', $data);
            $this->load->view('newdb/post/add', $data);
            $this->load->view('newdb/dbfooter', $data);
        } else {

            $addpost = $this->post->addPost();
            if ($addpost) {
                $this->session->set_flashdata('sukses', 'Berhasil menambah postingan baru');
                redirect('dashboard/posts');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambah postingan baru');
                redirect('dashboard/posts');
            }
        }
    }

    public function editpost($id)
    {
        $data['judul'] = "Dashboard";
        $this->load->library('form_validation');
        $data['categories'] = $this->post->getAllCategories();
        $data['post'] = $this->post->getPostById($id);
        $data['webData'] = $this->settings->getWebData();
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));

        if ($data['post']['author'] != $this->session->userdata('id')) {
            redirect('dashboard/posts');
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('subjudul', 'Sub Judul', 'required');
        $this->form_validation->set_rules('artikel', 'Artikel', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('image', 'Gambar', 'required');
        $this->form_validation->set_rules('tag', 'Tag', 'required');

        if ($this->form_validation->run() == false) {


            $this->load->view('newdb/dbheader', $data);
            $this->load->view('newdb/dbwrapper', $data);
            $this->load->view('newdb/dbnav', $data);
            $this->load->view('newdb/post/edit', $data);
            $this->load->view('newdb/dbfooter', $data);
        } else {

            $editpost = $this->post->editPost($id, $this->session->userdata('id'));
            if ($editpost) {
                $this->session->set_flashdata('sukses', 'Berhasil mengedit postingan');
                redirect('dashboard/posts');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengedit postingan');
                redirect('dashboard/posts');
            }
        }
    }

    public function hapuspost($id)
    {
        $hapus = $this->post->delPost($id);
        if ($hapus) {
            $this->session->set_flashdata('sukses', 'Berhasil menghapus postingan');
            redirect('dashboard/posts');
        } else {
            $this->session->set_flashdata('gagal', 'Gagal menghapus postingan');
            redirect('dashboard/posts');
        }
    }

    public function detailpost($id)
    {
        $data['judul'] = "Dashboard";
        $data['post'] = $this->post->getPostById($id);
        $data['webData'] = $this->settings->getWebData();
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));

        $this->load->view('newdb/dbheader', $data);
        $this->load->view('newdb/dbwrapper', $data);
        $this->load->view('newdb/dbnav', $data);
        $this->load->view('newdb/post/detail', $data);
        $this->load->view('newdb/dbfooter', $data);
    }

    public function savewebsettings()
    {
        $config['upload_path']          = './assets/setting/img/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']            = true;
        $config['file_name']            = 'headerimage';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('headerimage')) {
            $this->session->set_flashdata('gagal', $this->upload->display_errors());
            redirect('dashboard/websettings');
        } else {
            $save = $this->settings->saveHeaderImage($this->upload->data('file_name'));

            if ($save) {
                $this->session->set_flashdata('sukses', 'Berhasil menyimpan perubahan.');
                redirect('dashboard/websettings');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menyimpan perubahan.');
                redirect('dashboard/websettings');
            }
        }
    }

    public function websettings()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('dashboard');
        }

        $data['judul'] = "Dashboard";
        $data['webData'] = $this->settings->getWebData();
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaweb', 'Nama web', 'required');
        $this->form_validation->set_rules('sloganweb', 'Slogan web', 'required');
        $this->form_validation->set_rules('webdesc', 'Deskripsi Web', 'required');
        $this->form_validation->set_rules('authorweb', 'Author web', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('newdb/dbheader', $data);
            $this->load->view('newdb/dbwrapper', $data);
            $this->load->view('newdb/dbnav', $data);
            $this->load->view('newdb/web/index', $data);
            $this->load->view('newdb/dbfooter', $data);
        } else {
            $save = $this->settings->saveWeb();

            if ($save) {
                $this->session->set_flashdata('sukses', 'Berhasil menyimpan perubahan.');
                redirect('dashboard/websettings');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menyimpan perubahan.');
                redirect('dashboard/websettings');
            }
        }
    }

    public function akunsettings()
    {
        $data['judul'] = "Dashboard";
        $data['akunInfo'] = $this->settings->getAkunInfo($this->session->userdata('username'));
        $data['webData'] = $this->settings->getWebData();

        $this->load->view('newdb/dbheader', $data);
        $this->load->view('newdb/dbwrapper', $data);
        $this->load->view('newdb/dbnav', $data);
        $this->load->view('newdb/akun/index', $data);
        $this->load->view('newdb/dbfooter', $data);
    }

    public function editakun()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Gagal menyimpan perubahan. Ada kesalahan penulisan');
            redirect('dashboard');
        } else {
            $updateakun = $this->settings->updateAkunInfo($this->session->userdata('username'));
            if ($updateakun) {
                $this->session->set_flashdata('sukses', 'Berhasil menyimpan perubahan. Silahkan login kembali');
                $this->session->unset_userdata('username');
                redirect('home/loginadmin');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menyimpan perubahan.');
                redirect('dashboard');
            }
        }
    }

    public function editakunpassword()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('newpassword', 'Password Baru', 'required');
        $this->form_validation->set_rules('confnewpassword', 'Password Baru', 'required|matches[newpassword]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('gagal', 'Gagal menyimpan perubahan. Password baru tidak cocok.');
            redirect('dashboard');
        } else {
            $updateakun = $this->settings->updateAkunPassword($this->session->userdata('username'));
            if ($updateakun) {
                $this->session->set_flashdata('sukses', 'Berhasil menyimpan perubahan. Silahkan login kembali');
                $this->session->unset_userdata('username');
                redirect('home/loginadmin');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menyimpan perubahan.');
                redirect('dashboard');
            }
        }
    }
}
