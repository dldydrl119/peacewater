<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends MY_Controller {
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->ldir  = basename(__DIR__);
        $this->load->library('session');
        $this->load->model($this->ldir.'/admin_model');
        $this->load->library('pagination');



        $this->arr_select1 = ['후원금', 'CMS'];
        $this->allow=array();

        $this->per_page = 10; // 페이지당 표시할 게시물수
        $this->num_links = 5; // 표시될 페이지수 / 2 (5면 10개씩 표시됨)
        $this->uri_segment = 3;
    }

	public function index()
	{
        redirect('/admin/admin/slideList');
	}

    ////////콜겟////////////
    //슬라이드//
    public function list($page = 1)
    {

        $name = "메인배너 관리";

        $col = ['번호','정렬','이름','이미지','클릭 시 링크주소 ', '등록 시간','수정', '삭제'];
        $button = $this->adminButton($col);

        //이전 페이지 마지막 데이터
        if($page > 1) {
            $temp = $this->admin_model->slidelistData($page - 1);
            $pre_one = [end($temp)];
        } else {
            $pre_one = [];
        }
        $list_data = $this->admin_model->slidelistData($page);
        $list_total_num = $this->admin_model->slideTotalNum();
        //다음 페이지 첫번째 데이터
        $next_one = $this->admin_model->slidelistData($page + 1);

        $method_arr = explode('::',  __METHOD__);

        $url = "/{$this->ldir}/". strtolower($method_arr[0]).'/'.$method_arr[1];

        $insert_url = "/{$this->ldir}/". strtolower($method_arr[0]). "/add";
        $this->paging($list_total_num, $url,$page);
        $data = array(
            'name'=>$name,
            'col'=>$col,
            'pre_one' => $pre_one,
            'list'=>$list_data,
            'next_one'=> !empty($next_one) ? [$next_one[0]] : [],
            'adminbutton'=>$button,
            'insert'=>$insert_url,
            'page'=>$page
        );


        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/'.  strtolower(implode('_', $method_arr)),$data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function add()  //등록
    {

        /*$total_cnt = $this->admin_model->slideTotalNum();
        if($total_cnt >=5) {
            echo '<script>alert("데이터 제한수를 넘었습니다."); history.back();</script>';
//            $this->json(array('return'=>false, 'err_msg'=>'데이터 제한수를 넘었습니다.'));
            exit;
        }*/

        $name = "메인배너 등록";
        $data = array('name'=>$name);

        $method_arr = explode('::',  __METHOD__);
        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/'.  strtolower(implode('_', $method_arr)),$data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function addData()
    {
        /*$total_cnt = $this->admin_model->slideTotalNum();
        if($total_cnt >=5) {
            $this->json(array('return'=>false, 'err_msg'=>'데이터 제한수를 넘었습니다.'));
            exit;
        }*/



        $insert_data = [
            'name'=>$this->input->post('name'),
            'image'=>$this->input->post('image'),
            'link'=>$this->input->post('link'),
            'content'=>$this->input->post('content'),
        ];

        if(!empty($_FILES['up_file'])) {
            foreach ($_FILES['up_file']['tmp_name'] as $key=>$val) {
                if($val) {
                    $f_result =move_uploaded_file($val, DIR_UP_FILE. $_FILES['up_file']['name'][$key]);
                    if($f_result) {
                        $num = $key+1;
                        $insert_data['file'.$num] = $_FILES['up_file']['name'][$key];
                    }
                }
            }
        }

        $json = $this->admin_model->slideAddData($insert_data);
        $this->json($json);
    }

    public function edit($idx) //보기
    {
        $name = "메인배너 수정";
        $json = $this->admin_model->slideData($idx);
        $data = array('name'=>$name,'data'=>$json);

        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/slideAdd' ,$data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function editData()
    {
        $update_data = [
            'name'=>$this->input->post('name'),
            'image'=>$this->input->post('image'),
            'link'=>$this->input->post('link'),
            'content'=>$this->input->post('content'),
        ];

        if(!empty($_POST['upfile_del'])) {
            foreach($_POST['upfile_del'] as $delno) {
                $update_data['file'.$delno]=null;
            };
        }

        if(!empty($_FILES['up_file'])) {
            foreach ($_FILES['up_file']['tmp_name'] as $key=>$val) {
                if($val) {
                    $f_result =move_uploaded_file($val, DIR_UP_FILE. $_FILES['up_file']['name'][$key]);
                    if($f_result) {
                        $num = $key+1;
                        $update_data['file'.$num] = $_FILES['up_file']['name'][$key];

                    }
                }
            }
        }

        $idx = $this->input->post('idx');

        if(!$idx) {
            $this->json(['return' => false, 'err_msg' => 'idx값이 없습니다.']);
            exit;
        }
        $json = $this->admin_model->slideEditData($update_data, $idx);

        $this->json($json);
    }


    public function datadel($idx)
    {
        $json = $this->admin_model->slidedel($idx);
        $this->json($json);
    }
    public function count()
    {
        $json = $this->admin_model->slideCount();
        $this->json($json);
    }

    public function order()
    {
        $idxs = $_POST['idxs'];
        $idx = $_POST['idx'];


        if( !$idxs) {
            array('return'=>false);
        }
        $json = $this->admin_model->slideOrder($idxs, $idx);
        $this->json($json);
    }

    public function uploadimage() {
        $json = $this->upload('image');
        return $this->json($json);
    }
}
