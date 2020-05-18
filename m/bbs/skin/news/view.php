<?php


	$memo = str_replace("<table border=0 cellspacing=0 cellpadding=0 width=100% style=\"table-layout:fixed;\"><col width=100%></col><tr><td valign=top>","<table border=0 cellspacing=0 cellpadding=0 width=100% style=\"table-layout:fixed;\"><col width=100%></col><tr><td valign=top class=view_003>",$memo);
    if (preg_match("/<pre/i", $memo)){
		$memo = str_replace("<br>", "", $memo);
		$memo = str_replace("<br />", "", $memo);
	}
	$file_name1 = str_replace("/home/swave50/www/bbs/","",$data[file_name1]);
	
	
	if (preg_match("/<iframe/", $memo)){
		$memo = str_replace("iframe", "iframe style='display:block; width:100%'", $memo);
	}
	// include "badtogood.php";
	
		if ($id == "guest"){	
			foreach($badwords as $key=>$value){
			$memo = str_replace($key, $value,$memo);
			$subject = str_replace($key, $value,$subject);
			$name = str_replace($key, $value,$name);
			}
		}
	$viewWidth = 400;
	//$sitelink1 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$sitelink1);
	$sitelink2 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$sitelink2);
	$a_file_link1 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$a_file_link1);
	$a_file_link2 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$a_file_link2);
	
	
	
	if(eregi("\.gif|\.png|\.bmp|\.jpg|\.jpeg",$data[file_name1])) { // 파일1 확장자 검사시작
	$img_name = "/home/swave50/www/".$data[file_name1];
	$temp = @GetImageSize($img_name);
	
	if($temp[0] <= $viewWidth ) { // <- 사이즈보다 작은이미지면 아래와 같이 적용, 그대로 출력하고
			//echo "<script>alert('test');</script>";
			$light_image1 = "<img src='http://www.swave.woobi.co.kr/bbs/$file_name1' style='max-width:100%; height:auto; margin: 10px;' border='0' />"; 
		}elseif($temp[0] > $viewWidth ) { // <- 사이즈보다 크다면 아래와 같이 리사이즈하고 라이트박스 적용하고
			$height = 540*$temp[0]/$temp[1];
			$light_image1 = "<a href=\"http://www.swave.woobi.co.kr/$file_name1\" rel=\"lightbox\">
			<img style=\"max-width:100%;
    height:auto;\" src=\"$data[file_name1]\" alt=\"크게보기\" title=\"크게보기\" width=\"540px\" height=\"$heigth\" class=\"list_img\" onmouseover=\"this.className='list_img_over'\" onmouseout=\"this.className='list_img_out'\" /></a>"; 
		}
	}
	else { // 없다면 출력말것
	$light_image1 = ""; }


	if(eregi("\.gif|\.png|\.bmp|\.jpg|\.jpeg",$data[file_name2])) { // 파일2 확장자 검사시작
	$img_name = $data[file_name2];
	$temp = @GetImageSize($img_name);
		if($temp[0] <= $viewWidth ) { // <- 사이즈보다 작은이미지면 아래와 같이 적용, 그대로 출력하고
			$light_image2 = "<img src='http://www.swave.woobi.co.kr/bbs/$data[file_name2]' style='max-width:100%; height:auto; margin: 10px;' border='0' />"; 
		}elseif($temp[0] > $viewWidth ) { // <- 사이즈보다 크다면 아래와 같이 리사이즈하고 라이트박스 적용하고
			$height = 540*$temp[0]/$temp[1];
			$light_image2 = "<a href=\"http://www.swave.woobi.co.kr/bbs/$data[file_name2]\" rel=\"lightbox\"><img src=\"$data[file_name2]\" alt=\"크게보기\" title=\"크게보기\" width=\"540px\" height=\"540px\" class=\"list_img\" onmouseover=\"this.className='list_img_over'\" onmouseout=\"this.className='list_img_out'\" /></a>"; 
		}
	}
	else { // 없다면 출력말것
	$light_image2 = ""; }
$sns_postlink="http://m.swave.woobi.co.kr/bbs/view.php?id=$id&no=$no";
	?>


