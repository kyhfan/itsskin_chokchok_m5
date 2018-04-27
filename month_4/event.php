<?
	include_once "./include/autoload.php";

    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
	// $obYN          = $mnv_f->BrowserCheck();
	$IEYN          = $mnv_f->IECheck();
	$SafariYN          = $mnv_f->SafariCheck();

	if ($mobileYN == "MOBILE")
	{
		echo "<script>location.href='m/event.php';</script>";
	}

	$mute = "";
	if ($SafariYN == "Y")
	{
		$mute = "muted";
	}
	// 오늘이 무슨 요일일까?
	// 0=일 ~ 6=토
	$today	= date("Y-m-d");
	$week	= date('w', strtotime($today));
	switch($week)
	{
		case 0 :
			$week_eng = "sun";
			$week_color = "#95cc8e";
		break;
		case 1 :
			$week_eng = "mon";
			$week_color = "#e07179";
		break;
		case 2 :
			$week_eng = "tue";
			$week_color = "#09211c";
		break;
		case 3 :
			$week_eng = "wen";
			$week_color = "#96dce7";
		break;
		case 4 :
			$week_eng = "thu";
			$week_color = "#fba042";
		break;
		case 5 :
			$week_eng = "fri";
			$week_color = "#c488f1";
		break;
		case 6 :
			$week_eng = "sat";
			$week_color = "#85c5f0";
		break;
	}

	include_once "./head.php";
?>
<body style="background-color: <?=$week_color?>">
	<script src='http://vtag15.midas-i.com/vat-tag?cmp_no=3565&depth=21'></script>
	<div id="header">
		<div class="inner">
			<div class="wrapper">
				<h1 class="logo">
					<a href="http://www.itsskin.com" target="_blank">
						<img src="./images/logo.png" alt="it's skin">
					</a>
				</h1>
<!--				<div class="gnb">-->
<!--					<a href="index.php?pTarget=main">-->
<!--						<span>It’s My 세럼</span>-->
<!--					</a>-->
<!--					<a href="index.php?pTarget=goRoutin">-->
<!--						<span>내게 맞는 루틴 찾기</span>-->
<!---->
<!--					</a>-->
<!--					<a href="event.php" class="is-active">-->
<!--						<span>촉촉 영상 공유 EVENT</span>-->
<!--					</a>-->
<!--				</div>-->
                <a href="javascript:void(0)" class="gnb menu-trigger">
                    <span class="line-wrap">
                        <span class="top-line"></span>
                        <span class="middle-line"></span>
                        <span class="bottom-line"></span>
                    </span>
                </a>
			</div>
		</div>
	</div>
    <div class="navi">
        <div class="close_navi menu-trigger">
            <a href="javascript:void(0)"><img src="./images/navi_close.png" alt="닫기"></a>
        </div>
        <div class="navi-menu">
            <ul>
                <li><a href="index.php?pTarget=goMain" onclick="event1(3)">It's My 세럼</a></li>
                <li><a href="index.php?pTarget=goRoutin" class="go_routine" onclick="event1(4)">내게 맞는 루틴 찾기</a></li>
                <!-- <li>QUIZ SHOW</li> -->
                <li class="is-active"><a href="event.php">촉촉 영상 공유 이벤트</a></li>
                <li><a href="../index.php">진행중인 이벤트<img src="./images/new_ico.png" alt="" style="vertical-align: -4px; margin-left: 5px;"></a></li>
            </ul>
        </div>
    </div>
	<div class="event-wrap today-is-<?=$week_eng?>">
		<ul class="day-list-visual">
			<li class="bg-cover" style="background: url(./images/bg_<?=$week_eng?>.jpg) 50% no-repeat;">
			</li>
			<li data-day="mon">
				<video preload loop <?=$mute?> id="video_mon" class="video_week">
					<source src="./videos/it_sskin_digital_monday_5A.mp4" type="video/mp4">
				</video>
			</li>
			<li data-day="tue">
				<video preload loop <?=$mute?> id="video_tue" class="video_week">
					<source src="./videos/it_sskin_digital_tuesday_5A.mp4" type="video/mp4">
				</video>
			</li>
			<li data-day="wen">
				<video preload loop <?=$mute?> id="video_wen" class="video_week">
					<source src="./videos/it_sskin_digital_wednesday_5A.mp4" type="video/mp4">
				</video>
			</li>
			<li data-day="thu">
				<video preload loop <?=$mute?> id="video_thu" class="video_week">
					<source src="./videos/it_sskin_digital_thursday_5A.mp4" type="video/mp4">
				</video>
			</li>
			<li data-day="fri">
				<video preload loop <?=$mute?> id="video_fri" class="video_week">
					<source src="./videos/it_sskin_digital_friday_5A.mp4" type="video/mp4">
				</video>
			</li>
			<li data-day="sat">
				<video preload loop <?=$mute?> id="video_sat" class="video_week">
					<source src="./videos/it_sskin_digital_saturday_5A.mp4" type="video/mp4">
				</video>
			</li>
			<li data-day="sun">
				<video preload loop <?=$mute?> id="video_sun" class="video_week">
					<source src="./videos/it_sskin_digital_sunday_5A.mp4" type="video/mp4">
				</video>
			</li>
		</ul>
		<div class="contents-wrap">
