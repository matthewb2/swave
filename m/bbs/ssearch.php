<? 
	include "_head.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <script src="js/jquery.min.js"></script>
   <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />
  <script src="js/jquery.min.js"></script>
   <script src="js/swiper.min.js"></script>

 <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/dist/menu.js"></script>
  					<script src="js/jquery.totop.js"></script>
					<link rel="stylesheet" href="css/totopFA.css">
					 <link rel="stylesheet" href="css/style.css">
					<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	

<link href="http://code.google.com/apis/maps/documentation/javascript/examples/default.css" rel="stylesheet" type="text/css" />   
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>   
<script type="text/javascript">   
var geocoder;  
var map;  
var marker;  
  
function initialize(){  
    geocoder = new google.maps.Geocoder();  
    var latlng = new google.maps.LatLng(-34.397, 150.644);  
    var myOptions = {  
     center: null, // map center
				zoom: 0, //zoom level, 0 = earth view to higher value
				maxZoom: 20,
				minZoom: 0,
				//streetViewControl: false, // desactiver le zoom
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.BIG //zoom control size
				},
				scaleControl: true, // enable scale control
			//	mapTypeId: google.maps.MapTypeId.HYBRID 
				mapTypeId: google.maps.MapTypeId.ROADMAP  
    }  
    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
	//alert("sucess");
	codeAddress();
	
}  

google.maps.event.addDomListener(window, 'load', initialize);
  
function codeAddress(){  
    var address = document.getElementById("address").value;  
    var r = document.getElementById("r");  
	
	var bounds = new google.maps.LatLngBounds();
	var infowindow = new google.maps.InfoWindow();   
      
    r.innerHTML = '';  
      
    geocoder.geocode({  
        'address': address  
    }, function(results, status){  
        if (status == google.maps.GeocoderStatus.OK) {  
            
            //addMark(results[0].geometry.location.lat(), results[0].geometry.location.lng());  
                          
            for(var i in  results){  
			
			map.setCenter(results[0].geometry.location);  
			 var marker = new google.maps.Marker({
						position: new google.maps.LatLng(results[i].geometry.location.lat(),
										results[i].geometry.location.lng()),
					map: map
					});
			
			 bounds.extend(marker.position);
			 
			  google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
				  infowindow.setContent(results[i].formatted_address);
				  infowindow.open(map, marker);
				}
			  })(marker, i));
                //r.innerHTML += results[i].formatted_address+',';  
                var li = document.createElement('li');  
                var a = document.createElement('a');  
                a.href = "javascript:addMark(" + marker.position.lat() + ", " + marker.position.lng() + ");";  
                a.innerHTML = results[i].formatted_address;  
   
                //li.appendChild(a);  
                //r.appendChild(li);  
            }
								
				//now fit the map to the newly inclusive bounds
				map.fitBounds(bounds);
				map.setZoom(10);
        } else {  
            r.innerHTML = "검색 결과가 없습니다."+status;              
        }  
    });  
}  
  
function addMark(lat, lng){  
    if(typeof marker!='undefined'){  
        marker.setMap(null);  
    }  
      
    marker = new google.maps.Marker({  
        map: map,  
        position: new google.maps.LatLng(lat, lng)  
    });  
}  


  
</script>	
	<style>
	
.search_title{
	padding:2px 0 3px 0px;
}
</style>
	
	</head>
<body>
<?

include "header.php";

$search = $_GET['search'];

?>


<!-----------구글지도 검색----->

	<?
	if ($search==""){
	//echo "enter the kwy world";
	//alert("검색어가 없습니다");
} else{
// 구글 지도에서 검색

			
	include "dbconnect.php";
//$search = preg_replace('/\s+/','',$search);
		echo $search;

$search2= split(' ', $search);
if (count($search2) ==2){
	$sql = "SELECT count(*) as total FROM zetyx_board_map WHERE memo like '%$search2[0]%' AND memo like  '%$search2[1]%'";}
else  {$sql = "SELECT count(*) as total FROM zetyx_board_map WHERE memo like '%$search%'";
}
	$result = mysql_query($sql) or die(mysql_error());

	$data=mysql_fetch_assoc($result);
	
	if ($_GET[category]=="" && $data['total']>=1){
			?>
			<!-- 검색 카테고리 -->
				<div style="height:50px; border-bottom: 1px solid #ddd; overflow-x: scroll;
							-webkit-overflow-scrolling: touch;">
							<table style="width:500px; border-collapse: separate;
					border-spacing: 20px 0px; padding:5px; margin-top:5px; vertical-align:middle">
								<tr>
									<td id='header2-1' class="search_title"><a href="ssearch.php?id=doc&ss=on&search=<?=$search?>">문서</a></td> 
									<td id='header2-2' class="search_title"><a href="ssearch.php?id=image&search=<?=$search?>">이미지</a></td> 
									<td id='header2-3' class="search_title"><a href="ssearch.php?id=video&search=<?=$search?>">동영상</a></td> 
									<td id='header2-4' class="search_title"><a href="zboard.php?id=dic&search=<?=$search?>">사전</a></td> 
									<td id='header2-5' class="search_title"><a href="ssearch.php?id=fsites&search=<?=$search?>">웹링크</a></td>
								</tr>
							</table>
				</div>

<? if ($id ==""){  ?>
			<table width="100%"><tr><td>
			<div>   
				<input id="address" type="hidden" value=<?=urlencode($search)?>>   
				
			</div>   
			<div id="r"></div>    
			<div id="map_canvas" style="height:200px;width:100%"></div>  
			</td></tr></table>
			
		<?	
}
			} 
			
}
			

