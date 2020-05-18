</select>

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

function moveSelect(selectObject){
   var value = selectObject.value;  
   //alert(value);
var selectedopt=selectObject.options[selectObject.value-3];
if (document.getElementById && selectedopt.getAttribute("target")=="_self")
location.href(selectedopt.value)
else
location.href="zboard.php?category="+selectedopt.value+"&id=<?=$id?>&page=<?=$page?>&page_num=<?=$page_num?>&sn=on&ss=on&sc=on&select_arrange=headnum&desc=asc"
	
}	
</script>
</form>


