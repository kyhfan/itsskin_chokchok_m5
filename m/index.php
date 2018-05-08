<?
    include_once "../include/autoload.php";

    $mnv_f         = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
    // $obYN          = $mnv_f->BrowserCheck();
    $IEYN          = $mnv_f->IECheck();
    $SafariYN      = $mnv_f->SafariCheck();
    // print_r($_SERVER["HTTP_USER_AGENT"]);
    if ($mobileYN == "PC")
    {
        echo "<script>location.href='../index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."&ref=".$_REQUEST["ref"]."';</script>";
    }else{
        $saveMedia     = $mnv_f->SaveMedia();
        $rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
    }

    // include_once "./head.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="[잇츠스킨] 이런 수분은 처음일걸?" />
    <meta property="og:url" content="http://routine.itsskin.com" />
    <meta property="og:image" content="http://routine.itsskin.com/images/share_img.jpg" />
    <meta property="og:description" content="혜리의 촉촉촉촉촉촉촉한 영상 확인하고 잇츠스킨 하이드라 루틴 세럼 선물받자!" />
    <title>It's skin</title>
    <link type="image/icon" rel="shortcut icon" href="http://routine.itsskin.com/images/hydra_favi.ico" />
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="../js/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
    <script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
    <script src="../js/m_main.js"></script>
    <script src="../js/winner_list.js"></script>
    <script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-117485072-1');
	</script>

</head>
<body>
<script src=http://mobile.midas-i.com/roianal.mezzo/tracking?cmp_no=1859&depth=57></script>
<div class="page-wrap">
    <div id="header">
        <div class="inner">
            <div class="wrapper">
                <h1 class="logo">
                    <a href="http://www.itsskin.com/" target="_blank" onclick="event1('58');">
                        <img src="./images/logo.png" alt="it's skin">
                    </a>
                </h1>
                <a href="javascript:void(0)" class="gnb menu-trigger">
                    <span class="line-wrap">
                        <span class="line top"></span>
                        <span class="line middle"></span>
                        <span class="line bottom"></span>
                    </span>
                </a>
            </div>
        </div>
        <div class="menu-layer">
            <a href="javascript:void(0);" class="close menu-trigger">
                <span class="line left"></span>
                <span class="line right"></span>
            </a>
            <ul class="list">
                <li class="is-active"><a href="index.php?pTarget=goMain" data-slide="goMain" onclick="event1('59');">It's My 세럼</a></li>
                <li class="sectionMove"><a href="index.php?pTarget=goFill" data-slide="goFill" onclick="event1('61');">빈칸 이벤트</a></li>
                <!-- <li><a href="#" onclick="alert('준비중입니다')">QUIZ SHOW</a></li> -->
                <li class="sectionMove"><a href="index.php?pTarget=goRoutin" data-slide="goRoutin" onclick="event1('60');">나만의 루틴 확인</a></li>
                <li><a href="../month_4/m/event.php" target="_blank" onclick="event1('62');">지난 이벤트</a></li>
            </ul>
            <div class="share-list">
                <a href="javascript:void(0)" data-share-target="fb" onclick="event1('63');">
                    <img src="./images/share_fb.png" alt="페이스북 공유">
                </a>
                <a href="javascript:void(0)" data-share-target="ks" onclick="event1('64');">
                    <img src="./images/share_ks.png" alt="카카오스토리 공유">
                </a>
                <a href="javascript:void(0)" data-share-target="kt" onclick="event1('65');">
                    <img src="./images/share_kt.png" alt="카카오톡 공유">
                </a>
                <a href="javascript:void(0)" data-share-target="blog" onclick="event1('66');">
                    <img src="./images/share_blog.png" alt="블로그 공유">
                </a>
            </div>
        </div>
    </div>
    <div class="content main">
        <!--<a href="javascript:void(0)" data-popup-target="#popup-share"></a>-->
        <section class="main-visual" id="goMain">
            <div class="serum">
                <img src="./images/section_main_serum.png" alt="">
            </div>
            <div class="water-drops">
                <img src="./images/7waterdrop.png" alt="">
            </div>
            <div class="text">
                <img src="./images/section_main_text.png" alt="">
            </div>
