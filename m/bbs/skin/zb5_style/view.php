<?php
$path = "/home/swave50/www/bbs/data/doc/";

$filesize =floor(filesize($path.$file_name1)/1024);

if ($filesize >1024) $fsize = round($filesize/1024,2)."MB";
else $fsize = floor($filesize)."KB";

	$memo = make_links_clickable($memo);
	
	$memo = str_replace("<table border=0 cellspacing=0 cellpadding=0 width=100% style=\"table-layout:fixed;\"><col width=100%></col><tr><td valign=top>","<table <td valign=top class=view_003>",$memo);
    
	$memo = str_replace("<table","<table style='overflow-x: scroll;' class='wrap-table' width='100%'>",$memo);
    $memo = str_replace("class=\"nb\" style=\"width:600px\">", "",$memo);
    $memo = str_replace("border=\"1\" style=\"width:598px\">", "",$memo);
    $memo = str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",$memo);
	$memo = str_replace("style=\"width:500px\"","",$memo);
	
	
	
	$IMG_ROOT = "http://swave.woobi.co.kr";
	
	$memo = preg_replace('/<img([^>]*)src=["\']([^"\'\\/][^"\']*)["\']/', '<img\1src="'.$IMG_ROOT.'\2"', $memo);
	
    
	if (preg_match("/<pre/i", $memo)){
		$memo = str_replace("<br>", "", $memo);
		$memo = str_replace("<br />", "", $memo);
	}
	
	$memo = str_replace("data","/bbs/data",$memo);
	
	
	if (preg_match("/<iframe/", $memo)){
		$memo = str_replace("iframe", "iframe style='display:block; width:100%'", $memo);
	}
	
	//$memo = str_replace("data","ddddd",$memo);
	
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
			$light_image2 = "<img src='http://www.swave.woobi.co.kr/bbs/data/<?=$id?>/$data[file_name2]' style='max-width:100%; height:auto; margin: 10px;' border='0' />"; 
		}elseif($temp[0] > $viewWidth ) { // <- 사이즈보다 크다면 아래와 같이 리사이즈하고 라이트박스 적용하고
			$height = 540*$temp[0]/$temp[1];
			$light_image2 = "<a href=\"http://www.swave.woobi.co.kr/bbs/$data[file_name2]\" rel=\"lightbox\"><img src=\"$data[file_name2]\" alt=\"크게보기\" title=\"크게보기\" width=\"540px\" height=\"540px\" class=\"list_img\" onmouseover=\"this.className='list_img_over'\" onmouseout=\"this.className='list_img_out'\" /></a>"; 
		}
	}
	else { // 없다면 출력말것
	$light_image2 = ""; }
$sns_postlink="http://m.swave.woobi.co.kr/view/doc/$no";
	?>


<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0">
<tr height="10px"><td></td></tr>
</table>

