<?

/***************************************************************************
 * 공통 파일 include
 **************************************************************************/
	include "_head.php";


/***************************************************************************
 * 게시판 설정 체크
 **************************************************************************/

// 사용권한 체크
	if($setup[grant_list]<$member[level] && !$is_admin) Error("사용권한이 없습니다","login.php?id=$id&page=$page&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&no=$no&s_url=".urlencode($REQUEST_URI));

// 검색조건이 있을때 : 상황 -> 카테고리 선택, Use_Showreply 사용, 또는 검색어로 검색을 할때
	if($s_que) {
		$_dbTimeStart = getmicrotime();
		$que="select * from $t_board"."_$id $s_que order by $select_arrange $desc limit $start_num, $page_num";
		$result=mysql_query($que,$connect) or Error(mysql_error());
		$_dbTime += getmicrotime()-$_dbTimeStart;
	}

// 검색 조건이 없을때 : 상황 -> 일반 정렬, 또는 정렬기준을 가지거나 Desc, Asc 일때.
	else {

		// 검색조건이 없고 정렬이 headnum에 의한 것일때;; 즉 일반 정렬일때;; 
		if ($select_arrange=="headnum"&&$desc=="asc") {
			while($division_data=mysql_fetch_array($division_result)) {
				$sum=$sum+$division_data[num];
				$division=$division_data[division];
	
				if($sum>=$start_num) {
					$start_num=$start_num-($sum-$division_data[num]);
					$_dbTimeStart = getmicrotime();
					$que="select * from $t_board"."_$id where division='$division' and headnum<0 order by headnum,arrangenum limit $start_num, $page_num";
					$result=mysql_query($que) or error(mysql_error());
					$_dbTime += getmicrotime()-$_dbTimeStart;
					$check1=1;
	
					$returnNum = mysql_num_rows($result);
	
					if($returnNum>=$page_num) { 
						break;
					} else {
						if($division>1) {
							$division--;
							$minus=$page_num-$returnNum;
							$_dbTimeStart = getmicrotime();
							$que2="select * from $t_board"."_$id where division=$division and headnum!=0 order by headnum,arrangenum limit $minus";
							$result2=mysql_query($que2) or error(mysql_error());
							$_dbTime += getmicrotime()-$_dbTimeStart;
							$check2=1;
							break;
						}
					}
				}
			}
		}

		// 검색조건은 없지만 정렬값이 생길때;;; //////////////////////////////
		else {
			$que="select * from $t_board"."_$id $s_que order by $select_arrange $desc $add_on limit $start_num, $page_num";
			$_dbTimeStart = getmicrotime();
			$result=mysql_query($que,$connect) or Error(mysql_error());
			$_dbTime += getmicrotime()-$_dbTimeStart;
		}
	}

// 관리자일때는 게시판 글 옮기기때문에 게시판 리스트를 뽑아옴;;
	if($is_admin) {
		$_dbTimeStart = getmicrotime();
		$board_result=mysql_query("select no,name from $admin_table where no!='$setup[no]'");
		$_dbTime += getmicrotime()-$_dbTimeStart;
	}


