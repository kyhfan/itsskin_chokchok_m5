<?
	include_once "./include/autoload.php";

    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
    $obYN          = $mnv_f->BrowserCheck();
    if ($mobileYN == "MOBILE")
	{
		echo "<script>location.href='m/index.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."';</script>";
	}else{
        $saveMedia     = $mnv_f->SaveMedia();
		$rs_tracking   = $mnv_f->InsertTrackingInfo($mobileYN);
	}

	include_once "./head.php";
?>
<body>
    <div class="skip_layer">
        <div class="intro_cover"></div>
        <div id="skip_cursor" style="position:absolute">
            <img src="./images/skip.png" alt="skip">
        </div>
        <div class="intro_movie">
            <iframe allowfullscreen="1" src="https://www.youtube.com/embed/AlGt1YhYNCg?controls=0&loop=1&playlist=AlGt1YhYNCg&modestbranding=1&showinfo=0&wmode=opaque&enablejsapi=1&rel=0&autoplay=1" frameborder="0" id="ytplayer" class="ytplayer"></iframe>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        // 유튜브 영상 브라우저 크기 맞춤
        $("#ytplayer").width($(window).width());
        $("#ytplayer").height($(window).height());

        // 마우스 커서에 이미지 따라다니기
        $(document).mousemove(function(event){ 
            var x = event.pageX-10, y = event.pageY-10; 
            $("#skip_cursor").css("left",x+"px"); 
            $("#skip_cursor").css("top",y+"px"); 
        }); 
    });

    // 인트로 화면 클릭 시 메인 화면 노출
    $(".skip_layer").on("click", function(){
        $(".skip_layer").hide();
        $("#ytplayer").attr("src","");
        $(".mainWrap").show();
    });

    </script>
</body>
</html>