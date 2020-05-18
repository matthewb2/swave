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

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
<colgroup><col width="6px"><col><col width="6px"></colgroup>
<tr height="5px"><td colspan="2"></td></tr>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_page_list"><?=$title?></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
</tr>
<tr height="5px"><td colspan="2"></td></tr>
</table>

<div id="write_div" style="width:<?=$width?>;background-color:#ffffff;border: #E1E1E1 1px solid; padding: 0px;">
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


<!-- 작성폼 시작 -->
<div id="write_div" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid; padding: 0px;" align="center">
<table style="width:100%;background-color:#ffffff;" cellSpacing="2" cellpadding="0" border="0">
<tr style="background-color:#fbfaf7;">
<td align="center">
	<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
	<?=$hide_start?>
	<tr>
	<td width="70"px class="write_ft1">이름</td>
	<td width="100px" class="write_ft1"><input type="text" id="name" name="name" value="<?=$name?>"  maxlength="20" class="write_input2" /></td>
	<td width="70px" class="write_ft1">비밀번호</td>
	<td width="100px" class="write_ft1"><input type="password" id="password" name="password" maxlength="20" class="write_input1" /></td>
	<td width="100px"></td>
	<td width="70px"></td>
	<td width=auto></td>
	</tr>

	<tr style="height: 4px;"><td colspan="4" align="center"><div class="layer_dot1"></div></td></tr>
	<?=$hide_end?>

	<tr>
	<td width="70px" class="write_ft1">제목</td>
	<td width=auto colspan=4 class="write_ft1"><input type="text" name="subject" value="<?=$subject?>"  maxlength="500" class="write_input2" /></td>
	</tr>
	<tr>
	<td width="70px" class="write_ft1">카테고리</td>
	<td width="100px" class="write_ft2" valign="top"><? 
	$search = 'value='.$category;
	$replace = 'value='.$category.' selected';
	echo str_replace($search, $replace, $category_kind);?>
	
	</tr>

	<tr>
	<td class="write_ft2" colspan="3" valign="top">
	<?=$hide_notice_start?><label for="cb1"><input onfocus="this.blur();" type="checkbox" name="notice" <?=$notice?> value="1" id="cb1" />공지사항</label> <?=$hide_notice_end?>
	<?=$hide_html_start?><label for="cb2"><input onfocus="this.blur();" type="checkbox" name=use_html <?=$use_html?> value="<?=$value_use_html?>" checked="checked" onclick='check_use_html(this)' id="cb2" style="display:none;" /></label> <?=$hide_html_end?>
	<?=$hide_secret_start?><label for="cb3"><input onfocus="this.blur();" type="checkbox" name="is_secret" <?=$secret?> value="1" id="cb3" />비밀글</label> <?=$hide_secret_end?></td>
	</tr>
	</table>
</td>
</tr>
</table>
</div>
<!-- 작성폼 끝 -->

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr height="5px"><td colspan="3"></td></tr>


<tr>
<td valign="top" colspan="3">

	<!-- 글쓰기 부분 시작 -->
	<div id="write_div" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid; margin-top: 5px;">
		<table style="width:100%;background-color:#ffffff;border:0" cellSpacing="2" cellpadding="0" border="0">
		<tr style="background-color:#fbfaf7;">
		<td>
			<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
				<tr>
				<td valign="top" class="write_ft1">
				
				<textarea name="memo" class="write_textarea"><?=$memo?></textarea></td>
				</tr>
				<tr>
				<td class="write_ft2" valign="top">
				<label for="reply_mail"><input onfocus="this.blur();" type="checkbox" id="reply_mail" name="reply_mail" value="1" <?php if($data[reply_mail]){echo " checked='checked'";}?>  /> 코멘트 허용안함 <span style="font:8pt 돋움; color:#F58029;">(코멘트를 허용하지 않을때 체크하세요)</span></label></td>
				</tr>
				<tr style="height: 4px;"><td align="center"><div class="layer_dot1"></div></td></tr>
			
				<tr height="5px"><td></td></tr>
			</table>
		</td>
		</tr>
		</table>
	</div>

	<div id="write_div" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid; margin-top: 5px;">
		<table style="width:100%;background-color:#ffffff;border:0" cellSpacing="2" cellpadding="0" border="0">
		<tr style="background-color:#fbfaf7;">
		<td>
			<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
				<colgroup><col width="70px"><col></colgroup>
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
					<td class="write_ft1"><input name="captcha" type="text"><img style="vertical-align:bottom" src="captcha.php" /></td>
				</tr>
				
				<? } ?>

				<?=$hide_pds_start?>
				<tr>
					<td class="write_ft1">파일 1</td>
					<td class="write_ft1"><input type="file" id="file1" name="file1" maxlength="255" class="write_input2" /><?=$file_name1?></td>
				</tr>
				<tr>
					<td class="write_ft1">파일 2</td>
					<td class="write_ft1"><input type="file" id="file2" name="file2" maxlength="255" class="write_input2" /><?=$file_name2?></td>

				</tr>
				
				<?=$hide_pds_end?>
				
				
			</table>
		</td>
		</tr>
		</table>
	</div>
	<!-- 글쓰기 부분 끝 -->

</td>
</tr>
</table>
</div>





<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
<colgroup><col width="6px"><col><col width="6px"><col width="150px"></colgroup>
<tr height="5px"><td colspan="4"></td></tr>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_page_list"></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
<td><img onclick="history.back()" src="<?=$dir?>/images/btn_goback.gif" alt="목록보기" style="cursor:pointer;margin: 0px 3px 0px 3px;" />
<input onclick=submitContents() type="image" src="<?=$dir?>/images/btn_complete.gif" accesskey="s" title="작성완료" /></td>
</tr>

<tr height="5px"><td colspan="4"></td></tr>
</table>
</form>


