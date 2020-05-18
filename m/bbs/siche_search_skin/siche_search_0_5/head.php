<BR>
<table width="<?=$width?>" cellspacing="0" cellpadding="0" border="0">
<form name="siche_search" action="<?=$PHP_SELF?>" method="get">
<input type="hidden" name="sno" value="<?=$sno?>">
<input type="hidden" name="siche" value="search">
<input type="hidden" name="page" value="1">
<input type="hidden" name="category" value="<?=$category?>">
<tr>
	<td height="1" bgcolor="cccccc" colspan="2"></td>
</tr>
<tr>
	<td width="90" align="right" bgcolor="eeeeee"><img src="<?=$dir?>search.gif"></td>
	<td bgcolor="eeeeee">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td style="padding-top:10" align="center">
		<input type="checkbox" name="sn" value="1" style="border-width:1px;" <?if($sn=="1"){echo "checked";}?>>이름
		<input type="checkbox" name="ss" value="1" style="border-width:1px;" <?if($ss=="1"){echo "checked";}?>>제목
		<input type="checkbox" name="sm" value="1" style="border-width:1px;" <?if($sm=="1"){echo "checked";}?>>내용
		<input type="checkbox" name="sc" value="1" style="border-width:1px;" <?if($sc=="1"){echo "checked";}?>>코멘
		<input type="text" name="search" value="<?=$search?>" style="width:135">
		<input type="submit" class="siche_submit" value="검색">
		</td>
	</tr>
	<tr>
		<td colspan="2"><hr style="width:80%;height:1;color:cccccc"></td>
	</tr>
	<tr>
		<td style="padding-bottom:10" align="center" colspan="2">공백 연산자 <input type="radio" name="oga" value="or" style="border-width:1px;" <?if($oga=="or"){echo "checked";}?>>or <input type="radio" name="oga" value="and" style="border-width:1px;" <?if($oga=="and"){echo "checked";}?>>and / <?=$align_date?>날짜순으로▼</a> <?=$align_name?>이름순으로▼</a> <?=$align_subject?>제목순으로▼</a></td>
	</tr>
	</table>
	</td>
</tr>
<tr>
	<td height="1" bgcolor="cccccc" colspan="2"></td>
</tr>
</form>
</table>
<table width="<?=$width?>" cellspacing="0" cellpadding="5" border="0">
<col width="1"></col>
<col width=""></col>
<col width="80"></col>
<tr><td height="5"></td></tr>