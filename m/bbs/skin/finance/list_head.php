<?php
	$list_empty = true;
?>

<? // include $_zb_path."lat_bbs_thweb/thumb_web.php"; ?>

<?
$order = "vote";
// latest_webgin($id, $category, "베스트" ,100, 200, 500, 200, 150, 1);
?>



<table style="margin:0; padding:0" width="100%" cellSpacing="0" cellpadding="0" border="0">


<form method="post" name="list" action="list_all.php">
<input type="hidden" name="page" value="<?=$page?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
<input type="hidden" name="desc" value="<?=$desc?>" />
<input type="hidden" name="page_num" value="<?=$page_num?>" />
<input type="hidden" name="selected" />
<input type="hidden" name="exec" />
<input type="hidden" name="keyword" value="<?=$keyword?>" />
<input type="hidden" name="sn" value="<?=$sn?>" />
<input type="hidden" name="ss" value="<?=$ss?>" />
<input type="hidden" name="sc" value="<?=$sc?>" />
