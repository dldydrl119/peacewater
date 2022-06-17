<script src="/vendors/switchery/dist/switchery.min.js"></script>
<link href="/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
<style type="text/css">
	.switchery { width: 32px; height: 20px; }
	.switchery>small { width: 20px; height: 20px; }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3><?=$name?></h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
					<div class="reserve_left">
						<div class="table-responsive">
							<div class="table_title">
								<!-- 현재가 1월이라 이전 달이 작년 12월인경우 -->
                                <?/*if( date('Y', strtotime('-1 year')) < $year):?>
                                    <a href="?year=<?=$year-1 ?>&month=<?=$month?>&day=<?=$day?>"><span class="ym"><?=$year-1 ?></span></a>
                                <?endif;*/?>

                                <?if( date('Y', strtotime('-1 year')) >= $year && $month == '1'):?>

                                <?else:?>

                                    <?php if ($month == 1): ?>
                                        <!-- 작년 12월 -->
                                        <a href="?year=<?php echo $year-1 ?>&month=12&day=<?=$pre_lastday?>">◀</a>
                                    <?php else: ?>
                                        <!-- 이번 년 이전 월 -->
                                        <a href="?year=<?php echo $year ?>&month=<?php echo $month-1 ?>&day=<?=$pre_lastday?>">◀</a>
                                    <?php endif ?>
                                <?php endif ?>

								<span class="ym">
									<?=$year?>년 <?=sprintf('%2d',$month)?>월
								</span>

                                <?if( date('Y', strtotime('+1 year')) <= $year && $month == '12'):?>

                                <?else:?>
                                    <!-- 현재가 12월이라 다음 달이 내년 1월인경우 -->
                                    <?php if ($month == 12): ?>
                                        <!-- 내년 1월 -->
                                        <a href="?year=<?php echo $year+1 ?>&month=1&day=1">▶</a>
                                    <?php else: ?>
                                        <!-- 이번 년 다음 월 -->
                                        <a href="?year=<?php echo $year ?>&month=<?php echo $month+1 ?>&day=1">▶</a>
                                    <?php endif ?>
                                <?php endif ?>
                                <?/*if( date('Y', strtotime('+1 year')) > $year):?>
                                    <a href="?year=<?=$year+1 ?>&month=<?=$month?>&day=<?=$day?>"> <span class="ym"><?=$year+1 ?></span></a>
                                <?endif;*/?>

								<button onclick="javascript:location.href='/admin/reserve/list'">오늘</button>
							</div>

							<table border="1" class="row-fluid">
								<colgroup>
									<col style="width: 80px;">
									<col style="width: 80px;">
									<col style="width: 80px;">
									<col style="width: 80px;">
									<col style="width: 80px;">
									<col style="width: 80px;">
									<col style="width: 80px;">
								</colgroup>
								<tr>
									<th>일</th>
									<th>월</th>
									<th>화</th>
									<th>수</th>
									<th>목</th>
									<th>금</th>
									<th>토</th>
								</tr>

								<!-- 총 주차를 반복합니다. -->
								<?php for ($n = 1, $i = 0; $i < $total_week; $i++): ?>
									<tr height="50">
										<!-- 1일부터 7일 (한 주) -->
										<?php for ($k = 0; $k < 7; $k++):
                                            $chk_date = date('Y-m-d',strtotime("$year-$month-$n"));
                                            if ( ($n > 1 || $k >= $start_week) && ($total_day >= $n) ) {
                                                $stand = true;
                                            } else {
                                                $stand = false;
                                            }
                                            ?>
											<td class="<?if ( $n == $day && ($n > 1 || $k >= $start_week)) echo 'bg-info'?> <?if($stand) echo 'cal-fic';?>" <?if($stand) echo 'style="cursor: pointer;"';?>>
												<!-- 시작 요일부터 마지막 날짜까지만 날짜를 보여주도록 -->
												<?if($stand):?>
													<!-- 현재 날짜를 보여주고 1씩 더해줌 -->
													<a href="?year=<?=$year?>&month=<?=$month?>&day=<?=$n?>" <?if($k == 0):?>style="color: #cc0404;"<?endif;?>>
                                                        <?=$n?>
                                                    </a>
                                                    <br>
                                                    <?
                                                    if(isset($reserve_month_cnt[$chk_date])) {
                                                        if($reserve_month_cnt[$chk_date]->reserve_room_cnt >= $reserve_max_num) {
                                                            echo "<b>(예약완료)</b>";
                                                        }else {
                                                            echo $reserve_month_cnt[$chk_date]->reserve_room_cnt .'/'.$reserve_max_num;
                                                        }
                                                    } else {
                                                        echo '0/'.$reserve_max_num;
                                                    }
                                                    $n++;
                                                    ?>
												<?php endif ?>
											</td>
										<?php endfor; ?>
									</tr>
								<?php endfor; ?>
							</table>
						</div>
					</div>                    
					<div class="reserve_right">
						<form action="" method="post" onsubmit="return false;" id="reserve_frm">
							<div class="form_box">
								<div class="form_title">
									<h3>예약현황</h3>
								</div>
								<?for ($i = 1; $i <= $reserve_max_num; $i++):?>
									<div class="row">
										<input type="checkbox" class="js-switch" name="room_num[<?=$i?>]" value="Y" id="room_num_<?=$i?>" <?if( isset($reserve_data->{'room_num'.$i}) && $reserve_data->{'room_num'.$i} == 'Y') echo 'checked'?>>
										<label for="room_num_<?=$i?>"><?=$i?>번방
											<?if(isset($reserve_data->{'room_num'.$i}) && $reserve_data->{'room_num'.$i} == 'Y'):?>
												<span class="red">예약 완료</span>
											<?else:?>
												<span class="blue">예약 가능</span>
											<?endif;?>

										</label>
									</div>
								<?endfor;?>							
								<div class="form-group">
									<!-- <button type="submit" class="btn btn-primary">Cancel</button> -->
									<button type="button" class="btn btn-success" id="reservego">저장하기</button>
									<button type="submit" style="display:none;"></button>
								</div>
							</div>
							<input type="hidden" name="year" value="<?=$year?>">
							<input type="hidden" name="month" value="<?=$month?>">
							<input type="hidden" name="day" value="<?=$day?>">
						</form>
					</div>                    
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 20px; text-align: center;">
        <?//echo $this->pagination->create_links();?>
    </div>
</div>
<!-- /page content -->


<script>
    $('body').on('click', '.adminedit', function() {
        var idx = $(this).parent().parent().attr('data-idx');
        location.href = '/admin/slide/edit/'+idx;
    });
    $('body').on('click', '.admindel', function() {
        var con = confirm("정말 삭제하시겠습니까?");
        if(con) {
            var idx = $(this).parent().parent().attr('data-idx');
            var result = jsonreturn('/admin/slide/datadel/'+idx);
            if(result.return == true) {
                alert("삭제되었습니다");
                location.reload();
            }
        }
    });


</script>
