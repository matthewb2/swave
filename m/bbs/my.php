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

$user = $member[user_id];

$username = $member[name];


echo $user;
			
	include "dbconnect.php";
//$search = preg_replace('/\s+/','',$search);

	
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


			<table width="100%"><tr><td>
			<div>   
				<input id="address" type="hidden" value=<?=urlencode($search)?>>   
				
			</div>   
  
			</td></tr></table>
			

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
	


	
	//전역 변수 설정
	$subject = array();
	$board = array();
	$sitelink1 = array();
	$memo = array();
	
					
				


$sql = " select * from zetyx_board_doc where name='$username' limit 10      ";
	$result = mysql_query($sql) or die(mysql_error());
						
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
						var_dump($subject);

}
						   
  ?>
			
	<table width='100%' cellspacing="2" cellpadding="2">
			
					
					<? include "search_view.php"; ?>
				</table>
			

<?

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

			

</body>
</html>
