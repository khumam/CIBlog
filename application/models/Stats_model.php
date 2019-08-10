<?php
date_default_timezone_set('Asia/Jakarta');

class Stats_model extends CI_Model
{
    public function insertStatsDaily()
    {
        $today = date('d M Y');
        $todayKunjungan = $this->todayKunjungan();

        if ($todayKunjungan) {
            $dataupdate = [
                'kunjungan' => $todayKunjungan['kunjungan'] + 1,
            ];
            $this->db->where('date', "$today");
            $updatedata = $this->db->update('statistic', $dataupdate);

            return $updatedata ? true : false;
        } elseif (!$todayKunjungan) {
            $time_unix = time();
            $datainsert = [
                'date' => "$today",
                'unix_time' => "$time_unix",
                'kunjungan' => 1,
            ];
            $insertdata = $this->db->insert('statistic', $datainsert);

            return $insertdata ? true : false;
        }
    }

    public function todayKunjungan()
    {
        $today = date('d M Y');
        $this->db->where('date', "$today");
        return $this->db->get('statistic')->row_array();
    }

    public function getTotalKunjungan()
    {
        $getAllData = $this->getAllData();
        $total = 0;
        foreach ($getAllData as $data) {
            $total += $data['kunjungan'];
        }

        return $total;
    }

    public function getAllData()
    {
        return $this->db->get('statistic')->result_array();
    }

    public function getAllDataLimit()
    {
        $today = $this->todayKunjungan();
        $todayUnix = (int) $today['unix_time'];
        $lastWeek = $todayUnix - 604800;

        $where = "unix_time>$lastWeek AND unix_time<=$todayUnix";
        $this->db->where($where);

        $this->db->order_by('date', 'ASC');
        return $this->db->get('statistic')->result_array();
    }

    public function getStatsPerPenayangan($uri)
    {
        $this->db->where('uri', $uri);
        return $this->db->get('postingan')->row_array();
    }

    public function getCountPenayangan()
    {
        $this->db->where('author', $this->session->userdata('id'));
        $data = $this->db->get('postingan')->result_array();
        $total = 0;
        foreach ($data as $dt) {
            $total += $dt['seen'];
        }
        return $total;
    }

    public function statsPenayangan($uri)
    {
        $data = $this->getStatsPerPenayangan($uri);

        $this->db->where('uri', $uri);
        $dataupdate = [
            'seen' => $data['seen'] + 1,
        ];
        $update = $this->db->update('postingan', $dataupdate);

        return $update ? true : false;
    }

    public function getListAkun($limit, $start)
    {
        $this->db->order_by('id', 'DESC');
        return $this->db->get('akun', $limit, $start)->result_array();
    }
}
