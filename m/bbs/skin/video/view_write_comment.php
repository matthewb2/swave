<script language="javascript" type="text/javascript">
	var g_bRe = false;
	var g_nOrg;
	var g_nDepth;
	var g_mode = '';

	function checkComment()
	{
	 var content = document.forms['write'].elements['memo'].value;
	 if (!content) {
		alert('내용을 입력하세요 !');
		document.forms['write'].elements['memo'].focus();
		return false;
	 }
	 if (g_bRe && g_nOrg > 0 && g_nDepth > 0 && content.length > 0)
	 {
	  document.forms['write'].elements['memo'].value = "[!--"+g_nOrg+"|"+g_nDepth+"--]" + document.forms['write'].elements['memo'].value;
	  try {
	  updateIframe(getAlditor('memo'));
	  } catch(e) {}
	 }
	 return true;
	}

	function reComment(nOrg,nDepth, mode)
	{
		if (nDepth > <?=$maxDepth?> && mode != "m") {
			alert("더이상 답변을 달 수 없습니다.");
			return;
		}
		if ((g_nOrg==nOrg && g_nDepth==nDepth) || mode == 'm')
		{
			g_nOrg = 0;
			g_nDepth = 0;
			g_bRe = false;
		}
		else
		{
			g_nOrg = nOrg;
			g_nDepth = nDepth;
			g_bRe = true;
		}

		click_reply(nOrg, nDepth, mode);
	}

	var cur_form_location = 0;
	var alditorOn = false;
	function click_reply(pid, depth, mode) { 
		var current_form;
		var dest_form;

		if (typeof getAlditor != 'undefined')
		{
			if (getAlditor('memo'))
			{
				alditorOn = true;
				killalditor('memo');
				document.forms['write'].rel = '';
				document.forms['write'].onsubmit = null;
			}
		}
		if (cur_form_location == pid) {
			if (g_mode == mode) {
				current_form = document.getElementById("form_"+pid);
				dest_form = document.getElementById("form_0");
				dest_form.innerHTML = current_form.innerHTML
				dest_form.style.display = "";
				current_form.innerHTML = "";
				current_form.style.display = "none";
				cur_form_location = 0;
				document.forms['write'].elements['memo'].value = '';
				document.forms['write'].elements['modify'].value = '';
				document.forms['write'].elements['c_no'].value = '';
				mode = '';
			} else {
				if (mode == 'm')
				{
					if (alditorOn || typeof setVisualEditorMode != 'undefined')
					{
						document.forms['write'].elements['memo'].value = document.getElementById("commentContent_"+pid).innerHTML;
						if (typeof setVisualEditorMode != 'undefined')
						{
							setVisualEditorMode(true);
						}
					} else {
						if (document.selection)
						{
							document.forms['write'].elements['memo'].value = document.getElementById("commentContent_"+pid).innerHTML.replace(/<br[>|\s\/>|\/>]/gi,'\n');
						} else {
							document.forms['write'].elements['memo'].value = document.getElementById("commentContent_"+pid).innerHTML.replace(/<br[>|\s\/>|\/>]/gi,'');
						}
					}
					document.forms['write'].elements['modify'].value = 'modify';
					document.forms['write'].elements['c_no'].value = pid;
				}	else {
					document.forms['write'].elements['memo'].value = '';	
					document.forms['write'].elements['modify'].value = '';
					document.forms['write'].elements['c_no'].value = '';
				}
			}
		} else {
			current_form = document.getElementById("form_"+cur_form_location);
			dest_form = document.getElementById("form_"+pid);
			dest_form.innerHTML = current_form.innerHTML
			dest_form.style.display = "";
			current_form.innerHTML = "";
			current_form.style.display = "none";
			cur_form_location = pid;
			if (mode == 'm')
			{
				if (alditorOn || typeof setVisualEditorMode != 'undefined')
				{
					document.forms['write'].elements['memo'].value = document.getElementById("commentContent_"+pid).innerHTML;
					if (typeof setVisualEditorMode != 'undefined')
					{
						setVisualEditorMode(true);
					}
				} else {
					if (document.selection)
					{
						document.forms['write'].elements['memo'].value = document.getElementById("commentContent_"+pid).innerHTML.replace(/<br[>|\s\/>|\/>]/gi,'\n');
					} else {
						document.forms['write'].elements['memo'].value = document.getElementById("commentContent_"+pid).innerHTML.replace(/<br[>|\s\/>|\/>]/gi,'');
					}
				}
				document.forms['write'].elements['modify'].value = 'modify';
				document.forms['write'].elements['c_no'].value = pid;
			} else {
				document.forms['write'].elements['modify'].value = '';
				document.forms['write'].elements['c_no'].value = '';
			}
		}
		if (alditorOn)
		{
			alditorById('memo');
			if (document.selection)
			{
				switchMode(getAlditor('memo'));
				switchMode(getAlditor('memo')); //고의로 2번 호출
			} else {
				editorFocus(getAlditor('memo'), 0);
			}
		}
		try { document.forms['write'].elements['memo'].focus(); }catch (e){ }
		g_mode = mode;
		alditorOn = false;
	}
</script>

</div>

