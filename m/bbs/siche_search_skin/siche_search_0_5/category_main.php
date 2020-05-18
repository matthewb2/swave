<?
	$_x ++;
	$_temp = $_x % 3;
?>
<?	if($_temp==1){?>
<tr>
<?}?>
	<td>
	<img src="<?=$dir?>i_category_c.gif" align="absmiddle">
	<B><?=$category_title?></B> [총 <?=$category_su?>개]</td>
<?if(!$_temp){?>
</tr>
<?
	}
?>