<table style="table-layout:fixed">
		<!-- 제목출력 -->
		<colgroup><col><col></colgroup>
		<tr style="height: 27px; background-color:#FBFAF7;">
		<td colspan="2" class="view_001"><img src="<?=$dir?>/images/icon_sm_page_white.gif" style="margin-right: 3px;" align="left" alt="" /><b><?=$subject?></b></td>
		</tr>

		<tr style="height: 1px;background-color:#E1E1E1;"><td colspan="2"></td></tr>

		<!-- 작성자 출력 -->
		<tr>
		<td class="view_name">
		<?=$face_image?><?=$name?>&nbsp;<b><?=$date?></b>

		<?
		if($is_admin) {$ip="ip address : ".$data[ip]."";
		echo $ip;
		}


		?> 
		</td>

		<td class="view_home" align="right">
		<?
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
			<a><?=$sitelink1?></a>&nbsp;&nbsp;<?=$hide_sitelink1_end?></td>
			</tr>
			<tr>
			<td class="cmtt_004"><?=$hide_download1_start?>
			<img src="<?=$dir?>/images/icon_sm_file.gif" style="margin-right:3px;" align="left" alt="" />
			<a href="http://swave.woobi.co.kr/bbs/data/<?=$id?>/<?=$file_name1?>"><?=$file_name1?></a>&nbsp;
			<span style="font: 8pt;color:#cdcbcb;">|</span>&nbsp;
			<?=$fsize?>&nbsp;/ <?=$file_download1?>&nbsp;Download 
			<?=$hide_download1_end?>
			<tr>
			<td class="cmtt_004">
			<?=$hide_download2_start?>
			<img src="<?=$dir?>/images/icon_sm_file.gif" style="margin-right:3px;" align="left" alt="" />
			<a href="http://swave.woobi.co.kr/bbs/data/<?=$id?>/<?=$file_name2?>"><?=$file_name2?></a>&nbsp;
			<span style="font: 8pt;color:#cdcbcb;">|</span>&nbsp;<?=$file_size2?>&nbsp;/ <?=$file_download2?>&nbsp;Download <?=$hide_download2_end?>
			</td>
			
			</tr>
			</table>
		</div>
		</td>
		</tr>
		<? } ?> 

		<!-- 썸네일출력 -->
		
		<? 
		
		if ($id == "image"){
		if($light_image1 or $light_image2){ ?> 
			<tr>
			<td colspan="2" align="center">
				<table cellSpacing="2" cellpadding="0" style="border: #E1E1E1 1px solid; margin-top: 10px">
				<tr>
				<td align="center" style="background-color:#FBFAF7; padding: 3px;"><span class="list_img_title">업로드 이미지</span></td>
				</tr>
				<tr>
				<td align="center" style="background-color:#FBFAF7;">
				<?=$light_image1?></td>
				</tr>
				<tr>
				<td align="center" style="background-color:#FBFAF7;"><?=$light_image2?></td>
				</tr>
				</table>
			</td>
			</tr>
		<? } 
		}
		?>
		<tr><td><a href="thumb.php?id=<?=$id?>&filename=<?=$data[file_name1]?>">썸네일이미지</a></td></tr>
		<?
		if($data[is_secret]==null){
		$data[is_secret]=0;}



		?> 


		<!-- 트위터 페이스북 링크 추천 비추천 -->
		<?
		include "skin/common/twitter_bar.php";
		?>


		</div>
		</td>
		</tr>


		<? 
		if (preg_match("/jpg/",$memo)){
		preg_match_all('@<img.*src="([^"]*)"[^>/]*/?>@Ui', $memo, $out);

		//print_r($out[1]);
		//echo $out[1][0];
		}

		?>

		<!--  음성지원 -->


<?

