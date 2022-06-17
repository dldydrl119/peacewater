<!-- Home -->
<section id="home" class="screen-height">
	<div class="jb-box">
		<video muted autoplay loop>
		<source src="/assets/images/peacewater.mp4" type="video/mp4">
        <strong>Your browser does not support the video tag.</strong>
		</video>
	</div>
	<div class="overlay"></div>
	<div class="intro">
		<div class="start mb20" style="font-size: 100px;">
			<div class="container relative">
				
				<!-- <img src="/assets/images/logo_w.png" title="로고" alt="로고" class="wav" /> -->
				
				<!-- <div class="main_video">
					 <div>
					<a href="https://youtube.com/embed/oopTCLKxsoM" target="_blank">
						<img src="/assets/images/gallery/video/1.jpg" />
					</a>
				</div> 
					<div>
					<a href="https://youtube.com/embed/hUivDC4_Fxw" target="_blank">
						<img src="/assets/images/gallery/video/2.jpg" />
					</a>
				</div> 
					 <div>
					<a href="https://youtube.com/embed/R1T0sA03kXM" target="_blank">
						<img src="/assets/images/gallery/video/3.jpg" />
					</a>
				</div>  -->	
					<iframe class="main_youtube" width="450" height="253" src="https://www.youtube.com/embed/q9HA0C7qYq0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					<iframe class="main_youtube" width="450" height="253" src="https://www.youtube.com/embed/0cbC1dZN_fg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>	
	<a href="#event" title="스크롤 이동" alt="스크롤 이동">
		<div class="scroll-down">
			<span class="glyphicon glyphicon-menu-down"></span>
		</div>
	</a>
	<div id="hero">
		<svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
			<defs>
				<path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
			</defs>
			<g class="wave1">
				<use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
			</g>
			<g class="wave2">
				<use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
			</g>
			<g class="wave3">
				<use xlink:href="#wave-path" x="50" y="9" fill="#fff">
			</g>
		</svg>
	</div>
</section>
<!-- Home_END -->

<!-- Event -->
<section id="event" class="event wow fadeInUp mb30">
	<div class="container">
		<div class="section-header">
			<h3>Event</h3>
		</div>
		<div class="contents">
			<div class="center">
				<div id="event_slider" class="slider slick-slider">
					<? foreach ($event as $key => $val) : ?>
						<div class="list-box" data-toggle="modal" data-target="#event_modal_<?= $val->idx ?>">
							<div class="list-img">
								<div style="background-image:url('/<?= DIR_UP_IMAGE . $val->image ?>');"></div>
							</div>
							<div class="list-contents">
								<div class="title">
									<?= $val->name ?>
								</div>
								<div class="list-info">
									<div class="date">
										<span><?= date('Y.m.d', strtotime($val->reg_date)) ?></span>
									</div>
								</div>
							</div>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>

	</div>
</section>
<!-- Contactus_END -->
<script>
	const wrapper = document.getElementById("instagram");
	fetch("https://www.instagram.com/peace_water_ski/")
		.then(a => {
			return a.text();
		}).then(a => {
			const media = JSON.parse(a.slice(a.indexOf("edge_owner_to_timeline_media") + 30, a.indexOf("edge_saved_media") - 2));
			media.edges.forEach(m => {
				const node = m.node,
					a = document.createElement("a"),
					img = document.createElement("img");

				a.target = "_blank",
					a.href = `https://www.instagram.com/p/${node.shortcode}/`,
					img.src = node.display_url,
					a.append(img),
					wrapper.append(a)
			})
		})
</script>


