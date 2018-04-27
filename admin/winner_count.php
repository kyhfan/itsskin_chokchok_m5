<?php

	// 설정파일
	include_once "../config.do";

/*
	if (isset($_SESSION['ss_mb_id']) == false)
	{
		//header('Location: index.php'); 
		echo "<script>location.href='index.php'</script>"; 
		exit; 
	}
*/

	include "./head.php";

	if(isset($_REQUEST['pg']) == false)
		$pg = "1";
	else
		$pg = $_REQUEST['pg'];
	
	if (!$pg)
		$pg = "1";
	//if(isset($pg) == false) $pg = 1;	// $pg가 없으면 1로 생성
	$page_size = 10;	// 한 페이지에 나타날 개수
	$block_size = 10;	// 한 화면에 나타낼 페이지 번호 개수

	//if (isset($search_type) == false)
	//	$search_type = "search_by_name";
?>
<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">경품별 당첨자 수</h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table id="entry_list" class="table table-hover">
            <thead>
              <tr>
                <th>금수저 1돈(3명)</th>
                <th>액상분유 한달 수유분(10명)</th>
                <th>리앤 골드에디션(50명)</th>
                <th>마미포코 기저귀 1박스(50명)</th>
                <th>스킨케어(100명)</th>
                <th>스타벅스 기프티콘(100명)</th>
                <th>베비언스 1만원 쿠폰</th>
                <th>베비언스 5천원 쿠폰</th>
                <th>베비언스 3천원 쿠폰</th>
              </tr>
            </thead>
            <tbody>
<?php 
	$_gl['prize']['name']['coupon_3000']		= "베비언스 3천원 쿠폰";
	$_gl['prize']['name']['coupon_5000']		= "베비언스 5천원 쿠폰";
	$_gl['prize']['name']['coupon_10000']	= "베비언스 1만원 쿠폰";
	$_gl['prize']['name']['coffee']				= "스타벅스 기프티콘";
	$_gl['prize']['name']['skincare']			= "산양유 스킨케어 세트";
	$_gl['prize']['name']['diaper']				= "마미포코 기저귀 1박스";
	$_gl['prize']['name']['shampoo']			= "리앤 골드에디션";
	$_gl['prize']['name']['milk']					= "베비언스 산양액상분유 한 달 수유분";
	$_gl['prize']['name']['gold']				= "황금 1돈";


	$buyer_count_query = "SELECT count(*) FROM ".$_gl['game_info_table']." WHERE 1";

	$buyer_list_query = "SELECT game_prize, count(game_prize) cnt FROM ".$_gl['game_info_table']." WHERE 1 GROUP BY game_prize";
	$res = mysqli_query($my_db, $buyer_list_query);

	while ($b_data = @mysqli_fetch_array($res))
	{
		if ($b_data['game_prize'] == "gold")
		{
			$winner_info[1]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "milk"){
			$winner_info[2]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "shampoo"){
			$winner_info[3]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "diaper"){
			$winner_info[4]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "skincare"){
			$winner_info[5]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "coffee"){
			$winner_info[6]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "coupon_10000"){
			$winner_info[7]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "coupon_5000"){
			$winner_info[8]	= $b_data['cnt'];
		}else if ($b_data['game_prize'] == "coupon_3000"){
			$winner_info[9]	= $b_data['cnt'];
		}
	}
	if (!$winner_info[1])
		$winner_info[1] = 0;
	else if (!$winner_info[2])
		$winner_info[2] = 0;
	else if (!$winner_info[3])
		$winner_info[3] = 0;
	else if (!$winner_info[4])
		$winner_info[4] = 0;
	else if (!$winner_info[5])
		$winner_info[5] = 0;
	else if (!$winner_info[6])
		$winner_info[6] = 0;
	else if (!$winner_info[7])
		$winner_info[7] = 0;
	else if (!$winner_info[8])
		$winner_info[8] = 0;
	else if (!$winner_info[9])
		$winner_info[9] = 0;
?>
              <tr>
                <td><?php echo $winner_info[1]?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $winner_info[2]?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $winner_info[3]?></td>	<!-- No. 하나씩 감소 -->
                <td><?php echo $winner_info[4]?></td>
                <td><?php echo $winner_info[5]?></td>
                <td><?php echo $winner_info[6]?></td>
                <td><?php echo $winner_info[7]?></td>
                <td><?php echo $winner_info[8]?></td>
                <td><?php echo $winner_info[9]?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
</body>

</html>



<script type="text/javascript">
 
	function pageRun(num)
	{
		f = document.frm_execute;
		f.pg.value = num;
		f.submit();
	}
</script>