
<?
/***************************************************************************
* 네이버 스타일 페이지 리스트
**************************************************************************/
//$print_page2="";
//$show_page_num=$setup[page_num]; // 한번에 보일 페이지 갯수


//$start_page=(int)(($page-1)/$show_page_num)*$show_page_num;
 //$dir = "/bbs/skin/news";
$PHP_SELF = "zboard.php";

$i=1;

//$total_page = 5;
$show_page_num = 5;
$a_prev_page2 = "<table cellspacing=0 cellpadding=0 border=0 align=center><tr><td>";
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
	$print_page2.="<td><a style=' margin-top:3px;background: #00648c;
	height:40px;width:40px;
    color: white;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;' href='$PHP_SELF?id=$id&page=$move_page&search=$search'>$move_page</a></td>";
else $print_page2.="<td><a style=' margin-top:3px;background: #28aadc;
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

<tr>
<td style="text-align:right">
<?=$a_write?><img align="right" src="<?=$dir?>/images/btn_post.gif" alt="새글쓰기" /></a>
</td></tr>