<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0">
<tr height="10px"><td></td></tr>
</table>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" >
<!-- 제목출력 -->
<colgroup><col><col></colgroup>
<tr>
<td colspan="2" style="padding:10px">
	<span style="font-weight:bold; font-size:14pt;"><?=$subject?></span></td>

</tr>


<!-- 작성자 작성일 글자 크기 출력 -->
<tr>
<td colspan="2" style="padding:0 0 0 10px">
<?=$data['name']?>&nbsp;<?=$date?>

<?
if($is_admin) {$ip="ip address : ".$data[ip]."";
echo $ip;
}


?> 
</td>
</tr>

<!-- 링크, 첨부파일 출력 -->
<? if($sitelink1 or $file_name1 or $file_name2){ ?> 
<tr>
<td colspan=2>
<div id="all_file" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid;">
	<table width="100%" cellSpacing="0" cellpadding="0" class="com_tb">
	<tr>
	<td class="cmtt_003" onclick="window.location='<?=$data[sitelink1]?>'">
	<?=$hide_sitelink1_start?><img src="<?=$dir?>/images/icon_sm_link.gif" style="margin-right:3px; " 
	align="left" alt="" />
	<a style="color:#666666"><?=$data[sitelink1]?></a>&nbsp;&nbsp;<?=$hide_sitelink1_end?></td>
	</tr>
	
	</table>
</div>
</td>
</tr>
<? } ?> 


<!-- 트위터 페이스북 링크 추천 비추천 -->
<tr>

<td colspan="2">
<div id="sticky" style="display:inline;z-index:9999">
	
		<a href="javascript:;" onclick="window.open('https://twitter.com/intent/tweet?&text=<?=urlencode(subject_cut(str_replace('&nbsp;','',strip_tags($subject)),80).subject_cut(str_replace('&nbsp;','',strip_tags($memo)),90))?>&url=<?=urlencode($sns_postlink)?>', '_blank');" target="_self">
		<img style="margin:5px 0px 0 5px" src="<?=$dir?>/images/twitter_icon.png" /></a>
			
	<a href="javascript:;" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(substrhan(str_replace('&nbsp;','',strip_tags($memo)),100,'...'))?>', 'sharer','toolbar=0,status=0,width=1000,height=600');" target="_self">
					<img style="margin-top:5px" src="<?=$dir?>/images/facebook_icon.png" /></a>
		
		<div style="width:100px; height:30px; display:inline-block;">
		<table border=0>
			<tr>
				<td style="font-size:9pt; padding:3px; vertical-align:middle">
				조회 : <?=number_format($hit)?>
				</td>
			</tr>
			</table>
		</div>
		<div style="width:60px; height:30px; display:inline-block;">
			
			<table border=0>
			<tr>
				<td style="width:40px;font-size:9pt; padding:3px; vertical-align:middle">
				<span style="width:40px;font-size:9pt; margin-top: 10px;" onclick="AddClick()">공감</span>
				</td>
				<td id="cc1" style="font-size:9pt;display:inline-block;margin-top:5px">
				</td>
			</tr>
			</table>
		</div>
		<div style="width:90px; height:30px; display:inline-block;">
			
			<table border=0>
			<tr>
				<td style="width:40px;font-size:9pt; padding:3px; vertical-align:middle">
				<span style="width:40px;font-size:9pt; margin-top: 10px;" onclick="AddClick2()">비공감</span>
				</td>
				<td id="cc2" style="font-size:9pt;display:inline-block;margin-top:5px">
				</td>
			</tr>
			</table>
		</div>
</div>

</td>
</tr>

</table>
</div>
</td>
</tr>




<tr>
<td>
<?
if($data['homepage']) {
?><img src="<?=$dir?>/images/icon_sm_home.gif" style="margin-right: 3px;" align="left" alt="홈페이지" /><a class="link_vote" href="<?=$data['homepage']?>" target="_blank">홈페이지</a>
<?
}
?>
</td>

</tr>



<?


