<?php
if($list_empty == true) {
	echo "<tr><td align=center valign=middle height=100 colspan=6 bgcolor=#fefdfc style='font-size:9pt; color:#555555'>등록된 게시물 또는 검색결과가 없습니다.</td></tr>";
}

$PHP_SELF = "http://m.swave.woobi.co.kr/zboard/doc";

?>
</table>
</form>



<?
/***************************************************************************
* 네이버 스타일 페이지 리스트
**************************************************************************/
//$print_page2="";
//$show_page_num=$setup[page_num]; // 한번에 보일 페이지 갯수


//$start_page=(int)(($page-1)/$show_page_num)*$show_page_num;
 $dir = "/bbs/skin/zb5_style";


$i=1;

//$total_page = 5;
$show_page_num = 5;
if ($_GET[page]<5){
	$start_page = floor($_GET[page]/5);
	$next_page = $start_page+$show_page_num+1;
	$prev_page = $start_page-$show_page_num+1;
$a_prev_page2 = "<table cellspacing=0 cellpadding=0 border=0 align=center><tr><td>
";
} else {
	$start_page = floor($_GET[page]/5)*5;
	$next_page = $start_page+$show_page_num+1;
	$prev_page = $start_page-$show_page_num+1;
	
	$a_prev_page2 = "<table cellspacing=0 cellpadding=0 border=0 align=center><tr><td>
<a style='margin-top:3px;background: #28aadc;
	height:40px;width:40px;
	border: 1px solid #00648c;
	
    color: white;
    padding: 10px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;' href='zboard.php?id=doc&category=$category&page=$prev_page'>prev</a>";
	}
$a_next_page2 = "<a style='margin-top:3px;background: #28aadc;
	height:40px;width:40px;
	border-right: 1px solid #00648c;
	border-top: 1px solid #00648c;
	border-bottom: 1px solid #00648c;
    color: white;
    padding: 10px 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;' href='zboard.php?id=doc&category=$category&page=$next_page'>next</a></td>";

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
$move_page2=$i+5;

if($page == $start_page+6){ 
	$print_page2.="<a style='margin-top:3px;background: #00648c;
	height:40px;width:40px;
	border: 1px solid #00648c;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;' href='$PHP_SELF?id=$id&page=$move_page&search=$search'>$move_page2</a>";
} else { 
	if ($i == $page-$start_page){
		$print_page2.="<a style=' margin-top:3px;background: #00648c;
			height:40px;width:40px;
			border-right: 1px solid #00648c;
			border-top: 1px solid #00648c;
			border-bottom: 1px solid #00648c;
			color: #ffffff;
			padding: 10px 10px;
			text-align: center;
			text-decoration: none;
			display: inline-block;' href='$PHP_SELF/$move_page/$category'>$move_page</a>";
		}	else {
			if ($i==1){
												$print_page2.="<a style=' margin-top:3px;background: #ffffff;
							height:40px;width:40px;
							border: 1px solid #00648c;
							color: #00648c;
							padding: 10px 10px;
							text-align: center;
							text-decoration: none;
							display: inline-block;' href='$PHP_SELF/$move_page/$category'>$move_page</a>";
	
				
				
				
			} else {
									$print_page2.="<a style=' margin-top:3px;background: #ffffff;
							height:40px;width:40px;
							border-right: 1px solid #00648c;
							border-top: 1px solid #00648c;
							border-bottom: 1px solid #00648c;
							color: #00648c;
							padding: 10px 10px;
							text-align: center;
							text-decoration: none;
							display: inline-block;' href='$PHP_SELF/$move_page/$category'>$move_page</a>";
									
			}
		}
	}

$i++;
}
?>
<table width="100%">
<tr>
<td style="height:20px">
</td>
</tr>
</table>

<table width="100%">
<tr>
<td width="100%" style="text-align:center">
<?=$a_prev_page2?>
<?=$print_page2?>
<?=$a_next_page2?>
</td>
</tr>
</table>


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
<tr>
<td align="right" colspan="5"><? if($is_admin) {?><input type="checkbox" id='checkAll' onclick='check_all();' /><?}?>
<?=$a_write?><img src="<?=$dir?>/images/btn_post.gif" alt="새글쓰기" /></a></td>
</tr>

<tr height="20px"><td colspan="5" align="center"></td></tr>


		
</table>
</form>