<!--
			<div class="logo-area">
				<a href="http://www.itsskin.com" target="_blank"></a><img src="./images/event_logo.png" alt=""></a>
			</div>
-->
			<div class="day-list-area">
				<div class="mouse-hover">
					<img src="./images/event_mouse_hover.png" alt="마우스를 올려보세요!">
				</div>
				<ul class="day-list-menu">
					<li>
						<a href="#" data-day-target="mon" data-day-color="#e07179">
							<img src="./images/day_mon.png" alt="월">
						</a>
					</li>
					<li>
						<a href="#" data-day-target="tue" data-day-color="#09211c">
							<img src="./images/day_tue.png" alt="화">
						</a>
					</li>
					<li>
						<a href="#" data-day-target="wen" data-day-color="#96dce7">
							<img src="./images/day_wen.png" alt="수">
						</a>
					</li>
					<li>
						<a href="#" data-day-target="thu" data-day-color="#fba042">
							<img src="./images/day_thu.png" alt="목">
						</a>
					</li>
					<li>
						<a href="#" data-day-target="fri" data-day-color="#c488f1">
							<img src="./images/day_fri.png" alt="금">
						</a>
					</li>
					<li>
						<a href="#" data-day-target="sat" data-day-color="#85c5f0">
							<img src="./images/day_sat.png" alt="토">
						</a>
					</li>
					<li>
						<a href="#" data-day-target="sun" data-day-color="#95cc8e">
							<img src="./images/day_sun.png" alt="일">
						</a>
					</li>
				</ul>
				<div class="event-join-navi">
					<button class="event-info" data-popup-target="#popup-info" style="background: url(./images/event_info_<?=$week_eng?>.png) center no-repeat;"></button>
					<button class="share_gift" data-popup-target="#popup-share" data-dynamic-name="mon" style="background: url(./images/event_join_<?=$week_eng?>_btn.png) center no-repeat;" onclick="event1(22)"></button>
				</div>
			</div>
		</div>
		<div class="event-title">
			<div class="sub-title">
				<img src="./images/event_main_title_<?=$week_eng?>.png" alt="혜리처럼 일주일 내내 고통받는 내 피부 요일별 영상을 #촉촉촉촉촉촉촉 해시태그와 함께 SNS에 영상 공유하고 7촉 세럼 받자!">
			</div>
			<button class="sub-more" data-popup-target="#popup-info" style="background: url(./images/event_more_gift_<?=$week_eng?>.png) center no-repeat;"></button>
			<!-- <div class="sub-more">
				<img src="./images/event_more_arrow.png" alt="more">
			</div> -->
		</div>
	</div>
<?
	include_once "./popup.html";
?>
	<script type="text/javascript">
		var videoLoadIdx = 0;
//		var vid = document.getElementById('video_fri');
//		vid.onprogress = function() {
//			console.log('loading');
//		}
//		vid.onloadeddata = function() {
//			console.log('load');
//		}
		$('.video_week').each(function(idx) {
			var thisVid = $(this)[0];
			thisVid.onprogress = function() {
				console.log("loading...");
			}
			thisVid.onloadeddata = function() {
				videoLoadIdx++;
				if(videoLoadIdx>6) {
					loadComplete();
				}
			}
		});
		function loadComplete() {
			console.log("load all!");
		}
	</script>
	</body>
</html>