$amemo = strip_tags($memo);
$amemo = $subject.$amemo;
$amemo = preg_replace("/[#\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $amemo);

$amemo = str_replace("'", "", $amemo);
$amemo = str_replace('"', "", $amemo);

$amemo = str_replace('"', '', $amemo); 
$amemo = str_replace("100", "", $amemo); 
$amemo = str_replace("130", "", $amemo); 
$amemo = str_replace("0 0 0", "", $amemo); 
$amemo = str_replace("..", "", $amemo); 
$amemo = str_replace("     ", "", $amemo); 
$amemo = str_replace("朴", "박", $amemo); 
$amemo = str_replace("前", "전", $amemo); 
$amemo = str_replace("nbsp", "", $amemo); 


include "include/Html2Text.php";
$html = new Html2Text($amemo);

$amemo = $html->getText();  // Hello, "WORLD"

$amemo = str_replace('"', "", $amemo);
$amemo = str_replace("'", "", $amemo);

preg_match_all("/[\xA1-\xFE]/i", $amemo, $temp);

foreach ($temp as $key=>$val){
	$han_len += sizeof($val);
}
//echo $han_len;
preg_match_all("/[aA-zZ]/i", $amemo, $temp);

foreach ($temp as $key=>$val){
	$eng_len += sizeof($val);
}
//echo $han_len;


if( $han_len > $eng_len){
	
$lang = "ko-kr";
$amemo = mb_substr($amemo, 0, 600);
//echo $amemo;

} else {$lang = "en-us";

$amemo = substr($amemo, 0, 1000);

}
//echo $amemo;
//echo $lang;
?>


<? $apikey="9d94286f0ea4437bb721d946928e2d4e";?>
<tr>
<td colspan="2">
	<table border="0" width="100%">
		<tr>
		<td width="250px">
		 <audio controls style="padding:5px 0 0 0;width:100%">
		  <source src="http://api.voicerss.org/?key=<?=$apikey?>&hl=<?=$lang?>&src='<?=$amemo?>'" type="audio/mpeg">
		 </audio> 
		</td>
		<td>
		<div id="fontlinks" style="margin:0px; padding:0px 0 0 0">
				<button id="incfont" class="button buttonfont">가+
				<button id="decfont" class="button buttonfont">가-
		</div>
	 

		 </td>
		 </tr>
	 </table>
	 
 </td>

 </tr>
  

<!--내용 출력-->
<tr>
<td colspan="2">
<?=$memo?>
</td>
</tr>



<tr>
<td colspan="2"></td>
</tr>

<!-- 조회수, 추천수출력 -->
<tr>
<td class="view_vote" style="padding:0px 0px 0px 10px;">
<? $sns_postlink="http://m.swave.woobi.co.kr/bbs/view.php?id=$id&no=$no";
function substrhan($str, $len, $footer='') {
if(strlen($str) <= $len) {
return $str;
}
else {
$len = $len - strlen($footer);
for($i=0; $i<$len; $i++) if(ord($str[$i])>127) $i++;
if($i > $len) $i-=2;
$str=substr($str,0,$i);
return $str.$footer;
}
}



if($sitelink2){ ?><img src="<?=$dir?>/images/icon_sm_tags.gif" style="margin-right:3px;" />태그 : <span class="list_img_title"><?=$data[sitelink2]?></span><? } ?></td>


<!-- 추천 반대 표시 -->


</tr>



<? 



if($data[is_secret]==null){
$data[is_secret]=0;}

?>

	<!-- 목록 수정 글쓰기 버튼 -->
		<tr>
		<td colspan="2" align="left" ><?=$a_list?>
		<img style="margin-left:10px" src="<?=$dir?>/images/btn_view_list.gif" alt="목록보기" /></a>
		<?=$a_modify?><img src="<?=$dir?>/images/modify_btn.gif" style="margin-left:5px;" alt="수정하기" /></a><?=$a_delete?><img src="<?=$dir?>/images/btn_delete.gif" style="margin-left:5px;" alt="삭제하기" /></a>
		<?=$a_write?><img style="float:right; margin-right:10px" src="<?=$dir?>/images/btn_post.gif" alt="새글쓰기" /></a>
		</td>
		</tr>

		<tr><td colspan="2" height="50px"></td></tr>


		<tr><td colspan="2" height="10px"></td></tr>


		<tr>
		<td colspan="2" align="center">
		<?=$hide_comment_start?>


		<tr><td valign="top">
		<? if(!$comment_num){ ?> 
		<div id="no_comment" style="width:100%; height:30px; font: bold 9pt 굴림; color: #E08600; text-align: center; padding: 10px; overflow:hidden">등록된 댓글이 없습니다.</div>
		<? } 
		?>
		</td>
		</tr>

	<tr>
		<td colspan="2" style="padding: 5px;">
		<a name="ccm"><span id="layer_tg01" class="com_num" style="cursor:pointer;"
		onclick="document.getElementById('cmt_ly_tg').style.display='none';
		document.getElementById('layer_tg01').style.display='none';
		document.getElementById('layer_tg02').style.display='block';">

		댓글 <?=$comment_num?>
		</span></a>
		<a href="#"><span class="com_num">새로고침</span>
		<img style="vertical-align:middle" src="<?=$dir?>/images/reload.jpg" /></a>
		<a name="ccm"><span id="layer_tg02" class="com_num" style="cursor:pointer;display:none"   onclick="document.getElementById('cmt_ly_tg').style.display='block';document.getElementById('layer_tg01').style.display='block';document.getElementById('layer_tg02').style.display='none';">코멘트 <?=$comment_num?></span></a>
		</td>
	</tr>
</table>




<script type="text/javascript">


function changeTitle(title) {
			$(document).prop('title', title);
   
}

title = "<?=$subject?>";
changeTitle(title);

</script>


<script>
		//alert("test");
		no = "<?=$no?>";
		id = "<?=$id?>";
		good = "<?=$vote?>";
		bad = "<?=$data[is_secret]?>";   // use is_secret field to bad
		//document.getElementById('cc1_<?=$no?>').innerHTML = '<img src=/bbs/gd.php?num='+good+'>';
	document.getElementById('cc1').innerHTML = '<img src=/bbs/gd.php?num='+good+'>';
	document.getElementById('cc2').innerHTML = '<img src=/bbs/gd.php?num='+bad+'>';
		
	function AddClick(){
		good = Number(good)+1;
		vo = id+no;
		//alert(good);
		//var uniq = 'id' + (new Date()).getTime();
		var yetVote = sessionStorage.getItem(vo);
		if (typeof(yetVote) !== "undefined"){
					sessionStorage.setItem(vo, true);
					document.getElementById('cc1').innerHTML = '<img src=/bbs/gd.php?num='+good+'>';
			//request with URL,data,success callback
				$.post("votetest.php",
					{
						
						no: no,
						id: id,
						good: good,
						bad: bad
					},
					function(){
					//	alert("공감되었습니다");
					});
		
		} else alert("이미 공감하셨습니다");
	}
	
	function AddClick2(){
		bad = Number(bad)+1;
		vo = id+no;
		//alert(good);
		//var uniq = 'id' + (new Date()).getTime();
		var yetVote = sessionStorage.getItem(vo);
		if (typeof(yetVote) !== "undefined"){
					sessionStorage.setItem(vo, true);
					document.getElementById('cc2').innerHTML = '<img src=/bbs/gd.php?num='+bad+'>';
			//request with URL,data,success callback
				$.post("votetest.php",
					{
						no: no,
						id: id,
						good: good,
						bad: bad
					},
					function(){
						//alert("비공감되었습니다");
					});
		
		} else alert("이미 비공감하셨습니다");
	}
	
</script>

<script>

$(window).scroll(function(){
  var sticky = $('#sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
</script>


 
 <script type="text/javascript">
	 $(document).ready(function() { 
		$('#incfont').click(function(){	   
        curSize= parseInt($('.view_003').css('font-size')) + 1;
		//alert(curSize);
		if(curSize<=24)
        $('.view_003').css('font-size', curSize);
        });  
		$('#decfont').click(function(){	   
        curSize= parseInt($('.view_003').css('font-size')) - 1;
		if(curSize>=8)
        $('.view_003').css('font-size', curSize);
        }); 
		
	});
	

</script>
