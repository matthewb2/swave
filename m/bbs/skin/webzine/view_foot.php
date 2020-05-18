


</table>


<!-- 이전글, 다음글 출력 시작 -->
<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
<tr height="5px"><td colspan="4"></td></tr>
<colgroup><col width="6px"><col width="40px"><col width="100%"><col width="6px"></colgroup>
<?=$hide_prev_start?>
<?php
$prev_comment = $prev_data[total_comment]; 
$prev_subject = preg_replace('/\[([0-9]{1,10})\]$/','',$prev_subject);
$prev_subject = "<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">".$prev_subject."</span>";

// 업로드한 파일이 이미지(확장자 검사)일때 리스트에 출력하기 - 20060906 (ganji)
 if(eregi("\.gif|\.png|\.bmp|\.jpg",$prev_data[file_name1])) { 
		$list_image1 = "<a href=\"$prev_data[file_name1]\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";}
		else{
		$list_image1 = "";}

 if(eregi("\.gif|\.png|\.bmp|\.jpg",$prev_data[file_name2])) { 
		$list_image2 = "<a href=\"$prev_data[file_name2]\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";}
		else{
		$list_image2 = "";}

// 최근 코멘트 시간체크
$c_timecheck = mysql_fetch_array(mysql_query("select * from $t_comment"."_$id where parent='$prev_data[no]' order by reg_date desc limit 1"));
$c_passtime = (time() - $c_timecheck[reg_date]) / 3600;
if ($c_passtime < 1)  {
	$c_style = "class=list_com1 title='1시간내에 덧글 달림'";
	$sep_title = "(1시간내에 덧글 달림)";
}	elseif ($c_passtime < 24)  { 
	$c_style = "class=list_com24 title='24시간내에 덧글 달림'";
	$sep_title = "(24시간내에 덧글 달림)";
}	else { 
	$c_style = "class=list_com";
   $sep_title = "";
}

// 새글의 배경색 다르게
$check_time=(time()-$prev_data[reg_date])/60/60; 
	if($prev_data[depth]) { 
			if($check_time<=12) { 
					$new_post_bg="bgcolor=#fbfaf7"; 
			} else { 
					$new_post_bg="bgcolor=#fefdfc"; 
			} 
	} else { 
			if($check_time<=12) { 
					$new_post_bg="bgcolor=#fbfaf7"; // 새글 배경색 
					$new_bold="<b>"; // 새글에 이미지출력 

			}        else { 
					$new_post_bg="bgcolor=#fefdfc"; 
					$new_bold=""; // 새글에 이미지출력 

			} 
	}

// 날짜 표시
if((date("d", $prev_data[reg_date]) == date("d", time())) && (time()-$prev_data[reg_date] < 86400)) {
	$prev_reg_date="<span title='".date("Y년 m월 d일 H시 i분 s초", $prev_data[reg_date])."'>오늘 ".date("h:ia", $prev_data[reg_date])."</span>";
} else {
	$prev_reg_date= "<span title='".date("Y년 m월 d일 H시 i분 s초", $prev_data[reg_date])."'>".date("Y-m-d", $prev_data[reg_date])."</span>";
}

