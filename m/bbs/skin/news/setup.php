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
	
			
		<? if($is_admin) {?>	
			
<form method="get" name="search" action="<?=$PHP_SELF?>" onsubmit="return check_search_form(this)" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
<input type="hidden" name="desc" value="<?=$desc?>" />
<input type="hidden" name="page_num" value="<?=$page_num?>" />
<input type="hidden" name="selected" />
<input type="hidden" name="exec" />
<input type="hidden" name="sn" value="<?=$sn?>" />
<input type="hidden" name="ss" value="<?=$ss?>" />
<input type="hidden" name="sc" value="<?=$sc?>" />
<input type="hidden" name="category" value="<?=$category?>" />

<table border=0 width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">

<tr height="5px"><td colspan="5"></td></tr>
<colgroup><col width="100px"><col width="6px"><col><col width="6px"><col width="75px"></colgroup>

<tr height="20px"><td colspan="5" align="center"></td></tr>


		
</table>
</form>
		<?}?>


		<div style="margin:-25px 0 5px 0; border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table border="0" width="500px" style="border-collapse: separate;
    border-spacing: 20px 0px; padding:0px; font-size: 13px;">
				<tr style="padding:0px; font-size: 13px;">
					<td id='header2-1' class="news-title" ><a href="zboard.php?id=<?=$id?>&category=4">IT</a></td> 
					<td id='header2-2' class="news-title" ><a href="zboard.php?id=<?=$id?>&category=6">신소재</a></td> 
					<td id='header2-3' class="news-title" ><a href="zboard.php?id=<?=$id?>&category=7">우주</a></td> 
					<td id='header2-4' class="news-title" ><a href="zboard.php?id=<?=$id?>&category=8">의료</a></td>
					<td id='header2-5' class="news-title" ><a href="zboard.php?id=<?=$id?>&category=9">환경</a></td>
				</tr>
				
			</table>
</div>
	