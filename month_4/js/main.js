$(function(){
	
	var $win = $(window),
		$doc = $(document),
		$html = $('html'),
		$body = $('body');
	
	var locationArray = location.href.split('/');
	var currentLocation = locationArray[locationArray.length-1].split('.')[0];
	
	
	
	var week	= ""; 
	var agree1 	= "N";
	var agree2 	= "N";
	
	var eventPage = {
		bind: function() {
			var _this = this;
			$doc.off().on('mouseover', '[data-day-target]', function() {
				var $visualWrap = $visualWrap || $('.day-list-visual'),
					$menuWrap = $menuWrap || $('.day-list-menu'),
					target = $(this).data('day-target'),
					targetColor = $(this).data('day-color');
				
				$body.attr('style', 'background-color:'+targetColor);
				$menuWrap.find('li').removeClass('is-active');
				$(this).closest('li').addClass('is-active');
				$('[data-day]').removeClass('visible');
				if($visualWrap.hasClass('is-ready')) {
//				첫 화면 제거되어있음, 타겟 동영상 재생 
					_this.play(target);
				}else{
//				첫 화면 제거
					$visualWrap.addClass('is-ready');
//					$('.event-title, .mouse-hover').css('opacity', 0);
					$('.event-title, .mouse-hover').hide();
					$(".event-join-navi").css('opacity', 1);
					_this.play(target);
				}
			});
		},
		play: function(key) {
			setTimeout(function() {
				$("[data-day='"+key+"']").addClass('visible');
				$('.video_week').each(function() {
					$(this).get(0).pause();
					// $(this).get(0).currentTime = 0;
				});
//				$("#video_mon").get(0).pause();
//				$("#video_tue").get(0).pause();
//				$("#video_wen").get(0).pause();
//				$("#video_thu").get(0).pause();
//				$("#video_fri").get(0).pause();
//				$("#video_sat").get(0).pause();
//				$("#video_sun").get(0).pause();
				$("#video_"+key).get(0).play();
				$('.event-info').css("background","url(./images/event_info_"+key+".png) center");
				$('.share_gift').css("background","url(./images/event_join_"+key+"_btn.png) center");
			}, 10);
			$(this).attr('data-dynamic-name', key);
			week = key;
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
					$("#agree1_btn").css("background","url(./images/popup/popup_input_agree_on.png) center no-repeat");
				}
				if (popupAgree == "#popup-agree2") {
					popup.close($(popupAgree));
					agree2 = "Y";
					$("#agree2_btn").css("background","url(./images/popup/popup_input_agree_on.png) center no-repeat");
				}

				popup.open(popupId, dynamicName)
			});
			$doc.on('click', '.btn-close', function(e) {
				var $target = $(this).closest('.popup');
				e.preventDefault();
				// console.log($target);
				popup.close($target);
			});
		},
		open: function(popupId, dn) {

			$('.video_week').each(function() {
				$(this).get(0).pause();
				// $(this).get(0).currentTime = 0;
			});
			//				$("#video_mon").get(0).pause();
			//				$("#video_tue").get(0).pause();
			//				$("#video_wen").get(0).pause();
			//				$("#video_thu").get(0).pause();
			//				$("#video_fri").get(0).pause();
			//				$("#video_sat").get(0).pause();
			//				$("#video_sun").get(0).pause();
			var $popup = $(popupId),
				$wrap = $popup.parent();

				if (popupId == "#popup-agree1" || popupId == "#popup-agree2"){
					popup.close($("#popup-input"));
				}else if (popupId == "#popup-blog"){
					popup.close($("#popup-share"));
				}else if (popupId == "#popup-share"){
					var share_width = 425;
					// var share_height = (share_width / 16) * 9;
					var share_height = 239;
					$("#share_player").width(share_width);
					$("#share_player").height(share_height);

					$("#share_player").attr("src","https://www.youtube.com/embed/NVuBiFiIQKA?controls=0&loop=1&playlist=NVuBiFiIQKA&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1");
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
			$(document).on('mouseover', '[data-tap-target]', function() {
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
			
//			탭 컬러
//			$('.tap-area .tap').each(function(idx, el) {
//				console.log(idx);
//			});
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
				// share.open($(this));
			});
		},
		open: function(target) {
			// 공유 로직 들어 가야 함
			// console.log(target.data("share-target"));
			if (target.data("share-target") == "fb")
			{
				var newWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent('https://youtu.be/NVuBiFiIQKA'),'sharer','toolbar=0,status=0,width=600,height=325');

				$.ajax({
					type   : "POST",
					async  : false,
					url    : "./main_exec.php",
					data:{
						"exec"          : "insert_share_info",
						"sns_media"     : target.data("share-target")
					}
				});
	
			} else if (target.data("share-target") == "ks") {
				Kakao.Story.share({
					url: 'https://youtu.be/NVuBiFiIQKA'
				});
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "./main_exec.php",
					data:{
						"exec" : "insert_share_info",
						"sns_media" : target.data("share-target")
					}
				});
	
			}else{
				var newWindow = window.open('http://blog.naver.com/LinkShare.nhn?url=https://youtu.be/NVuBiFiIQKA','sharer','toolbar=0,status=0,width=600,height=325');
				$.ajax({
					type   : "POST",
					async  : false,
					url    : "./main_exec.php",
					data:{
						"exec" : "insert_share_info",
						"sns_media" : target.data("share-target")
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
	


	$(".input-submit-btn").on("click", function(){
		var mb_name 	= $("#mb_name").val();
		var mb_phone1 	= $("#mb_phone1").val();
		var mb_phone2 	= $("#mb_phone2").val();
		var mb_phone3 	= $("#mb_phone3").val();
		var mb_addr1 	= $("#mb_addr1").val();
		var mb_addr2 	= $("#mb_addr2").val();
		var mb_phone 	= mb_phone1 + mb_phone2 + mb_phone3;

		// console.log(week);
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
				"mb_week"			: week
			},
			url: "./main_exec.php",
			success: function(response){
				alert("이벤트에 참여해 주셔서 감사합니다!");
				location.href = "index.php?pTarget=main";
			}
		});
	
	});

	$(".find-addr").on("click", function(){
		new daum.Postcode({
			oncomplete: function(data) {
				// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
	
				// 도로명 주소의 노출 규칙에 따라 주소를 조합한다.
				// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
				var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
				var extraRoadAddr = ''; // 도로명 조합형 주소 변수
	
				// 법정동명이 있을 경우 추가한다. (법정리는 제외)
				// 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
				if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
					extraRoadAddr += data.bname;
				}
				// 건물명이 있고, 공동주택일 경우 추가한다.
				if(data.buildingName !== '' && data.apartment === 'Y'){
				   extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
				}
				// 도로명, 지번 조합형 주소가 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
				if(extraRoadAddr !== ''){
					extraRoadAddr = ' (' + extraRoadAddr + ')';
				}
				// 도로명, 지번 주소의 유무에 따라 해당 조합형 주소를 추가한다.
				if(fullRoadAddr !== ''){
					fullRoadAddr += extraRoadAddr;
				}
	
				// 우편번호와 주소 정보를 해당 필드에 넣는다.
				// document.getElementById('mb_zipcode').value = data.zonecode; //5자리 새우편번호 사용
				document.getElementById('mb_addr1').value 	= "(" + data.zonecode + ") " + fullRoadAddr;
			}
		}).open();	
	});
});

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
	// console.log(depth);
	$.ajax({
		url : "http://vtag15.midas-i.com/vat-tag?cmp_no=3565&depth=" + depth,
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