<!--
            <div class="down-nav">
                <div class="textB">
                    <img src="./images/section_main_nav_text.png" alt="촉촉촉촉촉촉촉! 영상 보고 하이드라 루틴세럼 선물받자!">
                    <button type="button" onclick="event1('70');">
                        GO!
                    </button>
                </div>
                <div class="capture">
                    <button type="button">
                        <img src="./images/section_main_nav_capture.png">
                    </button>
                </div>
            </div>
-->
            <div class="btn-april">
                <a href="#" data-popup-target="#popup-winner" onclick="show_winner_list(1)">
                    <img src="./images/main_btn_april.png" alt="4월 혜리 영상 공유 이벤트 당첨자 확인">
                </a>
            </div> 
            <div class="down-nav">
            	<img src="./images/main_down_txt.png" alt="">
            	<button type="button">
            		<img src="./images/main_down_arrow.png" alt="">
            	</button>
            </div>
        </section>
        <section class="event-fill" id="goFill">
            <div class="text">
                <img src="./images/section_fill_text.png" alt="">
            </div>
            <div class="tvc-player">
                <div class="player-wrap">
                    <iframe allowfullscreen="1" style="width:100%; height: 165px;"src="https://www.youtube.com/embed/SEsO3gIrnbk?controls=0&loop=1&playlist=SEsO3gIrnbk&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1" frameborder="0" id="ytplayer" class="ytplayer"></iframe>
                </div>
            </div>
            <div class="area-input">
                <div class="title">
                    <img src="./images/section_fill_input_title.png" alt="">
                </div>
                <div class="text-wrap" id="sub-input-wrap">
                    <input type="text" class="blank1" maxlength="1" onkeyup="chk_strlen(this,2,2)">
                </div>
                <button type="button" class="input-submit" id="sub-submit" onclick="event1('68');">
                    입력 완료
                </button>
            </div>
        </section>
        <section class="product-info" id="goRoutin">
            <div class="product-wrapper">
                <div class="tap-area">
                    <button type="button" class="tap _01 is-active" data-tap-target="1">
                        <img src="./images/tap_01_active.png" alt="">
                    </button>
                    <button type="button" class="tap _02" data-tap-target="2">
                        <img src="./images/tap_02.png" alt="">
                    </button>
                    <button type="button" class="tap _03" data-tap-target="3">
                        <img src="./images/tap_03.png" alt="">
                    </button>
                </div>
                <div class="product-area">
                    <div class="product-list _01 is-active" data-tap-content="1">
                        <div class="title">
                            <!-- <a href="http://m.itsskin.com/event/project.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
                                <span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
                            </a> -->
                            <img src="./images/tap_01_content_title.jpg" alt="">
                        </div>
                        <div class="list-wrap">
                            <div class="row">
                                <div class="prd _03">
                                    <img src="./images/tap_01_product_serum.png" alt="하이드라 루틴 레인드롭 세럼 기획 세트">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3382" class="detail-btn" target="_blank" onclick="event1(9)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="prd _01">
                                    <img src="./images/tap_01_product_toner.png" alt="하이드라 루틴 웨이크닝 토너">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3380" class="detail-btn" target="_blank" onclick="event1(7)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                                <div class="prd _02">
                                    <img src="./images/tap_01_product_lotion.png" alt="하이드라 루틴 모이스처라이저">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3381" class="detail-btn" target="_blank" onclick="event1(8)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="prd _04">
                                    <img src="./images/tap_01_product_gel.png" alt="하이드라 루틴 리프레쉬 젤">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3384" class="detail-btn" target="_blank" onclick="event1(10)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                                <div class="prd _05">
                                    <img src="./images/tap_01_product_cream.png" alt="하이드라 루틴 라이블리 크림">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3385" class="detail-btn" target="_blank" onclick="event1(11)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list _02" data-tap-content="2">
                        <div class="title">
                            <!-- <a href="http://m.itsskin.com/event/project.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
                                <span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
                            </a> -->
                            <img src="./images/tap_02_content_title.jpg" alt="">
                        </div>
                        <div class="list-wrap">
                            <div class="row">
                                <div class="prd _01">
                                    <img src="./images/tap_02_product_toner.png" alt="글로우 루틴 필라이트 토너">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3375" class="detail-btn" target="_blank" onclick="event1(12)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                                <div class="prd _02">
                                    <img src="./images/tap_02_product_lotion.png" alt="글로우 루틴 모이스처라이저">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3376" class="detail-btn" target="_blank" onclick="event1(13)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="prd _03">
                                    <img src="./images/tap_02_product_serum.png" alt="글로우 루틴 래디언트 세럼">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3377" class="detail-btn" target="_blank" onclick="event1(14)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="prd _04">
                                    <img src="./images/tap_02_product_cream.png" alt="글로우 루틴 브라이트 크림">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3378" class="detail-btn" target="_blank" onclick="event1(15)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                                <div class="prd _05">
                                    <img src="./images/tap_02_product_night.png" alt="글로우 루틴 필 크림 나이트">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3379" class="detail-btn" target="_blank" onclick="event1(16)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-list _03" data-tap-content="3">
                        <div class="title">
                            <!-- <a href="http://m.itsskin.com/event/project.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
                                <span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
                            </a> -->
                            <img src="./images/tap_03_content_title.jpg" alt="">
                        </div>
                        <div class="list-wrap">
                            <div class="row">
                                <div class="prd _01">
                                    <img src="./images/tap_03_product_toner.png" alt="세라 루틴 에센셜 토너">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3371" class="detail-btn" target="_blank" onclick="event1(17)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                                <div class="prd _02">
                                    <img src="./images/tap_03_product_lotion.png" alt="세라 루틴 모이스처라이저">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3372" class="detail-btn" target="_blank" onclick="event1(18)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="prd _03">
                                    <img src="./images/tap_03_product_serum.png" alt="세라 루틴 리차징 세럼">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3373" class="detail-btn" target="_blank" onclick="event1(19)">
                                        <span>자세히 보기</span>
                                    </a>
                                </div>
                                <div class="prd _04">
                                    <img src="./images/tap_03_product_cream.png" alt="세라 루틴 너리싱 크림">
                                    <a href="http://m.itsskin.com/shop/view.asp?P_IDX=3374" class="detail-btn" target="_blank" onclick="event1(20)">
                                        <span>자세히 보기</span>
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
        </section>
    </div>
