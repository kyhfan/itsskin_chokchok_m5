<?
include_once "./include/autoload.php";

$mnv_f = new mnv_function();
$my_db         = $mnv_f->Connect_MySQL();
$mobileYN      = $mnv_f->MobileCheck();
// $obYN          = $mnv_f->BrowserCheck();
$IEYN          = $mnv_f->IECheck();
$SafariYN          = $mnv_f->SafariCheck();
// print_r($_SERVER["HTTP_USER_AGENT"]);
if ($mobileYN == "MOBILE")
{
	echo "<script>location.href='m/index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."&ref=".$_REQUEST["ref"]."';</script>";
}else{
	$saveMedia     = $mnv_f->SaveMedia();
	$rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
}

include_once "./head.php";
?>
<body>
	<script src='http://vtag15.midas-i.com/vat-tag?cmp_no=3565&depth=1'></script>
	<div class="page-wrap index" id="#skrollr-body">
		<div id="header">
			<div class="inner">
				<div class="wrapper">
					<h1 class="logo">
						<a href="http://www.itsskin.com" target="_blank" onclick="event1(2)">
							<img src="./images/logo.png" alt="it's skin">
						</a>
					</h1>
<!--					<div class="gnb">-->
<!--						<a href="javascript:void(0)" class="is-active" onclick="event1(3)">-->
<!--							<span>It’s My 세럼</span>-->
<!--						</a>-->
<!--						<a href="javascript:void(0)" class="go_routine" onclick="event1(4)">-->
<!--							<span>내게 맞는 루틴 찾기</span>-->
<!---->
<!--						</a>-->
<!--						<a href="event.php" onclick="event1(5)">-->
<!--							<span>촉촉 영상 공유 EVENT</span>-->
<!--						</a>-->
<!--					</div>-->
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
					<li class="is-active"><a href="index.php?pTarget=goMain" onclick="event1(3)">It's My 세럼</a></li>
					<li><a href="index.php?pTarget=goRoutin" class="go_routine" onclick="event1(4)">내게 맞는 루틴 찾기</a></li>
					<li><a href="../index.php">빈칸 이벤트</a></li>
					<li><a href="event.php">촉촉 영상 공유 이벤트</a></li>
					<li><a href="http://routine.itsskin.com">진행중인 이벤트<img src="./images/new_ico.png" alt="" style="vertical-align: -4px; margin-left: 5px;"></a></li>
                </ul>
            </div>
        </div>
		<div class="content main skrollable skrollable-between" data-0="background-position: 50% 0px" data-2679="background-position: 50% -455px">
			<a href="javascript:void(0)" data-popup-target="#popup-share"></a>
			<div class="mini-nav">
				<a href="event.php" onclick="event1(6)">
					<img src="./images/mini_fixed.png" alt="매일 다른 내 피부 혜리 영상 공유하고 선물받기!">
					<img src="./images/mini_arrow.png" alt="">
				</a>
			</div>
			<? if($_REQUEST["ref"] === "home")
{
			?>
			<div class="cookie-checker">
				<div class="wrap">
					<input type="checkbox" id="cookie-check">
					<label for="cookie-check">
						오늘 하루 보지 않기
					</label>
					<button type="button" onclick="closeToday()">
						닫기
					</button>
				</div>
			</div>
			<?
}
			?>
			<section class="main-visual" id="goMain">
				<div class="serum" data-0="top: 0px" data-end="top: -350px">
					<img src="./images/section_main_product.png" alt="" class="wave" data-wave="0.6">
				</div>
				<div class="cali" data-0="top: 674px" data-end="top: 300px"></div>
				<div class="text" data-0="top: 228px" data-end="top: 0px">
					<img src="./images/section_main_text.png" alt="">
					<div class="obj-group">
						<span class="obj" data-idx="0">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
						<span class="obj" data-idx="1">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
						<span class="obj" data-idx="2">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
						<span class="obj" data-idx="3">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
						<span class="obj" data-idx="4">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
						<span class="obj" data-idx="5">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
						<span class="obj" data-idx="6">
							<img src="./images/main_text_obj.png" alt="촉">
						</span>
					</div>
				</div>
				<div class="tvc-player" data-0="top: 604px" data-end="top: 228px">
					<!-- <img src="./images/tvc_sample.jpg" alt=""> -->
					<iframe allowfullscreen="1" src="" frameborder="0" id="ytplayer" class="ytplayer" width="541" height="304"></iframe>
				</div>
				<div class="water-group left">
					<div class="water-drop _01 skrollable skrollable-between" data-0="top: 494px" data-end="top: 0px">
						<img src="./images/section_main_water_01.png">
					</div>
					<div class="water-drop _02 skrollable skrollable-between" data-0="top: 549px" data-end="top: 0px">
						<img src="./images/section_main_water_02.png">
					</div>
					<div class="water-drop _03 skrollable skrollable-between" data-0="top: 572px" data-end="top: 0px">
						<img src="./images/section_main_water_03.png">
					</div>
					<div class="water-drop _04 skrollable skrollable-between" data-0="top: 622px" data-end="top: 0px">
						<img src="./images/section_main_water_04.png">
					</div>
				</div>
				<div class="water-group right">
					<div class="water-drop _05 skrollable skrollable-between" data-0="top: 158px" data-end="top: 0px">
						<img src="./images/section_main_water_05.png">
					</div>
					<div class="water-drop _06 skrollable skrollable-between" data-0="top: 151px" data-end="top: 0px">
						<img src="./images/section_main_water_06.png">
					</div>
					<div class="water-drop _07 skrollable skrollable-between" data-0="top: 205px" data-end="top: 0px">
						<img src="./images/section_main_water_07.png">
					</div>
				</div>
			</section>
			<section class="product-info" id="goRoutin">
				<div class="product-wrapper">
					<div class="tap-area">
						<button type="button" class="tap _01 is-active" data-tap-target="1">
							<img src="./images/tap_01_active.png" alt="수분루틴">
						</button>
						<button type="button" class="tap _02" data-tap-target="2">
							<img src="./images/tap_02.png" alt="광채루틴">
						</button>
						<button type="button" class="tap _03" data-tap-target="3">
							<img src="./images/tap_03.png" alt="보습루틴">
						</button>
					</div>
					<div class="product-area">
						<div class="water-group">
							<div class="water-drop _01"></div>
							<div class="water-drop _02"></div>
							<div class="water-drop _03"></div>
							<div class="water-drop _04"></div>
						</div>
						<div class="dummy">
							<div class="product-list _01 is-active" data-tap-content="1">
								<div class="title">
									<!-- <a href="http://www.itsskin.com/event/wip_view_product.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
										<span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
									</a> -->
									<img src="./images/tap_01_content_title.png" alt="">
								</div>
								<div class="list-wrap">
									<div class="row">
										<div class="prd _03">
											<img src="./images/tap_01_product_serum.png" alt="하이드라 루틴 레인드롭 세럼 기획 세트">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3382" class="detail-btn" target="_blank" onclick="event1(9)">
												<img src="./images/tap_btn_detail_01.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _01">
											<img src="./images/tap_01_product_toner.png" alt="하이드라 루틴 웨이크닝 토너">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3380" class="detail-btn" target="_blank" onclick="event1(7)">
												<img src="./images/tap_btn_detail_01.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _02">
											<img src="./images/tap_01_product_lotion.png" alt="하이드라 루틴 모이스처라이저">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3381" class="detail-btn" target="_blank" onclick="event1(8)">
												<img src="./images/tap_btn_detail_01.jpg" alt="자세히 보기">
											</a>
										</div>
									</div>
									<div class="row">
										<div class="prd _04">
											<img src="./images/tap_01_product_gel.png" alt="하이드라 루틴 리프레쉬 젤">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3384" class="detail-btn" target="_blank" onclick="event1(10)">
												<img src="./images/tap_btn_detail_01.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _05">
											<img src="./images/tap_01_product_cream.png" alt="하이드라 루틴 라이블리 크림">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3385" class="detail-btn" target="_blank" onclick="event1(11)">
												<img src="./images/tap_btn_detail_01.jpg" alt="자세히 보기">
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-list _02" data-tap-content="2">
								<div class="title">
									<!-- <a href="http://www.itsskin.com/event/wip_view_product.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
										<span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
									</a> -->
									<img src="./images/tap_02_content_title.png" alt="">
								</div>
								<div class="list-wrap">
									<div class="row">
										<div class="prd _01">
											<img src="./images/tap_02_product_toner.png" alt="글로우 루틴 필라이트 토너">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3375" class="detail-btn" target="_blank" onclick="event1(12)">
												<img src="./images/tap_btn_detail_02.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _02">
											<img src="./images/tap_02_product_lotion.png" alt="글로우 루틴 모이스처라이저">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3376" class="detail-btn" target="_blank" onclick="event1(13)">
												<img src="./images/tap_btn_detail_02.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _03">
											<img src="./images/tap_02_product_serum.png" alt="글로우 루틴 래디언트 세럼">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3377" class="detail-btn" target="_blank" onclick="event1(14)">
												<img src="./images/tap_btn_detail_02.jpg" alt="자세히 보기">
											</a>
										</div>
									</div>
									<div class="row">
										<div class="prd _04">
											<img src="./images/tap_02_product_cream.png" alt="글로우 루틴 브라이트 크림">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3378" class="detail-btn" target="_blank" onclick="event1(15)">
												<img src="./images/tap_btn_detail_02.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _05">
											<img src="./images/tap_02_product_night.png" alt="글로우 루틴 필 크림 나이트">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3379" class="detail-btn" target="_blank" onclick="event1(16)">
												<img src="./images/tap_btn_detail_02.jpg" alt="자세히 보기">
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="product-list _03" data-tap-content="3">
								<div class="title">
									<!-- <a href="http://www.itsskin.com/event/wip_view_product.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
										<span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
									</a> -->
									<img src="./images/tap_03_content_title.png" alt="">
								</div>
								<div class="list-wrap">
									<div class="row">
										<div class="prd _01">
											<img src="./images/tap_03_product_toner.png" alt="세라 루틴 에센셜 토너">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3371" class="detail-btn" target="_blank" onclick="event1(17)">
												<img src="./images/tap_btn_detail_03.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _02">
											<img src="./images/tap_03_product_lotion.png" alt="세라 루틴 모이스처라이저">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3372" class="detail-btn" target="_blank" onclick="event1(18)">
												<img src="./images/tap_btn_detail_03.jpg" alt="자세히 보기">
											</a>
										</div>
									</div>
									<div class="row">
										<div class="prd _03">
											<img src="./images/tap_03_product_serum.png" alt="세라 루틴 리차징 세럼">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3373" class="detail-btn" target="_blank" onclick="event1(19)">
												<img src="./images/tap_btn_detail_03.jpg" alt="자세히 보기">
											</a>
										</div>
										<div class="prd _04">
											<img src="./images/tap_03_product_cream.png" alt="세라 루틴 너리싱 크림">
											<a href="http://www.itsskin.com/shop/view.asp?P_IDX=3374" class="detail-btn" target="_blank" onclick="event1(20)">
												<img src="./images/tap_btn_detail_03.jpg" alt="자세히 보기">
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="copyright">
								<img src="./images/copyright.jpg" alt="">
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
<!--	<div class="skip_layer">-->
<!--		<div class="intro_cover"></div>-->
<!--		<div class="intro_movie">-->
<!--		<iframe allowfullscreen="1" src="https://www.youtube.com/embed/SEsO3gIrnbk?controls=0&loop=1&playlist=SEsO3gIrnbk&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1" frameborder="0" id="player" class="player"></iframe>-->
<!--		</div>-->
<!--		<div id="skip_cursor">-->
<!--			<img src="./images/skip.png" style="position:absolute" alt="skip">-->
<!--		</div>-->
<!--	</div>-->
	<script language="JavaScript">
		// function fnTrackMouse()
		// {
		// 	var innerText="Coords: (" + event.clientX + ",  
		//   " + event.clientY + ")"; 
		//   console.log(innerText);
		// }
		//<!--

			// 쿠키 생성

			function setCookie(cName, cValue, cDay){
			var expire = new Date();
			expire.setDate(expire.getDate() + cDay);
			cookies = cName + '=' + escape(cValue) + '; path=/ ; domain=.itsskin.com ';
			// 한글 깨짐을 막기위해 escape(cValue)를 합니다.
			if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';

			document.cookie = cookies;
		}


		// 쿠키 가져오기
		function getCookie(cName) {
			cName = cName + '=';
			var cookieData = document.cookie;
			var start = cookieData.indexOf(cName);
			var cValue = '';
			if(start != -1){
				start += cName.length;
				var end = cookieData.indexOf(';', start);
				if(end == -1)end = cookieData.length;
				cValue = cookieData.substring(start, end);
			}
			return unescape(cValue);
		}

		var gc = getCookie('stopmoist7');

		//오늘하루 보지않기 닫기
		function closeToday(){

			var chk_v =  $("#cookie-check").is(":checked");

			if(chk_v){
				setCookie('stopmoist7','Y','1');
			}

			$('.cookie-checker').hide();
		}
		//-->
	</script>
	<script type="text/javascript">
		var yt_width, yt_height, player;

		yt_width    = $(window).width() + 40;
		yt_height	= (yt_width / 16) * 9;

		(function($) { $.QueryString = (function(a) { if (a == "") return {}; var b = {}; for (var i = 0; i < a.length; i++) { var p=a[i].split('='); if (p.length != 2) continue; b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " ")); } return b; })(window.location.search.substr(1).split('&')) })(jQuery);

		if(!$.QueryString['pTarget']) {
			// (function(){
			// 	var tag = document.createElement('script');
            //
			// 	tag.src = "https://www.youtube.com/iframe_api";
			// 	var firstScriptTag = document.getElementsByTagName('script')[0];
			// 	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
			// })();
            //
			// // 인트로 화면
			// // 유튜브 영상 브라우저 크기 맞춤
			// $("#player").width(yt_width);
			// $("#player").height(yt_height);
            close_intro();
        }else{
			if($.QueryString['pTarget'] == "goRoutin") {
				$('html, body').animate({scrollTop:$('.product-info').offset().top+'px'});
			}
			close_intro();
		}

		// function onYouTubeIframeAPIReady() {
		// 	player = new YT.Player('player', {
		// 		height: yt_height,
		// 		width: yt_width,
		// 		videoId: 'LDURxiIbTTw',
		// 		events: {
		// 			'onReady': onPlayerReady,
		// 			'onStateChange': onPlayerStateChange
		// 		}
		// 	});
		// }

		// function onPlayerReady(event) {
		// 	// console.log("ready");
		// 	event.target.playVideo();
		// }

		// var done = false;
		// function onPlayerStateChange(event) {
		// 	// console.log(event.data);
		// 	if (event.data === 0) {
		// 		event.target.stopVideo();
		// 		close_intro();
		// 	}
		// }

		//	var tag = document.createElement('script');
		//
		//	tag.src = "https://www.youtube.com/iframe_api";
		//	var firstScriptTag = document.getElementsByTagName('script')[0];
		//	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		//
		//
		//	function onYouTubeIframeAPIReady() {
		//	  player = new YT.Player('player', {
		//		height: yt_height,
		//		width: yt_width,
		//		videoId: 'AlGt1YhYNCg',
		//		events: {
		//		  'onReady': onPlayerReady,
		//		  'onStateChange': onPlayerStateChange
		//		}
		//	  });
		//	}
		//
		//	function onPlayerReady(event) {
		//		// console.log("ready");
		//	  event.target.playVideo();
		//	}
		//
		//	var done = false;
		//	function onPlayerStateChange(event) {
		//	// console.log(event.data);
		//		if (event.data === 0) {
		//			event.target.stopVideo();
		//			close_intro();
		//		}
		//	}

		var s = skrollr.init({
			forceHeight: false,
			skrollrBody: 'skrollr-body',
			//		smoothScrolling: true,
			smoothScrollingDuration: 300,
			//		easing: 'swing'
		});

		var ta = new TimelineMax({repeat: 0});
		var textObjs = $('.text .obj');

		var appearDura = 0,
			upDura = 0,
			upDelay = 0,
			downDura = 0,
			downDelay = 0,
			upPoint = 0;

		function titleAnim(target) {
			var idx = $(target).data('idx');
			if(idx<=6) {
				switch(idx) {
					case 0:
						appearDura = 0.02;upDura = 0.02;upPoint = -2;upDelay = 0.03;downDura = 0.04;downDelay = 0.08;
						break;
					case 1:
						appearDura = 0.02;upDura = 0.03;upPoint = -2;upDelay = 0.03;downDura = 0.04;downDelay = 0.08;
						break;
					case 2:
						appearDura = 0.02;upDura = 0.03;upPoint = -2;upDelay = 0.05;downDura = 0.04;downDelay = 0.08;
						break;
					case 3:
						appearDura = 0.02;upDura = 0.035;upPoint = -2.5;upDelay = 0.05;downDura = 0.04;downDelay = 0.08;
						break;
					case 4:
						appearDura = 0.02;upDura = 0.04;upPoint = -3.5;upDelay = 0.05;downDura = 0.04;downDelay = 0.08;
						break;
					case 5:
						appearDura = 0.02;upDura = 0.05;upPoint = -4.5;upDelay = 0.05;downDura = 0.045;downDelay = 0.08;
						break;
					case 6:
						appearDura = 0.02;upDura = 0.08;upPoint = -6;upDelay = 0.05;downDura = 0.055;downDelay = 0.085;
						break;
				}

				ta.to(target, appearDura, {autoAlpha: 1})
					.to(target, upDura, {y: upPoint, delay: upDelay})
					.to(target, downDura, {y: 0, delay: downDelay, ease: Bounce.easeOut, onComplete: function() {
						titleAnimateCallback(idx+1);
					}});
			}
		}
		function titleAnimateCallback(idx) {
			if(idx==7) {
				// 애니메이션 초기화 후 재시작 (appearance 제외)
				ta.remove();
				//			TweenMax.set(textObjs, {clearProps: 'all'});
				setTimeout(function() {
					titleAnim(textObjs[0]);
				}, 5000);
			}else{
				setTimeout(function() {
					titleAnim(textObjs[idx]);
				},10);
			}

		}
		//	var mainTitleTimer = setInterval(function() {
		//		ta.kill();
		//		titleAnim(textObjs[0]);
		//	}, 7000);


		(function($){
			var x;
			var y;
			var waves = $('.wave').each(function(){
				this.np = 0;
				this.ep = 0;
				this.yp = 0;
				this.lv = this.getAttribute('data-wave')*1;
			});
			function move(){
				this.ep = this.lv*x;
				this.yp = this.lv*y;
			}
			function loop() {
				this.np = this.np + (this.ep - this.np)*0.1;
				this.yp = this.yp + (this.yp - this.yp)*0.1;
				this.style.transform = "translate("+this.np+'px'+", "+this.yp+'px'+")";
				//			this.style.transform = "translate("+this.np+'px'+")";
			}
			$(window).on('mousemove', function(e){
				// if($('.skip_layer').hasClass('is-hide')) {
					x = (e.clientX - $(window).width()/2) / 50;
					y = (e.clientY - $(window).height()/2) / 50;
					waves.each(move);
				// }
			});

			setInterval(function(){
				waves.each(loop);
			},33);


			//		// 인트로 화면
			//		// 유튜브 영상 브라우저 크기 맞춤
			//		$("#player").width(yt_width);
			//        $("#player").height(yt_height);

			// 마우스 커서에 이미지 따라다니기
			//        $(document).mousemove(function(event){ 
			//            var x = event.pageX-20, y = event.pageY-40; 
			//            $("#skip_cursor").css("left",x+"px"); 
			//            $("#skip_cursor").css("top",y+"px"); 
			//        }); 		


			$('.water-drop').on('mouseover', function() {
				if(!$(this).hasClass('rubberBand')) {
					$(this).addClass('rubberBand');
				} else {
					$(this).removeClass('rubberBand');
				}
			});

			$(".go_routine").on("click", function(){
				var scTop = $('.product-info').offset().top;

				$('html, body').animate({scrollTop:scTop+'px'}, 500);
			});

		})(jQuery);

		// 인트로 화면 클릭 시 메인 화면 노출
		// $('#skip_cursor').on('mousemove', function(e){
		// 	var introX = e.clientX-20, introY = e.clientY-40;
		// 	$("#skip_cursor img").css({
		// 		"left": introX+"px",
		// 		"top": introY+"px"
		// 	});
		// }).click(function() {
		// 	// player.stopVideo();
		// 	close_intro();
		// });

		//    $(".skip_layer").on("click", function(){
		////		 player.stopVideo();
		//		close_intro();
		//    });

		function close_intro()
		{
			// $(".skip_layer").addClass('is-hide');
			$("#player").attr("src","");
			$("#player").remove();
			$("#ytplayer").attr("src","https://www.youtube.com/embed/SEsO3gIrnbk?controls=0&loop=1&playlist=SEsO3gIrnbk&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1");
			$("body").css("overflow","auto");
			//        $(".page-wrap").show();
			setTimeout(function() {
				titleAnim(textObjs[0]);
			}, 1950);
		}
		$(document).ready(function(){
			<?
			if ($SafariYN == "Y")
			{	
			?>
			// close_intro();
			<?
			}
			?>
		});

        $(window).scroll(function(){
            var scTop = $(this).scrollTop();

            if (scTop<$('#goRoutin').offset().top) {
                currentSection = "goMain";
            } else {
                currentSection = "goRoutin";
            }

            setTimeout(function() {
                $('.navi-menu ul li').removeClass('is-active');
                $("[data-slide="+currentSection+"]").parent().addClass('is-active');
            }, 100);

        });


	</script>
</body>
</html>