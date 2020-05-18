<?php
		// 게시판의 가로크기 설정
		$width=$setup[table_width];
?>
<form>
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
	<tr>
	<td class="ask_t3" align="center"><?echo $message;?></td>
	</tr>
	</table>
</div>
</td>
</tr>
<tr height="10px"><td></td></tr>
</table>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" style="table-layout: fixed">
<tr height="7px"><td colspan="4"></td></tr>

<?
  if(!$url)
  {
?>
<colgroup><col width="6px"><col><col width="6px"><col width="80px"></colgroup>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class=" foot_page_list"></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
<td align="right"><img onclick="history.back()" src="<?=$dir?>/images/btn_goback.gif" alt="돌아가기" style="cursor:pointer;margin: 0px 3px 0px 3px;" /></td>
</tr>
<?
  }
  else
  {
?>
<colgroup><col width="6px"><col><col width="6px"><col width="80px"></colgroup>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class=" foot_page_list"></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
<td align="right"><a style="cursor:pointer" onclick="location.href='<?echo $url;?>'" onfocus="blur()"><img src="<?=$dir?>/images/btn_complete.gif" /></a></td>
</tr>
<?
}
?>

</table>
</div>
</form>