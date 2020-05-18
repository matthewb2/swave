
</tr>
</table>
<br>
<?=$nosearchs?>
<table width="<?=$width?>" cellspacing="0" cellpadding="5" border="0" class="lineheight">

<tr>
	<td align="center">
	총 <B><?=$ttotal_su?></B>개의 게시물이 검색되었습니다.<br>
	<?=$a_prev_page?>[이전<?=$pagegroupnum?>개]</a> <?=$print_page?> <?=$a_next_page?>[다음<?=$pagegroupnum?>개]</a>
	</td>
</tr>
</table>
<?=$nosearche?>


<? $conn = mysql_connect('localhost', 'swave', 'starman');
	mysql_select_db('swave');
	//echo $_GET[search];
	$sql = "select * from search_relate where kword ='$_GET[search]'";
	$result = mysql_query($sql, $conn);
	//echo $result;
	while($row = mysql_fetch_array($result)) {
		//echo $row['rword1'];
		//echo "<br />";		
	}
	?>
<table width="<?=$width?>" cellspacing="0" cellpadding="0" border="0">
<form name="search_realte" action="relatewords.php" method="post">
<input type="hidden" name="sno" value="<?=$sno?>">
<input type="hidden" name="siche" value="search">
<input type="hidden" name="page" value="1">
<input type="hidden" name="category" value="<?=$category?>">
<input type="hidden" name="search" value="<?=$search?>">

<tr>
	<td width="100" align="center" bgcolor="#ffffff" style="font-family:tahoma;font-size:9pt;padding-left:5" valign="bottom">관련검색어</td>
	<td bgcolor="#ffffff">
	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td style="padding-top:10" align="center">
		<? while($row = mysql_fetch_array($result) ){
			echo "<a href='ssearch.php?sno=1&siche=search&page=1&sn=1&sm=1&oga=or&search=$row[rword1]'>$row[rword1]</a>";
			//echo "&nbsp;";
			//echo "<a href='ssearch.php?sno=1&siche=search&page=1&sn=1&sm=1&oga=or&search=$row[rword2]'>$row[rword2]</a>";
			echo "<br>";
			//echo "<a href='ssearch.php?sno=1&siche=search&page=1&sn=1&sm=1&oga=or&search=$row[rword3]'>$row[rword3]</a>";
			//echo "&nbsp;";
		}
		?>
	

		<input type="text" name="wordsr" style="width:135">
		<input type="submit" class="siche_submit" value="입력">
		</td>
	</tr>
	
	</table>
	</td>
</tr>
</form>

<form name="siche_search" action="<?=$PHP_SELF?>" method="get">
<input type="hidden" name="sno" value="<?=$sno?>">
<input type="hidden" name="siche" value="search">
<input type="hidden" name="page" value="1">
<input type="hidden" name="category" value="<?=$category?>">

<tr>
	<td width="100" align="right" bgcolor="eeeeee" style="font-family:tahoma;font-size:9px;padding-left:5" valign="bottom"><?=$admins?>time:<?=$siche_time?><?=$admine?></td>
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
		<td style="padding-bottom:10" align="center" colspan="2">공백 연산자 <input type="radio" name="oga" value="or" style="border-width:1px;" <?if($oga=="or"){echo "checked";}?>>or <input type="radio" name="oga" value="and" style="border-width:1px;" <?if($oga=="and"){echo "checked";}?>>and / <?=$align_date?>날짜순으로▼</a> <?=$align_name?>이름순으로▼</a> <?=$align_subject?>제목순으로▼</a></td>
	</tr>
	</table>
	</td>
</tr>
</form>
</table>

