<?

$no = $_POST[no];
$good = $_POST[good];
$id = $_POST[id];

//$no = 154;
//$good = 10;
$conn = mysql_connect("localhost", "swave", "starman");
	
mysql_select_db("swave", $conn);
	// $sql2 = "insert $no to no from zetyx_board_$id where no = $no";
	 // $sql2 = "update zetyx_board_doc (vote) VALUES ('$good') where no='$no'";
	 mysql_query("UPDATE zetyx_board_$id SET vote='$good' WHERE no='$no'") or die(mysql_error());
	
	
	?>
	