<?php
	$imgWidth = 120; //이미지 가로크기 (겔러리)
	$imgHeight = 120; //이미지 세로크기 (겔러리)
	$subjectLength = 20; // 제목 자르기...글자수! (겔러리)
	$memoLength = 300; //내용 자르기 .. 글자수! (웹진)
	$viewWidth = 700; // 내용보기에서 이미지 최대 넓이 (전체)
	$maxDepth = 5; // 계층형 코멘트 최대 단계수 (전체)
?>
<?php
	$a_member_memo = str_replace("zeroboard","a style='display:none'>",strtolower($a_member_memo));
	$a_member_modify = str_replace("zeroboard","a style='display:none'>",strtolower($a_member_modify));
	$a_login = str_replace("zeroboard","a style='display:none'>",strtolower($a_login));
	$a_logout = str_replace("zeroboard","a style='display:none'>",strtolower($a_logout));
	$a_member_join = str_replace("zeroboard","a style='display:none'>",strtolower($a_member_join));
	$a_setup = str_replace("zeroboard","a style='display:none'>",strtolower($a_setup));
	$a_file_link1 = str_replace("zeroboard","a style='display:none'>",strtolower($a_file_link1));
	$a_file_link2 = str_replace("zeroboard","a style='display:none'>",strtolower($a_file_link2));
?>

	<div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="500px" style="  border-collapse: separate;
    border-spacing: 20px 0px">
				<tr>
					<td id='header2-1' class="news-title"><a href="zboard.php?id=news&category=4">IT</a></td> 
					<td id='header2-2' class="news-title"><a href="zboard.php?id=news&category=5">금융</a></td> 
					<td id='header2-3' class="news-title"><a href="zboard.php?id=news&category=6">신소재</a></td> 
					<td id='header2-4' class="news-title"><a href="zboard.php?id=news&category=7">우주</a></td> 
					<td id='header2-5' class="news-title"><a href="zboard.php?id=news&category=8">의료</a></td>
					<td id='header2-6' class="news-title"><a href="zboard.php?id=news&category=9">환경</a></td>
				</tr>
			</table>
		</div>