<?php


class Reserve_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
//        $this->load->library('session');
        $this->load->database();
        $this->reserve_max_num = 9;

    }


    public function getReserve($reserve_date)
    {
        $sql="SELECT * FROM tbl_reserve WHERE reserve_date = '$reserve_date'";
        $data = $this->db->query($sql)->row();
        return $data;
    }

    public function insertReserve($insert_data)
    {
        return $this->db->insert('tbl_reserve', $insert_data);
    }

    public function updateReserve($update_data, $reserve_date)
    {
        $this->db->where('reserve_date', $reserve_date);
        return $this->db->update('tbl_reserve', $update_data);
    }
}