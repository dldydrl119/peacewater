<?php


class Facility extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->ldir  = basename(__DIR__);
        $this->load->library('session');
        $this->load->model($this->ldir.'/facility_model');
        $this->load->library('pagination');


        $this->allow=array();

        $this->per_page = 10; // 페이지당 표시할 게시물수
        $this->num_links = 5; // 표시될 페이지수 / 2 (5면 10개씩 표시됨)
        $this->uri_segment = 3;

        $this->file_func = false;
        $this->thum_func = true;
        $this->editor_func = false;
        $this->link_func = false;
        $this->memo_func = true;
    }

    public function list($page = 1)
    {

        $name = "부대시설 관리";

        $col = ['번호','정렬','썸네일','제목','내용', '등록 시간','수정', '삭제'];
        $button = $this->adminButton($col);

        //이전 페이지 마지막 데이터
        if($page > 1) {
            $temp = $this->facility_model->facilityListData($page - 1);
            $pre_one = [end($temp)];
        } else {
            $pre_one = [];
        }
        $list_data = $this->facility_model->facilityListData($page);
        $list_total_num = $this->facility_model->facilityTotalNum();
        //다음 페이지 첫번째 데이터
        $next_one = $this->facility_model->facilityListData($page + 1);

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
            'page'=>$page,
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

        $name = "Event 등록";
        $data = [
            'name'=>$name,
            'file_func' => $this->file_func,
            'thum_func' => $this->thum_func,
            'editor_func' => $this->editor_func,
            'link_func' => $this->link_func,
            'memo_func' => $this->memo_func,
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
        ];

        if($this->memo_func) {
            $insert_data['memo'] = $this->input->post('memo');
        }
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

        $json = $this->facility_model->facilityAddData($insert_data);
        $this->json($json);
    }

    public function edit($idx) //보기
    {
        $name = "Event 수정";
        $target_data = $this->facility_model->facilityData($idx);
        $data = [
            'name'=>$name,
            'data'=>$target_data,
            'file_func' => $this->file_func,
            'thum_func' => $this->thum_func,
            'editor_func' => $this->editor_func,
            'link_func' => $this->link_func,
            'memo_func' => $this->memo_func,
        ];

        $method_arr = explode('::',  __METHOD__);

        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/facility_add',$data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function editData()
    {


        $update_data = [
            'name'=>$this->input->post('name'),
        ];

        if($this->memo_func) {
            $update_data['memo'] = $this->input->post('memo');
        }

        if($this->editor_func) {
            $update_data['content'] = $this->input->post('content');
        }
        if($this->link_func) {
            $update_data['link'] = $this->input->post('link');
        }

        if($this->thum_func) {
            $update_data['image'] = $this->input->post('image');
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
        $json = $this->facility_model->facilityEditData($update_data, $idx);

        $this->json($json);
    }

    public function datadel($idx)
    {
        $json = $this->facility_model->facilitydel($idx);
        $this->json($json);
    }
    public function count()
    {
        $json = $this->facility_model->facilityCount();
        $this->json($json);
    }

    public function order()
    {
        $idxs = $_POST['idxs'];
        $idx = $_POST['idx'];


        if( !$idxs) {
            array('return'=>false);
        }
        $json = $this->facility_model->facilityOrder($idxs, $idx);
        $this->json($json);
    }

    public function uploadimage() {
        $json = $this->upload('image');
        return $this->json($json);
    }
}