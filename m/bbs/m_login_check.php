<?
	include "lib.php";

	$connect=dbconn();

	
// 회원 로그인 체크
	$result = mysql_query("select * from $member_table where user_id='$user_id' and password=password('$password')") or error(mysql_error());
	$member_data = mysql_fetch_array($result);

// 회원로그인이 성공하였을 경우 세션을 생성하고 페이지를 이동함
	if($member_data[no]) {

		if($auto_login) {
			makeZBSessionID($member_data[no]);
		}
		
			 $zb_logged_no = $member_data[no];
                $zb_logged_time = time();
                $zb_logged_ip = $REMOTE_ADDR;
                $zb_last_connect_check = '0';

			$_SESSION["zb_logged_no"] = $zb_logged_no;
			$_SESSION["zb_logged_time"] = $zb_logged_time;
			$_SESSION["zb_logged_ip"] = $zb_logged_ip;
			$_SESSION["zb_last_connect_check"]= $zb_last_connect_check;

		//echo 	$_SESSION["zb_logged_no"];
		// 로그인 후 페이지 이동
		?>
		<script>
		//monvto = location.href=localStorage.getItem("url_login");
		
		window.location.href = localStorage.getItem("url_login");
		</script>
		<?		
// 회원로그인이 실패하였을 경우 에러 표시
	} else {
		head();
		Error("로그인을 실패하였습니다");
		foot();
	}

	@mysql_close($connect);
?>
