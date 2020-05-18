<?php
$list_empty = false;

$subject = str_replace("[re]" ,"<img src=\"$dir/images/reply_head.gif\" align=\"absMiddle\" alt=\"답변글\" />", $subject); 
	
	include "badtogood.php";
	

	foreach($badwords as $key=>$value){
	// $memo = str_replace($key, $value,$memo);
	$subject = str_replace($key, $value,$subject);
	}
	$pattern = '/[\xa1-\xfe]/';
	if (preg_match_all($pattern, $name, $match)){
	$str = implode('', $match[0]);
		if (mb_strlen($str)/2>2){$name = mb_substr($str, 0, 4).str_repeat("*", mb_strlen($str)/2-2);}
	}

	

// 최근 코멘트 시간체크
$c_timecheck = mysql_fetch_array(mysql_query("select * from $t_comment"."_$id where parent='$data[no]' order by reg_date desc limit 1"));
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


// 업로드한 파일이 이미지(확장자 검사)일때 리스트에 출력하기 - 20060906 (ganji)
if(eregi("\.gif|\.png|\.bmp|\.jpg",$data[file_name1])) { 
	if($data[is_secret]&&!$is_admin&&$data[ismember]!=$member[no]&&$member[level]>$setup[grant_view_secret]) {
		$list_image1 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	} elseif ($member[level]>$setup[grant_view]) {
		$list_image1 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	}else {
		$list_image1 = "<a href=\"$data[file_name1]\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";		
	}
}else{
	$list_image1 = "";
}

if(eregi("\.gif|\.png|\.bmp|\.jpg",$data[file_name2])) { 
	if($data[is_secret]&&!$is_admin&&$data[ismember]!=$member[no]&&$member[level]>$setup[grant_view_secret]) {
		$list_image2 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	} elseif ($member[level]>$setup[grant_view]) {
		$list_image2 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	}else {
		$list_image2 = "<a href=\"$data[file_name2]\" rel=\"lightbox\"><img src=\"$dir/images/view_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";		
	}
}else{
	$list_image2 = "";
}



// 업로드한 파일이 pdf(확장자 검사)일때 리스트에 출력하기 - 20060906 (ganji)
if(preg_match("/.pdf$/",$data[file_name1])) { 
	if($data[is_secret]&&!$is_admin&&$data[ismember]!=$member[no]&&$member[level]>$setup[grant_view_secret]) {
		$list_image1 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/pdf_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	} elseif ($member[level]>$setup[grant_view]) {
		$list_image1 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/pdf_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	}else {
		$list_image1 = "<a href=\"$data[file_name1]\" rel=\"lightbox\"><img src=\"$dir/images/pdf_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";		
	}
}


if(preg_match("/.pdf$/",$data[file_name2])) { 
	if($data[is_secret]&&!$is_admin&&$data[ismember]!=$member[no]&&$member[level]>$setup[grant_view_secret]) {
		$list_image2 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/pdf_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	} elseif ($member[level]>$setup[grant_view]) {
		$list_image2 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/pdf_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	}else {
		$list_image2 = "<a href=\"$data[file_name2]\" rel=\"lightbox\"><img src=\"$dir/images/pdf_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";		
	}
}


// 새글의 배경색 다르게
$check_time=(time()-$data[reg_date])/60/60; 
	if($data[depth]) { 
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
if((date("d", $data[reg_date]) == date("d", time())) && (time()-$data[reg_date] < 86400)) {
	$reg_date="<span title='".date("Y년 m월 d일 H시 i분 s초", $data[reg_date])."'>오늘 ".date("h:ia", $data[reg_date])."</span>";
} else {
	$reg_date= "<span title='".date("Y년 m월 d일 H시 i분 s초", $data[reg_date])."'>".date("m/d", $data[reg_date])."</span>";
}
?>


<tr <?=$new_post_bg?> style="height: 28px;">
<td class="main_td003"><?=$hide_cart_start?><input type="checkbox" name="cart" value="<?=$data[no]?>" /><?=$hide_cart_end?><?=$new_bold?><?=$number?></b></td>
<td class="main_td003"><?=$reg_date?></td>
<td class="main_td002"><?=$icon?><?=$hide_category_start?><span class="category_text">[<?=$category_name?>]</span>&nbsp;<?=$insert?><?=$hide_category_end?><?=$list_image1;?><?=$list_image2;?><?=$subject?>&nbsp;<? if($data[reply_mail]) {// 코멘트가 제한이라면?><a href="view.php?<?echo "id=$id&no=$data[no]";?>#ccm" onfocus="this.blur()" title="코멘트로 바로가기">
<span class="list_com"><?=$comment_num?></span><img src="<?=$dir?>/images/no_com_list_icon.gif" style="margin-right: 2px;" width="10px" height="11px" alt="코멘트를 제한한 글입니다" /></a><? }elseif($comment_num){ // 코멘트가 있다면?><a href="view.php?<?echo "id=$id&no=$data[no]";?>#ccm" onfocus="this.blur()" title="코멘트로 바로가기"><span class="list_com"><?=$comment_num?></span><img src="<?=$dir?>/images/icon_sm_comment.gif" style="margin-right: 2px;" width="10px" height="11px" alt="" title="<?=$sep_title?>"/></a><? } ?></td>
<td class="main_td002">&nbsp;<?=$face_image?><?=$name?></td>
<td class="main_td003"><?=$vote?></td>
<td class="main_td003"><?=$hit?></td>
</tr>