if ($search==""){
	//echo "enter the kwy world";
	//alert("검색어가 없습니다");
} else{
	$f="/home/swave50/www/bbs/testdata.json";


	$temp=array(array());
	$contents = file_get_contents($f);
	
	$temp = json_decode($contents); 
	
	$reg_time = time();
	//한글입력
	//$search = iconv(&quot;euc-kr&quot;, &quot;UTF-8&quot;, $search);
	 $new = array("time"=>time(), "term"=>$search);
	//$new = array(&quot;time&quot;=&gt;time(), &quot;term&quot;=&gt;&quot;test&quot;);
	
	if ($temp){
	array_unshift($temp, $new);
	//echo &quot;&lt;script&gt;alert(&#39;success&#39;);&lt;/script&gt;&quot;;
	//
	}
	
		//33000개만 남기고 나머지는 잘라냄
	$temp = array_slice($temp, 0, 333000);   // returns "a", "b", and "c"
	
	if ($temp){
		//echo &quot;&lt;script&gt;alert(&#39;success&#39;);&lt;/script&gt;&quot;;
		if (json_encode($temp)){
		file_put_contents($f, json_encode($temp));
		//echo &quot;&lt;script&gt;alert(&#39;success&#39;);&lt;/script&gt;&quot;;
		}
	}
}

