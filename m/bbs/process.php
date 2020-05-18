<?php

/***************************************************************************
 * 공통 파일 include
 **************************************************************************/
	include "_head.php";

	if(!eregi($HTTP_HOST,$HTTP_REFERER)) Error("정상적으로 글을 작성하여 주시기 바랍니다.");
	
	
/***************************************************************************
 * 게시판 설정 체크
 **************************************************************************/

// 대상 파일 이름 정리
	if(!$setup[use_alllist]) $view_file_link="view.php"; else $view_file_link="zboard.php";

	$password = $_POST['password'];
// 패스워드를 암호화
	if($password) {
		$temp=mysql_fetch_array(mysql_query("select password('$password')"));
		$password=$temp[0];   
	}
	
	
// 관리자이거나 HTML허용레벨이 낮을때 태그의 금지유무를 체크
	if(!$is_admin&&$setup[grant_html]<$member[level]) {
		$memo=del_html($memo);// 내용의 HTML 금지;;
	}

// 회원등록이 되어 있을때 이름등을 가져옴;;
	if($member[no]) {
		if($mode=="modify"&&$member[no]!=$s_data[ismember]) {
			$name=$s_data[name];
		} else {
			$name=$member[name];
		}
	}
	
	
// 각종 변수의 addslashes 시킴
	$name=addslashes(del_html($name));
	$memo=autolink($memo);
	$memo=addslashes($memo);

	
// 각종 변수 설정
	$reg_date=time(); // 현재의 시간구함;;
	$parent=$no;
	
// 코멘트 입력
	mysql_query("insert into $t_comment"."_$id (parent,ismember,name,password,memo,reg_date,ip) values ('$parent','$member[no]','$name','$password','$memo','$reg_date','$REMOTE_ADDR')") or error(mysql_error());


// 코멘트 갯수를 구해서 정리
	$total=mysql_fetch_array(mysql_query("select count(*) from $t_comment"."_$id where parent='$no'"));
	mysql_query("update $t_board"."_$id set total_comment='$total[0]' where no='$no'") or error(mysql_error());


	@mysql_close($connect);

$change = array('key1' => $name, 'key2' => $memo, 'key3' => $var3);
echo json_encode($change);
?>