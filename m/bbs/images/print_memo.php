<?
	include "_head.php";
	
		$data=mysql_fetch_array(mysql_query("select * from  $t_board"."_$id  where no='$no'"));
		
		//echo $data[subject];
		$memo = $data[memo];
		$memo = stripslashes($memo);
		$memo = str_replace("\\","",$memo);
		
?>
<html>
<head>
	<title><?=$setup[title]?></title>
	<meta http-equiv=Content-Type content=text/html; charset=utf-8>
	<link rel=StyleSheet HREF=skin/<?=$setup[skinname]?>/style.css type=text/css title=style>
</head>
<body topmargin='10'  leftmargin='10' marginwidth='10' marginheight='10' <?
	if($setup[bg_color]) echo " bgcolor=".$setup[bg_color];
	if($setup[bg_image]) echo " background=".$setup[bg_image];?>>

<table border=0 width=100% cellspacing=0 cellpadding=0 bgcolor=white>
<tr>
	<td align=left><img src=images/pv_title_left.gif border=0></td>
	<td width=100% background=images/pv_title_back.gif><img src=images/pv_title_back.gif></td>
	<td align=right><img src=images/pv_title_right.gif border=0></td>
</tr>
</table>

<table border=0 cellspacing=0 cellpadding=10 width=100% height=100% bgcolor=black>
<Tr bgcolor=white valign=top>
	<td height=20>
		<b><?=$data[subject]?></b><br>
	</td>
</tr>
<Tr bgcolor=white valign=top>
	<td>
		<?=$memo?>
	</td>
</tr>
</table>

</body>
</html>