?>

 <?
	$stime=(double)microtime()+time();

	function error_MSG($error_MSG){
		global $bgcolor;
		unset($bgcolor);
		echo "
		<SCRIPT LANGUAGE=JavaScript>
		alert ('$error_MSG');
		history.go(-1);
		</SCRIPT>
		";

		exit;
	}
	

	
	$search = $_GET[search];
	$keyword = $search;
	$id = $_GET[id];
	
	
	$show_page_num=10;
	
	//부적절한 단어를 검색에서 제외
	$bad = array('자살', '섹스');
	
	function findStr($arr, $str) 
	{  
		foreach ($arr as $s) 
		{
			if ($str){
		   if(strpos($s, $str) !== false)
			   return $s;
			}
		}

		return "";
	}

	if (findStr($bad, $search) !== "") {
		echo "부적절한 단어입니다";
		echo "<br>";
		
	} else{
	//찾을 테이블 게시판
	
	if (preg_match('/[a-zA-Z]/i',$search)){   //검색어가 영문으로 들어온다면 사전에 검색어가 있는지를 검색
			//$arr = array("dic");
			$arr = array("dic", "image", "news", "video", "doc", "fsites");
	} else {
		if ($id){
			$arr = array($id);
		} else $arr = array("doc", "image", "news", "video", "dic", "fsites");
	}
	
	//전역 변수 설정
	$subject = array();
	$board = array();
	$sitelink1 = array();
	$memo = array();
	$reg_date = array();
	
	
	$search			= trim($search);
	$ssearch		= explode(" ",$search);
	foreach ($ssearch as $s_words){
		if (mb_strlen($s_words,'utf-8')>=2){
			$newsearch[] = $s_words;      // 검색어가 한 자리일 때는 검색에서 제외
		}
	}
	//print_r($newsearch);
	
	$ssearch = $newsearch;
	
	//print_r($ssearch);
	
	if ($ssearch){
		$total = 0;
		//echo $ssearch;
		
		foreach ($arr as $id) {
			//echo $id;
		
			foreach ($ssearch as $search){
			//	echo $search;
		
		$count = "select * from zetyx_board_$id where (subject LIKE '%$search%' OR memo LIKE '%$search%') limit 500";
				$result = mysql_query($count);
			$total += mysql_num_rows($result);	
		
			}
		}
		
		//$total = $total -2;
		
		
		foreach ($arr as $id) {
		
			foreach ($ssearch as $search){
				if ($search){
					$query = "select * from zetyx_board_$id where (subject LIKE '%$search%' OR sitelink2 LIKE '%$search%' OR memo LIKE '%$search%') limit 500";
					
					$result = mysql_query($query);
					
				

						
						//echo "<table width='100%'>";
						$i=0;
						
						while($row = mysql_fetch_array($result)) {
							if ($row[subject] == "" || $row[subject] == null || $row[subject] == "undefined" ){}
								else {
								   //echo $row[subject];
								   $board[] = $id;
								   $subject[] = stripslashes($row[subject]);
								   $memo[] = stripslashes($row[memo]);
								   // $id = "doc";
								   $hit[] = $row[hit];
								   $vote[] = $row[vote];
								   $sitelink1[] = $row[sitelink1];
								   $file_name1[] = $row[file_name1];
								   $reg_date[] = date("Y-m-d",$row[reg_date]);
								   $no[] = $row[no];
								   $i++;
							}
						   
					}
				}
					//$row=3;
					// echo "<script>alert($i);</script>";
					
					
				//echo "</table>";
		
			}
					
		
		}
	}?>		

<?php
if($list_empty == true) {
	echo "<tr><td align=center valign=middle height=100 colspan=6 bgcolor=#fefdfc style='font-size:9pt; color:#555555'>등록된 게시물 또는 검색결과가 없습니다.</td></tr>";
}
?>

<?

 // echo "found total ".$total;

if ($total > 0){
// 페이지 관련 변수값 정함
			$page_num= 10; //목록에 한 번에 보여질 글의 개수
			// $total = $i;
			//echo $total;
				//$page = $_GET[page];
				//$page = 2;

			if(!$page) $page=1; // 만약 $page라는 변수에 값이 없으면 임의로 1 페이지 입력
		
			$total_page=(int)(($total)/$page_num)+1; // 전체 페이지 구함
			//echo $total_page;
			
			if($page>$total_page) $page=$total_page; // 페이지가 전체 페이지보다 크면 페이지 번호 바꿈
		
			$start_num=($page-1)*$page_num+1; // 페이지 수에 따른 출력시 첫번째가 될 글의 번호 구함
	
			//echo $start_num;
				?>
				<div>
				<!--
				<table width='100%' style="width:100%; font-style:left; font-size:10pt; border: 1px solid #e1e1e1; 
															cursor:pointer" >
				
				<tr><td>
				-->
				</div>
				
				
				
				<table width='100%' style="width:100%; font-style:left; font-size:10pt; border: 1px solid #e1e1e1">
				<tr><td>
				
				
<!-----------화학DB에서 검색----->

	<?
	
			
	include "dbconnect.php";
							
	//화학DB에서 검색
	$sql = "SELECT * FROM zetyx_board_iupac WHERE subject like '%$search%' or memo like '%$search%'";
	$result = mysql_query($sql) or die(mysql_error());


	while($row = mysql_fetch_array($result) ){
		
		$c_memo = $row['memo'];
	$c_memo = str_replace("<p>","",$c_memo);
	$c_memo = str_replace("</p>","",$c_memo);
	
	?>		<table width="100%"><tr><td style="vertical-align:top">
			<div style="vertical-align:top"><?=$row['subject']?>   
			<br><? echo(strip_tags($c_memo));?>
			
			
			</div>   
			<td>
			<?
			$file_url = str_replace("/home/swave50/www/bbs/","",$row['file_name1']);
			
			?>
			<img src="http://swave.woobi.co.kr/bbs/<?=$file_url?>"></img>
			</td></tr></table>
			
			<?
	} 
				
	//		모카위키에서 검색
			if (!$_GET[id]){
				$files1 = scandir('/home/swave50/www/pmwiki/wiki.d/');
				
				
				foreach ($files1 as $names){
				//echo $names;	
				 if (preg_match('/'.$search.'/i', $names)){
					 $token=1;
					 $to = $names;
					 $subject5 = str_replace('Main.','',$names);
					 $subject5 = str_replace($search,'<font color=#ff8c00>'.$search.'</font>',$subject5);
					?>
					<tr><td style="vertical-align:middle; line-height:150%; border-bottom:1px solid #e1e1e1; height:60px; padding:5px; font-size:11pt; color:#000000" 
														onclick="window.location='http://swave.woobi.co.kr/pmwiki/pmwiki.php?n=<?=$names?>'">
														
														<img src="images/icon_sm_page_white.gif" />&nbsp;모카위키
														<br><?=$subject5?>
					
					
					<?}
							
				}
				if ($token){
				$homepage = file_get_contents('/home/swave50/www/pmwiki/wiki.d/'.$to);
				$home = explode('text=',$homepage);
				$sub = "<br>".str_replace('!!','',$home[1]);
				$sub = str_replace('%0a','<br>',$sub);
				$sub = str_replace('<br><br>','',$sub);
				
				//$subject5 = str_replace('Main.','',$names);
				
								
				$cont =  mb_substr($sub, 0, 200, 'UTF-8');
				$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)(\.(?i)(jpg|png|gif|bmp))/";
				preg_match($reg_exUrl, $sub, $url);
				//echo $url[0];
				//$test = explode('jpg',$url[0]);
				
				$test = $url[0];
				//$test = str_replace('"','',$test);
				//echo $test[0];
				$cont = preg_replace("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)(\.(?i)(jpg|png|gif|bmp))/","",$cont);
				$cont = str_replace('<br><br><br>','',$cont);
				
				// echo "<span style='padding:15px'>".$cont."</span>";   //내용을 잘라서 압축해서 출력
				echo "<font size='2'>".$cont."</font>";   //내용을 잘라서 압축해서 출력
				} 
				echo "</td></tr></table>";

			}
				?>
					
				<table width='100%' cellspacing="2" cellpadding="2">
					<? // echo $total;
					//메인 뷰로 연결
					?>
					
					<? include "search_view.php"; ?>
				</table>
			


<?

} else {
	//echo "<table cellpadding=2><tr><td align='center'>";
	//echo "검색결과가 없습니다";
	//echo "</tr></td></table>";
	}
	
	
	
			
