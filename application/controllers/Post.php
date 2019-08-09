<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function index($uri)
    {
        $this->load->model('Post_model', 'post');
        $data['post'] = $this->post->getPostByUri($uri);
        $data['judul'] = $data['post']['judul'];

        $this->load->view('tmp/header', $data);
        $this->load->view('home/navigasi', $data);
        $this->load->view('post/post', $data);
        $this->load->view('tmp/footer', $data);
    }
}
