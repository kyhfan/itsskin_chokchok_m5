<?
include_once "../include/autoload.php";

$mnv_f = new mnv_function();
$my_db         = $mnv_f->Connect_MySQL();
$mobileYN      = $mnv_f->MobileCheck();
$obYN          = $mnv_f->BrowserCheck();
$iphoneYN          = $mnv_f->IPhoneCheck();

if ($mobileYN == "PC")
{
    echo "<script>location.href='../index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."&ref=".$_REQUEST["ref"]."';</script>";
}else{
    $saveMedia     = $mnv_f->SaveMedia();
    $rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
}

include_once "./head.php";
?>
<body>
<script src=http://mobile.midas-i.com/roianal.mezzo/tracking?cmp_no=1859&depth=1></script>
<div class="page-wrap" id="#skrollr-body">
    <?
    include_once "./header.php";
    ?>

    <div class="content main">
        <a href="javascript:void(0)" data-popup-target="#popup-share"></a>
        <section class="main-visual skrollable skrollable-between" data-0="background-position: 50% 0px" data-1000="background-position: 50% -100px">
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
            <div class="serum">
                <img src="./images/section_main_product.png" alt="" class="wave" data-wave="0.6">
            </div>
            <div class="water-drops">
                <img src="./images/7waterdrop.png" alt="">
            </div>
            <div class="cali"></div>
            <div class="tvc-player">
                <!-- <img src="./images/tvc_sample.jpg" alt=""> -->
                <iframe allowfullscreen="1" src="https://www.youtube.com/embed/SEsO3gIrnbk?controls=0&loop=1&playlist=SEsO3gIrnbk&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1" frameborder="0" id="ytplayer" class="ytplayer"></iframe>
            </div>
            <div class="text">
                <img src="./images/section_main_text.png" alt="">
                <div class="obj-group">
							<span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                    <span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                    <span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                    <span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                    <span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                    <span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                    <span class="obj">
								<img src="./images/main_text_obj.png" alt="촉">
							</span>
                </div>
            </div>
            <!--
                                <div class="water-group left">
                                    <div class="water-drop _01 skrollable skrollable-between" data-0="top: 494px" data-end="top: -503px">
                                        <img src="./images/section_main_water_01.png">
                                    </div>
                                    <div class="water-drop _02 skrollable skrollable-between" data-0="top: 549px" data-end="top: -800px">
                                        <img src="./images/section_main_water_02.png">
                                    </div>
                                    <div class="water-drop _03 skrollable skrollable-between" data-0="top: 572px" data-end="top: -600px">
                                        <img src="./images/section_main_water_03.png">
                                    </div>
                                    <div class="water-drop _04 skrollable skrollable-between" data-0="top: 622px" data-end="top: -400px">
                                        <img src="./images/section_main_water_04.png">
                                    </div>
                                </div>
                                <div class="water-group right">
                                    <div class="water-drop _05 skrollable skrollable-between" data-0="top: 158px" data-end="top: -550px">
                                        <img src="./images/section_main_water_05.png">
                                    </div>
                                    <div class="water-drop _06 skrollable skrollable-between" data-0="top: 151px" data-end="top: -405px">
                                        <img src="./images/section_main_water_06.png">
                                    </div>
                                    <div class="water-drop _07 skrollable skrollable-between" data-0="top: 205px" data-end="top: -670px">
                                        <img src="./images/section_main_water_07.png">
                                    </div>
                                </div>
            -->
        </section>
        <section class="product-info">
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
                    <!--							<div class="dummy">-->
                    <div class="product-list _01 is-active" data-tap-content="1">
                        <div class="title">
                            <!-- <a href="http://m.itsskin.com/event/project.asp?eidx=654&page=1&sKey=&sWord=" class="sale-link" target="_blank">
                                <span class="blind">루틴 스킨케어 전 라인 20% 세일</span>
                            </a> -->
                            <img src="./images/tap_01_content_title.png" alt="">
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
                            <img src="./images/tap_02_content_title.png" alt="">
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
                            <img src="./images/tap_03_content_title.png" alt="">
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
                    <!--							</div>-->
                </div>
                <div class="copyright">
                    <img src="./images/copyright.png" alt="">
                </div>
            </div>
        </section>
    </div>