</div>
<?
include_once "./popup.html";
?>
	<div id="layer" style="display:none;position:fixed;overflow:hidden;z-index:9999;-webkit-overflow-scrolling:touch;">
		<img src="//i1.daumcdn.net/localimg/localimages/07/postcode/320/close.png" id="btnCloseLayer" style="width:7%;cursor:pointer;position:absolute;right:-3px;top:-3px;z-index:1" onclick="closeDaumPostcode()" alt="닫기 버튼">
	</div>

<script>

    // (function($) { $.QueryString = (function(a) { if (a == "") return {}; var b = {}; for (var i = 0; i < a.length; i++) { var p=a[i].split('='); if (p.length != 2) continue; b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " ")); } return b; })(window.location.search.substr(1).split('&')) })(jQuery);
    var currentSection = "goMain";
    // if($.QueryString['pTarget']) {
    //     var target = $.QueryString['pTarget'];
    //     $('html, body').animate({scrollTop:$('#'+target).offset().top});
    // }

    $(window).scroll(function(){
        var scTop = $(this).scrollTop();
        if ( scTop > 20 ){
            $('#header').addClass('header--scroll');
        }else {
            $('#header').removeClass('header--scroll');
        }

        if(scTop>$('#goFill').offset().top-20 && scTop<$('#goRoutin').offset().top-88) {
            currentSection = "goFill";
        } else if(scTop>$('#goRoutin').offset().top-88) {
            currentSection = "goRoutin";
        } else if(scTop<$('#goFill').offset().top-20){
            currentSection = "goMain";
        }

        setTimeout(function() {
            $('.menu-layer .list li').removeClass('is-active');
            $("[data-slide="+currentSection+"]").parent().addClass('is-active');
        }, 100);


    });

    $(document).on('click', '#sub-submit', function() {
        var i = 0;
       $('#sub-input-wrap input').each(function() {
           if("7" != $(this).val()) {
               // alert("오답입니다 영상을 다시 확인 후 입력해주세요!");
               its_month5.popup.open("#popup-retry");
               i = 0;
               $(this).val("");
               return false;
           }else{
               i++;
           }
       });
       if(i==1) {
           its_month5.popup.open("#sub-ev-input");
       }
    });
    // $("#sub-input-wrap input").keyup(function(e) {
    //     console.log($(this).val().charAt());
    //     console.log($(this).val().length);
    // });
	



</script>
</body>
</html>