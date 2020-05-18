<?php


	$sitelink2 = $data[sitelink2];
	$memo = str_replace("<table border=0 cellspacing=0 cellpadding=0 width=100% style=\"table-layout:fixed;\"><col width=100%></col><tr><td valign=top>","<table border=0 cellspacing=0 cellpadding=0 width=100% style=\"table-layout:fixed;\"><col width=100%></col><tr><td valign=top class=view_003>",$memo);
    if (preg_match("/<pre/i", $memo)){
		$memo = str_replace("<br>", "", $memo);
		$memo = str_replace("<br />", "", $memo);

	}
	
	if (preg_match("/<iframe/", $memo)){
		$memo = str_replace("iframe", "iframe style='display:block; width:100%'", $memo);
	}
	
	if (preg_match("/bbs\/data/", $memo)){
		 $memo = str_replace("img", "!--", $memo);
	}
	
	
	//$memo = str_replace("data", "bbs/data", $memo);
	
	
	if (preg_match("/data/i", $memo)){
	//	$memo = str_replace("data", "http://swave.woobi.co.kr/bbs/data", $memo);
		

	}
	
		
	
	
	$viewWidth = 400;
	//$sitelink1 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$sitelink1);
	$sitelink2 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$sitelink2);
	$a_file_link1 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$a_file_link1);
	$a_file_link2 = str_replace(">","<span onmouseover=\"this.style.textDecoration='underline'\" onmouseout=\"this.style.textDecoration='none'\">",$a_file_link2);

	if(eregi("\.gif|\.png|\.bmp|\.jpg|\.jpeg",$data[file_name1])) { // 파일1 확장자 검사시작
	$img_name = $data[file_name1];
	$temp = @GetImageSize($img_name);
	
	if($temp[0] <= $viewWidth ) { // <- 사이즈보다 작은이미지면 아래와 같이 적용, 그대로 출력하고
			$light_image1 = "<img src=\"http://www.swave.woobi.co.kr/bbs/data/doc/$file_name1\" style='max-width:100%; height:auto; margin: 10px;' border='0' />"; 
		}elseif($temp[0] > $viewWidth ) { // <- 사이즈보다 크다면 아래와 같이 리사이즈하고 라이트박스 적용하고
			$height = 540*$temp[0]/$temp[1];
			$light_image1 = "<a href=\"http://www.swave.woobi.co.kr/bbs/data/doc/$file_name1\" rel=\"lightbox\"><img style=\"max-width:100%;
    height:auto;\" src=\"http://www.swave.woobi.co.kr/bbs/data/doc/$file_name1\" alt=\"크게보기\" title=\"크게보기\" width=\"540px\" height=\"$heigth\" class=\"list_img\" onmouseover=\"this.className='list_img_over'\" onmouseout=\"this.className='list_img_out'\" /></a>"; 
		}
	}
	else { // 없다면 출력말것
	$light_image1 = ""; }


	if(eregi("\.gif|\.png|\.bmp|\.jpg|\.jpeg",$data[file_name2])) { // 파일2 확장자 검사시작
	$img_name = $data[file_name2];
	$temp = @GetImageSize($img_name);
		if($temp[0] <= $viewWidth ) { // <- 사이즈보다 작은이미지면 아래와 같이 적용, 그대로 출력하고
			$light_image2 = "<img src='$data[file_name2]' style='margin: 10px;' border='0' />"; 
		}elseif($temp[0] > $viewWidth ) { // <- 사이즈보다 크다면 아래와 같이 리사이즈하고 라이트박스 적용하고
			$height = 540*$temp[0]/$temp[1];
			$light_image2 = "<a href=\"$data[file_name2]\" rel=\"lightbox\"><img src=\"$data[file_name2]\" alt=\"크게보기\" title=\"크게보기\" width=\"540px\" height=\"540px\" class=\"list_img\" onmouseover=\"this.className='list_img_over'\" onmouseout=\"this.className='list_img_out'\" /></a>"; 
		}
	}
	else { // 없다면 출력말것
	$light_image2 = ""; }

	?>


<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0">
<tr height="10px"><td></td></tr>
</table>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" class="view_tb">
<!-- 제목출력 -->
<colgroup><col><col width="40%" align="left" ></colgroup>
<tr style="height: 27px;background-color:#FBFAF7;">
<td class="view_001" colspan="2"><img src="<?=$dir?>/images/icon_sm_page_white.gif" style="margin-right: 3px;" align="left" alt="" /><b><?=$subject?></b></td>
</tr>

<tr style="height: 1px;background-color:#E1E1E1;"><td colspan="2"></td></tr>

<!-- 작성자 출력 -->
<tr>
<td class="view_name">
<?=$face_image?><?=$name?>
<?
if($is_admin) {$ip="ip address : ".$data[ip]."";
echo $ip;
}


?> 
</td>
<td class="view_home" align="right"><b><?=$date?></b>
<?


$filename1 = str_replace("/home/swave50/www","",$data[file_name1]);
$filename2 = str_replace("/home/swave50/www","",$data[file_name2]);

//$filename1 = $data[file_name1];
if($data['homepage']) {
?><img src="<?=$dir?>/images/icon_sm_home.gif" style="margin-right: 3px;" align="left" alt="홈페이지" /><a class="link_vote" href="<?=$data['homepage']?>" target="_blank">홈페이지</a>
<?
}
?>
</td>
</tr>

