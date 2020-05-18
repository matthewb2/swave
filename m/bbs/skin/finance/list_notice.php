<?php
// 코멘트 개수의 [ ] 없애고
$comment_num = str_replace("[","",$comment_num); 
$comment_num = str_replace("]","",$comment_num); 
// 제목에만 underline 적용하고
$subject = preg_replace("/>([^<])/","><span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">\\1",$subject);
$subject = preg_replace("/([^>])<\//","\\1</span></",$subject);
?>

<tr style="height: 26px;background-color:#fffcb4">
<td class="main_td003"><?=$hide_cart_start?><input type="checkbox" name="cart" value="<?=$data[no]?>" /><?=$hide_cart_end?><b>공지</b></td>
<td class="main_td003"><?=$reg_date?></td>
<td class="main_td002"><img src="<?=$dir?>/images/icon_sm_warning.gif" style="margin-right: 3px;"/><?=$subject?>&nbsp;<?=$comment_num?></td>
<td class="main_td002">&nbsp;<?=$face_image?><?=$name?></td>
<td class="main_td003"><?=$vote?></td>
<td class="main_td003"><?=$hit?></td>
</tr>
