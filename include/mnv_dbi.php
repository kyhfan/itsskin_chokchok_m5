<?
/*
*
*	DB 연결 정보
*
*/
class mnv_dbi
{
	var $my_db;
	public function Connect_MySQL()
	{
		$my_db = new mysqli("호스트명", "아이디", "비밀번호", "DB명");

		if (mysqli_connect_error()) {
			exit('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
		}

		mysqli_query ($my_db,"set names utf8");

		return $my_db;
	}
}