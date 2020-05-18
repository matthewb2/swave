<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="css/style.min.css"> 
  <script type="text/javascript" src="codebird.js"></script>
 <script src="js/jquery.min.js"></script>
 
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 </head>
<? $conn = mysql_connect('localhost', 'swave', 'starman');
	mysql_select_db('swave');
	$search = iconv("utf-8", "euc-kr", $_GET[del]);
	if ($_GET[del]){
	$sql = "delete from search_relate where kword='$search' or rword1 ='$search' ";
	

	$result = mysql_query($sql, $conn);
	echo $result;
	echo "Deleted data successfully\n";
	echo $row[0];
	}
	?>
	
</html>