?>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_prev">이전글</td>
<td class="foot_prev" title="제목"><?=$a_prev.$prev_subject?></a>&nbsp;<? if($prev_data[reply_mail]) {// 코멘트가 제한이라면?><a href="view.php?<?echo "id=$id&no=$prev_data[no]";?>#ccm" onfocus="this.blur()" title="코멘트로 바로가기"><? if($prev_comment) {?><span class="list_com"><?=$prev_comment?></span><?}?><img src="<?=$dir?>/images/no_com_list_icon.gif" style="margin-right: 2px;" width="10px" height="11px" alt="코멘트를 제한한 글입니다" /></a><? }elseif($prev_comment){ // 코멘트가 있다면?><a href="view.php?<?echo "id=$id&no=$prev_data[no]";?>#ccm" onfocus="this.blur()" title="코멘트로 바로가기"><span <?=$c_style?>><?=$prev_comment?></span><img src="<?=$dir?>/images/icon_sm_comment.gif" style="margin-right: 2px;" width="10px" height="11px" alt="" title="<?=$sep_title?>"/></a><? } ?></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
</tr>

<tr height="5px"><td colspan="6"></td></tr>
<?=$hide_prev_end?>
<?=$hide_next_start?>
<?php
$next_comment = $next_data[total_comment]; 
$next_subject = preg_replace('/\[([0-9]{1,10})\]$/','',$next_subject);
$next_subject = "<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">".$next_subject."</span>";

// 업로드한 파일이 이미지(확장자 검사)일때 리스트에 출력하기 - 20060906 (ganji)
 if(eregi("\.gif|\.png|\.bmp|\.jpg",$next_data[file_name1])) { 
		$list_image1 = "<a href=\"$next_data[file_name1]\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";}
		else{
		$list_image1 = "";}

 if(eregi("\.gif|\.png|\.bmp|\.jpg",$next_data[file_name2])) { 
		$list_image2 = "<a href=\"$next_data[file_name2]\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";}
		else{
		$list_image2 = "";}

// 최근 코멘트 시간체크
$c_timecheck = mysql_fetch_array(mysql_query("select * from $t_comment"."_$id where parent='$next_data[no]' order by reg_date desc limit 1"));
$c_passtime = (time() - $c_timecheck[reg_date]) / 3600;
if ($c_passtime < 1)  {
	$c_style = "class=list_com1 title='1시간내에 덧글 달림'";
	$sep_title = "(1시간내에 덧글 달림)";
}	elseif ($c_passtime < 24)  { 
	$c_style = "class=list_com24 title='24시간내에 덧글 달림'";
	$sep_title = "(24시간내에 덧글 달림)";
}	else { 
	$c_style = "class=list_com";
   $sep_title = "";
}

// 새글의 배경색 다르게
$check_time=(time()-$next_data[reg_date])/60/60; 
	if($next_data[depth]) { 
			if($check_time<=12) { 
					$new_post_bg="bgcolor=#fbfaf7"; 
			} else { 
					$new_post_bg="bgcolor=#fefdfc"; 
			} 
	} else { 
			if($check_time<=12) { 
					$new_post_bg="bgcolor=#fbfaf7"; // 새글 배경색 
					$new_bold="<b>"; // 새글에 이미지출력 

			}        else { 
					$new_post_bg="bgcolor=#fefdfc"; 
					$new_bold=""; // 새글에 이미지출력 

			} 
	}

// 날짜 표시
if((date("d", $next_data[reg_date]) == date("d", time())) && (time()-$next_data[reg_date] < 86400)) {
	$next_reg_date="<span title='".date("Y년 m월 d일 H시 i분 s초", $next_data[reg_date])."'>오늘 ".date("h:ia", $next_data[reg_date])."</span>";
} else {
	$next_reg_date= "<span title='".date("Y년 m월 d일 H시 i분 s초", $next_data[reg_date])."'>".date("Y-m-d", $next_data[reg_date])."</span>";
}
?>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_prev">다음글</td>
<td class="foot_prev" title="제목"><?=$list_image1;?><?=$list_image2;?><?=$a_next.$next_subject?></a>&nbsp;<? if($next_data[reply_mail]) {// 코멘트가 제한이라면?><a href="view.php?<?echo "id=$id&no=$next_data[no]";?>#ccm" onfocus="this.blur()" title="코멘트로 바로가기"><? if($next_comment) {?><span class="list_com"><?=$next_comment?></span><?}?><img src="<?=$dir?>/images/no_com_list_icon.gif" style="margin-right: 2px;" width="10px" height="11px" alt="코멘트를 제한한 글입니다" /></a><? }elseif($next_comment){ // 코멘트가 있다면?><a href="view.php?<?echo "id=$id&no=$next_data[no]";?>#ccm" onfocus="this.blur()" title="코멘트로 바로가기"><span <?=$c_style?>><?=$next_comment?></span><img src="<?=$dir?>/images/icon_sm_comment.gif" style="margin-right: 2px;" width="10px" height="11px" alt="" title="<?=$sep_title?>"/></a><? } ?></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
</tr>

<tr height="5px"><td colspan="6"></td></tr>
<?=$hide_next_end?>
</table>
<!-- 이전글, 다음글 출력 끝 -->
	
	