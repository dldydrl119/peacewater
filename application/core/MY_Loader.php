<?php


class MY_Loader extends CI_Loader
{

    public function template($view_name,$data = array(), $main=false) {

        $CI =& get_instance();
        $hdata['menu_bar'] = $CI->menu_bar;
        $hdata['sub_menu_all'] = $CI->sub_menu;
        $hdata['main'] = $main;
        if( strpos($_SERVER['HTTP_HOST'], 'm.') !== false || $CI->agent->is_mobile()) {
            $this->view('mobile/header',$hdata);
            $this->view( 'mobile/'.$view_name, $data);
            $this->view('mobile/footer');
        } else {
            $this->view('header',$hdata);
            $this->view($view_name, $data);
            $this->view('footer');
        }

    }

}