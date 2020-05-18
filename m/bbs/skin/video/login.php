<?php
		// 게시판의 가로크기 설정
		$width=$setup[table_width];
?>
<div id="eee" style="width:<?=$width?>; padding: 7px;">
<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0">
<tr height="10px"><td></td></tr>
</table>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" class="view_tb">
<tr height="10px"><td></td></tr>

<tr>
<td align="center">
<div id="all_file" style="width:97%;background-color:#ffffff;border: #F0F0F0 1px solid;">
	<table width="100%" cellSpacing="10" cellpadding="0" class="com_tb">
	<colgroup><col><col width="100px"><col width="200px"><col></colgroup>
	<tr>
	<td></td>
	<td class="ask_t2" align="right">아이디 :</td>
	<td class="ask_t1" ><input type="text" name="user_id" maxlength="20" class="log_input" /></td>
	<td></td>
	</tr>
	<tr>
	<td></td>
	<td class="ask_t2" align="right">비밀번호 :</td>
	<td class="ask_t2" ><input type="password" name="password" maxlength="20" class="log_input" /></td>
	<td></td>
	</tr>
	</table>
</div>
</td>
</tr>
<tr height="10px"><td></td></tr>
</table>
<script>
try {
	document.forms['login'].elements['user_id'].focus();
} catch(e) {}
</script>
<table width="<?=$width?>" cellSpacing="0" cellpadding="0" style="table-layout: fixed">
<tr height="7px"><td colspan="4"></td></tr>

<colgroup><col width="6px"><col><col width="6px"><col width="148px"></colgroup>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class=" foot_page_list"></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
<td align="right"><img onclick="history.back()" src="<?=$dir?>/images/btn_goback.gif" alt="돌아가기" style="cursor:pointer;margin: 0px 3px 0px 3px;" /><input type="image" src="<?=$dir?>/images/btn_complete.gif" accesskey="s" onfocus="blur()" title="완료" /></td>
</tr>
</table>
</div>