/***************************************************************************
 * 스킨에서 사용할 페이지 정리
 **************************************************************************/

	$print_page="";
	$show_page_num=$setup[page_num]; // 한번에 보일 페이지 갯수
	$start_page=(int)(($page-1)/$show_page_num)*$show_page_num;
	$i=1;

	$a_1_prev_page= "<Zeroboard ";
	$a_1_next_page= "<Zeroboard ";
	$a_prev_page = "<Zeroboard ";
	$a_next_page = "<Zeroboard ";

	if($page>1) $a_1_prev_page="<a onfocus=blur() href='$PHP_SELF?id=$id&page=".($page-1)."&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'>";

	if($page<$total_page) $a_1_next_page="<a onfocus=blur() href='$PHP_SELF?id=$id&page=".($page+1)."&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'>";

	if($page>$show_page_num) {
		$prev_page=$start_page;
		$a_prev_page="<a onfocus=blur() href='$PHP_SELF?id=$id&page=$prev_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'>";
		$print_page.="<a onfocus=blur() href='$PHP_SELF?id=$id&page=1&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'><font style=font-size:8pt>[1]</a><font style=font-size:8pt>..";
		$prev_page_exists = true;
		}

	while($i+$start_page<=$total_page&&$i<=$show_page_num) {
		$move_page=$i+$start_page;
		if($page==$move_page) $print_page.=" <font style=font-size:8pt><b>$move_page</b> ";
		else $print_page.="<a onfocus=blur() href='$PHP_SELF?id=$id&page=$move_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'><font style=font-size:8pt>[$move_page]</a>";
		$i++;
	}

	if($total_page>$move_page) {
		$next_page=$move_page+1;
		$a_next_page="<a onfocus=blur() href='$PHP_SELF?id=$id&page=$next_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'>";
		$print_page.="<font style=font-size:8pt>..<a onfocus=blur() href='$PHP_SELF?id=$id&page=$total_page&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$divpage'><font style=font-size:8pt>[$total_page]</a>";
		$next_page_exists = true;
	}

	// 검색시 Divsion 페이지 이동 표시
	if($use_division) {
		if($prevdivpage&&!$prev_page_exists) $a_div_prev_page="<a onfocus=blur() href='$PHP_SELF?id=$id&&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$prevdivpage'>[이전 검색]</a>...";
		if($nextdivpage&&!$next_page_exists) $a_div_next_page="...<a onfocus=blur() href='$PHP_SELF?id=$id&&select_arrange=$select_arrange&desc=$desc&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&sn1=$sn1&divpage=$nextdivpage'>[계속 검색]</a>";
		$print_page = $a_div_prev_page.$print_page.$a_div_next_page;

	}


/***************************************************************************
 * 각종 링크를 미리 지정하는 부분 
 **************************************************************************/

// 글쓰기버튼
	if($is_admin||$member[level]<=$setup[grant_write]) $a_write="<a onfocus=blur() href='write.php?$href$sort&no=$no&mode=write&sn1=$sn1&divpage=$divpage'>"; else $a_write="<Zeroboard ";

// 목록 버튼
	if($is_admin||$member[level]<=$setup[grant_list]) $a_list="<a onfocus=blur() href='$PHP_SELF?id=$id&page=$page&category=$category&sn=$sn&ss=$ss&sc=$sc&keyword=$keyword&prev_no=$no&sn1=$sn1&divpage=$divpage'>"; else $a_list="<Zeroboard ";

// 취소버튼
	$a_cancel="<a onfocus=blur() href='$PHP_SELF?id=$id'>";


// 정렬 버튼의 경우 $desc를 역으로 변환
	if($desc=="desc") $t_desc="asc"; else $t_desc="desc";

// 번호 정렬
	$a_no="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=headnum&desc=$t_desc'>";

// 제목 정렬
	$a_subject="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=subject&desc=$t_desc'>";

// 이름 정렬
	$a_name="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=name&desc=$t_desc'>";

// 조회순 정렬
	$a_hit="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=hit&desc=$t_desc'>";

// 추천수 정렬
	$a_vote="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=vote&desc=$t_desc'>";

// 날자별 정렬
	$a_date="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=reg_date&desc=$t_desc'>";

// 첫번째 항목의 다운로드 순서
	$a_download1="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=download1&desc=$t_desc'>";

// 두번째 항목의 다운로드 순서
	$a_download2="<a onfocus=blur() href='$PHP_SELF?$href&select_arrange=download2&desc=$t_desc'>";


/***************************************************************************
 * 정리한 데이타를 출력하는 부분 
 **************************************************************************/
