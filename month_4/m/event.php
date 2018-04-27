<?
	include_once "../include/autoload.php";

    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
	$obYN          = $mnv_f->BrowserCheck();
	
	if ($mobileYN == "PC")
	{
		echo "<script>location.href='../event.php';</script>";
	}

	$week_arr = ["mon","tue","wen","thu","fri","sat","sun"];
	shuffle($week_arr);
	$week_txt = $week_arr[0];
	// 오늘이 무슨 요일일까?
	// 0=일 ~ 6=토
	// $today	= date("Y-m-d");
	// $week	= date('w', strtotime($today));
	// $week_mon = "";
	// $week_tue = "";
	// $week_wen = "";
	// $week_thu = "";
	// $week_fri = "";
	// $week_sat = "";
	// $week_sun = "";
	// $week = 4;
	// switch($week)
	// {
	// 	case 0 :
	// 		$week_mon = "active";
	// 	break;
	// 	case 1 :
	// 		$week_tue = "active";
	// 	break;
	// 	case 2 :
	// 		$week_wen = "active";
	// 	break;
	// 	case 3 :
	// 		$week_thu = "active";
	// 	break;
	// 	case 4 :
	// 		$week_fri = "active";
	// 	break;
	// 	case 5 :
	// 		$week_sat = "active";
	// 	break;
	// 	case 6 :
	// 		$week_sun = "active";
	// 	break;
	// }

	include_once "./head.php";
?>
<body>
	<script src=http://mobile.midas-i.com/roianal.mezzo/tracking?cmp_no=1859&depth=21></script>
    <div class="event-wrap">
<?			
	include_once "./header.php";
?>
		<input type="hidden" id="week_txt" value="<?=$week_txt?>">
        <ul class="day-list-visual">
            <li class="bg-cover" style="background:url(./images/event_bg_<?=$week_txt?>.jpg); 50% no-repeat;background-size:cover">
            </li>
			<!-- <li data-day="mon" class="bg-mon">
			</li>
			<li data-day="tue" class="bg-tue">
			</li>
			<li data-day="wen" class="bg-wen">
			</li>
			<li data-day="thu" class="bg-thu">
			</li>
			<li data-day="fri" class="bg-fri">
			</li>
			<li data-day="sat" class="bg-sat">
			</li>
			<li data-day="sun" class="bg-sun">
			</li> -->
        </ul>
        <div class="contents-wrap">
            <div class="event-title">
                <img src="./images/event_title.png" alt="">
            </div>
            <div class="event-action">
				<button class="sub-more" data-popup-target="#popup-info" style="background:url(./images/event_info_<?=$week_txt?>.png);background-size:cover;no-repeat;"></button>
				<button class="join-btn" data-popup-target="#popup-share" data-dynamic-name="mon" style="background:url(./images/event_join_<?=$week_txt?>.png);background-size:cover" onclick="event1(22)"></button>
            </div>
		</div>
	</div>
<?
	include_once "./popup.html";
?>
	<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:9999;-webkit-overflow-scrolling:touch;">
		<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="width:7%;cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
	</div>

	<script>
	$(document).ready(function() {
		$(".line-wrap .line").css("background","#fff");
		$("#header .menu-layer li").removeClass("is-active");
		$("#header .menu-layer li:last-child").addClass("is-active");
	// 	$(".sub-more").css({
	// 		"background": "url(./images/event_info_<?=$week_txt?>.png)",
	// 		"background-size": "37px auto"
	// 	});
	// 	$(".bg-cover").css({
	// 		"background": "url(./images/event_bg_<?=$week_txt?>.png) 50% no-repeat",
	// 		"background-size": "cover"
	// 	});
	// 	$(".join-btn").css({
	// 		"background": "url(./images/event_join_<?=$week_txt?>.png)",
	// 		"background-size": "cover"
	// 	});
	});

	</script>
</body>
</html>