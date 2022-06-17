<?php


class Reserve extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->ldir  = basename(__DIR__);
        $this->load->library('session');
        $this->load->model($this->ldir.'/reserve_model');
        $this->load->library('pagination');
        $this->load->model('site/site_model');



        $this->arr_select1 = ['후원금', 'CMS'];
        $this->allow=array();

        $this->per_page = 10; // 페이지당 표시할 게시물수
        $this->num_links = 5; // 표시될 페이지수 / 2 (5면 10개씩 표시됨)
        $this->uri_segment = 3;

    }

//    public function index()
//    {
//        redirect('/admin/admin/slideList');
//    }

    ////////콜겟////////////
    //슬라이드//
    public function list($page = 1)
    {


        $name = "예약 관리";

        $method_arr = explode('::',  __METHOD__);


        // GET으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용하고 없다면 현재 년도
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        // GET으로 넘겨 받은 month값이 있다면 넘겨 받은걸 month변수에 적용하고 없다면 현재 월
        $month = isset($_GET['month']) ? $_GET['month'] : date('m');

        $day = isset($_GET['day']) ? $_GET['day'] : date('d');

        $reserve_data = $this->reserve_model->getReserve($year . '-' .$month . '-' . $day);

        $date = "$year-$month-01"; // 현재 날짜
        $time = strtotime($date); // 현재 날짜의 타임스탬프
        $start_week = date('w', $time); // 1. 시작 요일
        $total_day = date('t', $time); // 2. 현재 달의 총 날짜
        $pre_lastday = date('t', strtotime($date.' -1 month'));
        $total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차

        $temp = $this->site_model->getReserveCnt($date, "$year-$month-$total_day");
        $reserve_month_cnt = [];
        foreach($temp as $val) {
            $reserve_month_cnt[$val->reserve_date] = $val;
        }

        $data = array(
            'name'=>$name,
            'reserve_max_num' => $this->reserve_model->reserve_max_num,
            'year'=>$year,
            'month'=>$month,
            'day' => $day,
            'date'=>$date,
            'time'=>$time,
            'start_week'=>$start_week,
            'total_week'=>$total_week,
            'total_day' => $total_day,
            'pre_lastday' => $pre_lastday,
            'reserve_data' => $reserve_data,
            'reserve_month_cnt' => $reserve_month_cnt,
        );

        $this->load->view($this->ldir . '/admin_header');
        $this->load->view($this->ldir. '/'.  strtolower(implode('_', $method_arr)), $data);
        $this->load->view($this->ldir . '/admin_footer');
    }

    public function addData()
    {
        for($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            if( isset($_POST['room_num'][$i]) && $_POST['room_num'][$i] === 'Y') {
                $data['room_num'.$i] = 'Y';
            } else {
                $data['room_num'.$i] = 'N';
            }
        }
        $reserve_date = $this->input->post('year'). '-'. $this->input->post('month') . '-'. $this->input->post('day');

        $reserve_data = $this->reserve_model->getReserve($reserve_date);

        if( empty($reserve_data)) {
            $data['reserve_date'] = $reserve_date;
            $result = $this->reserve_model->insertReserve($data);
        } else {
            $result = $this->reserve_model->updateReserve($data, $reserve_date);
        }
        $this->json(array('return'=>$result));

    }
}