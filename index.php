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

    // include_once "./head.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="[잇츠스킨] 이런 수분은 처음일걸?" />
    <meta property="og:url" content="http://www.minivertising-test.com" />
    <meta property="og:image" content="http://www.minivertising-test.com/images/share_img.jpg" />
    <meta property="og:description" content="혜리의 촉촉촉촉촉촉촉한 영상 확인하고 잇츠스킨 하이드라 루틴 세럼 선물받자!" />
    <title>It's Skin</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/main.css">
    <link type="image/icon" rel="shortcut icon" href="http://routine.itsskin.com/images/hydra_favi.ico" />

    <script src="./js/jquery-1.11.2.min.js"></script>
    <script src="./lib/skrollr-master/dist/skrollr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="http://www.youtube.com/player_api"></script>
    <script src="./js/main.js"></script>
    
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

</head>
<body>
    <script src='http://vtag15.midas-i.com/vat-tag?cmp_no=3565&depth=56'></script>
    <div class="page-wrap">
        <div id="header">
            <div class="inner">
                <div class="wrapper">
					<h1 class="logo">
						<a href="http://www.itsskin.com" target="_blank" onclick="event1(57)">
							<img src="./images/logo.png" alt="it's skin">
						</a>
                    </h1>
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
                    <li class="is-active"><a href="index.php?pTarget=goMain" data-slide="goMain" onclick="event1(58)">It's My 세럼</a></li>
                    <li><a href="index.php?pTarget=goFill" data-slide="goFill" onclick="event1(60)">빈칸 이벤트</a></li>
                    <!-- <li>QUIZ SHOW</li> -->
                    <li><a href="index.php?pTarget=goRoutin" data-slide="goRoutin" onclick="event1(59)">나만의 루틴 확인</a></li>
                    <li><a href="./month_4/event.php" target="_blank" onclick="event1(61)">지난 이벤트</a></li>
                </ul>
            </div>
            <div class="share-group">
                <button type="button" class="share-fb" data-share-target="fb" onclick="event1(62)"></button>
                <button type="button" class="share-ks" data-share-target="ks" onclick="event1(63)"></button>
                <button type="button" class="share-blog" data-share-target="blog" onclick="event1(64)"></button>
            </div>
        </div>
        <div class="content main">
            <div class="section1-wrap" id="goMain">
                <div class="section-inner">
                    <!-- <div class="big-serum parallax" data-depth="0.3"></div> -->
                    <div class="big-serum"></div>
                    <div class="cali parallax" data-depth="1.2">
                        <img src="./images/section1_cali.png" alt="It's my skin">
                    </div>
                    <div class="april-banner">
                        <a href="javascript:void(0)" onclick="event1(65)"><img src="./images/section1_april_winner.png" alt="4월 혜리 영상 공유 이벤트"></a>
                    </div>
                    <div class="water-group">
                        <div class="water-drop _1">
                            <img src="./images/section1_water1.png" alt="물방울이미지1" class="parallax" data-depth="0.1">
                        </div>
                        <div class="water-drop _2">
                            <img src="./images/section1_water2.png" alt="물방울이미지2" class="parallax" data-depth="0.12">
                        </div>
                        <div class="water-drop _3">
                            <img src="./images/section1_water3.png" alt="물방울이미지3" class="parallax" data-depth="0.15">
                        </div>
                        <div class="water-drop _4">
                            <img src="./images/section1_water4.png" alt="물방울이미지4" class="parallax" data-depth="0.1">
                        </div>
                        <div class="water-drop _5">
                            <img src="./images/section1_water5.png" alt="물방울이미지5" class="parallax" data-depth="0.16">
                        </div>
                        <div class="water-drop _6">
                            <img src="./images/section1_water6.png" alt="물방울이미지6" class="parallax" data-depth="0.2">
                        </div>
                        <div class="water-drop _7">
                            <img src="./images/section1_water7.png" alt="물방울이미지7" class="parallax" data-depth="0.17">
                        </div>
                    </div>
                    <div class="title parallax" data-depth="0.3">
                        <img src="./images/section1_title.png" alt="하이드라 루틴 레인드롭 세럼">
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
                    <div class="scroll-arrow">
                        <a href="javascript:void(0)"><img src="./images/section1_scroll_arrow.png" alt="아래로 이동"></a>
                    </div>
                </div>
            </div>
            <div class="section2-wrap" id="goFill">
                <div class="water-txt">
                    <img src="./images/section2_water_txt.png" alt="">
                </div>
                <div class="title">
                    <img src="./images/section2_title.png" alt="">
                </div>
                <div class="player-area">
                    <!-- <img src="./images/section2_video_sample.png" alt=""> -->
                    <iframe allowfullscreen="1" style="width: 794px; height:447px;"src="https://www.youtube.com/embed/SEsO3gIrnbk?controls=0&loop=1&playlist=SEsO3gIrnbk&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=0" frameborder="0" id="ytplayer" class="ytplayer" width="541" height="304"></iframe>
                    <div class="shadow"></div>
                </div>
                <div class="quiz-area">
                    <img src="./images/section2_quiz_title.png" alt="">
                    <div class="quiz-content">
                        <div class="input-group" id="sub-input-wrap">
                            <input type="text" class="blank1" maxlength="1" onkeyup="chk_strlen(this,2,2)">
                            <!-- <input type="text" class="blank2" maxlength="1" onkeyup="chk_strlen(this,2,3)">
                            <input type="text" class="blank3" maxlength="1" onkeyup="chk_strlen(this,2,4)">
                            <input type="text" class="blank4" maxlength="1" onkeyup="chk_strlen(this,2,5)">
                            <input type="text" class="blank5" maxlength="1" onkeyup="chk_strlen(this,2,6)">
                            <input type="text" class="blank6" maxlength="1" onkeyup="chk_strlen(this,2,7)">
                            <input type="text" class="blank7" maxlength="1" onkeyup="chk_strlen(this,2,0)"> -->
                        </div>
                    </div>
                    <!-- <button class="quiz-btn" data-popup-target="#popup-input"></button> -->
                    <button type="button" class="quiz-btn" id="sub-submit" onclick="event1(67)"></button>
                </div>
                <div class="tab-button-area">
                    <button type="button" class="tab _1 is-active" data-tap-target="1">
                        <img src="./images/tap_btn_1_on.png" alt="">
                    </button>
                    <button type="button" class="tab _2" data-tap-target="2">
                        <img src="./images/tap_btn_2_off.png" alt="">
                    </button>
                    <button type="button" class="tab _3" data-tap-target="3">
                        <img src="./images/tap_btn_3_off.png" alt="">
                    </button>
                </div>
            </div>
            <div class="section3-wrap" id="goRoutin">
                <div class="tab-contents _1 is-active" data-tap-content="1">
                    <div class="tab-title">
                        <img src="./images/section3_tab1_title.png" alt="">
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
                <div class="tab-contents _2" data-tap-content="2">
                    <div class="tab-title">
                        <img src="./images/section3_tab2_title.png" alt="">
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
                <div class="tab-contents _3" data-tap-content="3">
                    <div class="tab-title">
                        <img src="./images/section3_tab3_title.png" alt="">
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
                    <img src="./images/copyright.png" alt="copyright">
                </div>
            </div>
        </div>
    </div>