<div style="font-size: 6px;">&nbsp;</div>
<div id="form_0" style="text-align: right;">
	<form method="post" name="write">
		<input type="hidden" value="0" name="pid" />
		<input type="hidden" value="0" name="depth" />
		<input type="hidden" name="page" value="<?=$page?>" />
		<input type="hidden" name="id" value="<?=$id?>" />
		<input type="hidden" name="no" value="<?=$no?>" />
		<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
		<input type="hidden" name="desc" value="<?=$desc?>" />
		<input type="hidden" name="page_num" value="<?=$page_num?>" />
		<input type="hidden" name="keyword" value="<?=$keyword?>" />
		<input type="hidden" name="category" value="<?=$category?>" />
		<input type="hidden" name="sn" value="<?=$sn?>" />
		<input type="hidden" name="ss" value="<?=$ss?>" />
		<input type="hidden" name="sc" value="<?=$sc?>" />
		<input type="hidden" name="mode" value="<?=$mode?>" />
		<input type=hidden name=sep value="<?=$sep?>">
		<input type=hidden name=modify value=''>
		<input type=hidden name=c_no value=''> 
		<?php if(!$data[reply_mail]){ ?>
		<table width="100%" cellSpacing="2" cellpadding="0" style="background-color:#FBFAF7;border: 1px solid #EDE8D9;table-layout: fixed;">
		<colgroup><col><col></colgroup>
				<tr>
			<td colspan="2" align="left" style="font: 9pt 굴림; color: #E08600; padding: 3px 0 0 3px;" valign="top">	<?if(!$member['no']){?>
		이름 <input type="text" name="name" maxlength="20" class="input_username" /> 
		&nbsp;<?=$hide_c_password_start?>
		비밀번호 <input type="password" name="password" maxlength="20" class="input_pw" /><?=$hide_c_password_end?><?}?></td>
	
		</tr>
		<tr style="background:white url(<?=$dir?>/images/com_pt001.gif) repeat-x top;">
			<td colspan="2" align="center" style="padding:3px">
			<textarea class="com_textarea" name="memo" ></textarea>
			</td>
		</tr>
		<tr style="background:white url(<?=$dir?>/images/com_pt001.gif) repeat-x top;">
		<td valign="top" colspan="2" align="right" style="padding:0px;">
		<input type="image" src="<?=$dir?>/images/btn_post_comment.gif" accesskey="s" style="margin-top: 5px; margin-right: 5px;margin-bottom: 5px;" title="덧글등록" /></td>
		</tr>
		</table>
		<? }?>
	</form>
</div>

<script>
$(document).ready(function() {
	//alert('내용을 입력하세요 !');
    $('form[name=write]').submit(function(event) { //Trigger on form submit
         // $('#my').append('<div id="you-<?=$no_comm?>"><table width="100%" cellSpacing="2" cellpadding="0" style="border: 1px solid #EDE8D9;table-layout: fixed; margin-bottom: 3px;"><colgroup><col width="300px"><col><col width="140px"></colgroup><tr style="height: 29px;"><td colspan="3" valign="top" style="font: 9pt 굴림; padding:5px; line-height:1.7em">'+ $('textarea[name=memo]').value() + '</td></tr></table></div>');
        //Validate fields if required using jQuery
		 var content = document.forms['write'].elements['memo'].value;
		if (!content) {
				alert('내용을 입력하세요 !');
	
		
	 } else{


        var postForm = { //Fetch form data
			'id' : "<?=$id?>",
			'no' : "<?=$no?>",
            'name'     : $('input[name=name]').val(), //Store name fields value
			'password'     : $('input[name=password]').val(),
			'memo'     : $('textarea[name=memo]').val() //Store name fields value
        };

        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'process.php', //Your form processing file URL
            data      : postForm, //Forms name
            success   : function(data) {
                    //          $('#my').append('<div id="you-<?=$no_comm?>"><table width="100%" cellSpacing="2" cellpadding="0" style="border: 1px solid #EDE8D9;table-layout: fixed; margin-bottom: 3px;"><colgroup><col width="300px"><col><col width="140px"></colgroup><tr style="height: 29px;"><td colspan="3" valign="top" style="font: 9pt 굴림; padding:5px; line-height:1.7em">'+ data + '</td></tr></table></div>'); //If successful, than throw a success message
					var duce = jQuery.parseJSON(data);

					$('#my').append('<div class="reply" id="you-<?=$no_comm?>"><table width="100%" cellSpacing="2" cellpadding="0" style="border: 1px solid #EDE8D9;table-layout: fixed; margin-bottom: 3px;"><colgroup><col width="300px"><col><col width="140px"></colgroup><tr style="height: 29px;"><td align="left" style="font: 9pt 굴림; padding: 5px 0 0 3px;" valign="top"><b>'+duce.key1+'</b></td><td></td><td></td></tr><tr><td colspan="3" valign="top" style="font: 9pt 굴림; padding:5px; line-height:1.7em">'+ duce.key2 + '</td></tr></table></div>');
					$('textarea[name=memo]').val('');
			}
               });
        event.preventDefault(); //Prevent the default submit
	 }
    });
});
</script>