<!-- Activity -->  
<section id="activity" class="activity wow fadeInUp mb30">
	<div class="container">
		<div class="section-header">
			<h3>Activity</h3>
		</div>
		<div>
			<div class="flip">
				<!--
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="flip-card" onclick="">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="/assets/images/activity/A-1.jpg">
							</div>
							<div class="flip-card-back">
								<img src="/assets/images/activity/A-2.jpg">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="flip-card">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="/assets/images/activity/B-1.jpg">
							</div>
							<div class="flip-card-back">
								<img src="/assets/images/activity/B-2.jpg">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="flip-card">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="/assets/images/activity/C-1.jpg">
							</div>
							<div class="flip-card-back">
								<img src="/assets/images/activity/C-2.jpg">
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="flip-card">
						<div class="flip-card-inner">
							<div class="flip-card-front">
								<img src="/assets/images/activity/D-1.jpg">
							</div>
							<div class="flip-card-back">
								<img src="/assets/images/activity/D-2.jpg">
							</div>
						</div>
					</div>
				</div>
				-->
				<? foreach ($acti_cate as $key => $category) : ?>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<div class="flip-card" data-target="#activity_<?= $key ?>" data-toggle="tab" alt="<?= $category ?>">
							<div class="flip-card-inner">
								<div class="flip-card-front">
									<img src="/assets/images/activity/<?= $key ?>-1.jpg">
								</div>
								<div class="flip-card-back">
									<img src="/assets/images/activity/<?= $key ?>-2.jpg">
								</div>
							</div>
						</div>
					</div>
				<? endforeach; ?>
			</div>
			<div class="tab-menu">
				<ul id="myTab" class="nav nav-tabs bar_tabs menu_tabs">
					<? foreach ($acti_cate as $key => $category) : ?>
						<li class="<? if ($key == 'A') echo 'active' ?>">
							<button data-target="#activity_<?= $key ?>" data-toggle="tab"><?= $category ?></button>
						</li>
					<? endforeach; ?>
				</ul>
				<div id="myTabContent" class="tab-content">
					<? foreach ($acti_cate as $key => $category) : ?>
						<div class="tab-pane fade <? if ($key == 'A') echo 'active in' ?>" id="activity_<?= $key ?>">
							<? foreach ($activity[$key] as $key => $val) : ?>
								<div class="col-xs-12 activity_youtube" data-toggle="modal" data-target="#activity_<?= $key ?>_<?= $val->idx ?>">
									<!-- <div class="thumb_img act cursor_pointer" style="background-image: url('/<?= DIR_UP_IMAGE . $val->image ?>');"></div> -->
									<iframe class="main_youtube" src="https://www.youtube.com/embed/<?= $val->memo ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
								</div>
							<? endforeach; ?>
						</div>
					<? endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contactus_END -->



<!-- Enjoy -->
<section id="enjoy" class="wow fadeInUp mb30">
	<div class="container">
		<div class="section-header">
			<h3>Enjoy</h3>
		</div>
		<? foreach ($enjoy as $key => $val) : ?>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="card_thumb">
					<div class="thumb_img" style="background-image: url('/<?= DIR_UP_IMAGE . $val->image ?>');"></div>
					<div class="title">
						<div><?= $val->name ?></div>
					</div>
					<div class="cont">
						<p><?= $val->memo ?></p>
					</div>
				</div>
			</div>
		<? endforeach; ?>
	</div>
</section>
<!-- Contactus_END -->

<!-- Guest House -->
<section id="guest" class="wow fadeInUp mb30">
	<div class="container">
		<div class="section-header">
			<h3>Guest House</h3>
		</div>
		<div>
			<div class="tab-menu">
				<ul id="myTab" class="nav nav-tabs bar_tabs menu_tabs">
					<li class="active">
						<button data-target="#tab_content_2_1" data-toggle="tab">2인실</button>
					</li>
					<li>
						<button data-target="#tab_content_2_2" data-toggle="tab">4인실</button>
					</li>
					<li>
						<button data-target="#tab_content_2_3" data-toggle="tab">6인실</button>
					</li>
					<!-- <li>
						<button data-target="#tab_content_2_4" data-toggle="tab">방 종류_4</button>
					</li> -->
				</ul>

				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="tab_content_2_1">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="thumb_img guest" style="background-image: url('/assets/images/gallery/guest/guest_2_1.jpg');"></div>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="info">
								<h2>게스트 하우스 (2인실)</h2>
								<p>최소 1명부터 최대 2명까지 입실가능합니다.</p>
								<p>입실시간 - 14:00</p>
								<p>퇴실시간 - 11:00</p>
								<div class="more">
									<button data-toggle="modal" data-target="#Modal_5">+ 더보기</button>
								</div>
								<div class="call">
									<!-- <button data-toggle="modal" data-target="#Modal_3">예약하기</button> -->
									<button onclick="document.location.href='tel:031-576-2374'">예약하기</button>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab_content_2_2">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="thumb_img guest" style="background-image: url('/assets/images/gallery/guest/guest_4_1.jpg');"></div>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="info">
								<h2>게스트 하우스 (4인실)</h2>
								<p>최소 2명부터 최대 4명까지 입실가능합니다.</p>
								<p>입실시간 - 14:00</p>
								<p>퇴실시간 - 11:00</p>
								<div class="more">
									<button data-toggle="modal" data-target="#Modal_6">+ 더보기</button>
								</div>
								<div class="call">
									<!-- <button data-toggle="modal" data-target="#Modal_3">예약하기</button> -->
									<button onclick="document.location.href='tel:031-576-2374'">예약하기</button>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab_content_2_3">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="thumb_img guest" style="background-image: url('/assets/images/gallery/guest/guest_6_1.jpg');"></div>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="info">
								<h2>게스트 하우스 (6인실)</h2>
								<p>최소 3명부터 최대 6명까지 입실가능합니다.</p>
								<p>입실시간 - 14:00</p>
								<p>퇴실시간 - 11:00</p>
								<div class="more">
									<button data-toggle="modal" data-target="#Modal_7">+ 더보기</button>
								</div>
								<div class="call">
									<!-- <button data-toggle="modal" data-target="#Modal_3">예약하기</button> -->
									<button onclick="document.location.href='tel:031-576-2374'">예약하기</button>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="tab-pane fade" id="tab_content_2_4">
						<div class="col-xs-12 col-sm-4 col-md-4">
							<div class="thumb_img" style="background-image: url('/assets/images/sample/sample_1.jpg');"></div>
						</div>
						<div class="col-xs-12 col-sm-8 col-md-8">
							<div class="info">
								<h2>방 종류_4</h2>
								<p>방 설명</p>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contactus_END -->

