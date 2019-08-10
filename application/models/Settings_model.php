<?php

class Settings_model extends CI_Model
{
    public function saveHeaderImage($image)
    {
        $datasave = [
            'header_image' => $image,
        ];

        $this->db->where('id', 1);
        $save = $this->db->update('websetting', $datasave);

        return $save ? true : false;
    }

    public function saveWeb()
    {
        $datasave = [
            'web_name' => $this->input->post('namaweb'),
            'web_slogan' => $this->input->post('sloganweb'),
            'web_desc' => $this->input->post('webdesc'),
            'web_author' => $this->input->post('authorweb'),
            'google_key' => $this->input->post('googlekey'),
            'post_per_page' => $this->input->post('perpage'),
        ];

        $this->db->where('id', 1);
        $save = $this->db->update('websetting', $datasave);

        return $save ? true : false;
    }

    public function getWebData()
    {
        $this->db->where('id', 1);
        return $this->db->get('websetting')->row_array();
    }

    public function getAkunInfo($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('akun')->row_array();
    }

    public function updateAkunInfo($username)
    {
        $dataupdate = [
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'alias' => $this->input->post('alias'),
        ];

        $this->db->where('username', $username);
        $update = $this->db->update('akun', $dataupdate);

        return $update ? true : false;
    }

    public function updateAkunPassword($username)
    {
        $dataupdatepass = [
            'password' => md5($this->input->post('newpassword')),
        ];

        $this->db->where('username', $username);
        $update = $this->db->update('akun', $dataupdatepass);

        return $update ? true : false;
    }



    public function login()
    {
        $dataLogin = [
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
        ];

        $this->db->where($dataLogin);
        $login = $this->db->get('akun')->num_rows();

        if ($login == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMsg()
    {
        $dataInsert = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'pesan' => $this->input->post('pesan'),
            'baca' => 0,
        ];

        $send = $this->db->insert('kiriman', $dataInsert);
        return $send ? true : false;
    }

    public function addNewWriter()
    {
        $dataInsert = [
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'alias' => "Smart Writer",
            'role' => "writer",
            'password' => md5($this->input->post('password')),
        ];

        $send = $this->db->insert('akun', $dataInsert);
        return $send ? true : false;
    }
}
