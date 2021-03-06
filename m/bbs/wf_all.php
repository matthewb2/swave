<?
class KmaWeather
{
	//1시간단위로  기상대가  있는 지역의 날씨를 가져온다. 
	function weather_xml_parser()
	{
		$array = array(); 

		$url1="www.kma.go.kr";
		$url2="GET /";
		$url2.="XML/weather/sfc_web_map.xml";
		$url2.=" HTTP/1.0\r\nHost:www.kma.go.kr\r\n\r\n";

		$fp2 = fsockopen ($url1, 80, $errno, $errstr,30 );
		if (!$fp2) echo "?   $errstr ($errno)<br />n";
		else
		{
			fputs ($fp2, $url2);
			while (!feof($fp2))
			{
				$line=fgets ($fp2,512);
				
				if(ereg("<local",$line))
				{
					$area=preg_split("/\>/",$line);
					$area=preg_split("/\</",$area[1]);
					$area =$this-> iconv_UTF_8($area[0]);
					
					$array[$area]=$this-> iconv_UTF_8($area[0]);//지역설정

					$value=preg_split("/\"/",$line);
					$array[$area]['icon']= $this-> iconv_UTF_8($value[3]); //아이콘 변수현재상태
					$array[$area]['desc']= $this-> iconv_UTF_8($value[5]); //현재상태 한글 / 맑음 흐림 구름많음 박무 구름조금 
					$array[$area]['temp']=$this-> iconv_UTF_8(floor($value[7])); //현재온도
				}
			//	echo  iconv('UTF-8','EUC-KR',$value[1]).'=='.iconv('UTF-8','EUC-KR',$value[3]).'=='.iconv('UTF-8','EUC-KR',$value[5]).'=='.iconv('UTF-8','EUC-KR',$value[7])."</br>";
			}
		}
		fclose($fp2);
		return $array;
	}
	#
	//해당 좌표의 동네 날씨를  가져온다.   해당좌표는 기상청사이트=>  http://www.kma.go.kr/weather/lifenindustry/sevice_rss.jsp  가서 확인해 보시면 됩니다.
	function area_weather_xml_parser($x,$y)
	{
		$array = array(); 

		$url1="www.kma.go.kr";
		$url2="GET /";
		$url2.="wid/queryDFS.jsp?gridx=".$x."&gridy=".$y;
		$url2.=" HTTP/1.0\r\nHost:www.kma.go.kr\r\n\r\n";

		$fp2 = fsockopen ($url1, 80, $errno, $errstr,30 );
		if (!$fp2) echo "?   $errstr ($errno)<br />n";
		else
		{
			fputs ($fp2, $url2);
			$i = 0; $j=0;
			while (!feof($fp2))
			{
				$line=fgets ($fp2,512);
				if(ereg("<tm>",$line))$array[date]= $this->iconv_UTF_8(trim(strip_tags($line))); 
				if($i==$j++ && ereg("<data",$line))
				{
					$area=preg_split("/\"/",$line);
					$area=preg_split("/\"/",$area[1]);
					$number = iconv_UTF_8(floor($area[0]));// iconv('UTF-8','EUC-KR',$area[0]); 
					
					$array[$i]= $number; 
				}

				if(ereg("<hour>",$line))$array[$i]['hour']=$this-> iconv_UTF_8(trim(strip_tags($line))); //시간 18일 경우  15~18시
				if(ereg("<day>",$line))$array[$i]['day']= $this->iconv_UTF_8(trim(strip_tags($line)));  //0:오늘 1:내일 2:모레
				if(ereg("<temp>",$line))$array[$i]['temp']=$this-> iconv_UTF_8(trim(strip_tags($line))); //현재시간온도
				if(ereg("<pty>",$line))$array[$i]['pty']=$this-> iconv_UTF_8(trim(strip_tags($line))); //강수상태코드  0:없음  1:비  2: 비/눈  3: 눈/비  4:눈
				if(ereg("<wfKor>",$line))$array[$i]['wfkor']=$this-> iconv_UTF_8(trim(strip_tags($line))); //날씨한국어  1:맑음 2:구름조금 3:구름많음 4:흐림 5:비 6:눈/비  7:눈
				if(ereg("<wfEn>",$line))$array[$i]['wfen']=$this-> iconv_UTF_8(trim(strip_tags($line))); //날씨영어  1:Clearly 2:Little Cloudy 3:Mostly Cloudy 4:Cloudy 5:Rainy 6:Snow/Rain  7:Snow
				if(ereg("<pop>",$line))$array[$i]['pop']= $this->iconv_UTF_8(trim(strip_tags($line))); //강수확률%
				//바람인 강수확률은 제외 필요하신분은 기상청에서 제공하는 pdf파일 참조해서 추가하세요 
				
				
				switch ($array[$i]['wfen']){
					case "Clear":
						$array[$i]['wfen'] = "맑음";
						break;
					case "Partly Cloudy":
						$array[$i]['wfen'] = "구름 조금";
						break;
					case "Mostly Cloudy":
						$array[$i]['wfen'] = "구름 많음";
						break;
					case "Cloudy":
						$array[$i]['wfen'] = "구름";
						break;
					case "Rain":
						$array[$i]['wfen'] = "비";
						break;
					case "Snow/Rain":
						$array[$i]['wfen'] = "비 또는 눈";
						break;
					case "Snow":
						$array[$i]['wfen'] = "눈";
						break;
				}
				
				if(ereg("</data>",$line))$i++;
			}
		}
		fclose($fp2);

		return $array;
	}

