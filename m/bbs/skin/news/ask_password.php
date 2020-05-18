<form method="post" name="delete" action="<?=$target?>">
<input type="hidden" name="page" value="<?=$page?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="no" value="<?=$no?>" />
<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
<input type="hidden" name="desc" value="<?=$desc?>" />
<input type="hidden" name="page_num" value="<?=$page_num?>" />
<input type="hidden" name="keyword" value="<?=$keyword?>" />
<input type="hidden" name="category" value="<?=$category?>" />
<input type="hidden" name="sn" value="<?=$sn?>" />
<input type="hidden" name="ss" value="<?=$ss?>" />
<input type="hidden" name="sc" value="<?=$sc?>" />
<input type="hidden" name="mode" value="<?=$mode?>" />
<input type="hidden" name="c_no" value="<?=$c_no?>" />
<input type=hidden name=sep value="<?=$sep?>">

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0">
<tr height="10px"><td></td></tr>
</table>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" class="view_tb">
<tr height="10px"><td></td></tr>

<tr>
<td align="center">
<div id="all_file" style="width:97%;background-color:#ffffff;border: #F0F0F0 1px solid;">
	<table width="100%" cellSpacing="10" cellpadding="0" class="com_tb">
	<tr>
	<td class="ask_t1" align="center"><?=$title?></td>
	</tr>
	<? if(!$member[no]) {?>
	<tr>
	<td class="ask_t2" align="center">비밀번호 : <?=$input_password?></td>
	</tr>
	<? } ?>
	</table>
</div>
</td>
</tr>
<tr height="10px"><td></td></tr>
</table>
<script>
try {
	document.forms['delete'].elements['password'].focus();
} catch(e) {}
</script>
<table width="<?=$width?>" cellSpacing="0" cellpadding="0" style="table-layout: fixed">
<tr height="7px"><td colspan="4"></td></tr>

<colgroup><col width="6px"><col><col width="6px"><col width="148px"></colgroup>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class=" foot_page_list"></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
<td align="right"><img onclick="history.back()" src="<?=$dir?>/images/btn_goback.gif" alt="돌아가기" style="cursor:pointer;margin: 0px 3px 0px 3px;" /><input style="width:70px;border:0" type="image" src="<?=$dir?>/images/btn_complete.gif" accesskey="s" onfocus="blur()" title="완료" /></td>
</tr>
</table>
</form>