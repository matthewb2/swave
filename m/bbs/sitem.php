<?
$member = $_POST[isadmin];
$id = $_POST[id];

if ($member == "admin"){
$code = $_POST[c_code];
	$name = $_POST[c_name];
	
	if (isset($_POST[add_stock])){
	// $stock = "kospi";
	

	$con = array($code=>$name);

	$file = '/home/swave50/www/bbs/stockitem.json';

	$content = file_get_contents($file);

	$json = json_decode($content, true);

	if ($json[$code]){
		$json[$code] = $name;
		
	} else $json = array_merge($json, array($code=>$name));

	$content2 = $json;

	$json = json_encode($content2);
	if ($code && $name){
		file_put_contents($file, $json);
	}
	
	

 $conn = mysql_connect('localhost', 'swave', 'starman');
 	mysql_select_db('swave');
	mysql_query("SET NAMES utf8");
	//echo $_GET[search];
	
	$sql = "insert INTO finance_$id (code, name) VALUES ('$code', '$name')";
	//echo mysqli_character_set_name($conn); 

	mysql_query($sql);
	
	mysql_close($conn);

	

} else if (isset($_POST[delete_stock])){
	
	
$file = '/home/swave50/www/bbs/stockitem.json';

$content = file_get_contents($file);

$json = json_decode($content, true);
//print_r($json);

foreach ($json as $jcode => $jname){
	if ( $jname == $name || $jcode == $code){
		$offset = $i;
	}
	$i +=1;
}
// delete element in $json
   if ($offset){
		array_splice($json, $offset, 1);
   }


//print_r($json);
$content2 = $json;

	$json = json_encode($content2);
	//$json = json_encode($content2);
	//if ($code && $name){
		file_put_contents($file, $json);
	//}


//delete from db


 $conn = mysql_connect('localhost', 'swave', 'starman');
 	mysql_select_db('swave');
	mysql_query("SET NAMES utf8");
	//echo $_GET[search];
	$sql = "delete from finance_$id where code = $code";
	//echo mysqli_character_set_name($conn); 

	mysql_query($sql);
	
	mysql_close($conn);
	
}

} else {?>

<script>
alert("login required");
</script>
<?}
?>



<script>
window.location.href = '/bbs/finance.php?id=<?=$id?>';
close();
</script>
