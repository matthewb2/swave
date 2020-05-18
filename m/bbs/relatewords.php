<?php

$twords = urldecode($_POST[search]);

 $conn = mysql_connect('localhost', 'swave', 'starman');
 	mysql_select_db('swave');
	mysql_query("SET NAMES utf8");
	//echo $_GET[search];
	$sql = "insert into search_relate(kword, rword1) values ('$twords', '$_POST[wordsr]')";
	//echo mysqli_character_set_name($conn); 

	mysql_query($sql);
	
	mysql_close($conn);
	echo "<script>location.href = document.referrer;</script>";
?>