<tr style="height: 4px;">
<td colspan="2" align="center"><div class="layer_dot1"></div></td>
</tr>

<!-- 링크, 첨부파일 출력 -->
<? if($sitelink1 or $file_name1 or $file_name2){ ?> 
<tr>
<td colspan=2>
<div id="all_file" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid;">
	<table width="100%" cellSpacing="0" cellpadding="0" class="com_tb">
	<tr>
	<td class="cmtt_004">
	<?=$hide_sitelink1_start?><img src="<?=$dir?>/images/icon_sm_link.gif" style="margin-right:3px; " align="left" alt="" />
	<?if($sitelink1){
		$a_sitelink1 = $sitelink1;
		}?>
	<?if($sitelink1){
		if( preg_match("/디시인사이드|디시|dcinside|DCINSIDE/", $sitelink1)){
		$temp = $sitelink1;
		// echo "<script>alert('okay');</script>";
		$a_sitelink1 = "http://gall.dcinside.com/board/lists/?id=physicalscience";
		}}?>
		<?if($sitelink1){
		if( preg_match("/bric/", $sitelink1) || preg_match("/BRIC/", $sitelink1)){
		$temp = $sitelink1;
		// echo "<script>alert('okay');</script>";
		$a_sitelink1 = "http://bric.postech.ac.kr/myboard/list.php?Board=sori";
		}}?>
	<?if($sitelink1){
		if( preg_match("/KIN/", $sitelink1)){
		$temp = $sitelink1;
		// echo "<script>alert('okay');</script>";
		$a_sitelink1 = "http://kin.naver.com/index.nhn";
		}}?>
	
		
	<a href="<?=$sitelink1?>"><?=$sitelink1?></td>
	</tr>
	<tr>
	<td class="cmtt_004"><?=$hide_download1_start?><img src="<?=$dir?>/images/icon_sm_file.gif" style="margin-right:3px;" align="left" alt="" /><?=$a_file_link1?><b><?=$file_name1?></b></a>&nbsp;<span style="font: 8pt;color:#cdcbcb;">|</span>&nbsp;<?=$file_size1?>&nbsp;/ <?=$file_download1?>&nbsp;Download <?=$hide_download1_end?>
	<?=$hide_download2_start?><img src="<?=$dir?>/images/icon_sm_file.gif" style="margin-right:3px;" align="left" alt="" /><?=$a_file_link2?><b><?=$file_name2?></b></a>&nbsp;<span style="font: 8pt;color:#cdcbcb;">|</span>&nbsp;<?=$file_size2?>&nbsp;/ <?=$file_download2?>&nbsp;Download <?=$hide_download2_end?></td>
	
<a href="thumb.php?id=<?=$id?>&filename=<?=$data[file_name1]?>">썸네일이미지</a>
	</tr>
	</table>
</div>
</td>
</tr>
<? } 

$sns_postlink="http://m.swave.woobi.co.kr/view/$id/$no";

?> 


<!-- 트위터 페이스북 링크 추천 비추천 -->
<tr>

<td colspan="2">
<div id="sticky" style="display:inline;z-index:9999">
	
		<a href="javascript:;" onclick="window.open('https://twitter.com/intent/tweet?&text=<?=urlencode(substrhan(str_replace('&nbsp;','',strip_tags($subject)),100,'...').substrhan(str_replace('&nbsp;','',strip_tags($memo)),100,'...'))?>&url=<?=urlencode($sns_postlink)?>', '_blank');" target="_self">
		<img style="margin:5px 0px 0 5px" src="<?=$dir?>/images/twitter_icon.png" /></a>
					<a onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(substrhan(str_replace('&nbsp;','',strip_tags($memo)),100,'...'))?>', 'sharer','toolbar=0,status=0,width=1000,height=600');" target="_self">
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


<!-- 내용출력 -->
<tr>
<td class="view_003" colspan="2">

<?
if (preg_match("/bbs/",$filename1)){
}
else $filename1 = str_replace("data","bbs/data",$filename1);


?>
<?
if (preg_match("/bbs/",$filename1)){?>
<a class="magnifik" href="http://swave.woobi.co.kr/<?=$filename1?>">
    <!-- the thumbnail -->
<img src="http://swave.woobi.co.kr/<?=$filename1?>">
</a>

<?}?>


<?
if (preg_match("/bbs/",$filename2)){?>
<a class="magnifik" href="http://swave.woobi.co.kr/<?=$filename2?>">
    <!-- the thumbnail -->
<img src="http://swave.woobi.co.kr/<?=$filename2?>">
</a>

<?}?>


<?=$memo?>
</td>
</tr>




<? if ($sitelink2){?>
<tr style="height: 4px;">
<td colspan="2" align="left">

<img src="<?=$dir?>/images/icon_sm_tags.gif" style="margin-right:3px;" />태그 : <span class="list_img_title"><?=$data[sitelink2]?></span>

</td>
</tr>
<?}?>


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
?>

<tr style="height: 4px;">
<td colspan="2" align="center"><div class="layer_dot1"></div></td>
</tr>



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


<?
// $subject = preg_replace('/\s+/','',$subject);
$subject = str_replace("\n", "", $subject);
$subject = str_replace("\r", "", $subject);
$subject = $subject."- SWAVE";



if($data[is_secret]==null){
	$data[is_secret]=0;
	
}


?>

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