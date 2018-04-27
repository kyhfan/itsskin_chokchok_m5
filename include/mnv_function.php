<?
/*
*
*	php function
*
*/
class mnv_function extends mnv_dbi
{
	var $winner_flag;

	var $pg; //-- 현제 페이지
	var $tot_no; //--전체 게시물수
	var $page_size; //--한번에 보여줄 게시물수
	var $page_count; //--전체 페이지수
	var $page_start; //--게시물 시작위치
	var $page_uncount; //--게시물 번호
	
	var $block_size; //--한번에 보여줄 불럭수
	var $block_count; //--전체 불럭수
	var $block; //--현재 불럭수
	var $block_start; //--불럭시작수
	var $block_end; //--불럭 끝수
	
	var $block_list; //--불럭의 내용을 담을 변수
	var $script; //-- 페이지관련 자바스크립트

	
	public function InsertTrackingInfo($gubun)
	{
		global $my_db;
		$log_query	= "INSERT INTO tracking_info(tracking_media, tracking_refferer, tracking_ipaddr, tracking_date, tracking_gubun) values('".$_SESSION['ss_media']."','".$_SERVER['HTTP_REFERER']."','".$_SERVER['REMOTE_ADDR']."',now(),'".$gubun."')";
		$q_result 	= mysqli_query($my_db, $log_query);

		return $log_query;
	}

