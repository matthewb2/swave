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
<? include "include/print_category.php"; ?>


