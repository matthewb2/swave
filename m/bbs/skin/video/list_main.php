<?php



$list_empty = false;

$subject = str_replace("[re]" ,"<img src=\"$dir/images/reply_head.gif\" align=\"absMiddle\" alt=\"답변글\" />", $subject); 
	

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

// 업로드한 파일이 xls(확장자 검사)일때 리스트에 출력하기 - 20060906 (ganji)
if(preg_match("/.xlsx$/",$data[file_name1])) { 
	if($data[is_secret]&&!$is_admin&&$data[ismember]!=$member[no]&&$member[level]>$setup[grant_view_secret]) {
		$list_image1 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/xls_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	} elseif ($member[level]>$setup[grant_view]) {
		$list_image1 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/xls_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	}else {
		$list_image1 = "<a href=\"$data[file_name1]\" rel=\"lightbox\"><img src=\"$dir/images/xls_list_img1.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";		
	}
}


if(preg_match("/.xlsx$/",$data[file_name2])) { 
	if($data[is_secret]&&!$is_admin&&$data[ismember]!=$member[no]&&$member[level]>$setup[grant_view_secret]) {
		$list_image2 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/xls_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	} elseif ($member[level]>$setup[grant_view]) {
		$list_image2 = "<a href=\"$dir/images/secret_img.gif\" rel=\"lightbox\"><img src=\"$dir/images/xls_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";;
	}else {
		$list_image2 = "<a href=\"$data[file_name2]\" rel=\"lightbox\"><img src=\"$dir/images/xls_list_img2.gif\" width=\"10px\" height=\"10px\" style=\"margin-right:3px;\" align=\"absMiddle\" border=\"0\" alt=\"미리보기\" /></a>";		
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

$category_name = preg_replace("/\s+/","",$category_name);
if ($category_name == "&nbsp;"){
	$category_name = "일반";
}


//mobile
$mobile = $data[reply_mail];
if ($mobile == "T") $mobile = "<img title='모바일 작성글' style='vertical-align: bottom;' src=$dir/images/icon_mobi.jpg>";
?>

<?
	// $subject = str_replace(">","><font class=list_han>",$subject);
	$name= str_replace(">","><font class=list_han>",$name);
?>


 
  <? if (preg_match('/youtube/', $data[sitelink1])){ 
  
				$pc = explode("v=", $data[sitelink1]);
		   ?>
	<tr>
	<td style="width:100%;padding:20px 20px 0px 20px" onclick="window.location='view.php?id=<?=$id?>&no=<?=$data[no]?>'">		
	<a href='view.php?id=<?=$id?>&no=<?=$data[no]?>'><img width="100%" data-echo="http://img.youtube.com/vi/<?=$pc[1]?>/hqdefault.jpg" />
    
	</a>
	</td></tr>
	<tr>
	 
		<td onclick="window.location='view.php?id=<?=$id?>&no=<?=$data[no]?>'">
		   <div style="padding:0 40px 10px 20px; height:auto; ">
			<span style="font-size:10pt;paddingL5px;color:#666666"><a href='view.php?id=<?=$id?>&no=<?=$data[no]?>'><?=$data['subject']?></a>
			<br><font size="2pt" color="gray">조회:<?=$hit?>&nbsp;&nbsp;공감:<?=$vote?></font>
			</span>
			</div>
		</td>
	
	 </tr>
		
		<tr><td width='90%' style='height:1px; border-bottom:1px solid #ddd'></td></tr>
		   
  <? } else {?>  
  <tr>
  
 <td style="vertical-align:middle"><span style="font-size:10pt;color:#666666">
 <a href='view.php?id=<?=$id?>&no=<?=$data[no]?>'><?=$data['subject']?></a></span>
	<br><font size="2pt" color="gray">조회:<?=$hit?>&nbsp;&nbsp;공감:<?=$vote?></font>
 </td>
 
  <a href='view.php?id=<?=$id?>&no=<?=$data[no]?>'><img width="300px" src=<?=$data[file_name1]?> />
  </a>
  </td>
      
</tr>

  
  
  <?}?>
 
<script type="text/javascript">


  


function changeTitle(title) {
			$(document).prop('title', title);
   
}

title = "과학전문검색 SWAVE";
changeTitle(title);

</script>