	function iconv_UTF_8($str)
	{
		return iconv('UTF-8','EUC-KR',$str); 
	}
}


function show_res($result,$city){
	foreach ($result as $key =>$value){
		if ($key == 0 ){ //print_r($value);
			
				$content2 = $city." 현재날씨 ".$value['wfen']." 온도 ".floor($value[temp])."℃";
			
		}
	}
	return $content2;

	}



$obj = new KmaWeather;

//테스트용 코드   $obj->area_weather_xml_parser('69','106')  //한번 찍어보시고 취향에 맞게 변경해서 사용하시면 되겠지여  

$memo .= "<table width='99%' border='0' align='center'><tr><td style='width:100%;
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
$result = $obj->area_weather_xml_parser('50', '120');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"인천")."</td></tr>";

								
$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
//광주광역시 : 35.126033, 126.831302
$result = $obj->area_weather_xml_parser('58', '74');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"광주")."</td></tr>";


$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
// 춘천 : 위도,경도:37.8813153,127.72997069999997
$result = $obj->area_weather_xml_parser('73', '134');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"춘천")."</td></tr>";


$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				

// 강릉 : 위도,경도:37.8813153,127.72997069999997
$result = $obj->area_weather_xml_parser('92', '132');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"강릉")."</td></tr>";


$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
//대구광역시 : 35.798838, 128.583052
$result = $obj->area_weather_xml_parser('89', '89');

$memo .= "<tr ><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"대구")."</td></tr>";
$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
//울산광역시 : 35.519301, 129.239078
$result = $obj->area_weather_xml_parser('100', '83');
$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"울산")."</td></tr>";


$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
//대전광역시 : 36.321655, 127.378953
$result = $obj->area_weather_xml_parser('67', '100');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"대전")."</td></tr>";


$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
				

//부산광역시 : 35.198362, 129.053922
$result = $obj->area_weather_xml_parser('97', '76');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"부산")."</td></tr>";


$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				
//제주시 : 35.198362, 129.053922
$result = $obj->area_weather_xml_parser('55', '43');

$memo .= "<tr><td style='width:30px; padding:10px 0 10px 0'>".show_res($result,"제주")."</td></tr></table>";

$memo .= "<tr><td style='width:100%; overflow:hidden; font-size:11pt; 
					height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></td></tr>";
				

echo json_encode($memo);
?>