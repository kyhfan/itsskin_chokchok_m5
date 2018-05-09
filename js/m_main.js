var agree1 	= "N";
var agree2 	= "N";
(function($){
    'use strict';

	var $win = $(window),
		$doc = $(document),
		$html = $('html');

	window.its_month5 = {};

	var	isOpened = false;

	$(document).ready(function() {
        var gnb = gnb || (function() {
            var triggers = $('.menu-trigger'),
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

                openTimeline.to(burgerTop, 0.3, { y: 3, opacity: 0}, 'action1')
                    .to(burgerMiddle, 0.3, { y: 0, opacity: 0, delay: 0.3}, 'action1')
                    .to(burgerBottom, 0.3, { y: -3, opacity: 0}, 'action1');
            }

            function closeMotion() {
                var closeTimeline = new TimelineMax();

                closeTimeline.to(burgerTop, 0.2, { y: -6, opacity: 1}, 'action1')
                    .to(burgerMiddle, 0.3, { y: 0, opacity: 1}, 'action1')
                    .to(burgerBottom, 0.3, { y: 6, opacity: 1 }, 'action1');
            }
        })();

        $(".menu-layer .list li a").on("click", function(e){
            e.preventDefault();
            var $this = $(this);
            $('html').removeClass('menu-opened');
            $('.gnb').removeClass('is-active');
            var closeTimeline = new TimelineMax();
            var burgerTop = $('.line.top'),
                burgerMiddle = $('.line.middle'),
                burgerBottom = $('.line.bottom');

            closeTimeline.to(burgerTop, 0.2, { y: -6, opacity: 1}, 'action1')
                .to(burgerMiddle, 0.3, { y: 0, opacity: 1}, 'action1')
                .to(burgerBottom, 0.3, { y: 6, opacity: 1 }, 'action1');

            $('.c-header').removeClass('c-header--active');
            isOpened = false;
            var url = $this.attr('href');
            setTimeout(function(){
                // if(!$this.parent().hasClass('is-active')) {
                if($('.page-wrap > .content').hasClass('main') && ($this.data('slide'))) {
                    // 서브페이지 분기 필요
                    var target = $this.data('slide');
					var scTop = $('#'+target).offset().top;
					if (target == "goRoutin")
						$('html, body').animate({scrollTop:scTop-86}, 500);
					else
                    	$('html, body').animate({scrollTop:scTop-19}, 500);
                }else{
                    location.href = url;
                }

            }, 500);
        });

        $('.down-nav button').on('click', function() {
            $('html, body').animate({scrollTop:$('#goFill').offset().top-19}, 500);
		});
	});

    its_month5.popup = {
		bind: function() {
			var _this = this;
			$doc.on('click', '[data-popup-target]', function() {
				console.log("open");
				var popupId = $(this).data('popup-target'),
					popupAgree = $(this).data('popup-agree'),
					dynamicName = $(this).data('dynamic-name');

				if (popupAgree == "#popup-agree1") {
                    _this.close($(popupAgree));
					agree1 = "Y";
					$("#agree1_btn").css({
						'background': '#ee324f'
					});
				}
				if (popupAgree == "#popup-agree2") {
                    _this.close($(popupAgree));
					agree2 = "Y";
					$("#agree2_btn").css({
                        'background': '#ee324f'
					});
				}

                _this.open(popupId, dynamicName)
			});
			$doc.on('click', '.btn-close', function(e) {
				var $target = $(this).closest('.popup');
				e.preventDefault();
				console.log($target);
                _this.close($target);
			});
		},
		open: function(popupId, dn) {
			var $popup = $(popupId),
				$wrap = $popup.parent();

				if (popupId == "#popup-agree1" || popupId == "#popup-agree2"){
                    this.close($('.popup.input'));
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
				// if(dn.length) {
				// 	console.log(dn);
				// }

			}
			$("#ytplayer").attr("src","");

		},
		opened: function() {

		},
		close: function($target) {
			$("#ytplayer").attr("src","https://www.youtube.com/embed/SEsO3gIrnbk?controls=0&loop=1&playlist=SEsO3gIrnbk&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=0");
			// $target.find('iframe').attr('src', '');

			$target.closest('.popup-wrap').removeClass('is-opened');
			$html.removeClass('popup-opened');
		}
	}
    its_month5.popup.bind();

    its_month5.tap = {
		bind: function() {
			var _this = this;
			$(document).on('click', '[data-tap-target]', function() {
				_this.show($(this));
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
    its_month5.tap.bind();

    its_month5.share = {
		bind: function() {
			var _this = this;
			Kakao.init('8bd4e13e1a2a0d80bbd60d994b744ce1');
			
			$doc.on('click', '[data-share-target]', function() {
				var popupShare = $(this).data('share-target');

				_this.open(popupShare);
			});
		},
		open: function(target) {
			// 공유 로직 들어 가야 함
			if (target == "fb")
			{
				var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('http://routine.itsskin.com/index.php'),'sharer','toolbar=0,status=0,width=600,height=325');

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
					url: 'http://routine.itsskin.com/index.php?media=ks'
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
					label: '[잇츠스킨] 이런 수분 처음일 걸?\r\n혜리의 촉촉촉촉촉촉촉한 영상 확인하고\r\n잇츠스킨 하이드라 루틴 세럼 선물받자!',
					image: {
						src: 'http://routine.itsskin.com/images/share_img2.jpg',
						width: '1200',
						height: '630'
					},
					webButton: {
						text: "잇츠스킨",
						url: 'http://routine.itsskin.com/index.php?media=kt' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
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
				var newWindow = window.open('http://m.blog.naver.com/LinkShare.nhn?url=http://routine.itsskin.com/index.php?media=blog','sharer','toolbar=0,status=0,width=600,height=325');
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


		}
	}
    its_month5.share.bind();
	
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
	

	// $(".input-submit-btn").on("click", function(){
	// });
    console.log("%cmade by MINIVERTISING","color:#fff;line-height:30px;padding:10px 20px;background:#1a1a1a;")
})(jQuery);

function inputSubmit() {
	var mb_name 	= $("#mb_name").val();
	var mb_phone1 	= $("#mb_phone1").val();
	var mb_phone2 	= $("#mb_phone2").val();
	var mb_phone3 	= $("#mb_phone3").val();
	var mb_addr1 	= $("#mb_addr1").val();
	var mb_addr2 	= $("#mb_addr2").val();
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
			"mb_addr2"			: mb_addr2
		},
		url: "../main_exec.php",
		success: function(response){
			alert("이벤트에 참여해 주셔서 감사합니다!");
			location.href = "index.php";
		}
	});
}

function chk_strlen(obj, maxByte, num) {
	var ls_str = obj.value;
	var li_str_len = ls_str.length; 
	var li_byte = 0;
	var li_len = 0;
	var ls_one_char = "";
	var ls_str2 = "";
   
	for ( var i=0; i< li_str_len; i++) {
	  ls_one_char = ls_str.charAt(i);
   
	  if (escape(ls_one_char).length > 4) {
		li_byte += 2;
	  } else {
		li_byte++;
	  }
		  
	  if(li_byte <= maxByte) {
		li_len = i + 1;
	  }
	}
	if(li_byte > maxByte) {
	  	ls_str2 = ls_str.substr(0, li_len);
	  	obj.value = ls_str2;
		chk_strlen(obj, 4000);
	} else {
		if (ls_str == "촉")
			$(".blank"+num).focus();

		// if (num == 0)
		// {
		// 	$(".input-submit").attr({
		// 		"onclick" : "",
		// 		"data-popup-target" : "#popup-input"
		// 	})
		// }
	}
}

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

function chk_numlen(obj, len, num)
{
	if(obj.value.length >= len) {
		// alert("전화번호는 11자를 초과할 수 없습니다.");
		// obj.value = obj.value.slice(0, -(obj.value.length-4));

		if (num == 0)
			$(".blank7").blur();
		else
			$(".blank"+num).focus();
		return false;
	}
	return;
}
function chk_len(obj, len, num)
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

function chk_strlen(obj, maxByte, num) {
	var ls_str = obj.value;
	var li_str_len = ls_str.length; 
	var li_byte = 0;
	var li_len = 0;
	var ls_one_char = "";
	var ls_str2 = "";
   
	for ( var i=0; i< li_str_len; i++) {
	  ls_one_char = ls_str.charAt(i);
   
	  if (escape(ls_one_char).length > 4) {
		li_byte += 2;
	  } else {
		li_byte++;
	  }
		  
	  if(li_byte <= maxByte) {
		li_len = i + 1;
	  }
	}
	if(li_byte > maxByte) {
	  	ls_str2 = ls_str.substr(0, li_len);
	  	obj.value = ls_str2;
		chk_strlen(obj, 4000);
	} else {
		if (ls_str == "촉")
			$(".blank"+num).focus();

		// var blank_txt = $(".blank1").val() + $(".blank2").val() + $(".blank3").val() + $(".blank4").val() + $(".blank5").val() + $(".blank6").val() + $(".blank7").val();
		// console.log(blank_txt);
		// if (blank_txt == "촉촉촉촉촉촉촉")
		// {
		// 	$(".input-submit").attr({
		// 		"onclick" : "",
		// 		"data-popup-target" : "#sub-ev-input"
		// 	})
		// }
	}
}

function event1(depth){
	// console.log(depth);
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

function show_winner_list(idx, wordObj) {
	var targetArray = "";
	var searchArray = [];
//	var searchIdx = $("#popup-winner .is-active").data('idx');
	var innerHtml = "";
	var word = $(wordObj).siblings().val();
	if(word && word.length<4 || word == "") {
		alert("휴대전화 마지막 네 자리로 검색해주세요.");
		$(wordObj).siblings().val("").focus();
		show_winner_list(1);
		return;
	}
//	인덱스(탭 일때)
	if(idx > 0) {
		$("#popup-winner .tab").removeClass('is-active');
		$("#popup-winner .tab:nth-child("+idx+")").addClass('is-active');
	}
	
	switch(idx) {
		case 1: 
			targetArray = winnerArray_1st;
			break;
		case 2:
			targetArray = winnerArray_2nd;
			break;
		default:
//			targetArray = winnerArray_1st;
			for(i=0; i<winnerArray_1st.length; i++) {
				if(winnerArray_1st[i].indexOf(word) != -1) {
					searchArray.push(winnerArray_1st[i]);
				}
			}
			if(searchArray.length>0) {
				$("#popup-winner .tab").removeClass('is-active');
				$("#popup-winner .tab:nth-child(1)").addClass('is-active');
			}else{
				for(i=0; i<winnerArray_2nd.length; i++) {
					if(winnerArray_2nd[i].indexOf(word) != -1) {
						searchArray.push(winnerArray_2nd[i]);
					}
				}
				if(searchArray.length>0) {
					$("#popup-winner .tab").removeClass('is-active');
					$("#popup-winner .tab:nth-child(2)").addClass('is-active');
				}
			}
//			if(searchArray.length<1) {
//				for(i=0; i<winnerArray_2nd.length; i++) {
//					if(winnerArray_2nd[i].indexOf(word) != -1) {
//						searchArray.push(targetArray[i]);
//					}
//				}
//				$("#popup-winner .tab:nth-child(2)").addClass('is-active');
//			}
			targetArray = searchArray;
			break;
	}
	for(i=0; i<targetArray.length; i++) {
		innerHtml += "<li>"+targetArray[i]+"</li>";
	}
	
	if(innerHtml == "") {
		innerHtml = "<li style='float:none;width:100%;padding-right:32px;text-align:center;'>당첨된 내역이 없습니다.</li>";
	}
	
	$("#popup-winner .winner-list").html(innerHtml);
	
}