/***************************************************************************
* 네이버 스타일 페이지 리스트
**************************************************************************/
//$print_page2="";
//$show_page_num=$setup[page_num]; // 한번에 보일 페이지 갯수


//$start_page=(int)(($page-1)/$show_page_num)*$show_page_num;
 $dir = "/bbs/skin/zb5_style";
$PHP_SELF = "ssearch.php";

$i=1;

//$total_page = 5;
$show_page_num = 5;
$a_prev_page2 = "<table cellspacing=0 cellpadding=0 border=0 align=center><tr>";
$a_next_page2 = "</tr></table>";

/*
if($page>$show_page_num) {
$prev_page=$start_page;
$a_prev_page2.="<td style='padding:3 2 0 3''><a class='link_page' href='$PHP_SELF?id=$id&page=1&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&tkw=$tkw&within=$within&tsc=$tsc&tsn=$tsn&tss=$tss&sn1=$sn1&divpage=$divpage'>[처음으로]</a></td>";
$print_page2.="<td style='padding:3 2 0 3'' nowrap><a class='link_page' href='$PHP_SELF?id=$id&page=$prev_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&tkw=$tkw&within=$within&tsc=$tsc&tsn=$tsn&tss=$tss&sn1=$sn1&divpage=$divpage'>[이전]</a></td>";
$prev_page_exists = true;
}
*/
while($i+$start_page<=$total_page && $i<=$show_page_num) {
$move_page=$i+$start_page;
if($page==$move_page) 
	$print_page2.="<a style=' margin-top:3px;background: #00648c;
	height:40px;width:40px;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;' href='$PHP_SELF?id=$id&page=$move_page&search=$search'>$move_page</a></td>";
else $print_page2.="<a style=' margin-top:3px;background: #28aadc;
    height:40px;width:40px;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;' href='$PHP_SELF?id=$id&page=$move_page&search=$search'>$move_page</a></td>";
$i++;
}
/*
if($total_page>$move_page) {
$next_page=$move_page+1;
$a_next_page2="<td style='padding:3 2 0 3' nowrap><a class='link_page' href='$PHP_SELF?id=$id&page=$total_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&tkw=$tkw&within=$within&tsc=$tsc&tsn=$tsn&tss=$tss&sn1=$sn1&divpage=$divpage'>[마지막]</a></td></tr></table>";
$print_page2.="<td style='padding:3 2 0 6' nowrap><a class='link_page' href='$PHP_SELF?id=$id&page=$next_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&tkw=$tkw&within=$within&tsc=$tsc&tsn=$tsn&tss=$tss&sn1=$sn1&divpage=$divpage'>[다음]</a></td>";
$next_page_exists = true;
}
*/
?>


<table>
<tr>
<td>
&nbsp;
</td>
</tr>
</table>

			



			
			
			
<? 
include "dbconnect.php";
	$sql = "select * from search_relate where kword ='$_GET[search]' or rword1='$_GET[search]'";
	$result = mysql_query($sql, $conn);
	//echo $result;
	//$row = mysql_fetch_array($result);
	//echo $row[0];
	?>
	
	
