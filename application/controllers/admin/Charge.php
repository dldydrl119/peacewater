<?php


class Charge extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->ldir  = basename(__DIR__);
        $this->load->library('session');
        $this->load->model($this->ldir.'/charge_model');
        $this->load->library('pagination');


        $this->allow=array();

        $this->per_page = 10; // 페이지당 표시할 게시물수
        $this->num_links = 5; // 표시될 페이지수 / 2 (5면 10개씩 표시됨)
        $this->uri_segment = 3;

        $this->file_func = false;
        $this->thum_func = false;
        $this->editor_func = false;
        $this->link_func = false;

        $this->category = $this->config->item('charge_category');
    }

    public function list($page = 1)
    {

        $name = "이용요금 관리";
        $curr_cate = isset($_GET['curr_cate']) ? $_GET['curr_cate'] : '1';
        $col = ['번호','정렬','종류', '이름','가격', '등록 시간','수정', '삭제'];
        $button = $this->adminButton($col);

        $method_arr = explode('::',  __METHOD__);
        foreach ($this->category as $key => $cate) {
            //이전 페이지 마지막 데이터
            if($page > 1) {
                $temp = $this->charge_model->chargeListData($page - 1, $key);
                $pre_one[$key] = [end($temp)];
            } else {
                $pre_one[$key] = [];
            }
            $list_data[$key] = $this->charge_model->chargeListData($page, $key);
            $list_total_num[$key] = $this->charge_model->chargeTotalNum($key);
            //다음 페이지 첫번째 데이터
            $temp = $this->charge_model->chargeListData($page + 1, $key);
            $next_one[$key] = !empty($temp) ? [$temp[0]] : [];



            $js_fun = "js_page";
            $pagination[$key] = $this->adminiActiPage($list_total_num[$key],$page, $js_fun, $key);
//            $this->paging($list_total_num[$key], $url,$page);
//
//            $pagination[$key] = $this->pagination->create_links();
        }

        $insert_url = "/{$this->ldir}/". strtolower($method_arr[0]). "/add";
        $data = array(
            'name'=>$name,
            'col'=>$col,
            'pre_one' => $pre_one,
            'list'=>$list_data,
            'next_one'=> $next_one,
            'adminbutton'=>$button,
            'insert'=>$insert_url,
            'page'=>$page,
            'category' => $this->category,
            'pagination' => $pagination,
            'curr_cate' => $curr_cate
        );

        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/'.  strtolower(implode('_', $method_arr)),$data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function add($category)  //등록
    {

        /*$total_cnt = $this->admin_model->slideTotalNum();
        if($total_cnt >=5) {
            echo '<script>alert("데이터 제한수를 넘었습니다."); history.back();</script>';
//            $this->json(array('return'=>false, 'err_msg'=>'데이터 제한수를 넘었습니다.'));
            exit;
        }*/

        $name = "이용요금 등록";
        $data = [
            'name'=>$name,
            'file_func' => $this->file_func,
            'thum_func' => $this->thum_func,
            'editor_func' => $this->editor_func,
            'link_func' => $this->link_func,
            'category_arr' => $this->category,
            'category' => $category,
        ];

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
            'memo'=>$this->input->post('memo'),
            'category'=>$this->input->post('category'),
        ];


        if($this->editor_func) {
            $insert_data['content'] = $this->input->post('content');
        }
        if($this->link_func) {
            $insert_data['link'] = $this->input->post('link');
        }

        if($this->thum_func) {
            $insert_data['image'] = $this->input->post('image');
        }

        if($this->file_func == true) {
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
        }

        $json = $this->charge_model->chargeAddData($insert_data);
        $this->json($json);
    }

    public function edit($idx) //보기
    {
        $name = "이용요금 수정";
        $target_data = $this->charge_model->chargeData($idx);
        $data = [
            'name'=>$name,
            'data'=>$target_data,
            'file_func' => $this->file_func,
            'thum_func' => $this->thum_func,
            'editor_func' => $this->editor_func,
            'link_func' => $this->link_func,
            'category_arr' => $this->category,
            'category' => $target_data->category    ,
        ];

        $method_arr = explode('::',  __METHOD__);

        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/charge_add',$data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function editData()
    {


        $update_data = [
            'name'=>$this->input->post('name'),
            'memo'=>$this->input->post('memo'),
            'category'=>$this->input->post('category'),
        ];

        if($this->editor_func) {
            $update_data['content'] = $this->input->post('content');
        }
        if($this->link_func) {
            $update_data['link'] = $this->input->post('link');
        }

        if($this->thum_func) {
            $insert_data['image'] = $this->input->post('image');
        }


        if($this->file_func) {

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
        }

        $idx = $this->input->post('idx');

        if(!$idx) {
            $this->json(['return' => false, 'err_msg' => 'idx값이 없습니다.']);
            exit;
        }
        $json = $this->charge_model->chargeEditData($update_data, $idx);

        $this->json($json);
    }

    public function datadel($idx)
    {
        $json = $this->charge_model->chargedel($idx);
        $this->json($json);
    }
    public function count()
    {
        $json = $this->charge_model->chargeCount();
        $this->json($json);
    }

    public function order()
    {
        $idxs = $_POST['idxs'];
        $idx = $_POST['idx'];


        if( !$idxs) {
            array('return'=>false);
        }
        $json = $this->charge_model->chargeOrder($idxs, $idx);
        $this->json($json);
    }

    public function uploadimage() {
        $json = $this->upload('image');
        return $this->json($json);
    }

    public function listPage($page=1, $category) {
        //이전 페이지 마지막 데이터
        if($page > 1) {
            $temp = $this->charge_model->chargeListData($page - 1, $category);
            $pre_one = [end($temp)];
            foreach($pre_one as $key=>$val) {
                $pre_one[$key]->category = $this->category[$val->category];
            }
        } else {
            $pre_one = [];
        }
        $list_data = $this->charge_model->chargeListData($page, $category);
        foreach($list_data as $key=>$val) {
            $list_data[$key]->category = $this->category[$val->category];
        }
        $list_total_num = $this->charge_model->chargeTotalNum($category);
        //다음 페이지 첫번째 데이터
        $temp = $this->charge_model->chargeListData($page + 1, $category);
        $next_one = !empty($temp) ? [$temp[0]] : [];

        foreach($next_one as $key=>$val) {
            $next_one[$key]->category = $this->category[$val->category];
        }

        $js_fun = "js_page";
        $pagination = $this->adminiActiPage($list_total_num,$page, $js_fun, $category);
        $r_data = [
            'pagination'=>$pagination,
            'pre_one' => $pre_one,
            'next_one' => $next_one,
            'list_data' => $list_data
        ];

        echo  json_encode($r_data);
    }
}