<?php


class Site_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function getEvent()
    {
        $sql = "select * From bbs_event ORDER BY idxs ";
        return $this->db->query($sql)->result();
    }

    public function getActivity($cate)
    {
        $sql = "select * From bbs_activity where category='{$cate}' ORDER BY idxs";
        return $this->db->query($sql)->result();
    }

    public function getEnjoy()
    {
        $sql = "select * From bbs_enjoy ORDER BY idxs";
        return $this->db->query($sql)->result();
    }

    public function getFacility()
    {
        $sql = "select * From bbs_facility ORDER BY idxs";
        return $this->db->query($sql)->result();
    }

    public function getChargeAllByCate()
    {
        $sql = "select * From bbs_charge ORDER BY idxs";
        $result = $this->db->query($sql)->result();
        $dump =[];
        foreach ($result as $value) {
            $dump[$value->category][] = $value;
        }
        return $dump;
    }

    public function getReserveCnt($s_date, $e_date)
    {


        $sql="SELECT reserve_date";

        for ($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            $sql .= ", CASE WHEN room_num{$i}='Y' THEN 1 ELSE 0
            END room{$i}_cnt";
        }
        $sql .= " FROM tbl_reserve WHERE reserve_date between '$s_date' AND '$e_date' GROUP BY reserve_date";


        $sum = [];
        for ($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            $sum[] = "reserve.room{$i}_cnt";
        }
        $sum_Sql = implode('+',$sum);
        $bon_sql = "SELECT 
                    reserve.reserve_date,
                    ($sum_Sql) reserve_room_cnt
                     FROM 
                    (
                        $sql
                    ) as reserve
                    GROUP  BY reserve.reserve_date ";

        $data = $this->db->query($bon_sql)->result();;
        return $data;
    }
}