<!-- 부대시설 -->
<section id="service" class="wow fadeInUp mb30">
	<div class="container">
		<div class="section-header">
			<h3>부대시설</h3>
		</div>
		<? foreach ($facility as $key => $val) : ?>
			<div class="col-xs-12 col-sm-6 col-md-3">
				<div class="card_thumb pointer" data-toggle="modal" data-target="#Service_Modal_<?= $key ?>">
					<div class="thumb_img" style="background-image: url('/<?= DIR_UP_IMAGE . $val->image ?>');"></div>
					<div class="title">
						<div><?= $val->name ?></div>
					</div>
					<div class="cont">
						<p><?= $val->memo ?></p>
					</div>
				</div>
			</div>
		<? endforeach; ?>
	</div>
</section>
<!-- Contactus_END -->

<!-- Modal -->
<? foreach ($event as $key => $val) : ?>
	<div class="modal fade" id="event_modal_<?= $val->idx ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<p class="title"><?= $val->name ?></p>
					<div class="contents">
						<!--                    <img src="/--><? //=DIR_UP_IMAGE.$val->image
																?>
						<!--">-->
						<?= $val->content ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>

<? foreach ($acti_cate as $key => $category) : ?>
	<? foreach ($activity[$key] as $key => $val) : ?>
		<div class="modal fade" id="activity_<?= $key ?>_<?= $val->idx ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="contents">
							<img src="/<?= DIR_UP_IMAGE . $val->image ?>">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
<? endforeach; ?>

<!-- Map -->
<section id="map" class="wow fadeInUp mb30">
	<div class="container">
		<div class="section-header">
			<h3>찾아오시는 길</h3>
		</div>
		<div class="row map text-center mt50">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3161.4394223750355!2d127.33643941571194!3d37.5918159797932!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x35634a8ac7577255%3A0x89b0612c305f703d!2z7Y-J7ZmU7IiY7IOB7Iqk7YKk7J6l!5e0!3m2!1sko!2skr!4v1586408603009!5m2!1sko!2skr" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			<div class="address">
				<div class="col-md-offset-2 col-md-8">
					<div class="col-sm-6 col-xs-12">
						<p>주소</p>
						<p>경기도 남양주시 조안면 북한강로 860</p>
					</div>
					<!-- <div class="col-sm-6 col-xs-12">
						<p>입금계좌</p>
						<p>기업은행 582-034683-01-015</p>
					</div> -->
					<div class="col-sm-6 col-xs-12">
						<p>대표전화</p>
						<p>031-576-2374</p>
					</div>
					<div class="col-sm-6 col-xs-12">
						<p>단체예약문의</p>
						<p>010-9780-5537</p>
					</div>
					<div class="col-sm-6 col-xs-12">
						<p>운영시간</p>
						<p>06:00 ~ 20:00</p>
					</div>
					<!-- <div class="col-sm-6 col-xs-12">
						<p>카카오 플러스친구</p>
						<p>peacewater</p>
					</div> -->
				</div>
			</div>
			<div class="pickupservice">
				<div class="col-xs-12">
					<img src="/assets/images/pickup.png" alt="pickup service">
				</div>
				<div class="col-xs-12"><br>
					<p>경의중앙선 운길산역 도착 30분 전에 연락주시면 운길산역에서 픽업가능</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Contactus_END -->