	public function MobileCheck()
	{
		$mobile_agent = array("iPhone","iPod","iPad","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini", "Windows ce", "Nokia", "sony" );
		$check_mobile = "PC";

		for($i=0; $i<sizeof($mobile_agent); $i++){
			if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
				$check_mobile = "MOBILE";
				break;
			}
		}
		return $check_mobile;
	}

	public function IPhoneCheck()
	{
        if(stripos( $_SERVER['HTTP_USER_AGENT'], "iPhone" ))
        	$iPhone	    = "Y";
        else
        	$iPhone	= "N";
        return $iPhone;
	}
	public function BrowserCheck()
	{
        if(stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE 8" ) || stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE 9" ))
        	$OB	    = "Y";
        else
        	$OB	= "N";
        return $OB;
	}
	public function IECheck()
	{
        if(stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE" ) || stripos( $_SERVER['HTTP_USER_AGENT'], "Trident" ))
        	$IE	    = "Y";
        else
        	$IE	= "N";
        return $IE;
	}
	public function SafariCheck()
	{
        if(stripos( $_SERVER['HTTP_USER_AGENT'], "MSIE" ) || stripos( $_SERVER['HTTP_USER_AGENT'], "Chrome" ) || stripos( $_SERVER['HTTP_USER_AGENT'], "Trident" ))
        	$Safari	    = "N";
        else
        	$Safari	= "Y";
        return $Safari;
	}

	public function SaveMedia()
	{
		$_SESSION['ss_media']		= $_REQUEST['media'];
	}

	public function winner_draw($level)
	{
		$kit_winner_count       = 100;	// 투고 키트 총 당첨 수량
		$goods_winner_count     = 6;	// 정품 총 당첨 수량

        $kit_array      = array(8);
        // $kit_array      = array("Y","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N","N");
		// shuffle($kit_array);
		
		$goods_array    = array(200000);

        // 총 키트 당첨 수량 
		$kit_query      = "SELECT mb_winner, count(mb_winner) FROM member_info WHERE  mb_winner='kit'";
		$kit_result     = mysqli_query($my_db, $kit_query);
		$kit_num        = mysqli_num_rows($kit_result);
        
        // 총 정품 당첨 수량
		$goods_query     = "SELECT mb_winner, count(mb_winner) FROM member_info WHERE  mb_winner='goods'";
		$goods_result    = mysqli_query($my_db, $goods_query);
		$goods_num       = mysqli_num_rows($goods_result);
        
        // 오늘 참여자 수
		$today_query		= "SELECT * FROM member_info WHERE mb_regdate like '%".date("Y-m-d")."%'";
		$today_result		= mysqli_query($my_db, $today_query);
		$today_num		    = mysqli_num_rows($today_result);

        $winner             = "blank";

        if ($kit_num < $kit_winner_count)
        {
            foreach ($kit_array as $key => $val)
            {
                if ($today_num == $val)
                {
                    $winner = "kit";
                    break;
                }
            }
            // 3레벨일 경우에만 정품 당첨 추첨
            if ($level == 3)
            {
                if ($goods_num < $goods_winner_count)
                {
                    foreach ($goods_array as $key => $val)
                    {
                        if ($today_num == $val)
                        {
                            $winner = "goods";
                            break;
                        }
                    }
                }
            }
        }
        return $winner;
	}
	public function winner_draw2($level)
	{
		global $my_db;
		$kit_winner_count       = 6000;	// 투고 키트 총 당첨 수량
		$goods_winner_count     = 6;	// 정품 총 당첨 수량

        $kit_array      = array("Y","N","N","N");
        // $kit_array      = array("Y");
        // $kit_array      = array("Y","N");
		shuffle($kit_array);
		
		// $goods_array    = array(1350);

        // 총 키트 당첨 수량 
		$kit_query      = "SELECT * FROM member_info WHERE  mb_winner='kit'";
		$kit_result     = mysqli_query($my_db, $kit_query);
		$kit_num        = mysqli_num_rows($kit_result);
        
        // 총 정품 당첨 수량
		$goods_query     = "SELECT * FROM member_info WHERE  mb_winner='goods'";
		$goods_result    = mysqli_query($my_db, $goods_query);
		$goods_num       = mysqli_num_rows($goods_result);
        
        // 오늘 참여자 수
		$today_query		= "SELECT * FROM member_info WHERE mb_regdate like '%".date("Y-m-d")."%'";
		$today_result		= mysqli_query($my_db, $today_query);
		$today_num		    = mysqli_num_rows($today_result);

        $winner             = "blank";

        if ($kit_num < $kit_winner_count)
        {
			if ($kit_array[0] == "Y")
			{
				$winner = "blank";
			}else{
				// 3레벨일 경우에만 정품 당첨 추첨
				if ($level == 3)
				{
					if ($goods_num < $goods_winner_count)
					{
						// foreach ($goods_array as $key => $val)
						// {
						// 	if ($today_num == $val)
						// 	{
						// 		$winner = "goods";
						// 		break;
						// 	}
						// }
						// $winner = "goods";
						$winner = "blank";
					}
				}
			}
        }
        return $winner;
	}

	public function Page($class_pg,$class_tot_no,$class_page_size,$class_block_size){
		$this->pg = $class_pg;
		$this->tot_no = $class_tot_no;
		$this->page_size = $class_page_size;
		$this->block_size = $class_block_size;
		
		$this->page_count = ceil($this->tot_no/$this->page_size); //전체 페이지수
		$this->page_start = ($this->pg - 1) * $this->page_size; //게시물 시작위치
		$this->page_uncount = $this->tot_no - $this->page_start; //게시물 번호
		
		$this->block_count = ceil($this->page_count/$this->block_size);///////// 전체 불럭수
		$this->block = ceil($this->pg/$this->block_size); //////////////////////////// 현재 불럭수
		$this->block_start = (($this->block - 1) * $this->block_size) + 1; ///////// 불럭시작수
		$this->block_end = $this->block * $this->block_size; /////////////////////// 불럭 끝수
	}
	
	public function blockList( $str = "pageRun(")
	{
		$b_start = $this->block_start;
		$block_str = "";
		$block_str = '<table border="0" cellspacing="0" cellpadding="0"><tr><td>';
		//-- 이전 블럭
		if($this->block != 1)
		{
			$temp = $this->block_start - 1;
			$block_str .= '<a href="javascript:' . $str . $temp . ');" title="이전 ' . $this->block_size . '">이전</a>';
		}
		else
		{
			$block_str .= '이전';
		}
		$block_str .= '</td><td>';
		//--블럭 리스트
		$arrBlock = array();
		while($b_start <= $this->block_end && $b_start <= $this->page_count )
		{
			$arrBlock[] = 	$b_start++;
		}
		
		for($i = 0; $i < count($arrBlock); $i++)
		{
			if($this->pg != $arrBlock[$i])
			{
				$block_str .= '<a href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a>';
			}
			else
			{
				$block_str .= '<a href="javascript:'. $str. $arrBlock[$i] . ');" style="font-weight:bold">' . $arrBlock[$i] . '</a>';
			}
			if($i < (count($arrBlock) - 1) ) $block_str .= " | ";
		}
		$block_str .= '</td><td>';
		
		//다음 블럭
		if($this->block != $this->block_count && $this->tot_no != 0){
			$temp = $this->block_end + 1;
			$block_str .= '<a href="javascript:' .$str . $temp . ')" title="다음 ' . $this->block_size . '">다음</a>';
		}
		else
		{
			$block_str .= '다음';
		}
		$block_str .= '</td></tr></table>';
		return $block_str;
	}
	
	public function blockList2( $str = "pageRun(")
	{
		$b_start = $this->block_start;
		$block_str = "";
		//-- 이전 블럭
		if($this->block != 1)
		{
			$temp = $this->block_start - 1;
			$block_str .= '<li><a href="javascript:' . $str . $temp . ');" title="이전 ' . $this->block_size . '">&lt;</a></li>';
		}

		//--블럭 리스트
		$arrBlock = array();
		while($b_start <= $this->block_end && $b_start <= $this->page_count )
		{
			$arrBlock[] = 	$b_start++;
		}
		
		for($i = 0; $i < count($arrBlock); $i++)
		{
			if($this->pg != $arrBlock[$i])
			{
				$block_str .= '<li><a href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a></li>';
			}
			else
			{
				$block_str .= '<li><a class="p_now" href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a></li>';
			}
			if($i < (count($arrBlock) - 1) ) $block_str .= "  ";
		}
		
		//다음 블럭
		if($this->block != $this->block_count && $this->tot_no != 0){
			$temp = $this->block_end + 1;
			$block_str .= '<li><a href="javascript:' .$str . $temp . ')" title="다음 ' . $this->block_size . '">&gt;</a></li>';
		}

		return $block_str;
	}

	public function blockList3( $str = "pageRun(")
	{
		$b_start = $this->block_start;
		$block_str = "";
		//-- 이전 블럭
		if($this->block != 1)
		{
			$temp = $this->block_start - 1;
			$block_str .= '<span class="next"><a href="javascript:' . $str . $temp . ');">◀</a>&nbsp;</span>';
		}

		//--블럭 리스트
		$arrBlock = array();
		while($b_start <= $this->block_end && $b_start <= $this->page_count )
		{
			$arrBlock[] = 	$b_start++;
		}
		
		for($i = 0; $i < count($arrBlock); $i++)
		{
			if($this->pg != $arrBlock[$i])
			{
				$block_str .= '<a href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a>';
			}
			else
			{
				$block_str .= '<a href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a>';
			}
			if($i < (count($arrBlock) - 1) ) $block_str .= " / ";
		}
		
		//다음 블럭
		if($this->block != $this->block_count && $this->tot_no != 0){
			$temp = $this->block_end + 1;
			$block_str .= '<span class="next">&nbsp;<a href="javascript:' .$str . $temp . ')">▶</a></span>';
		}

		return $block_str;
	}

	public function blockList4( $str = "pageRun(")
	{
		$b_start = $this->block_start;
		$block_str = "";

		$block_str .= '<ul class="con_paging">';
		//-- 이전 블럭
		if($this->block != 1)
		{
			$temp = $this->block_start - 1;
			$block_str .= '<li><a href="javascript:' . $str . $temp . ');">&lt;</a>&nbsp;</li>';
		}

		//--블럭 리스트
		$arrBlock = array();
		while($b_start <= $this->block_end && $b_start <= $this->page_count )
		{
			$arrBlock[] = 	$b_start++;
		}
		
		for($i = 0; $i < count($arrBlock); $i++)
		{
			if($this->pg != $arrBlock[$i])
			{
				$block_str .= '<li><a href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a></li>';
			}
			else
			{
				$block_str .= '<li><a class="p_now" href="javascript:'. $str.$arrBlock[$i] . ');">' . $arrBlock[$i] . '</a></li>';
			}
			//if($i < (count($arrBlock) - 1) ) $block_str .= " / ";
		}
		
		//다음 블럭
		if($this->block != $this->block_count && $this->tot_no != 0){
			$temp = $this->block_end + 1;
			$block_str .= '<li>&nbsp;<a href="javascript:' .$str . $temp . ')">&gt;</a></li>';
		}

		$block_str .= '</ul>';
		return $block_str;
	}

}
