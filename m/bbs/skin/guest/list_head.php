<?php
	$list_empty = true;
?>

<? include $_zb_path."lat_bbs_thweb/thumb_web.php"; ?>

<?
$order = "vote";
latest_webgin($id, $category, "����Ʈ" ,100, 200, 500, 200, 150, 1);
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
	<!-- ��ȣ, ����, �۾���, ����, ��õ, ��ȸ�� -->
	<colgroup><col width="50px"><col width="80px"><col><col width="110px"><col width="40px"><col width="40px"></colgroup>
	
	<tr style="height: 26px;background-color:#FBFAF7">
		<? if($is_admin) {?>
		<td class="main_td001">
			<?//$a_cart?><a onclick="javascript:CheckAll(); return false;" style="cursor:pointer"><span class="main_td001_text" title="��ü ����/���">��ü</span></a>
		</td>
		<? } else { ?>
		<td class="main_td001">
			<?=$a_no?><span class="main_td001_text" title="�� ��ȣ�� ����">��ȣ</span></a>
		</td>
		<? } ?>
		<td class="main_td001">
			<?=$a_date?><span class="main_td001_text" title="����ϼ� ����">����</span></a>
		</td>
		<td class="main_td001">
			<?=$a_subject?><span class="main_td001_text" title="�� ��ȣ�� ����">����</span></a>
		</td>
		<td class="main_td001">
			<?=$a_name?><span class="main_td001_text" title="�ۼ��ڼ� ����">�۾���</span></a>
		</td>
		
		<td class="main_td001">
			<?=$a_vote?><span class="main_td001_text" title="��õ���� ����">��õ</span></a>
		</td>
		<td class="main_td001">
			<?=$a_hit?><span class="main_td001_text" title="��ȸ�� ����">��ȸ</span></a>
		</td>
	</tr>