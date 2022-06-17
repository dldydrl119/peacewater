<?php
class Admin_model extends CI_Model {
    function __construct(){
        parent::__construct();
//        $this->load->library('session');
        $this->load->database();
    }
    // 로그인
    public function insert_login() {
        // $_POST['id'] = 'callget';
        // $_POST['pass'] = 'admin';
        foreach($_POST as $key => $value ){
            $key = 'admin_'.$key;
            if($key == "admin_pass") {
                $value = password_hash($value , PASSWORD_DEFAULT, ['cost'=>12]);
            }
            $array[$key] = $value;
        }
        $result = $this->db->insert('callget_admin', $array);
        return array('return'=>$result);
    }

    public function loginData() {
        // $_POST['id'] = 'callget';
        // $_POST['pass'] = 'admin';
        $sql="SELECT admin_idx, admin_id, admin_pass FROM admin_user WHERE admin_id = ?";
        $array = array($_POST['id']);
        $data = $this->db->query($sql, $array)->row();

        return $data;
    }

}
?>
