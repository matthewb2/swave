<?

$no = $_POST[no];
$price = $_POST[price];

$stock = $_POST[stock];
//$stock = "kosdaq";
//$con = array ('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5);

$con = array_combine($no, $price);
//$content2 = array($stock=>$content);

// echo json_encode($arr);
$file = '/home/swave50/www/bbs/newsdata3.json';


$content = file_get_contents($file);

$json = json_decode($content, true);
	


print_r($json);
//echo $json[0];
if ($json[$stock]){
	$json[$stock] = $con;
	
} else $json = array_merge($json, array($stock=>$con));

print_r($json);

$content2 = $json;


$json = json_encode($content2);

file_put_contents($file, $json);


	
	?>
	