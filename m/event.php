<?
	include_once "../include/autoload.php";

    $mnv_f = new mnv_function();
    $my_db         = $mnv_f->Connect_MySQL();
    $mobileYN      = $mnv_f->MobileCheck();
	$obYN          = $mnv_f->BrowserCheck();
	
	if ($mobileYN == "PC")
    {
        echo "<script>location.href='./month_4/event.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."&ref=".$_REQUEST["ref"]."';</script>";
    }else{
        echo "<script>location.href='./month_4/m/event.php?media=".$_REQUEST["media"]."&r=".$_REQUEST["r"]."&ref=".$_REQUEST["ref"]."';</script>";
    }

?>