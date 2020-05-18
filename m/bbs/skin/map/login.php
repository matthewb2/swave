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

</div>