<!DOCTYPE html>
<?
	if ($IEYN == "Y")
	{
?>
<html lang="ko" class="ie">
<?
	}else{
?>	
<html lang="ko">
<?
	}
?>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<meta property="og:image" content="http://routine.itsskin.com/images/share.jpg" />
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
		
		<!-- <link rel="stylesheet" href="./css/style.css" /> -->
		<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
		<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117485072-1"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-117485072-1');
		</script>
		
	</head>