$(function(){
	
	var $win = $(window),
		$doc = $(document),
		$html = $('html');
	
	var week	= ""; 
	var agree1 	= "N";
	var agree2 	= "N";
	var	isOpened = false;

	var eventPage = {
		bind: function() {
			var _this = this;
			// $doc.on('mouseover', '[data-day-target]', function() {
			// 	var $visualWrap = $visualWrap || $('.day-list-visual');
			// 	var $menuWrap = $menuWrap || $('.day-list-menu');
			// 	var target = $(this).data('day-target');
			// 	$menuWrap.find('li').removeClass('is-active');
			// 	$(this).closest('li').addClass('is-active');
			// 	$('[data-day]').removeClass('visible');
			// 	if($visualWrap.hasClass('is-ready')) {
			// 		//							첫 화면 제거되어있음, 타겟 동영상 재생 
			// 		_this.play(target);
			// 	}else{
			// 		//							첫 화면 제거
			// 		$visualWrap.addClass('is-ready');
			// 		_this.play(target);
			// 		// $(".event-info").fadeIn();
			// 		$(".event-join-navi").fadeIn();
			// 	}
			// });
			var gnb = gnb || (function() {
				var  triggers = $('.menu-trigger'),
					burger = $('.gnb .line'),
					burgerTop = $('.line.top'),
					burgerMiddle = $('.line.middle'),
					burgerBottom = $('.line.bottom');
					// isOpened = false;

				triggers.on('click', gnbToggle);

				$('#header').on('click', function(event){
					if ( event.target == this ){
						closeMotion();
//						$('html').removeClass('is-popup-open');
						$('.c-header').removeClass('c-header--active');

						isOpened = false;
					}
				});

				function gnbToggle(event) {
					TweenMax.killChildTweensOf($('.gnb'));

					if (isOpened) {
						$('html').removeClass('menu-opened');
						$('.gnb').removeClass('is-active');
						closeMotion();

						isOpened = false;

					} else {
						$('html').addClass('menu-opened');
						$('.gnb').addClass('is-active');
						openMotion();

						isOpened = true;
					}

					return false;
				}

				function openMotion() {
					var openTimeline = new TimelineMax();

					openTimeline.to(burgerTop, 0.3, { x: 5, opacity: 0}, 'action1')
						.to(burgerMiddle, 0.3, { x: 5, opacity: 0, delay: 0.1}, 'action1')
						.to(burgerBottom, 0.3, { x: 5, opacity: 0, delay: 0.2}, 'action1');
				}

				function closeMotion() {
					var closeTimeline = new TimelineMax();

					closeTimeline.to(burgerTop, 0.2, { x: -5, opacity: 1}, 'action1')
						.to(burgerMiddle, 0.3, { x: -5, opacity: 1, delay: 0.1}, 'action1')
						.to(burgerBottom, 0.3, { x: -5, opacity: 1, delay: 0.2 }, 'action1');
				}
			})();

		},
		play: function(key) {
			$("[data-day='"+key+"']").addClass('visible');
			$(".share_gift").stop().fadeOut("fast", function(){
				$(this).css("background","url(./images/event_join_"+key+"_btn.png) center");
				$(this).fadeIn();
				$(this).attr('data-dynamic-name', key);
				$('.sub-title').fadeOut();
				$('.mouse-hover').fadeOut();
				// $('.sub-more').fadeOut();
				week = key;
			});
		}
	};
	eventPage.bind();

	var popup = {
		bind: function() {
			$doc.on('click', '[data-popup-target]', function() {
				console.log("open");
				var popupId = $(this).data('popup-target'),
					popupAgree = $(this).data('popup-agree'),
					dynamicName = $(this).data('dynamic-name');

				if (popupAgree == "#popup-agree1") {
					popup.close($(popupAgree));
					agree1 = "Y";
					$("#agree1_btn").css({
						"background" : "url(./images/popup/popup_input_agree_on.png) center no-repeat",
						"background-size" : "100% 100%"
					});
				}
				if (popupAgree == "#popup-agree2") {
					popup.close($(popupAgree));
					agree2 = "Y";
					$("#agree2_btn").css({
						"background" : "url(./images/popup/popup_input_agree_on.png) center no-repeat",
						"background-size" : "100% 100%"
					});
				}

				popup.open(popupId, dynamicName)
			});
			$doc.on('click', '.btn-close', function(e) {
				var $target = $(this).closest('.popup');
				e.preventDefault();
				console.log($target);
				popup.close($target);
			});
		},
		open: function(popupId, dn) {
			var $popup = $(popupId),
				$wrap = $popup.parent();

				if (popupId == "#popup-agree1" || popupId == "#popup-agree2"){
					popup.close($("#popup-input"));
				}else if (popupId == "#popup-share"){
					var share_width = $(".image-area").width();
					var share_height = (share_width / 16) * 9;
					$("#share_player").width(share_width);
					$("#share_player").height(share_height);

					$("#share_player").attr("src","https://www.youtube.com/embed/NVuBiFiIQKA?controls=0&loop=1&playlist=NVuBiFiIQKA&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1");
					// $("#share_player").attr("src","https://www.youtube.com/embed/9MKk4MmVpRI?controls=0&loop=1&playlist=9MKk4MmVpRI&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1");
				}

				if (!$wrap.hasClass('popup-wrap')){
				$popup.wrap('<div class="popup-wrap"></div>');
				$wrap = $popup.parent();
				$wrap.prepend('<span class="popup-align"></span>');
			}
			
			if($popup.length) {
				//						팝업 오픈
				$html.addClass('popup-opened');
				$wrap.addClass('is-opened');
				//						요일별 처리
				// if(dn.length) {
				// 	console.log(dn);
				// }
			}

		},
		close: function($target) {
			console.log("close");
			$target.find('iframe').attr('src', '');

			$target.closest('.popup-wrap').removeClass('is-opened');
			$html.removeClass('popup-opened');
		}
	}
	popup.bind();

	var tap = {
		bind: function() {
			$(document).on('click', '[data-tap-target]', function() {
				tap.show($(this));
			});
		},
		show: function(target) {
			var targetIdx = target.data('tap-target');
			$("[data-tap-target]").each(function() {
				var imgSrcs = $(this).find('img').attr('src').replace('_active', '');
				$(this).find('img').attr('src', imgSrcs);
				//				$(this).find('img').attr('src').replace('_active', '');
			});
			target.siblings().removeClass('is-active');
			$("[data-tap-content]").removeClass('is-active');

			target.addClass('is-active');
			$("[data-tap-content='"+targetIdx+"']").addClass('is-active');
			target.find('img').attr('src', './images/tap_0'+targetIdx+'_active.png');
			
			switch (target.data('tapTarget')) {
				case 1:
					$('.tap._02').css({
						background: '#fdf6f7',
						background: 'rgba(255, 255, 255, 0.6)'
					});
					$('.tap._03').css({
						background: '#fbeff2',
						background: 'rgba(255, 255, 255, 0.3)'
					});
					break;
				case 2:
					$('.tap._01').css({
						background: '#fdf6f7',
						background: 'rgba(255, 255, 255, 0.6)'
					});
					$('.tap._03').css({
						background: '#fbeff2',
						background: 'rgba(255, 255, 255, 0.3)'
					});
					break;
				case 3:
					$('.tap._01').css({
						background: '#fbeff2',
						background: 'rgba(255, 255, 255, 0.3)'
					});
					$('.tap._02').css({
						background: '#fdf6f7',
						background: 'rgba(255, 255, 255, 0.6)'
					});
					break;
			}
			target.css('background-color', '#ffffff');
		}
	}
	tap.bind();
	
	var share = {
		bind: function() {
			Kakao.init('867181b86c2acc62180a8d8b5fb754c4');
			
			$(document).on('click', '[data-share-target]', function() {
				alert("이벤트가 종료되었습니다.");
				// var popupShare = $(this).data('share-target');
                //
				// share.open(popupShare);
			});
		},
		open: function(target) {
			// 공유 로직 들어 가야 함
			if (target == "fb")
			{
				var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('https://youtu.be/NVuBiFiIQKA'),'sharer','toolbar=0,status=0,width=600,height=325');

				$.ajax({
					type   : "POST",
					async  : false,
					url    : "../main_exec.php",
					data:{
						"exec"          : "insert_share_info",
						"sns_media"     : target
					}
				});
	
			} else if (target == "ks") {
				Kakao.Story.share({
					url: 'https://youtu.be/NVuBiFiIQKA'
				});
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "../main_exec.php",
					data:{
						"exec" : "insert_share_info",
						"sns_media" : target
					}
				});
	
			} else if (target == "kt") {
				Kakao.Link.sendTalkLink({
					label: '[잇츠스킨] 이런 수분 처음일 걸?\r\n\r\n혜리 영상 공유 이벤트 참여하고 잇츠스킨 하이드라 루틴 세럼 받자!',
					image: {
						src: 'http://routine.itsskin.com/images/kakao_share.jpg',
						width: '1200',
						height: '630'
					},
					webButton: {
						text: "잇츠스킨",
						url: 'https://www.youtube.com/watch?v=NVuBiFiIQKA' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
					}
				});
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "../main_exec.php",
					data:{
						"exec" : "insert_share_info",
						"sns_media" : target
					}
				});
			}else{
				var newWindow = window.open('http://m.blog.naver.com/LinkShare.nhn?url=https://youtu.be/NVuBiFiIQKA','sharer','toolbar=0,status=0,width=600,height=325');
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "../main_exec.php",
					data:{
						"exec" : "insert_share_info",
						"sns_media" : target
					}
				});
			}



			// 공유 로직 들어 가야 함				
			setTimeout(function(){
				popup.close($("#popup-share"));
				popup.open($("#popup-input"));
			}, 2000);
		}
	}
	share.bind();
	
	// var mySwiper;
	// var sliderFlag = 0;
	// var slider = {
	// 	bind: function() {
	// 		mySwiper = new Swiper ('.swiper-container', {
	// 			direction: 'vertical',
	// 			slidesPerView: 3,
	// 			spaceBetween: 30,
	// 			slidesPerGroup: 1,
	// 			speed: 100,
	// 			loop: true,
	// 			centeredSlides: true,
	// 			loopFillGroupWithBlank: true,
	// 			// pagination: {
	// 			// 	el: '.swiper-pagination',
	// 			// 	clickable: true,
	// 			// },
	// 			navigation: {
	// 				nextEl: '.paging-next',
	// 				prevEl: '.paging-prev',
	// 			},
	// 			on: {
	// 				transitionEnd : function() {
	// 					// console.log(sliderFlag);
	// 					if (sliderFlag == 1)
	// 					{
	// 						var $visualWrap = $visualWrap || $('.day-list-visual');
	// 						var $menuWrap = $menuWrap || $('.day-list-menu');
	// 						var target = $('.swiper-slide-active').data('day-target');
	// 						$menuWrap.find('div').removeClass('is-active');
	// 						// $(this).closest('div').addClass('is-active');
	// 						$('.swiper-slide-active').closest('div').addClass('is-active');
	// 						$('[data-day]').removeClass('visible');
	// 						if($visualWrap.hasClass('is-ready')) {
	// 							//							첫 화면 제거되어있음, 타겟 동영상 재생 
	// 							$("[data-day='"+target+"']").addClass('visible');
	// 						}else{
	// 							//							첫 화면 제거
	// 							$visualWrap.addClass('is-ready');
	// 							$("[data-day='"+target+"']").addClass('visible');
	// 							// $(".event-info").fadeIn();
	// 							$(".event-join-navi").fadeIn();
	// 						}
	// 					}
	// 					console.log($('.swiper-slide-active').data("day-target"));
	// 				}
	// 			}
	// 		})
	// 		slider.change();
			
	// 	},
	// 	change: function(target) {
	// 		var current_num = Number($("#week_num").val());
	// 		console.log(current_num);
	// 		mySwiper.slideTo(current_num,0);
	// 		$('.swiper-slide-active').closest('div').addClass('is-active');

	// 		sliderFlag = 1;
	// 		// console.log(mySwiper.activeIndex);

	// 	}
	// }
	// slider.bind();
	

	$(".input-submit-btn").on("click", function(){
		var mb_name 	= $("#mb_name").val();
		var mb_phone1 	= $("#mb_phone1").val();
		var mb_phone2 	= $("#mb_phone2").val();
		var mb_phone3 	= $("#mb_phone3").val();
		var mb_addr1 	= $("#mb_addr1").val();
		var mb_addr2 	= $("#mb_addr2").val();
		var week_txt	= $("#week_txt").val();
		var mb_phone 	= mb_phone1 + mb_phone2 + mb_phone3;

		if (mb_name == "") {
			alert("이름을 입력해 주세요.");
			$("#mb_name").focus();
			return false;
		}

		if (mb_phone1 == "") {
			alert("전화번호를 입력해 주세요.");
			$("#mb_phone1").focus();
			return false;
		}
		
		if (mb_phone2 == "") {
			alert("전화번호를 입력해 주세요.");
			$("#mb_phone2").focus();
			return false;
		}
		if (mb_phone3 == "") {
			alert("전화번호를 입력해 주세요.");
			$("#mb_phone3").focus();
			return false;
		}
		if (mb_addr1 == "") {
			alert("주소를 입력해 주세요.");
			return false;
		}
		if (mb_addr2 == "") {
			alert("상세주소를 입력해 주세요.");
			$("#mb_addr2").focus();
			return false;
		}

		if (agree1 == "N") {
			alert("개인정보 수집 약관에 동의해 주셔야만 이벤트에 참여하실 수 있습니다.");
			return false;
		}

		if (agree2 == "N") {
			alert("개인정보 취급 약관에 동의해 주셔야만 이벤트에 참여하실 수 있습니다.");
			return false;
		}

		$.ajax({
			type:"POST",
			data:{
				"exec"				: "insert_member_info",
				"mb_name"			: mb_name,
				"mb_phone"			: mb_phone,
				"mb_addr1"			: mb_addr1,
				"mb_addr2"			: mb_addr2,
				"mb_week"			: week_txt
			},
			url: "../main_exec.php",
			success: function(response){
				alert("이벤트에 참여해 주셔서 감사합니다!");
				location.href = "index.php";
			}
		});
	
	});

	$(".menu-layer .list li a").on("click", function(e){
		e.preventDefault();
        var $this = $(this);
        console.log($(this));
		$('html').removeClass('menu-opened');
		$('.gnb').removeClass('is-active');
		var closeTimeline = new TimelineMax();
		var burgerTop = $('.line.top'),
		burgerMiddle = $('.line.middle'),
		burgerBottom = $('.line.bottom');

		closeTimeline.to(burgerTop, 0.2, { x: -5, opacity: 1}, 'action1')
			.to(burgerMiddle, 0.3, { x: -5, opacity: 1, delay: 0.1}, 'action1')
			.to(burgerBottom, 0.3, { x: -5, opacity: 1, delay: 0.2 }, 'action1');

		$('.c-header').removeClass('c-header--active');
		isOpened = false;
		var url = $(this).attr('href');
		setTimeout(function(){
			if($('.content').hasClass('main') && (!$(this).hasClass('pageMove'))) {
				// var scTop = $('.product-info').offset().top;
				// $('html, body').animate({scrollTop:scTop - 60}, 500);
                var target = $this.data('slide');
                var scTop = $('#'+target).offset().top;
                $('html, body').animate({scrollTop:scTop+1}, 500);
			}else{
				location.href = url;
			}	

		}, 500);
	});
});

