<?php
	$list_empty = true;
?>

<? include $_zb_path."lat_bbs_thweb/thumb_web.php"; ?>

<?
$order = "vote";
latest_webgin($id, $category, "베스트" ,100, 200, 500, 200, 150, 1);
?>

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

<table width="<?=$width?>" cellSpacing="1" cellpadding="0" class="main_tb">
	<!-- 번호, 제목, 글쓴이, 일자, 추천, 조회순 -->
	<colgroup><col width="50px"><col width="80px"><col><col width="110px"><col width="40px"><col width="40px"></colgroup>
	
	<tr style="height: 26px;background-color:#FBFAF7">
		<? if($is_admin) {?>
		<td class="main_td001">
			<?//$a_cart?><a onclick="javascript:CheckAll(); return false;" style="cursor:pointer"><span class="main_td001_text" title="전체 선택/취소">전체</span></a>
		</td>
		<? } else { ?>
		<td class="main_td001">
			<?=$a_no?><span class="main_td001_text" title="글 번호순 정렬">번호</span></a>
		</td>
		<? } ?>
		<td class="main_td001">
			<?=$a_date?><span class="main_td001_text" title="등록일순 정렬">일자</span></a>
		</td>
		<td class="main_td001">
			<?=$a_subject?><span class="main_td001_text" title="글 번호순 정렬">제목</span></a>
		</td>
		<td class="main_td001">
			<?=$a_name?><span class="main_td001_text" title="작성자순 정렬">글쓴이</span></a>
		</td>
		
		<td class="main_td001">
			<?=$a_vote?><span class="main_td001_text" title="추천수순 정렬">추천</span></a>
		</td>
		<td class="main_td001">
			<?=$a_hit?><span class="main_td001_text" title="조회순 정렬">조회</span></a>
		</td>
	</tr>