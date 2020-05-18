<?php
	
	if (preg_match("/<pre/i", $memo)){
		$memo = str_replace("<br>", "", $memo);
		$memo = str_replace("<br />", "", $memo);
	}
	
		
	if (preg_match("/<iframe/", $memo)){
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		preg_match($reg_exUrl, $memo, $url);
		$test = $url[0];
		$test = str_replace('"','',$test);
		$memo = "<iframe style='display:block; padding:0px; width:100%' height=250 src='".$test."?autoplay=1' frameborder=0 allowfullscreen></iframe>";
		
		//$memo = str_replace("iframe", "iframe style='display:block; width:100%'", $memo);
		//$memo = str_replace("315", "400", $memo);
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
			$light_image1 = "<img src='$data[file_name1]' style='max-width:100%; height:auto; margin: 10px;' border='0' />"; 
		}elseif($temp[0] > $viewWidth ) { // <- 사이즈보다 크다면 아래와 같이 리사이즈하고 라이트박스 적용하고
			$height = 540*$temp[0]/$temp[1];
			$light_image1 = "<a href=\"$data[file_name1]\" rel=\"lightbox\"><img style=\"max-width:100%;
    height:auto;\" src=\"$data[file_name1]\" alt=\"크게보기\" title=\"크게보기\" width=\"540px\" height=\"$heigth\" class=\"list_img\" onmouseover=\"this.className='list_img_over'\" onmouseout=\"this.className='list_img_out'\" /></a>"; 
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

	
$sns_postlink="http://m.swave.woobi.co.kr/view/$id/$no";
	?>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" class="view_tb">
<!-- 제목출력 -->
<colgroup><col><col></colgroup>
<tr style="height: 27px;background-color:#FBFAF7;">
<td colspan="2" class="view_001"><img src="<?=$dir?>/images/icon_sm_page_white.gif" style="margin-right: 3px;" align="left" alt="" />
<b><?=$subject?></b></td>

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
<td class="view_002" align="right"><b><?=$date?></b>

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
			
	<?=$sitelink1?>&nbsp;&nbsp;<?=$hide_sitelink1_end?></td>
	</tr>
	<tr>
	<td class="cmtt_004"><?=$hide_download1_start?><img src="<?=$dir?>/images/icon_sm_file.gif" style="margin-right:3px;" align="left" alt="" /><?=$a_file_link1?><b><?=$file_name1?></b></a>&nbsp;<span style="font: 8pt;color:#cdcbcb;">|</span>&nbsp;<?=$file_size1?>&nbsp;/ <?=$file_download1?>&nbsp;Download <?=$hide_download1_end?>
	<?=$hide_download2_start?><img src="<?=$dir?>/images/icon_sm_file.gif" style="margin-right:3px;" align="left" alt="" /><?=$a_file_link2?><b><?=$file_name2?></b></a>&nbsp;<span style="font: 8pt;color:#cdcbcb;">|</span>&nbsp;<?=$file_size2?>&nbsp;/ <?=$file_download2?>&nbsp;Download <?=$hide_download2_end?></td>
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



<!-- 썸네일출력 -->
<? if($light_image1 or $light_image2){ ?> 
<tr>
<td colspan="2" align="center">
	<table cellSpacing="2" cellpadding="0" style="border: #E1E1E1 1px solid; margin-top: 10px">
	<tr>
	<td align="center" style="background-color:#FBFAF7; padding: 3px;"><img src="<?=$dir?>/images/view_list_img2.gif" width="10px" height="10px" style="margin-right:3px;" align="left" /><span class="list_img_title">업로드 이미지</span></td>
	</tr>
	<tr>
	<td align="center" style="background-color:#FBFAF7;"><?=$light_image1?></td>
	</tr>
	<tr>
	<td align="center" style="background-color:#FBFAF7;"><?=$light_image2?></td>
	</tr>
	</table>
</td>
</tr>
<? } ?> 

<!-- 내용출력 -->
<tr>
<td class="view_003" colspan="2">


<?=$memo?>

</td>
</tr>


<!-- 조회수, 추천수출력 -->
<tr>
<td class="view_vote" style="padding:0px 0px 0px 10px;">
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


if($sitelink2){ ?><img src="<?=$dir?>/images/icon_sm_tags.gif" style="margin-right:3px;" />태그 : <span class="list_img_title"><?=$data[sitelink2]?></span><? } ?></td>


<tr style="height: 4px;">
<td colspan="2" align="center"><div class="layer_dot1"></div></td>
</tr>



<!-- 목록 수정 글쓰기 버튼 -->
<tr>
<td>
<table width="100%">
		<tr>
		<td colspan="2" align="left" ><?=$a_list?>
		<img style="margin-left:10px" src="<?=$dir?>/images/btn_view_list.gif" alt="목록보기" /></a>
		<?=$a_modify?><img src="<?=$dir?>/images/modify_btn.gif" style="margin-left:5px;" alt="수정하기" /></a><?=$a_delete?><img src="<?=$dir?>/images/btn_delete.gif" style="margin-left:5px;" alt="삭제하기" /></a>
		<?=$a_write?><img style="float:right; margin-right:10px" src="<?=$dir?>/images/btn_post.gif" alt="새글쓰기" /></a>
		</td>
		</tr>
</table>
</td>
</tr>
		<tr><td colspan="2" height="50px"></td></tr>
		
<tr>
<td style="padding: 5px;">

<a name="ccm"><span id="layer_tg01" class="com_num" style="cursor:pointer;"   onclick="document.getElementById('cmt_ly_tg').style.display='none';document.getElementById('layer_tg01').style.display='none';document.getElementById('layer_tg02').style.display='block';">
댓글 <?=$comment_num?></span></a><span onclick="reload()" style="cursor: pointer;">새로고침</span>
<a name="ccm"><span id="layer_tg02" class="com_num" style="cursor:pointer;display:none"   onclick="document.getElementById('cmt_ly_tg').style.display='block';document.getElementById('layer_tg01').style.display='block';document.getElementById('layer_tg02').style.display='none';">코멘트 <?=$comment_num?></span></a>
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


<tr><td colspan="2" height="10px"></td></tr>



<tr>
<td colspan="2" align="center">
	<div id="my">
			<? if(!$comment_num){ ?> 
			<div id="no_comment" style="width:100%; height:30px; font: bold 9pt 굴림; color: #E08600; text-align: center; padding: 10px; overflow:hidden">등록된 댓글이 없습니다.</div>
			<? } ?>



<script type="text/javascript">

function reload() {     // 댓글 새로고침
			//alert('test');
			$('.reply').empty();
			var id = "<?=$id?>";
			var no = <?=$_GET['no']?>;
	var data = { 'id': id , 'no': no};

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'process_comment.php', //Your form processing file URL
            data      : data,
            success   : function(response) {
					//var duce = jQuery.parseJSON(data);
					var data = jQuery.parseJSON(response);
					var MAX_VALUE = 1000;
					var count;
					for (var i=1; i< MAX_VALUE; i++){
						if (typeof data.fruits[i] != 'undefined')
						count = i;
					}
					//alert(count);
					//alert(data.length);
					for (i=0; i<=count;i++){
					$('#my').append('<div class="reply" id="you-<?=$no_comm?>"><table width="100%" cellSpacing="2" cellpadding="0" style="border: 1px solid #EDE8D9;table-layout: fixed; margin-bottom: 3px;"><colgroup><col width="300px"><col><col width="140px"></colgroup><tr style="height: 29px;"><td align="left" style="font: 9pt 굴림; padding: 5px 0 0 3px;" valign="top"><b>'+data.fruits[i]+'</b></td><td></td><td></td></tr><tr><td colspan="3" valign="top" style="font: 9pt 굴림; padding:5px; line-height:1.7em">'+ data.animals[i] +'</td></tr></table></div>');
        
					//$('#my').append(data.fruits[0]);
					}
				}
				
               });
   
}
</script>

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


 