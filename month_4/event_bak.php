<?
	include_once "./include/autoload.php";

    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
	$obYN          = $mnv_f->BrowserCheck();
	
	// 오늘이 무슨 요일일까?
	// 0=일 ~ 6=토
	$today	= date("Y-m-d");
	$week	= date('w', strtotime($today));
	switch($week)
	{
		case 0 :
			$week_eng = "sun";
		break;
		case 1 :
			$week_eng = "mon";
		break;
		case 2 :
			$week_eng = "tue";
		break;
		case 3 :
			$week_eng = "wen";
		break;
		case 4 :
			$week_eng = "thu";
		break;
		case 5 :
			$week_eng = "fri";
		break;
		case 6 :
			$week_eng = "sat";
		break;
	}

	include_once "./head.php";
?>
<body>
	<div class="page-wrap">
		<ul class="day-list-visual">
			<li class="bg-cover">
				<img src="./images/event_cover.png" alt="커버 이미지">
			</li>
			<li data-day="mon">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_monday_5A.mov" type="video/mp4">
				</video>
			</li>
			<li data-day="tue">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_thursday_5B.mov" type="video/mp4">
				</video>
			</li>
			<li data-day="wed">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_wednesday_5B.mov" type="video/mp4">
				</video>
			</li>
			<li data-day="thu">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_thursday_5B.mov" type="video/mp4">
				</video>
			</li>
			<li data-day="fri">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_wednesday_5B.mov" type="video/mp4">
				</video>
			</li>
			<li data-day="sat">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_monday_5A.mov" type="video/mp4">
				</video>
			</li>
			<li data-day="sun">
				<video autoplay preload loop muted>
					<source src="./videos/it_s skin_digital_sunday_5A.mov" type="video/mp4">
				</video>
			</li>
		</ul>
		<div class="event-title">
			<ul>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li><img src="./images/chok_txt.png" alt="촉"></li>
				<li class="title-more-txt"><img src="./images/chok_more_txt.png" alt="촉"></li>
			</ul>
			<div class="sub-title">
				<img src="./images/event_sub_title.png" alt="혜리처럼 일주일 내내 고통받는 내 피부 요일별 영상을 #촉촉촉촉촉촉촉 해시태그와 함께 SNS에 영상 공유하고 7촉 세럼 받자!">
			</div>
			<div class="sub-more-text">
				<img src="./images/event_more_info.png" alt="">
			</div>
			<button class="sub-more"></button>
			<!-- <div class="sub-more">
				<img src="./images/event_more_arrow.png" alt="more">
			</div> -->
		</div>
		<div class="event-week">
			<div class="mouse-hover <?=$week_eng?>">
				<img src="./images/event_mouse_hover.png" alt="마우스를 올려보세요!">
			</div>
			<ul class="day-list-menu">
				<li><a href="#" data-day-target="mon">월</a></li>
				<li><a href="#" data-day-target="tue">화</a></li>
				<li><a href="#" data-day-target="wed">수</a></li>
				<li><a href="#" data-day-target="thu">목</a></li>
				<li><a href="#" data-day-target="fri">금</a></li>
				<li><a href="#" data-day-target="sat">토</a></li>
				<li><a href="#" data-day-target="sun">일</a></li> 
			</ul>
			<button class="share_gift" data-popup-target="#popup-share" data-dynamic-name="mon"></button>
			<button class="event-info" data-popup-target="#popup-info"></button>
		</div>
	</div>
<?
	include_once "./popup.html";
?>
	</body>
</html>