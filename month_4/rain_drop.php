<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="./js/jquery-1.11.2.min.js"></script>
    <style>
    body, html {
        margin: 0;
        padding: 0;
    }

    video {
        position: fixed;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1;
    }
    </style>
</head>
<body>
    <!-- <div>
        TEST
    </div> -->
    <video autoplay loop>
		<source src = "ex.mp4"type = "video/mp4">
	</video>
</body>
</html>