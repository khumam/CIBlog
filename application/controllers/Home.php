<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model', 'post');
        $this->load->model('Settings_model', 'settings');
        $this->load->model('Stats_model', 'stats');
    }

    public function index()
    {
        $data['judul'] = "Blog Literator";
        $this->load->library('pagination');
        $data['webData'] = $this->settings->getWebData();
        $this->stats->insertStatsDaily();

        $config['base_url'] = base_url('index/');
        $config['total_rows'] = $this->post->getCountAllPost();
        $config['per_page'] = $data['webData']['post_per_page'];

        $data['start'] = $this->uri->segment('3');
        $data['posts'] = $this->post->getPost($config['per_page'], $data['start']);

        $this->pagination->initialize($config);

        $this->load->view('tmp/header', $data);
        $this->load->view('home/navigasi', $data);
        $this->load->view('home/index', $data);
        $this->load->view('tmp/footer', $data);
    }

    public function search()
    {
        $data['judul'] = "Cari artikel";
        $data['webData'] = $this->settings->getWebData();

        if ($this->input->post('tombolCari')) {

            $this->load->library('pagination');

            $config['base_url'] = base_url('index/search/');
            $config['per_page'] = $data['webData']['post_per_page'];

            $data['start'] = $this->uri->segment('3');
            $data['posts'] = $this->post->getResultSearch($config['per_page'], $data['start'], $this->input->post('search'));
            $config['total_rows'] = count($data['posts']);

            $this->pagination->initialize($config);
        }

        $this->load->view('tmp/header', $data);
        $this->load->view('home/navigasi', $data);
        $this->load->view('home/search', $data);
        $this->load->view('tmp/footer', $data);
    }

    public function contact()
    {
        $data['judul'] = "Hubungi Kami";
        $data['webData'] = $this->settings->getWebData();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tmp/header', $data);
            $this->load->view('home/navigasi', $data);
            $this->load->view('home/contact', $data);
            $this->load->view('tmp/footer', $data);
        } else {
            $sendmsg = $this->settings->sendMsg();
            if ($sendmsg) {
                $this->session->set_flashdata('sukses', 'Berhasil mengirim pesan. Kami akan segera mengirim balasan. :)');
                redirect('home/contact');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal mengirim pesan. Silahkan coba lagi.');
                redirect('home/contact');
            }
        }
    }

    public function post($uri)
    {

        $data['post'] = $this->post->getPostByUri($uri);
        $data['judul'] = $data['post']['judul'];
        $data['webData'] = $this->settings->getWebData();
        $this->stats->statsPenayangan($uri);

        $this->load->view('tmp/header', $data);
        $this->load->view('home/navigasi', $data);
        $this->load->view('post/post', $data);
        $this->load->view('tmp/footer', $data);
    }

    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('dashboard');
        }
        $data['judul'] = 'Login Admin';
        $data['webData'] = $this->settings->getWebData();
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('tmp/header', $data);
            $this->load->view('home/login', $data);
            $this->load->view('tmp/footer', $data);
        } else {

            $login = $this->settings->login();
            if ($login) {
                $akun = $this->settings->getAkunInfo($this->input->post('username'));
                $userdata = [
                    'username' => $akun['username'],
                    'fullname' => $akun['fullname'],
                    'role' => $akun['role'],
                    'id' => $akun['id']
                ];

                $this->session->set_userdata($userdata);

                $this->session->set_flashdata('sukses', 'Berhasil masuk. Selamat datang.');
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal masuk. Username atau Password salah.');
                redirect('home/loginadmin');
            }
        }
    }
}