<?
$urlsearch = urlencode($_GET[search]);
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<form name="search_realte" action="relatewords.php" method="post">
<input type="hidden" name="sno" value="<?=$sno?>">
<input type="hidden" name="siche" value="search">
<input type="hidden" name="page" value="1">
<input type="hidden" name="category" value="<?=$category?>">
<input type="hidden" name="search" value="<?=$urlsearch?>">

<tr>
	<td width="100" style="font-family:tahoma;font-size:10pt;padding-left:5px">
	관련검색어
	</td>
</tr>
<? while($row = mysql_fetch_array($result) ){
	if ($row[rword1]){
	
	?>
<tr>
	<td style="vertical-align:middle; line-height:150%; border-bottom:1px solid #e1e1e1; 
	height:50px; padding;0px; font-size:10pt; color:#000000" onclick="window.location='ssearch.php?search=<?=$row[rword1]?>'">
		&nbsp;<img src="images/icon_sm_page_white.gif" />&nbsp;
							
	<?
	echo "<a href='ssearch.php?sno=1&siche=search&page=1&sn=1&sm=1&oga=or&search=$row[rword1]'>$row[rword1]</a>";
		//	echo "&nbsp;";
		//	echo "<a href='ssearch.php?sno=1&siche=search&page=1&sn=1&sm=1&oga=or&search=$row[rword2]'>$row[rword2]</a>";
	?>
	</td>
</tr>
<?	}
}?>
		
	</td>
	</tr>
	<tr>
	<? if($member[level]==1){?>
	<td style="  padding:5px;height:50px"><a href="http://m.swave.woobi.co.kr/bbs/delete_rel.php?del=%EA%B5%90%ED%86%B5%EC%82%AC%EA%B3%A0">관련검색어 삭제</a> 
	</td>
	<?}?>
	</tr>
	</table>
	</td>
</tr>
	
<tr>
	<td style="height:50px; vertical-align:middle;padding:5px">
	<input type="text" name="wordsr" style="height:40px;padding-left:3px;margin-left:3px">
	</td>
</tr>
<tr>	
	<td colspan="2">
		<input type="submit" class="submit_button" style="height: 50px" value="입력">
	</td>
	</tr>
	
</form>
</table>
<!---------------->
<?}?>
</div>


  <footer>
    	<div style="text-align:center">SWAVE 2019 Designed by <a href="http://mobifreaks.com" target="_blank">Mobifreaks</a></div>
    </footer>
  </div>
 
<script>
localStorage.setItem('oldurl','ssearch.php?search=<?=$search?>');
</script>

<script type="text/javascript">
$(document).ready(function(){
	
	 $('.search-box' ).show();
		   $('.menu' ).hide();   

  
});
   window.addEventListener("load",function() {
	  // Set a timeout...
	  setTimeout(function(){
	    // Hide the address bar!
	    window.scrollTo(0, 1);
	  }, 0);
	});
   $('.search-box,.menu' ).hide();   
   $('.options li:first-child').click(function(){	
   		$(this).toggleClass('active'); 	
   		$('.search-box').toggle();        			
   		$('.menu').hide();  		
   		$('.options li:last-child').removeClass('active'); 
   });
   $('.options li:last-child').click(function(){
   		$(this).toggleClass('active');      			
   		$('.menu').toggle();  		
   		$('.search-box').hide(); 
   		$('.options li:first-child').removeClass('active'); 		
   });
   $('.content').click(function(){
   		$('.search-box,.menu' ).hide();   
   		$('.options li:last-child, .options li:first-child').removeClass('active');
   });
</script>


<!-- menus script -->
<script>
 
 $("#top").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});

  /**
   * Slide right instantiation and action.
   */
  var slideRight = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-right',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideRightBtn = document.querySelector('#c-button--slide-right');
  
  slideRightBtn.addEventListener('click', function(e) {
	  //alert("test");
    e.preventDefault;
    slideRight.open();
  });


</script>



<!--
	Author Details
	==============

	Author: Mobifreaks
	Author URL: http://mobifreaks.com

	Attribution( is must on every page, where this work is used. should be visible to naked eye and Search engine bot[ means should not use noindex, nofollow relations ]):

	// a healty attribution looks like following
	<a href="http://mobifreaks.com" target="_blank">Design by Mobifreaks</a>

	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/

	if any regards of infringement, may lead to lawsuit under Digital Millennium Copyright Act (DMCA)

	For Attribution removal request. please consider contacting us through http://mobifreaks.com/feedback/ or mail us at support[at]mobifreaks.com
 -->
</body>
</html>
