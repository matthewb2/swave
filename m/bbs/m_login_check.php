<?
	include "lib.php";

	$connect=dbconn();

	
// ȸ�� �α��� üũ
	$result = mysql_query("select * from $member_table where user_id='$user_id' and password=password('$password')") or error(mysql_error());
	$member_data = mysql_fetch_array($result);

// ȸ���α����� �����Ͽ��� ��� ������ �����ϰ� �������� �̵���
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
		// �α��� �� ������ �̵�
		?>
		<script>
		//monvto = location.href=localStorage.getItem("url_login");
		
		window.location.href = localStorage.getItem("url_login");
		</script>
		<?		
// ȸ���α����� �����Ͽ��� ��� ���� ǥ��
	} else {
		head();
		Error("�α����� �����Ͽ����ϴ�");
		foot();
	}

	@mysql_close($connect);
?>