<!-- Contactus -->
<section id="contact" class="wow fadeInUp mb30" style="display: none;">
	<div class="container">
		<div class="section-header">
			<h3>이메일 문의하기</h3>
		</div>
		<div class="form">
			<form action="" method="post" role="form" class="contactForm" id="contactForm">
				<div class="col-sm-offset-2 col-sm-8 col-xs-12">
					<div class="form-row">
						<div class="form-group col-sm-12 col-md-6">
							<input type="text" class="form-control req" id="name" name="name" placeholder="성함" data-rule="minlen:4" data-msg="성함이 입력되지 않았습니다." required="required" />
							<div class="validation"></div>
						</div>
						<div class="form-group col-sm-12 col-md-6">
							<input type="text" class="form-control req" id="phone" name="phone" placeholder="연락처" data-rule="minlen:4" data-msg="연락처가 입력되지 않았습니다." required="required" />
							<div class="validation"></div>
						</div>
						<div class="form-group form-padding">
							<textarea class="form-control req" name="message" id="message" rows="5" data-rule="required" data-msg="문의사항이 입력되지 않았습니다." placeholder="문의사항" required="required"></textarea>
							<div class="validation"></div>
						</div>
						<div class="button_area">
							<div class="left">
								<label class="checkbox">개인정보보호정책에 동의합니다.
									<input type="checkbox" id="checked" checked="checked">
									<span class="checkmark"></span>
								</label>
							</div>
							<div class="right"><button type="button" id="emailgo">문의하기</button>
								<button type="submit" class="hidden"></button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<!-- Contactus_END -->

