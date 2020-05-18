<?php
	$c_memo = str_replace(' name=zb_target_resize', '', $c_memo);
	$c_memo = preg_replace('/<img /i', '<img name=zb_target_resize onload=applyLightbox(this,true) ', $c_memo);
	
?>


<div id="IAMCOMMENT_<?=$c_data[no]?>" align="right" style="width:100%;">
	<div id="comment_<?=$c_data[no]?>">
		<table width="100%" cellSpacing="2" cellpadding="0" style="border: 1px solid #EDE8D9;table-layout: fixed; margin-bottom: 3px;">
		<colgroup><col width="200px"><col><col width="140px"></colgroup>
		<tr style="height: 29px;">
			<td align="left" style="font: 10pt 굴림; padding: 5px 0 0 3px;" valign="top"><?=$c_face_image?> <?=$comment_name?>&nbsp;<?=$c_reg_date?></td>
			<td></td>			
			<td align="right">
			<?php if(!$data[reply_mail]){ ?>
			<span id="replyButton_<?=$c_data[no]?>"><?=$a_re?><img src="<?=$dir?>/images/reply_com_btn.gif" width="32px" height="21px" style="margin-top: 5px;margin-right: 2px;" title="답변달기" /></a></span>
			<?=$a_mod?><img src="<?=$dir?>/images/modify_com_btn.gif" width="32px" height="21px" style="margin-top: 5px;margin-right: 2px;" title="수정하기" /></a><span id="deleteButton_<?=$c_data[no]?>"><?=$a_del?><img src="<?=$dir?>/images/delete_com_btn.gif" width="32px" height="21px" style="margin-top: 5px;margin-right: 2px;" title="삭제하기" /></a></span>
			<? } else { ?>
			<span id="deleteButton_<?=$c_data[no]?>"><?=$a_del?><img src="<?=$dir?>/images/delete_com_btn.gif" width="32px" height="21px" style="margin-top: 5px;margin-right: 2px;" title="삭제하기" /></a></span>
			<? } ?></td>
		</tr>
		<tr>
			<td colspan="3" valign="top" style="font: 10pt 굴림; padding:5px; line-height:1.7em">
			<span id="commentContent_<?=$c_data['no']?>"><?=nl2br($c_memo)?></span>
			</td>
		</tr>
		<tr>
			<td colspan="3" align="right" style="padding-right:3px;"></td>
		</tr>

		</table>
		<div id="form_<?=$c_data[no]?>"></div>
		<div id="commentContainer_<?=$c_data[no]?>"></div>
	</div>
</div>

<script type="text/javascript" language="JavaScript">
	var oCur = document.getElementById("IAMCOMMENT_"+<?=$c_data[no]?>);
	if (<?=$c_org?> > 0 && <?=$c_depth?> > 0)
	{
		var oOrg = document.getElementById("commentContainer_"+<?=$c_org?>);
		var oCom = document.getElementById("comment_"+<?=$c_data[no]?>);
		oCom.style.width = (100 - (3*<?=$c_depth?>)).toString() + "%";
		
		if (oOrg==null)
		{
			oCur.style.display = "";
		}
		else
		{
			oOrg.innerHTML += oCur.innerHTML;
			oCur.parentNode.removeChild(oCur);
			document.getElementById("deleteButton_"+<?=$c_org?>).style.display = "none";
		}
		if(<?=$c_depth?> == <?=$maxDepth?>) {
			document.getElementById("replyButton_"+<?=$c_data[no]?>).style.display = "none";
		}
	}
	else
	{
		oCur.style.display = "";
	}
</script>