</div>
<script type="text/javascript">
    // 쿠키 생성
    function setCookie2(cName, cValue, cDay){
        var expire = new Date();
        expire.setDate(expire.getDate() + cDay);
        cookies = cName + '=' + escape(cValue) + '; path=/ ; domain=.itsskin.com '; // 한글 깨짐을 막기위해 escape(cValue)를 합니다.
        if(typeof cDay != 'undefined') cookies += ';expires=' + expire.toGMTString() + ';';
        document.cookie = cookies;
    }

    // 쿠키 가져오기
    function getCookie2(cName) {
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


    var gc = getCookie2('stopmoist7');


    //오늘하루 보지않기 닫기
    function closeToday(){

        var chk_v =  $("#cookie-check").is(":checked");

        if(chk_v){
            setCookie2('stopmoist7','Y','1');
        }

        $('.cookie-checker').hide();
        window.close();
    }
</script>
<script type="text/javascript">
    (function($) { $.QueryString = (function(a) { if (a == "") return {}; var b = {}; for (var i = 0; i < a.length; i++) { var p=a[i].split('='); if (p.length != 2) continue; b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " ")); } return b; })(window.location.search.substr(1).split('&')) })(jQuery);

    if($.QueryString['pTarget']) {
        if($.QueryString['pTarget'] == "goRoutin") {
            $('html, body').animate({scrollTop:$('.product-info').offset().top - 60}, 500);
        }
    }

    $(document).ready(function(){
        $("#ytplayer").width(313);
        var yt_height = (313 / 16) * 9;
        $("#ytplayer").height(yt_height);
    });


    $(window).scroll(function(){
        var scTop = $(this).scrollTop();
        if ( scTop > 20 ){
            $('#header').addClass('header--scroll');
        }else {
            $('#header').removeClass('header--scroll');
        }
    });

    var scTop = $(window).scrollTop();
    if ( scTop > 20 ){
        $('#header').addClass('header--scroll');
    }else {
        $('#header').removeClass('header--scroll');
    }

    //			var s = skrollr.init({
    //				//		forceHeight: false,
    //				skrollrBody: 'skrollr-body',
    //				smoothScrolling: true,
    //				smoothScrollingDuration: 500,
    //				//		easing: 'swing'
    //			});
    //
    //			var ta = new TimelineMax({});



    //			(function($){
    //				var x;
    //				var y;
    //				var waves = $('.wave').each(function(){
    //					this.np = 0;
    //					this.ep = 0;
    //					this.yp = 0;
    //					this.lv = this.getAttribute('data-wave')*1;
    //				});
    //				function move(){
    //					this.ep = this.lv*x;
    //					this.yp = this.lv*y;
    //				}
    //				function loop() {
    //					this.np = this.np + (this.ep - this.np)*0.1;
    //					this.yp = this.yp + (this.yp - this.yp)*0.1;
    //					this.style.transform = "translate("+this.np+'px'+", "+this.yp+'px'+")";
    //					//			this.style.transform = "translate("+this.np+'px'+")";
    //				}
    //				$(window).mousemove(function(e){
    //					x = (e.clientX - $(window).width()/2) / 50;
    //					y = (e.clientY - $(window).height()/2) / 50;
    //					waves.each(move);
    //				});
    //
    //				setInterval(function(){
    //					waves.each(loop);
    //				},33);
    //
    //
    //
    //
    //			})(jQuery);
    //			$(document).on('mouseover', '.water-drop', function() {
    //				if(!$(this).hasClass('rubberBand')) {
    //					$(this).addClass('rubberBand');
    //				} else {
    //					$(this).removeClass('rubberBand');
    //				}
    //			});

</script>
</body>
</html>