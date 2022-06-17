<?php


class Charge_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
//        $this->load->library('session');
        $this->load->database();
        $this->reserve_max_num = 9;

    }

    public function chargeListData($page = 1, $category)
    {
        $limit=$this->per_page;
        $offset=$limit*($page-1);

        $sql="SELECT @rownum:=@rownum+1 num, idx,category, name, memo, reg_date from bbs_charge, (SELECT @rownum:= {$offset}) TMP 
                where bbs_charge.category = '$category'
                ORDER BY idxs
                limit {$limit} offset {$offset}";

        return $this->db->query($sql)->result();
    }

    public function chargeTotalNum($category) {

        $sql = "select count(*) count From bbs_charge where category = '{$category}'";
        $count = $this->db->query($sql)->row();

        return $count->count;
    }

    public function chargeAddData($insert_data) {


//        $sql="SELECT idxs FROM history_menu order by idxs DESC LIMIT 1";
//        $idxs = $this->db->query($sql)->row()->idxs + 1;

        $sql="SELECT idxs FROM bbs_charge order by idxs DESC LIMIT 1";
        $obj_idxs = $this->db->query($sql)->row();
        if( !$obj_idxs) {
            $idxs = 1;
        } else {
            $idxs = $obj_idxs->idxs+1;
        }

        $insert_data['idxs'] = $idxs;
        $result = $this->db->insert('bbs_charge', $insert_data);
        if($result) {
            return array('return'=>true);
        }
        else {
            return array('return'=>false);
        }
    }

    public function chargeData($idx) {
        $array = array($idx);
        $sql="SELECT *
            FROM bbs_charge WHERE idx = ?";
        return $this->db->query($sql, $array)->row();
    }

    public function chargeEditData($update, $idx) {

        $this->db->where('idx', $idx);
        $result = $this->db->update('bbs_charge', $update);

        if($result) {
            return array('return'=>true);
        }
        else {
            return array('return'=>false);
        }
    }

    public function chargedel($idx) {
        $array = array($idx);
        $sql= "DELETE FROM bbs_charge WHERE idx = ?";
        $result = $this->db->query($sql, $array);
        return array('return'=>$result);
    }

    public function chargeCount() {
        $sql="SELECT COUNT(*) count  FROM bbs_charge";
        return $this->db->query($sql)->row()->count;
    }

    public function chargeOrder($idxs, $idx) {
        for($i=0; $i<count($idxs); $i++) {
            $sql= "UPDATE bbs_charge SET idxs = ? WHERE idx = ?";
            $array = array($idxs[$i], $idx[$i]);
            $result = $this->db->query($sql, $array);
        }
        return array('return'=>$result);
    }

}