<?
	include "lib.php";

// DB 연결

	if(!$connect) $connect=dbConn();

// 현재 로그인 상태인지를 확인
	$member=member_info();

	if(!$member[no]) Error("로그인 상태가 아닙니다");

		
		
		if(!$group_no) $group_no=$member[group_no];

		if($id) $setup=get_table_attrib($id);
	  
		if($setup[group_no]&&!$group_no) $group_no=$setup[group_no];
	  
		mysql_close($connect);

		destroyZBSessionID($member[no]);
		
		// 4.0x 용 세션 처리
		$zb_logged_no='';
		$zb_logged_time='';
		$zb_logged_ip='';
		$zb_secret='';
		$zb_last_connect_check = '0';
		session_register("zb_logged_no");
		session_register("zb_logged_time");
		session_register("zb_logged_ip");
		session_register("zb_secret");
		session_register("zb_last_connect_check");
		session_destroy(); 
		
		
		// 5.0 세션처리 모든 세션 변수 해제
		$_SESSION = array();
	
	if($s_url) movepage($s_url);
	if($id) movepage("zboard.php?id=$id&page=$page&page_num=$page_num&select_arrange=$select_arrange&desc=$des&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&category=$category&no=$no");
	elseif($group[join_return_url]) movepage($group[join_return_url]);
	elseif($referer) movepage($referer);
	else { ?>
	<script>var backLocation = document.referrer;
if (backLocation) {
    if (backLocation.indexOf("?") > -1) {
        backLocation += "&randomParam=" + new Date().getTime();
    } else {
        backLocation += "?randomParam=" + new Date().getTime();
    }
    window.location.assign(backLocation);
}
</script>
	<?}
		
	
?>
