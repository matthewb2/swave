<? if ($id == "dic"){?>
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
<input type="hidden" name="search" value="<?=$search?>" />


<div class="ui-widget">
	<tr>
		<td width="100%">
			<input id="dic-word" style="font-size:16px; margin-left:5px; padding-left:3px; width:80%; height:35px; color:#9A9893; background-color: #ffffff; border: 1px solid #EDE8D9;" name="keyword" value="<?=$keyword?>" />
			<input style="height:50px; margin: 0px 0px 0px 0px" type="image" src="images/search5.gif"  align="absMiddle" />
		
		</td>
		
	</tr>
</div>


	
</form>
<?}?>


<div class="dropdown">
    <dt><span style="padding-left:5px">카테고리</span></dt>
    <dd>
        <ul class="item">
            
			
           <?   for($i=0;$i<count($category_num_c);$i++) {
			   //echo "ddd";
			 echo $category_name[$i];
           if($category==$category_num_c[$i]) $b="<b>"; else $b="";
           // $print_category_data="<a href='zboard.php?category=$category_num_c[$i]$c_href$c_sort'>$b$category_name_c[$i] ($category_n_c[$i])</a></b>";
           // include "$dir/category_main.php";
		   		   echo "<li><span style='padding-left;5px; height:30px' onclick='catego(".$i.");'>".$category_name_c[$i]."</span></li>";
				   //echo "";
    
        }  
		?>
        </ul>
    </dd>
</div>

<script type="text/javascript">
/*
function jumptolink(what){
var selectedopt=what.options[what.selectedIndex]
if (document.getElementById && selectedopt.getAttribute("target")=="_self")
location.href(selectedopt.value)
else
location.href="zboard.php?category="+selectedopt.value+"&id=<?=$id?>&page=<?=$page?>&page_num=<?=$page_num?>&sn=on&ss=on&sc=on&select_arrange=headnum&desc=asc"
}

*/
function catego(index){
	var cat = index+4;
	
	
	window.location.href = "http://m.swave.woobi.co.kr/bbs/zboard.php?id=doc&category="+cat;
}

function moveSelect(selectObject){
   var value = selectObject.value;  
   //alert(value);
var selectedopt=selectObject.options[selectObject.value-3];
if (document.getElementById && selectedopt.getAttribute("target")=="_self")
location.href(selectedopt.value)
else
location.href="zboard.php?category="+selectedopt.value+"&id=<?=$id?>&page=<?=$page?>&page_num=<?=$page_num?>&sn=on&ss=on&sc=on&select_arrange=headnum&desc=asc"
	
}	

$(".dropdown dt ").click(function() {
    $(".dropdown dd ul").toggle();
});

$(document).bind('click', function(e) {
    var clicked = $(e.target);
    //alert(clicked);
	if (! $clicked.parents().hasClass("dropdown"))
        $(".dropdown dd ul").hide();
		
});

</script>