<div class="modal fade" id="Modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content modal-lg">
			<div class="modal-body">
				<p class="title">예약하기</p>
				<div class="contents">
					<div class="reserv">
						<div class="mobile_pd col-xs-12 col-sm-8">
							<div class="calendar">
								<div class="month">
									<?/*?><button data-year="<?=$year-1?>" data-month="<?=sprintf('%2d',$month)?>" data-day="<?=$day?>" id="pre_year">작년</button><?*/ ?>

									<?php if ($month == 1) : ?>
										<!-- 작년 12월 -->
										<button data-year="<?= $year - 1 ?>" data-month="12" data-day="<?= $pre_lastday ?>" id="pre_mon">◀</button>
									<?php else : ?>
										<button data-year="<?= $year ?>" data-month="<?= $month - 1 ?>" data-day="<?= $pre_lastday ?>" id="pre_mon">◀</button>
										<!-- 이번 년 이전 월 -->

									<?php endif ?>

									<span><?= $year ?>년 <?= sprintf('%2d', $month) ?>월</span>
									<!-- 현재가 12월이라 다음 달이 내년 1월인경우 -->
									<?php if ($month == 12) : ?>
										<!-- 내년 1월 -->
										<button data-year="<?= $year + 1 ?>" data-month="1" data-day="1" id="next_mon">▶</button>
									<?php else : ?>
										<!-- 이번 년 다음 월 -->
										<button data-year="<?= $year ?>" data-month="<?= $month + 1 ?>" data-day="1" id="next_mon">▶</button>

									<?php endif ?>

									<?/*?><button data-year="<?=$year+1?>" data-month="<?=sprintf('%2d',$month)?>" data-day="<?=$day?>" id="next_year">내년</button><?*/ ?>

									<button data-year="<?= date('Y') ?>" data-month="<?= sprintf('%d', date('m')) ?>" data-day="<?= date('d') ?>" id="today_btn">오늘</button>
								</div>
								<div class="table-responsive">
									<table id="calender_tbl">
										<thead>
											<tr>
												<th>일</th>
												<th>월</th>
												<th>화</th>
												<th>수</th>
												<th>목</th>
												<th>금</th>
												<th>토</th>
											</tr>
										</thead>
										<?php for ($n = 1, $i = 0; $i < $total_week; $i++) : ?>
											<tr>
												<!-- 1일부터 7일 (한 주) -->
												<?php for ($k = 0; $k < 7; $k++) :
													$chk_date = date('Y-m-d', strtotime("$year-$month-$n"));
												?>
													<td data-year="<?= $year ?>" data-month="<?= $month ?>" class="<? if ($n == $day && ($n > 1 || $k >= $start_week)) echo 'focus ';
																													elseif (isset($reserve_month_cnt[$chk_date]) && $reserve_month_cnt[$chk_date]->reserve_room_cnt >= $reserve_max_num) echo 'fin ';
																													if (($n > 1 || $k >= $start_week) && ($total_day >= $n)) echo 'fic_cals '
																													?> ">
														<!-- 시작 요일부터 마지막 날짜까지만 날짜를 보여주도록 -->
														<?php if (($n > 1 || $k >= $start_week) && ($total_day >= $n)) : ?>
															<!-- 현재 날짜를 보여주고 1씩 더해줌 -->
															<p class="day"><?= $n ?></p>
															<p>
																<?
																if (isset($reserve_month_cnt[$chk_date])) {
																	if ($reserve_month_cnt[$chk_date]->reserve_room_cnt >= $reserve_max_num) {
																		echo "(<b>예약</b>완료)";
																	} else {
																		echo $reserve_month_cnt[$chk_date]->reserve_room_cnt . '/' . $reserve_max_num;
																	}
																} else {
																	echo '0/' . $reserve_max_num;
																}
																$n++;
																?>
															</p>
														<?php endif ?>
													</td>
												<?php endfor; ?>
											</tr>
										<?php endfor; ?>
									</table>
								</div>
							</div>
						</div>
						<div class="mobile_pd col-xs-12 col-sm-4">
							<div class="list" id="room_tbl">
								<p class="list_title">예약내역 (<?= $reserve_cnt ?>/<?= $reserve_max_num ?>)</p>
								<table>
									<? for ($i = 1; $i <= $reserve_max_num; $i++) : ?>

										<? if (isset($reserve_data->{'room_num' . $i}) && $reserve_data->{'room_num' . $i} == 'Y') : ?>
											<tr class="fin">
												<td><?= $i ?>번방</td>
												<td>예약완료</td>
											</tr>
										<? else : ?>
											<tr>
												<td><?= $i ?>번방</td>
												<td>예약가능</td>
											</tr>
										<? endif; ?>
									<? endfor; ?>
								</table>
							</div>
						</div>
					</div>
					<div class="col-xs-12">
						<div class="call">
							<button onclick="location.href='tel:031-576-2374'">
								<img src="/assets/images/icon/mobile-call.png" alt="">전화예약
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">이용요금</p>
				<div class="contents">
					<!-- <div class="lesson">
						<div class="left_area">
							<table>
								<tr>
									<th>신청기간</th>
									<td>시즌 종료까지</td>
								</tr>
								<tr>
									<th>레슨시간</th>
									<td>3월 ~ 11월 폐장까지</td>
								</tr>
								<tr>
									<th>접수문의</th>
									<td>파트별 코치</td>
								</tr>
								<tr>
									<th>강습혜택</th>
									<td>무전기 실시간 피드백<br>영상촬영 분석 / 장비구매 할인</td>
								</tr>
							</table>
						</div>
						<div class="right_area">
							<table>
								<tr>
									<th rowspan="4">강습구성</th>
									<td>1 Day - 50,000원</td>
								</tr>
								<tr>
									<td>10 Day - 400,000원</td>
								</tr>
								<tr>
									<td>1 Month - 250,000원</td>
								</tr>
								<tr>
									<td>All Day - 1,000,000원</td>
								</tr>
							</table>
						</div>
						<div class="center">
							<p>국민 829101-01-209176 양종화</p>
						</div>
					</div> -->

					<? foreach ($charge_cate_num as $index => $cate_nums) : ?>
						<div <? if ($index == 1) echo 'class="left_area"';
								else echo 'class="right_area"' ?>>
							<? foreach ($cate_nums as $num) : ?>
								<div class="charge">
									<table>
										<tr>
											<th colspan="3"><span><?= $charge_cate[$num] ?></span></th>
										</tr>
										<? if (!empty($charge[$num])) : ?>
											<? foreach ($charge[$num] as $key => $val) : ?>
												<tr>
													<td><?= $key + 1 ?></td>
													<td><?= $val->name ?></td>
													<td><?= $val->memo ?><b>원</b></td>
												</tr>
											<? endforeach; ?>
										<? else : ?>
											<tr>
												<td colspan="3">준비중</td>
											</tr>
										<? endif; ?>
									</table>
								</div>
							<? endforeach; ?>
						</div>
					<? endforeach; ?>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">게스트 하우스 (2인실)</p>
				<div class="contents">
					<div id="myCarousel_1" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel_1" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel_1" data-slide-to="1"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/guest/guest_2_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/guest/guest_2_2.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#myCarousel_1" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel_1" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="center">
						<div class="charge">
							<table class="guest_table">
								<tr>
									<th colspan="2"><span>평화 게스트 하우스 이용수칙</span></th>
								</tr>
								<tr>
									<td>1</td>
									<td>입실시간 - 14:00<br>퇴실시간 - 11:00</td>
								</tr>
								<tr>
									<td>2</td>
									<td>혼숙금지 및 반려동물 출입금지</td>
								</tr>
								<tr>
									<td>3</td>
									<td>건물 내 흡연 및 취사금지</td>
								</tr>
								<tr>
									<td>4</td>
									<td>음주 및 고성방가 금지</td>
								</tr>
								<tr>
									<td>5</td>
									<td>외부 샤워장 이용</td>
								</tr>
								<tr>
									<td>6</td>
									<td>퇴실시 정리후 쓰레기는 분리수거장 사용</td>
								</tr>
								<tr>
									<td>7</td>
									<td>침구류 및 물품 파손시 변상</td>
								</tr>
								<tr>
									<td>8</td>
									<td>귀중품 분실 및 사고 발생시 본인 책임</td>
								</tr>
								<tr>
									<td colspan="2"><b>문의전화 010-9780-5537</b><br>※ 위 사항 미준수시 퇴실 및 예약 불가능</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">게스트 하우스 (4인실)</p>
				<div class="contents">
					<div id="myCarousel_2" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel_2" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel_2" data-slide-to="1"></li>
							<li data-target="#myCarousel_2" data-slide-to="2"></li>
							<li data-target="#myCarousel_2" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/guest/guest_4_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/guest/guest_4_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/guest/guest_4_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/guest/guest_4_4.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#myCarousel_2" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel_2" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="center">
						<div class="charge">
							<table class="guest_table">
								<tr>
									<th colspan="2"><span>평화 게스트 하우스 이용수칙</span></th>
								</tr>
								<tr>
									<td>1</td>
									<td>입실시간 - 14:00<br>퇴실시간 - 11:00</td>
								</tr>
								<tr>
									<td>2</td>
									<td>혼숙금지 및 반려동물 출입금지</td>
								</tr>
								<tr>
									<td>3</td>
									<td>건물 내 흡연 및 취사금지</td>
								</tr>
								<tr>
									<td>4</td>
									<td>음주 및 고성방가 금지</td>
								</tr>
								<tr>
									<td>5</td>
									<td>외부 샤워장 이용</td>
								</tr>
								<tr>
									<td>6</td>
									<td>퇴실시 정리후 쓰레기는 분리수거장 사용</td>
								</tr>
								<tr>
									<td>7</td>
									<td>침구류 및 물품 파손시 변상</td>
								</tr>
								<tr>
									<td>8</td>
									<td>귀중품 분실 및 사고 발생시 본인 책임</td>
								</tr>
								<tr>
									<td colspan="2"><b>문의전화 010-9780-5537</b><br>※ 위 사항 미준수시 퇴실 및 예약 불가능</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Modal_7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">게스트 하우스 (6인실)</p>
				<div class="contents">
					<div id="myCarousel_3" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel_3" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel_3" data-slide-to="1"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/guest/guest_6_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/guest/guest_6_2.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#myCarousel_3" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel_3" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="center">
						<div class="charge">
							<table class="guest_table">
								<tr>
									<th colspan="2"><span>평화 게스트 하우스 이용수칙</span></th>
								</tr>
								<tr>
									<td>1</td>
									<td>입실시간 - 14:00<br>퇴실시간 - 11:00</td>
								</tr>
								<tr>
									<td>2</td>
									<td>혼숙금지 및 반려동물 출입금지</td>
								</tr>
								<tr>
									<td>3</td>
									<td>건물 내 흡연 및 취사금지</td>
								</tr>
								<tr>
									<td>4</td>
									<td>음주 및 고성방가 금지</td>
								</tr>
								<tr>
									<td>5</td>
									<td>외부 샤워장 이용</td>
								</tr>
								<tr>
									<td>6</td>
									<td>퇴실시 정리후 쓰레기는 분리수거장 사용</td>
								</tr>
								<tr>
									<td>7</td>
									<td>침구류 및 물품 파손시 변상</td>
								</tr>
								<tr>
									<td>8</td>
									<td>귀중품 분실 및 사고 발생시 본인 책임</td>
								</tr>
								<tr>
									<td colspan="2"><b>문의전화 010-9780-5537</b><br>※ 위 사항 미준수시 퇴실 및 예약 불가능</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_100" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">김대장의 전라도밥상</p>
				<div class="contents">
					<div id="servCarousel_1" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_1" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_1" data-slide-to="1"></li>
							<li data-target="#servCarousel_1" data-slide-to="2"></li>
							<li data-target="#servCarousel_1" data-slide-to="3"></li>
							<li data-target="#servCarousel_1" data-slide-to="4"></li>
							<li data-target="#servCarousel_1" data-slide-to="5"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_1_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_1_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_1_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_1_4.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_1_5.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_1_6.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_1" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_1" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="center">
						<div class="charge eat">
							<table class="guest_table">
								<tr>
									<th colspan="4"><span class="mb10">김대장의 전라도밥상</span></th>
								</tr>
								<tr class="point">
									<td colspan="4">찌개 및 탕류</td>
								</tr>
								<tr>
									<td>1</td>
									<td>김치찌개</td>
									<td>(2인 이상)</td>
									<td>8,000원</td>
								</tr>
								<tr>
									<td>2</td>
									<td>된장찌개</td>
									<td>(2인 이상)</td>
									<td>8,000원</td>
								</tr>
								<tr>
									<td>3</td>
									<td>닭도리탕</td>
									<td>(2인 이상)</td>
									<td>30,000원</td>
								</tr>
								<tr>
									<td>4</td>
									<td>닭백숙</td>
									<td>(4인 기준)</td>
									<td>60,000원</td>
								</tr>
								<tr>
									<td>5</td>
									<td>오리탕</td>
									<td>(2인 이상)</td>
									<td>60,000원</td>
								</tr>
								<tr class="point">
									<td colspan="4">식사류</td>
								</tr>
								<tr>
									<td>1</td>
									<td>제육볶음</td>
									<td>(2인 이상)</td>
									<td>10,000원</td>
								</tr>
								<tr>
									<td>2</td>
									<td>냉동삼겹살</td>
									<td>(2인 이상)</td>
									<td>12,000원</td>
								</tr>
								<tr>
									<td>3</td>
									<td>LA갈비</td>
									<td>(2인 이상)</td>
									<td>8,000원</td>
								</tr>
								<tr>
									<td>4</td>
									<td>가정식 백반</td>
									<td>(1인)</td>
									<td>7,000원</td>
								</tr>
								<tr>
									<td>5</td>
									<td>공기밥</td>
									<td>(1인)</td>
									<td>1,000원</td>
								</tr>
								<tr class="point">
									<td colspan="4">주류 및 음료</td>
								</tr>
								<tr>
									<td rowspan="3">1</td>
									<td rowspan="3">생맥주(카페)</td>
									<td class="bg-lightgray">500cc</td>
									<td>4,000원</td>
								</tr>
								<tr class="row_td">
									<td>1700cc</td>
									<td>12,000원</td>
								</tr>
								<tr class="row_td">
									<td>2700cc</td>
									<td>17,000원</td>
								</tr>
								<tr>
									<td rowspan="2">2</td>
									<td rowspan="2">병맥주</td>
									<td class="bg-lightgray">카스</td>
									<td>4,000원</td>
								</tr>
								<tr class="row_td">
									<td>테라</td>
									<td>4,000원</td>
								</tr>
								<tr>
									<td rowspan="2">3</td>
									<td rowspan="2">소주</td>
									<td class="bg-lightgray">참이슬</td>
									<td>4,000원</td>
								</tr>
								<tr class="row_td">
									<td>처음처럼</td>
									<td>4,000원</td>
								</tr>
								<tr>
									<td>4</td>
									<td>캔음료</td>
									<td></td>
									<td>2,000원</td>
								</tr>
								<tr>
									<td colspan="4">
										<b>문의전화</b><br>
										<span>010-7622-5529<br>010-3624-0211</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">카페</p>
				<div class="contents">
					<div id="servCarousel_2" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_2" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_2" data-slide-to="1"></li>
							<li data-target="#servCarousel_2" data-slide-to="2"></li>
							<li data-target="#servCarousel_2" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_2_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_2_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_2_4.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_2_5.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_2" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_2" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="center">
						<div class="charge eat">
							<table class="guest_table">
								<tr>
									<th colspan="4"><span class="mb10">카페</span></th>
								</tr>
								<tr class="point">
									<td colspan="4">커피</td>
								</tr>
								<tr>
									<td>1</td>
									<td>아메리카노</td>
									<td></td>
									<td>4,000원</td>
								</tr>
								<tr>
									<td>2</td>
									<td>카페라떼</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>3</td>
									<td>바닐라라떼</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>4</td>
									<td>카라멜라떼</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr class="point">
									<td colspan="4">음료</td>
								</tr>
								<tr>
									<td>1</td>
									<td>핫쵸코</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>2</td>
									<td>아이스쵸코</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>3</td>
									<td>복숭아아이스티</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>4</td>
									<td>플레인요거트스무디</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>5</td>
									<td>망고요거트스무디</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>6</td>
									<td>딸기요거트스무디</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr>
									<td>7</td>
									<td>1인 빨대 팥빙수</td>
									<td></td>
									<td>5,000원</td>
								</tr>
								<tr class="point">
									<td colspan="4">주류</td>
								</tr>
								<tr>
									<td rowspan="3">1</td>
									<td rowspan="3">생맥주</td>
									<td class="bg-lightgray">500cc</td>
									<td>4,000원</td>
								</tr>
								<tr class="row_td">
									<td>1700cc</td>
									<td>12,000원</td>
								</tr>
								<tr class="row_td">
									<td>2700cc</td>
									<td>17,000원</td>
								</tr>
								<tr class="point">
									<td colspan="4">기타</td>
								</tr>
								<tr>
									<td>1</td>
									<td>즉석라면</td>
									<td></td>
									<td>3,000원</td>
								</tr>
								<tr>
									<td>2</td>
									<td>단무지</td>
									<td></td>
									<td>1,000원</td>
								</tr>
								<tr>
									<td>3</td>
									<td>얼음물</td>
									<td></td>
									<td>2,000원</td>
								</tr>
								<tr>
									<td colspan="4">
										<b>문의전화</b><br>
										<span>010-9780-5537</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">바베큐</p>
				<div class="contents">
					<div id="servCarousel_3" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_3" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_3" data-slide-to="1"></li>
							<li data-target="#servCarousel_3" data-slide-to="2"></li>
							<li data-target="#servCarousel_3" data-slide-to="3"></li>
							<li data-target="#servCarousel_3" data-slide-to="4"></li>
							<li data-target="#servCarousel_3" data-slide-to="5"></li>
							<li data-target="#servCarousel_3" data-slide-to="6"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_3_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_3_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_3_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_3_4.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_3_5.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_3_6.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_3_7.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_3" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_3" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<div class="center">
						<div class="charge eat">
							<table class="guest_table">
								<tr>
									<th colspan="4"><span class="mb10">바베큐</span></th>
								</tr>
								<tr>
									<td rowspan="2">1</td>
									<td rowspan="2">바베큐</td>
									<td class="bg-lightgray">(2인 기준)</td>
									<td>20,000원</td>
								</tr>
								<tr class="row_td">
									<td>(4인 기준)</td>
									<td>30,000원</td>
								</tr>
								<tr>
									<td colspan="4">
										<b>문의전화</b><br>
										<span>010-9780-5537</span>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">테라스</p>
				<div class="contents">
					<div id="servCarousel_4" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_4" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_4" data-slide-to="1"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_4_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_4_2.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_4" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_4" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">화장실</p>
				<div class="contents">
					<div id="servCarousel_5" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_5" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_5" data-slide-to="1"></li>
							<li data-target="#servCarousel_5" data-slide-to="2"></li>
							<li data-target="#servCarousel_5" data-slide-to="3"></li>
							<li data-target="#servCarousel_5" data-slide-to="4"></li>
							<li data-target="#servCarousel_5" data-slide-to="5"></li>
							<li data-target="#servCarousel_5" data-slide-to="6"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_5_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_5_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_5_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_5_4.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_5_5.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_5_6.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_5_7.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_5" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_5" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">샤워실</p>
				<div class="contents">
					<div id="servCarousel_6" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_6" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_6" data-slide-to="1"></li>
							<li data-target="#servCarousel_6" data-slide-to="2"></li>
							<li data-target="#servCarousel_6" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_6_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_6_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_6_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_6_4.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_6" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_6" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">놀이시설</p>
				<div class="contents">
					<div id="servCarousel_7" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_7" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_7" data-slide-to="1"></li>
							<li data-target="#servCarousel_7" data-slide-to="2"></li>
							<li data-target="#servCarousel_7" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_7_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_7_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_7_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_7_4.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_7" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_7" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="Service_Modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<p class="title">태닝장</p>
				<div class="contents">
					<div id="servCarousel_8" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#servCarousel_8" data-slide-to="0" class="active"></li>
							<li data-target="#servCarousel_8" data-slide-to="1"></li>
							<li data-target="#servCarousel_8" data-slide-to="2"></li>
							<li data-target="#servCarousel_8" data-slide-to="3"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<img src="/assets/images/gallery/service/service_8_1.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_8_2.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_8_3.jpg">
							</div>
							<div class="item">
								<img src="/assets/images/gallery/service/service_8_4.jpg">
							</div>
						</div>

						<a class="left carousel-control" href="#servCarousel_8" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#servCarousel_8" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">닫기</button>
			</div>
		</div>
	</div>
</div>