<?
	include_once "./popup.html";
?>
    <script>

    var currentSection = "goMain";
    $("document").ready(function(){
        // console.log("ready");
        // var yt_width = $(".player-area").width() - 20;
        // var yt_height = (yt_width / 16) * 9;
        // $("#ytplayer").width(yt_width);
        // $("#ytplayer").height(yt_height);
        // var ua = window.navigator.userAgent;

        // if(ua.indexOf("Windows")>-1) {
        //     $('.quiz-content input[type="text"]').css({
        //        'margin-right': '25'+'px',
        //         'margin-top': '34'+'px'
        //     });
        // }



        $('.water-drop').on('mouseover', function() {
            if(!$(this).hasClass('rubberBand')) {
                $(this).addClass('rubberBand');
            } else {
                $(this).removeClass('rubberBand');
            }
        });

        var ta = new TimelineMax({repeat: 0});
        var textObjs = $('.title .obj');

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
        titleAnim(textObjs[0]);
    });

    (function($){
        var x;
        var y;
        var parallaxs = $('.parallax').each(function(){
            this.np = 0;
            this.ep = 0;
            this.yp = 0;
            this.lv = this.getAttribute('data-depth')*1;
        });
        function move(){
            this.ep = this.lv*x;
            this.yp = this.lv*y;
        }
        function loop() {
            this.np = this.np + (this.ep - this.np)*0.2;
            this.yp = this.yp + (this.yp - this.yp)*0.2;
            this.style.transform = "translate("+this.np+'px'+", "+this.yp+'px'+")";
            //			this.style.transform = "translate("+this.np+'px'+")";
        }
        $(window).on('mousemove', function(e){
            x = (e.clientX - $(window).width()/2) / 50;
            y = (e.clientY - $(window).height()/2) / 50;
            parallaxs.each(move);
        });

        setInterval(function(){
            parallaxs.each(loop);
        },33);

    })(jQuery);

    $(window).scroll(function(){
        var scTop = $(this).scrollTop();
        if ( scTop > 20 ){
            $('#header').addClass('header--scroll');
        }else {
            $('#header').removeClass('header--scroll');
        }

        if(scTop>$('#goFill').offset().top-10 && scTop<$('#goRoutin').offset().top-96) {
            currentSection = "goFill";
        } else if(scTop>$('#goRoutin').offset().top-96) {
            currentSection = "goRoutin";
        } else if(scTop<$('#goFill').offset().top){
            currentSection = "goMain";
        }

        setTimeout(function() {
            $('.navi-menu ul li').removeClass('is-active');
            $("[data-slide="+currentSection+"]").parent().addClass('is-active');
        }, 100);


    });

    </script>
</body>
</html>