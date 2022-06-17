<?php


class Tree extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->ldir  = basename(__DIR__);
        $this->load->model($this->ldir.'/site_model');
        $this->load->model('admin/reserve_model');

        $this->acti_cate = $this->config->item('activity_category');
        $this->charge_cate = $this->config->item('charge_category');
    }

    public function index()
    {
        foreach($this->acti_cate as $key => $cate) {
            $acti[$key] = $this->site_model->getActivity($key);
        }

        // GET으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용하고 없다면 현재 년도
        $year = date('Y');
        // GET으로 넘겨 받은 month값이 있다면 넘겨 받은걸 month변수에 적용하고 없다면 현재 월
        $month = date('m');

        $day = date('d');

        $reserve_data = $this->reserve_model->getReserve($year . '-' .$month . '-' . $day);

        $reserve_cnt = 0;
        for ($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            if(isset($reserve_data->{'room_num'.$i}) && $reserve_data->{'room_num'.$i} == 'Y') $reserve_cnt ++;
        }

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

        $data = [
            'event' => $this->site_model->getEvent(),
            'facility' => $this->site_model->getFacility(),
            'enjoy' => $this->site_model->getEnjoy(),
            'charge' => $this->site_model->getChargeAllByCate(),
            'activity' => $acti,
            'acti_cate' => $this->acti_cate,
            'charge_cate_num' => array_chunk(array_keys ($this->charge_cate), 3) ,
            'charge_cate' => $this->charge_cate ,

            'reserve_cnt' => $reserve_cnt,
            'reserve_data'=>$reserve_data,
            'reserve_max_num' => $this->reserve_model->reserve_max_num,
            'reserve_month_cnt' => $reserve_month_cnt,
            'year'=>$year,
            'month'=>$month,
            'day' => $day,
            'time'=>$time,
            'start_week'=>$start_week,
            'total_week'=>$total_week,
            'total_day' => $total_day,
            'pre_lastday' => $pre_lastday,
        ];


        $method_arr = explode('::',  __METHOD__);
        $this->load->view('site_header');
        $this->load->view(strtolower(implode('_', $method_arr)),$data);
        $this->load->view('site_footer');
    }

    public function apiReserveTable($year, $month, $day)
    {
        $reserve_data = $this->reserve_model->getReserve($year . '-' .$month . '-' . $day);
        $reserve_cnt = 0;
        for ($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            if(isset($reserve_data->{'room_num'.$i}) && $reserve_data->{'room_num'.$i} == 'Y') $reserve_cnt ++;
        }

        $html = '<p class="list_title">예약내역 ('.$reserve_cnt .'/'.$this->reserve_model->reserve_max_num.'))</p>';
        $html .= '<table>';
        for ($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            if( isset($reserve_data->{'room_num'.$i}) && $reserve_data->{'room_num'.$i} == 'Y') {
                $html .= "<tr class=\"fin\">
                            <td>{$i}번방</td>
                            <td>예약완료</td>
                        </tr>";
            } else {
                $html .= "<tr>
                            <td>{$i}번방</td>
                            <td>예약가능</td>
                        </tr>";
            }
        }
        $html .= '</table';
        $this->json(array('result'=>true,'html'=>$html));

    }

    public function apiCalenderTbl($year, $month, $day)
    {

        $reserve_data = $this->reserve_model->getReserve($year . '-' .$month . '-' . $day);

        $reserve_cnt = 0;
        for ($i = 1; $i <= $this->reserve_model->reserve_max_num; $i++) {
            if(isset($reserve_data->{'room_num'.$i}) && $reserve_data->{'room_num'.$i} == 'Y') $reserve_cnt ++;
        }

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

        $html = '<thead>
                <tr>
                    <th>일</th>
                    <th>월</th>
                    <th>화</th>
                    <th>수</th>
                    <th>목</th>
                    <th>금</th>
                    <th>토</th>
                </tr>
                </thead>';
        for ($n = 1, $i = 0; $i < $total_week; $i++) {

            $html .= '<tr >';
            for ($k = 0; $k < 7; $k++) {
                for ($k = 0; $k < 7; $k++){
                    $chk_date = date('Y-m-d',strtotime("$year-$month-$n"));

                    if ( $n == $day && ($n > 1 || $k >= $start_week)) {
                        $class_focus = 'focus';
                    } elseif( isset($reserve_month_cnt[$chk_date]) && $reserve_month_cnt[$chk_date]->reserve_room_cnt >= $this->reserve_model->reserve_max_num) {
                        $class_focus = 'fin';
                    } else {
                        $class_focus = "";
                    }

                    $html .= "<td data-year=\"$year\" data-month=\"$month\" class=\"{$class_focus} fic_cals\">";

                    if ( ($n > 1 || $k >= $start_week) && ($total_day >= $n) ) {
                        $html .= "<p class=\"day\">$n</p>";
                        $html .= "<p>";
                        if(isset($reserve_month_cnt[$chk_date])) {
                            if($reserve_month_cnt[$chk_date]->reserve_room_cnt >= $this->reserve_model->reserve_max_num) {
                                $html .= "(<b>예약</b>완료)";
                            }else {
                                $html .= $reserve_month_cnt[$chk_date]->reserve_room_cnt .'/'.$this->reserve_model->reserve_max_num;
                            }
                        } else {
                            $html .= '0/'.$this->reserve_model->reserve_max_num;
                        }
                        $html .= "</p>";
                        $n++;
                    }
                    $html .= "</td>";
                }
            }
        }
//        echo $html;
//        exit;

        $this->json(array('result'=>true,'html'=>$html, 'pre_lastday'=>$pre_lastday));
    }

    function contractEmail()
    {
        $emailsend ='blacksky132@naver.com';
        $title = '평화수상레저 문의입니다';
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];


        $mail = $emailsend;
        $body = "이름 : {$name}\n연락처 : {$phone}\n문의내용:{$message}";

        $headers = "From: {$mail}\r\nReply-To: {$mail}\r\nX-Mailer: PHP/".phpversion();
        if (preg_match('/(daum.net|nate.com)/i', $emailsend)) {
            $title=iconv('utf-8', 'euc-kr', $title);
        }
        if ($emailsend && mail($emailsend, $title, $body, $headers)) {
            $this->json(['return'=>'true','result'=>true]);
        } else {
            $this->json(['return'=>'flase','result'=>flase]);
        }

    }
}