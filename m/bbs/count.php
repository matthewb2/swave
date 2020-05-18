<?php
$host = "localhost"; //호스티이름
$id = "swave"; //관리자계정
$pass = "starman"; //관리자비밀번호


/* --- mysql접속과 데이터베이스 선택 --- */
$connect = mysql_connect($host,$id,$pass) or die("mysql 접속 에러");
mysql_select_db("swave", $connect) or die("데이터베이스 선택 에러"); //apm_db선택


/* --- 날짜의 형식 지정 --- */
$YY = date("Y");
$MM = date("m");
$DD = date("d");


$dat = $YY ."-". $MM ."-". $DD; //날짜의 형식 지정(2011-5-19)


/* --- 테이블에서 등록일자가 오늘인 레코드 조회 쿼리 --- */
$sql = "select * from count_table WHERE redate = '$dat' ";
$result = mysql_query($sql, $connect);
$list = mysql_num_rows($result);

//echo "cookie:".$_COOKIE[$ip];


				/* --- 레코드 조회건수를 구분하여 수행 --- */
				if(!$list){
				$count = 0; //조회건수가 1미만이면 count=0으로 초기화하기
				}
				else{
				$row = mysql_fetch_array($result); //레코드를 배열로 불러오기
				$count = $row[cnt];
				}

				/* --- 오늘 처음 방문인지, 기존방문자가 있는지 확인하는 처리 --- */
				if($count == 0){ //처음방문자일경우 레코드를 생성
					// if($_COOKIE["visit"] <= time()-3600){
						$count++;
						$to_sql = "insert into count_table(cnt, redate) values($count,'$dat');";
					// }
				}
				else { //기존방문자가 있을 경우
					if($_COOKIE[$ip] <= time()-3600*12){
					
						$count++;
						$to_sql = "update count_table SET cnt=$count WHERE redate='$dat'";
					}
				}



/* --- 생성된 방문자 쿼리 실행 --- */
mysql_query($to_sql, $connect);


/* --- 전체 방문자 수를 조회 --- */
$total_sql = "select sum(cnt) from count_table;";
$total_rst = mysql_query($total_sql, $connect);


/* --- 조회 쿼리 실행후 결과 셋에서 첫번째 레코드를 할당 --- */
$total_row = mysql_fetch_array($total_rst);
$total = $total_row[0]; //첫번째 필드값을 할당

// mysql_close($connect); 



?>