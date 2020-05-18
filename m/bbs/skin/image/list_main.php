<?php
$list_empty = false;

//$subject = str_replace("[re]" ,"<img src=\"$dir/images/reply_head.gif\" align=\"absMiddle\" alt=\"답변글\" />", $subject); 
	
//	include "badtogood.php";

/*	
if ($id == "guest"){			
	foreach($badwords as $key=>$value){
	// $memo = str_replace($key, $value,$memo);
	$subject = str_replace($key, $value,$subject);
	}
	$pattern = '/[\xa1-\xfe]/';
	if (preg_match_all($pattern, $name, $match)){
	$str = implode('', $match[0]);
	$name = mb_substr($str, 0, 4).str_repeat("*", mb_strlen($str)-2);
	}
}
	
*/


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
	//$subject = str_replace(">","><font class=list_han>",$subject);
	$name= str_replace(">","><font class=list_han>",$name);

$max_show_image=3;  //한 줄에 보여줄 이미지의 개수

 $size=@getimagesize($data[file_name1]);
   if($size[0] == 0 ) $size[0]=1;
   if($size[1] == 0 ) $size[1]=1;
   if($size[0]>$size[1]) { $per=$size_factor / $size[0]; }
    else                 { $per=$size_factor / $size[1]; }
   $x_size=$size[0]*$per;
   $y_size=$size[1]*$per;
   $temp = $data[file_name1];
   $temp = preg_replace("/data\/image\//","",$temp);
   
   
   $temp = preg_replace("/\/bbs\//","",$temp);
   $temp = str_replace("/home/swave50/www","",$temp);
   //echo $temp;
   $img_name="http://swave.woobi.co.kr/bbs/data/image/resized/".$temp;
   $url=@getimagesize($img_name);

		if(!is_array($url))

		{
		$image_name = "http://swave.woobi.co.kr/bbs/images/no_photo_icon.PNG";   // 이미지 오류일 때 보여주는 이미지
		}
   
   $win_width = $size[0] + 10;
   $win_height = $size[1] + 50;
   $view_img="<a href='view.php?id=$id&no=$data[no]' onFocus='this.blur()'>";
   
?>
<td width=<?echo (100 / $max_show_image);?>% valign=top align=center style='padding:15 5 5 0;background:#ffffff'>
<?=$hide_cart_start?><input type="checkbox" class="check" name="cart" value="<?=$data[no]?>" /><?=$hide_cart_end?><?=$new_bold?>
  <?=$view_img?>
  <div class="promo">  
  <img src="<?=$img_name?>" style="filter:gray" onmouseover="this.style.filter=''" 
  onmouseout="this.style.filter='gray'" onmouseout="this.src='<?=$img_name?>'" width='100%' height='100%' border="0" style="cursor:pointer; background:url(<?=$img_name?>) no-repeat"></a>
			</a>
	
		</div>
</td>
	

<?
  $image_loop++;
  if($image_loop>=$max_show_image)
  {
     echo"
       	</tr>
	<tr align=center>";
     $image_loop=0;
  }
?>



<script type="text/javascript">


function changeTitle(title) {
			$(document).prop('title', title);
   
}

title = "과학전문검색 SWAVE";
changeTitle(title);

</script>