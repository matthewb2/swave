<?php
//header("Content-Type: text/html; charset=UTF-8");
$words = array();




function my_json_encode($arr)
{
        //convmap since 0x80 char codes so it takes all multibyte codes (above ASCII 127). So such characters are being "hidden" from normal json_encoding
        array_walk_recursive($arr, function (&$item, $key) { if (is_string($item)) $item = mb_encode_numericentity($item, array (0x80, 0xffff, 0, 0xffff), 'UTF-8'); });
        return mb_decode_numericentity(json_encode($arr), array (0x80, 0xffff, 0, 0xffff), 'UTF-8');
 
}


	$conn = mysql_connect("localhost", "swave", "starman");
	
	mysql_select_db("swave", $conn);
	
	$sql = "SELECT * FROM search_relate order by rand() limit 1000";
	$result = mysql_query($sql) or die(mysql_error());

//	$words = array();
	while ($row = mysql_fetch_array($result)) {
    // $words[] =  $row['rword1'];  
	$words[] = iconv("euc-kr", "UTF-8", $row['rword1']);
	//echo "<br>";
}

	$words = array_unique($words,SORT_REGULAR); //중복값 제거
	
	$words = array_filter($words);
	
	foreach($words as $key=>$values){
		if ($values){
			$neww[] = $values;
		}
	}
		
echo my_json_encode($neww);

?>
