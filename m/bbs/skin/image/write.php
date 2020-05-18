<?
	if($mode=="reply") $title="답글쓰기";
	elseif($mode=="modify") $title="수정하기";
	else $title="새글쓰기";

	if($mode!="reply") {
		if(!$data[use_html]) $value_use_html = 1;
		else $value_use_html = $data[use_html];
	} else {
		$value_use_html=1;
	}
	if($data[use_html]) $use_html=" checked ";
	else $use_html="";

	$a_preview = str_replace(">","><font class=list_eng>",$a_preview)."&nbsp;&nbsp;";
	$a_imagebox = str_replace(">","><font class=list_eng>",$a_imagebox)."&nbsp;&nbsp;";
?>

		

<table width="100%" cellSpacing="0" cellpadding="0" border="0">
<colgroup><col width="6px"><col><col width="6px"></colgroup>
<tr height="5px"><td colspan="2"></td></tr>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_page_list"><?=$title?></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
</tr>
<tr height="5px"><td colspan="2"></td></tr>
</table>

<form method="post" name="write" action="write_ok.php" onsubmit="return check_submit();" enctype="multipart/form-data">
<input type="hidden" name="page" value="<?=$page?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="no" value="<?=$no?>" />
<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
<input type="hidden" name="desc" value=<?=$desc?> />
<input type="hidden" name="page_num" value="<?=$page_num?>" />
<input type="hidden" name="keyword" value="<?=$keyword?>" />
<input type="hidden" name="sn" value="<?=$sn?>" />
<input type="hidden" name="ss" value="<?=$ss?>" />
<input type="hidden" name="sc" value="<?=$sc?>" />
<input type="hidden" name="mode" value="<?=$mode?>" />
<input type="hidden" name="filename" id="filename" value="<?=$filename?>" />

<!-- 리치텍스트 에디어 사용을 위한 트릭 -->
<input type="hidden" name="use_html" value="1" />



<!-- 작성폼 시작 -->
<table style="width:100%;background-color:#ffffff;" cellSpacing="2" cellpadding="0" border="0">
<colgroup><col width="50px"><col ><col width="70px"><col ></colgroup>
	<?=$hide_start?>
	<td class="write_ft1">이름</td>
	<td colspan="3" class="write_ft1"><input type="text" name="name" value="<?=$subject?>"  maxlength="500" class="write_input2" /></td>
	</tr>
	<td class="write_ft1">패스워드</td>
	<td colspan="3" class="write_ft1"><input type="password" name="password" value="<?=$subject?>"  maxlength="500" class="write_input2" /></td>
	</tr>

	<tr style="height: 4px;">
	<td colspan="4" align="center"><div class="layer_dot1"></div>
	</td></tr>
	<?=$hide_end?>

	<tr>
	<td class="write_ft1">제목</td>
	<td colspan="3" class="write_ft1"><input type="text" name="subject" value="<?=$subject?>"  maxlength="500" class="write_input2" /></td>
	</tr>
	
	
</td>
</tr>
</table>

<!-- 작성폼 끝 -->

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr height="5px"><td colspan="3"></td></tr>


<tr>
<td valign="top" colspan="3">

	<!-- 글쓰기 부분 시작 -->
		<table style="width:100%;background-color:#ffffff;border:0" cellSpacing="2" cellpadding="0" border="0">
		<tr style="background-color:#fbfaf7;">
		<td>
			<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
				<tr>
				<td valign="top" class="write_ft1">
				
				<textarea id="editor2" name="memo" class="write_textarea"><?=$memo?></textarea></td>
				</tr>
				<tr>
				<td class="write_ft2" valign="top">
				</tr>
				<tr style="height: 4px;"><td align="center"><div class="layer_dot1"></div></td></tr>
			
				<tr height="5px"><td></td></tr>
			</table>
		</td>
		</tr>
		</table>

		<table style="width:100%;background-color:#ffffff;border:0" cellSpacing="2" cellpadding="0" border="0">
		<tr style="background-color:#fbfaf7;">
		<td>
			<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
				<colgroup><col width="50px"><col></colgroup>
					<!--태그클라우드로 사용 -->
				<tr>
				<td class="write_ft1">태그</td>
				<td class="write_ft1"><input type="text" name="tag" value="<?=$sitelink2?>" maxlength="200" class="write_tag" />&nbsp;<span class="write_ft2">쉼표(,) 구분</span></td>
				</tr>
		
				<?=$hide_sitelink1_start?>
				<tr>
					<td class="write_ft1">출처</td>
					<td class="write_ft1"><input type="text" name="sitelink1" value="<?=$sitelink1?>"  maxlength="255" class="write_input2" /></td>
				</tr>
				<?=$hide_sitelink1_end?>
				
				<input type=hidden name=member value=<?=$member[user_id]?> >
				
				<? if(!isset($member[no])){ ?>
				
				<tr>
					<td class="write_ft1">보안문자</td>
					<td class="write_ft1"><input name="captcha" type="text" class="write_tag"><img style="vertical-align:bottom" src="captcha.php" /></td>
				</tr>
				
				<? } ?>

				<?=$hide_pds_start?>
				<tr>
					<td class="write_ft1">파일1</td>
					<td class="write_ft1"><input type="file" id="imageFile" name="file1" value="<?=$sitelink1?>"  maxlength="255" class="write_input2" /></td>
				</tr>
				
				<tr>
					<td class="write_ft1">파일2</td>
					<td class="write_ft1"><input type="file" name="file2" value="<?=$sitelink1?>"  maxlength="255" class="write_input2" /></td>
				</tr>
				
				<?=$hide_pds_end?>
				
				
			</table>
		
		</td>
		</tr>
		</table>
	<!-- 글쓰기 부분 끝 -->

</td>
</tr>
</table>




<table width="100%" cellSpacing="0" cellpadding="0" border="0">
<colgroup><col width="6px"><col><col width="6px"><col width="150px"></colgroup>
<tr>
	<td width="100%" height="70px" colspan="4" style="padding: 5px">
	<input type="submit" style="padding: 5px; height:100%; width:100%; border: 1px solid #ddd;
		background-color: #FEFEFE;  color: #555; font-size: 12px;" value="입력">
	</td>
</tr>

</table>
</form>

<script>
$('#imageFile').change(function(){ 
//alert("secc");
 var filename = $('#imageFile').val().split('\\').pop();
       han = /다운로드/g;
    chk_han = filename.match(han);

if(chk_han){ filename = Date.now()+".jpg";
//alert(filename);
document.getElementById("filename").value = filename;

}


출처: http://heavening.tistory.com/32 [Good Heavening]
//$('#editor2').html("<img src=/home/swave50/data/image/"+filename+"/>");
//$file1=eregi_replace("\\\\","\\",$file1);
			//$s_file_name1=str_replace(" ","_",$s_file_name1);
			//$s_file_name1=str_replace("-","_",$s_file_name1);
			filename  = filename.split(' ').join('_');
$('#editor2').html("<img src=/bbs/data/image/"+filename+">");
 });
</script>