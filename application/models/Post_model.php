<?php
date_default_timezone_set('Asia/Jakarta');

class Post_model extends CI_Model
{
    public function getAllPost()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('del', 0);
        return $this->db->get('postingan')->result_array();
    }

    public function getAllPostByIdUser($id)
    {

        $this->db->order_by('id', 'DESC');
        $this->db->where('del', 0);
        $this->db->where('author', $id);
        return $this->db->get('postingan')->result_array();
    }

    public function getLastPost()
    {
        $this->db->select('postingan.judul, postingan.uri, postingan.sub_judul, postingan.author, postingan.created, akun.fullname, akun.alias');
        $this->db->from('postingan');
        $this->db->join('akun', 'akun.id = postingan.author');
        $this->db->order_by('postingan.id', 'DESC');
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }

    public function getPostByUri($uri)
    {
        $this->db->select('postingan.id, postingan.judul, postingan.sub_judul, postingan.isi, postingan.kategori, postingan.tag, postingan.uri, postingan.created, postingan.author, postingan.del, postingan.image_uri, postingan.seen, akun.fullname, akun.alias');
        $this->db->from('postingan');
        $this->db->join('akun', 'akun.id = postingan.author');
        $this->db->where('postingan.uri', $uri);
        return $this->db->get()->row_array();
    }

    public function getPostById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('postingan')->row_array();
    }

    public function getCountAllPost()
    {
        return $this->db->get('postingan')->num_rows();
    }

    public function getCountAllPostByUser($id)
    {
        $this->db->where('author', $id);
        return $this->db->get('postingan')->num_rows();
    }

    public function getPost($limit, $start)
    {
        $this->db->select('postingan.id, postingan.judul, postingan.sub_judul, postingan.isi, postingan.kategori, postingan.tag, postingan.uri, postingan.created, postingan.author, postingan.del, postingan.image_uri, postingan.seen, akun.fullname, akun.alias');
        $this->db->from('postingan');
        $this->db->join('akun', 'akun.id = postingan.author');
        $this->db->where('postingan.del', 0);
        $this->db->order_by('postingan.id', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    public function getPostByUserId($limit, $start, $id)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('del', 0);
        $this->db->where('author', $id);
        return $this->db->get('postingan', $limit, $start)->result_array();
    }

    public function addPost()
    {
        $datainsert = [
            'judul' => ucwords($this->input->post('judul')),
            'sub_judul' => $this->input->post('subjudul'),
            'isi' => $this->input->post('artikel'),
            'kategori' => $this->input->post('kategori'),
            'tag' => $this->input->post('tag'),
            'uri' => urlencode(str_replace(' ', '-', $this->input->post('judul'))),
            'created' => date('d M Y , H:i:s'),
            'author' => $this->session->userdata('id'),
            'image_uri' => $this->input->post('image'),
        ];

        $insert = $this->db->insert('postingan', $datainsert);

        return $insert ? true : false;
    }

    public function editPost($id, $author)
    {
        $dataupdate = [
            'judul' => ucwords($this->input->post('judul')),
            'sub_judul' => $this->input->post('subjudul'),
            'isi' => $this->input->post('artikel'),
            'kategori' => $this->input->post('kategori'),
            'tag' => $this->input->post('tag'),
            'uri' => urlencode(str_replace(' ', '-', $this->input->post('judul'))),
            'created' => date('d M Y , H:i:s'),
            'author' => $this->session->userdata('fullname'),
            'image_uri' => $this->input->post('image'),
        ];

        $this->db->where('id', $id);
        $this->db->where('author', $author);
        $update = $this->db->update('postingan', $dataupdate);

        return $update ? true : false;
    }

    public function getAllCategories()
    {
        return $this->db->get('kategoripost')->result_array();
    }

    public function delPost($id)
    {
        $this->db->where('id', $id);
        $hapus = $this->db->update('postingan', ['del' => 1]);

        return $hapus ? true : false;
    }

    public function getResultSearch($limit, $start, $key)
    {
        $this->db->select('postingan.id, postingan.judul, postingan.sub_judul, postingan.isi, postingan.kategori, postingan.tag, postingan.uri, postingan.created, postingan.author, postingan.del, postingan.image_uri, postingan.seen, akun.fullname, akun.alias');
        $this->db->from('postingan');
        $this->db->join('akun', 'akun.id = postingan.author');
        $this->db->where('postingan.del', 0);
        $this->db->order_by('postingan.id', 'DESC');
        $this->db->limit($limit, $start);
        $this->db->like('judul', $key);
        $this->db->or_like('sub_judul', $key);
        $this->db->or_like('tag', $key);
        $this->db->or_like('kategori', $key);
        return $this->db->get()->result_array();
    }
}