if ($id == "dic"){
		include "dic.php";
		//echo "test";
	}
	else{
		
// 헤더 출력
	$_skinTimeStart = getmicrotime();
	if ($id == "news"){?>
		<!DOCTYPE html>
<html> 
<head>
	
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
    
	<base href="http://m.swave.woobi.co.kr/bbs/"> <!-- .htaccess 리다이텍트 때문에 베이스를 지정함 -->
	

	
		<link rel="stylesheet" href="css/style.min.css"> 
		<script src="js/jquery.min.js"></script>
		
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		 <!-- for swiper -->
	<script src="js/swiper.min.js"></script>
	<link rel="stylesheet" href="css/swiper.min.css">						
	
		<link rel="stylesheet" href="skin/news/style.css">						
	<link rel="stylesheet" href="css/style.css">
	<script src="js/dist/menu.js"></script>
	

	<style>
	
	img {
		boarder:0;
	}
		
	.news-title{
		font-size: 14px;
		font-weight:bold;
		text-align:center;
		padding: 8px;
		border: 0px solid #666666;
	}

	::-webkit-scrollbar { 
		display: none; 
	}
	 
.select_button {
	width:100%;
	background-color: #FEFEFE;
    border: 1px solid #ddd;
    -webkit-appearance:none;
    border-radius: 0px 3px 3px 0px;
    color: #555 !important;
   	
    font-size: 12px;
    
    text-align: center;
    
	height: 30px;
    box-sizing: border-box;
    
    cursor: pointer;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;
	}
	
	

/* General dropdown styles for category 카테고리 */       

.dropdown { margin:0px; padding-left:3px; border:0px solid #eeeeee}


.dropdown dt a {background:#e4dfcb;
    display:block; 
	padding-right:20px; 
	border:1px solid #d4ca9a; 
	width:200px;
	}
.dropdown dt a span {cursor:pointer; 
	height:50px; display:block; padding:0px;}

.dropdown dd ul { background:#e4dfcb none repeat scroll 0 0; display:none;
    list-style:none; 
	padding:10px 0px; 
	position:relative; 
    left:0px; top:2px; width:auto;
	}
	
	.dropdown dd ul span { 
		height:100px;
		padding:15px 0px 15px 0px;
	}
	
	.dropdown dd ul li { 
		padding:5px 0px 5px 5px;
		display:block;
	}
	
	
	
	
	</style>
</head>


<body >
	<?	
		include "header.php";
		
	}
	else {head('',"script_list.php");}

	
// 상단 현황 부분 출력 
	include "$dir/setup.php";
	
	$_skinTime += getmicrotime()-$_skinTimeStart;

	
// 현재 선택된 데이타가 있을때, 즉 $no 가 있을때 데이타 가져옴
	if($no&&$setup[use_alllist]) {
		$_view_included = true;
		include "view.php";
	}

	if ($id=="news"){
							
					// 뽑혀진 데이타만큼 출력함
							
					$cat = 4;

									// 리스트의 상단 부분 출력
										$_skinTimeStart = getmicrotime();
										include "skin/".$id."/list_head.php";
										$_skinTime += getmicrotime()-$_skinTimeStart;

									//가상번호를 정함
										$loop_number=$total-($page-1)*$page_num;
										if($setup[use_alllist]&&!$prev_no) $prev_no=$no;

										$que2="select * from zetyx_board_news where category=$cat order by $select_arrange $desc $add_on limit 20";
										$res2=mysql_query($que2,$connect) or Error(mysql_error());
										while($data=@mysql_fetch_array($res2)) {
											list_check(&$data);
											$_skinTimeStart = getmicrotime();
											if($data[headnum]>-2000000000) {include "skin/".$id."/list_main.php";}
											else {include $dir."/list_notice.php"; }
											$_skinTime += getmicrotime()-$_skinTimeStart;
											// $loop_number--;
											//echo "dddd";
										}
										
										// 마무리 부분 출력하는 부분;;
											
										//include "skin/".$id."/list_foot.php";
										
										
										echo "</table></div>";
									
								
								
								
				
	} elseif ($id=="video"){
			echo "<div class='swiper-container'><div class='swiper-wrapper'>";
					// 뽑혀진 데이타만큼 출력함
								for ($cat=4; $cat<=9; $cat++){
									
									// 리스트의 상단 부분 출력
									$_skinTimeStart = getmicrotime();
									include "skin/".$id."/list_head.php";
									$_skinTime += getmicrotime()-$_skinTimeStart;

								//가상번호를 정함
									$loop_number=$total-($page-1)*$page_num;
									if($setup[use_alllist]&&!$prev_no) $prev_no=$no;

									$que2="select * from $t_board"."_$id where category=$cat order by $select_arrange $desc $add_on limit 20";
									$res2=mysql_query($que2,$connect) or Error(mysql_error());
									while($data=@mysql_fetch_array($res2)) {
										list_check(&$data);
										$_skinTimeStart = getmicrotime();
										if($data[headnum]>-2000000000) {include "skin/".$id."/list_main.php";}
										else {include $dir."/list_notice.php"; }
										$_skinTime += getmicrotime()-$_skinTimeStart;
										// $loop_number--;
										//echo "dddd";
									}
									
									// 마무리 부분 출력하는 부분;;
										
									//include "skin/".$id."/list_foot.php";
									
									
									echo "</table></div>";
								}
								echo "</div></div>";
								
								if ($id =="news" || $id=="video"){
				include "skin/$id/recent_$id.php";
								}
		
	}else {
		// 리스트의 상단 부분 출력
		$_skinTimeStart = getmicrotime();
		include $dir."/list_head.php";
		$_skinTime += getmicrotime()-$_skinTimeStart;

		//가상번호를 정함
		$loop_number=$total-($page-1)*$page_num;
		if($setup[use_alllist]&&!$prev_no) $prev_no=$no;

		while($data=@mysql_fetch_array($result)) {
			list_check(&$data);
			$_skinTimeStart = getmicrotime();
			if($data[headnum]>-2000000000) {
				include $dir."/list_main.php";
				
				}
			else {include $dir."/list_notice.php"; }
			$_skinTime += getmicrotime()-$_skinTimeStart;
			$loop_number--;
	}
	

	if($check2) {
		while($data=@mysql_fetch_array($result2)) {
			list_check(&$data);
			$_skinTimeStart = getmicrotime();
			if($data[headnum]>-2000000000) {include $dir."/list_main.php";}
			else {include $dir."/list_notice.php"; }
			$_skinTime += getmicrotime()-$_skinTimeStart;
			$loop_number--;
		}
	}
	
	

// 마무리 부분 출력하는 부분;;
	$_skinTimeStart = getmicrotime();
	include $dir."/list_foot.php";
	$_skinTime += getmicrotime()-$_skinTimeStart;

	if($zbLayer) {
		$_skinTimeStart = getmicrotime();
		//echo "\n<script>".$zbLayer."\n</script>";
		//unset($zbLayer);
		$_skinTime += getmicrotime()-$_skinTimeStart;
	}
	
	}
	}
	
	if($id=="news"){	
		?>
		<script>
			$.each($('.webzine-img'), function () { 
				//alert($(this).attr("classname"));
				$(this).attr('src', $(this).attr( 'data-src' ));
			});
		</script>
	
	<?
	}
	foot();
	
	
	
// for dic search
	$search = $_GET['keyword'];
	//echo "<script>alert(".$search.");</script>";
			$conn = mysql_connect("localhost", "swave", "starman");
	
			mysql_select_db("swave", $conn);
							
	   
	if ($search !="" && $member[user_id]=="admin"){	
			$search = addslashes($search);	// to contain comma
			// $sql = "insert into search_word (word) values ('$search')";
			$sql = "insert into search_word (word) values ('$search')";
			$result = mysql_query($sql) or die(mysql_error());
	}
	?>
	
	
	
<script>
function gototop(){
//	alert("ddd");
	 $("html, body").animate({ scrollTop: 0 }, "fast");
}

$(function() {
 if ("<?=$_GET['id']?>" == "video"){ //비동기 이미지 로더
		echo.init();
	  }
});
</script>

<div id='bottomMenu' style='position: fixed;
    bottom: 20px; z-index:999;
    right: 20px; opacity: 0.5;
    filter: alpha(opacity=50); /* For IE8 and earlier */'>
 
 
 <img style='border:none;z-index:999' id='top' src='images/arrow-up-128.gif' onclick='gototop();'>
</div>
<?
/***************************************************************************
 * 마무리 부분 include
 **************************************************************************/
	include "_foot.php";
?>