<?
	include "lib.php";

// DB ����

	if(!$connect) $connect=dbConn();

// ���� �α��� ���������� Ȯ��
	$member=member_info();

	if(!$member[no]) Error("�α��� ���°� �ƴմϴ�");

		
		
		if(!$group_no) $group_no=$member[group_no];

		if($id) $setup=get_table_attrib($id);
	  
		if($setup[group_no]&&!$group_no) $group_no=$setup[group_no];
	  
		mysql_close($connect);

		destroyZBSessionID($member[no]);
		
		// 4.0x �� ���� ó��
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
		
		
		// 5.0 ����ó�� ��� ���� ���� ����
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