//$amemo = $subject.mb_substr($memo, 0, 1000);
$amemo = strip_tags($memo);
$amemo = $subject.$amemo;
$amemo = preg_replace("/[#\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $amemo);
//$amemo = preg_replace("/[a-z]/i", "", $amemo);

$amemo = str_replace("'", "", $amemo);
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

//mb_substr($amemo, 0, 1000);

if(preg_match("/[\xA1-\xFE][\xA1-\xFE]/", $amemo)){
$lang = "ko-kr";
$amemo = mb_substr($amemo, 0, 600);
//echo $amemo;

} else {$lang = "en-us";

$amemo = substr($amemo, 0, 1000);

}

//echo $amemo;
//echo $lang;
//echo mb_strlen($amemo);
?>
<?
	if ($lang == "en-us" && strlen($amemo)>30){
		// 음성 길이가 10보다 클 때만
	?>	
<tr>
<td colspan="2">
	<table border="0" width="100%">
		<tr>
		<td width="250px">
		 <audio controls style="padding:5px 0 0 0;width:100%">
		  <source src="http://api.voicerss.org/?key=8fe803833a774b3e85ca68b6b0d49e73&hl=<?=$lang?>&src='<?=$amemo?>'" type="audio/mpeg">
		 </audio> 
		</td>
		
		 </tr>
	 </table>
	 
 </td>

 </tr>
	<?}
	elseif($lang == "ko-kr" && mb_strlen($amemo)>200){
		?>
		
<tr>
<td colspan="2">
	<table border="0" width="100%">
		<tr>
		<td width="250px">
		 <audio controls style="padding:5px 0 0 0;width:100%">
		  <source src="http://api.voicerss.org/?key=8fe803833a774b3e85ca68b6b0d49e73&hl=<?=$lang?>&src='<?=$amemo?>'" type="audio/mpeg">
		 </audio> 
		</td>
		
		 </tr>
	 </table>
	 
 </td>

 </tr>
	<?}

	?>
  

		<!-- 내용출력 -->
		<tr>
		<td style="word-wrap:break-word; font-family: helvetica, meiryo, gulim; font-size:12pt" colspan="2">
		<?
					
 preg_match("/jpg|png/", $file_name1, $temp);
if ($temp[0] != null)
			 {
			$memo = "<a href='http://swave.woobi.co.kr/bbs/data/doc/$file_name1'><img src='http://swave.woobi.co.kr/bbs/data/doc/$file_name1' /></a>".$memo;
			echo $memo;
			} else echo $memo;
		?>
		</td>
		</tr>



		<!-- 태그출력 -->
		<tr>
		<td style="margin:10px 0 0 10px; padding:0px 0px 0px 10px;font-size:11pt">
		<? 
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


		<?if($sitelink2){ ?><img src="<?=$dir?>/images/icon_sm_tags.gif" style="margin-right:3px;" />태그 : <span class="list_img_title"><?=$data[sitelink2]?></span><? } ?>
		</td>
		</tr>


		<tr style="height: 4px;">
		<td colspan="2" align="center">&nbsp;</td>
		</tr>


		<tr style="height: 7px;">
		<td colspan="2" align="center"><div class="layer_dot1"></div></td>
		</tr>

	
<div id="submitPopup" style="display:none;
 width:300px; height:210px; position: fixed; 
 top: 50%; left: 50%; 
 margin-top: -150px; 
 margin-left: -150px;
 border: 1px solid #eeeeee;
 background-color: #eeeeee;
opacity:0.8;">
	  <div style="height:70%; vertical-align: middle;">
			<div align="center" style="height:100%; padding-top:50px; color:#000000; vertical-align:middle">정말 삭제하시겠습니까
			</div>
		</div>
		<div align="right" style="height:30%; padding:10px; background-color: #eeeeee; ">
			<button type="button" align="right" style="display:inline-block; width:70px; height:40px" onclick="location='delete_ok.php?id=<?=$id?>&no=<?=$no?>'">
			확인</button>
			<button type="button" align="right" style="width:70px; height:40px" onclick="location = 'https://www.facebook.com'">
			취소</button>
	</div>
</div>
	
		<script type="text/javascript">
function del_div() {
    //var src = img.src;
    //window.open(src);
	//alert("ddd");
	   $('#submitPopup').show();  
    return false;
}
//alert(localStorage.getItem('oldurl'));
</script>

		<!-- 목록 수정 글쓰기 버튼 -->
		<tr>
		<td colspan="2" align="left" >
		
		
		<button class="stockb" onclick="window.location.href='zboard.php?id=doc'">목록보기</button>
		<button class="stockb" onclick="window.location.href='write.php?id=doc&no=<?=$no?>&mode=modify'">수정하기</button>
		<button class="stockb" onclick="del_div()">삭제하기</button>
		<button class="stockb" style="width:90px;float:right;margin-right:5px" onclick="window.location.href='write.php?id=doc'">글쓰기</button>

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
</table>

<div>
<table>
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
</div>


<?
// $subject = preg_replace('/\s+/','',$subject);
$subject = str_replace("\n", "", $subject);
$subject = str_replace("\r", "", $subject);
$subject = $subject."- SWAVE";



	
	
	
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
			if ( yetVote == null){
					sessionStorage.setItem(vo, true);
					 if (document.getElementById("imgClickAndChange").src == "images/thumbup.gif") 
							{
								document.getElementById("imgClickAndChange").src = "images/thumbup.gif";
								document.getElementById('cc1').innerHTML = '<img src=/bbs/gd.php?num='+good+'>';
							}
							else 
							{
								document.getElementById("imgClickAndChange").src = "images/thumbup2.gif";
										document.getElementById('cc1').innerHTML = '<img src=/bbs/gd.php?num='+good+'>';
						
							}
			//request with URL,data,success callback
				$.post("votetest.php",
					{
						
						no: no,
						id: id,
						good: good,
						bad: bad
					},
					function(){
					   //alert("공감되었습니다");
					});
		
		} else alert("이미 공감하셨습니다");
	}
	
	function AddClick2(){
		bad = Number(bad)+1;
		vo = id+no;
		//alert(good);
		//var uniq = 'id' + (new Date()).getTime();
		var yetVote = sessionStorage.getItem(vo);
			if ( yetVote == null){
					sessionStorage.setItem(vo, true);
					if (document.getElementById("imgClickAndChange2").src == "images/thumbdown.gif") 
							{
								document.getElementById("imgClickAndChange2").src = "images/thumbdown.gif";
							}
							else 
							{
								document.getElementById("imgClickAndChange2").src = "images/thumbdown2.gif";
							}
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
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
</script>
