
<table width="150" cellspacing="0" cellpadding="0" border="0">
<!--노프레임일 경우에는 target이 필요 없습니다.-->
<form name="siche_search" action="[제로보드설치경료]/ssearch.php" method="get" target="프레임이름">
<input type="hidden" name="sno" value="<?=$sno?>">
<input type="hidden" name="siche" value="search">
<input type="hidden" name="page" value="1">
<input type="hidden" name="sn" value="1">
<input type="hidden" name="ss" value="1">
<input type="hidden" name="sm" value="1">
<tr>
	<td>
	<input type="text" name="search" style="width:100">
	<input type="submit" style="font-size:9pt;border:solid 1;border-color:CFC1B4;
	background-color:white;width:40;height:21" value="검색">
	</td>
</tr>
</form>
</table>