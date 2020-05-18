<?

$url = '/home/swave50/www/bbs/newsdata3.json';
			$content = file_get_contents($url);
			$json = json_decode($content, true);
				
$json2 = json_encode($json);
echo $json2;

			?>