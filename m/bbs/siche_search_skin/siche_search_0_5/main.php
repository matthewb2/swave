<tr>
	<td>&nbsp;</td>
	<td>
	<LI><?=$a_subject?><?=$subject?></a>&nbsp;&nbsp;
	<?=$a_self?>[현재창]</a> <?=$a_blank?>[새창]</a>
	<?if($view_level_check == "0"){?>
	<?=$a_link1?><img src="<?=$dir?>link.gif" border="0" align="absmiddle" alt="<?=$sitelink1?>"></a>
	<?=$a_link2?><img src="<?=$dir?>link.gif" border="0" align="absmiddle" alt="<?=$sitelink2?>"></a>
	<?=$hide_download1_start?><?=$a_file_link1?><img src="<?=$dir?>file.gif" border="0" align="absmiddle" alt="<?=$file_name1?>"></a><?=$hide_download1_end?>
	<?=$a_file_link2?><img src="<?=$dir?>file.gif" border="0" align="absmiddle" alt="<?=$file_name2?>"></a>
	<?}?>
	</td>
	<td></td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan=2>
	<?=$memo?>
	</td>
</tr>
<tr>
	<td>&nbsp;</td>
	<td colspan=2 height=10><font color="#666666">Date: <?=$date?> / Read: <?=$hit?></a></td>
</tr>
<tr>
	<td colspan=3 height=1 background="<?=$dir?>dot.gif"></td>
</tr>
<tr>
	<td colspan=3 height=5></td>
</tr>