var element_layer = null;
function findAddr(level){
	element_layer = document.getElementById('layer');

	new daum.Postcode({
		oncomplete: function(data) {
			// 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

			// 각 주소의 노출 규칙에 따라 주소를 조합한다.
			// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
			var fullAddr = data.address; // 최종 주소 변수
			var extraAddr = ''; // 조합형 주소 변수

			// 기본 주소가 도로명 타입일때 조합한다.
			if(data.addressType === 'R'){
				//법정동명이 있을 경우 추가한다.
				if(data.bname !== ''){
					extraAddr += data.bname;
				}
				// 건물명이 있을 경우 추가한다.
				if(data.buildingName !== ''){
					extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
				fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
			}

			zipcode	= data.zonecode;
			addr1		= fullAddr;
			// document.getElementById('mb_zipcode').value = zipcode; //5자리 새우편번호 사용
			// document.getElementById('mb_addr1').value = "("+zipcode+") "+addr1;
			// document.getElementById('mb_addr1').value = addr1;
			document.getElementById('mb_addr1').value 	= "(" + data.zonecode + ") " + addr1;

			// iframe을 넣은 element를 안보이게 한다.
			// (autoClose:false 기능을 이용한다면, 아래 코드를 제거해야 화면에서 사라지지 않는다.)
			element_layer.style.display = 'none';
		},
		width : '100%',
		height : '100%'
	}).embed(element_layer);

	// iframe을 넣은 element를 보이게 한다.
	element_layer.style.display = 'block';

	// iframe을 넣은 element의 위치를 화면의 가운데로 이동시킨다.
	initLayerPosition();
}

function closeDaumPostcode() {
	// iframe을 넣은 element를 안보이게 한다.
	element_layer.style.display = 'none';
}

function initLayerPosition(){
	// var width = 300; //우편번호서비스가 들어갈 element의 width
	var width = $(window).width()*0.94; //우편번호서비스가 들어갈 element의 width
	var height = 360; //우편번호서비스가 들어갈 element의 height
	var borderWidth = 5; //샘플에서 사용하는 border의 두께

	// 위에서 선언한 값들을 실제 element에 넣는다.
	element_layer.style.width = width + 'px';
	element_layer.style.height = height + 'px';
	element_layer.style.border = borderWidth + 'px solid';
	// 실행되는 순간의 화면 너비와 높이 값을 가져와서 중앙에 뜰 수 있도록 위치를 계산한다.
	element_layer.style.left = (((window.innerWidth || document.documentElement.clientWidth) - width)/2) + 'px';
	element_layer.style.top = (((window.innerHeight || document.documentElement.clientHeight) - height)/2 - borderWidth) + 60 + 'px';
}

function only_num(obj)
{
	var inText = obj.value;
	var outText = "";
	var flag = true;
	var ret;
	for(var i = 0; i < inText.length; i++)
	{
		ret = inText.charCodeAt(i);
		if((ret < 48) || (ret > 57))
		{
			flag = false;
		}
		else
		{
			outText += inText.charAt(i);
		}
	}

	if(flag == false)
	{
		alert("전화번호는 숫자입력만 가능합니다.");
		obj.value = outText;
		obj.focus();
		return false;
	}
	return true;
}

function chk_strlen(obj, len, num)
{
	if(obj.value.length >= len) {
		// alert("전화번호는 11자를 초과할 수 없습니다.");
		// obj.value = obj.value.slice(0, -(obj.value.length-4));

		if (num == 0)
			$("#mb_phone3").blur();
		else
			$("#mb_phone"+num).focus();
		return false;
	}
	return;
}

function event1(depth){
	$.ajax({
		url : "http://mobile.midas-i.com/roianal.mezzo/tracking?cmp_no=1859&depth=" + depth,
		dataType : "jsonp",
		async : true, 
		timeout: 500,
		success: function(data) {
			// console.log("1111");
					// location.href=url;
		}, 
		error : function(e) {
			// console.log(e);
					// location.href=url;
		}
	});
	return false;
}
