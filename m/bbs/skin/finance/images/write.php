<?
	if($mode=="reply") $title="��۾���";
	elseif($mode=="modify") $title="�����ϱ�";
	else $title="���۾���";

	if($mode!="reply") {
		if(!$data[use_html]) $value_use_html = 1;
		else $value_use_html = $data[use_html];
	} else {
		$value_use_html=1;
	}
	if($data[use_html]) $use_html=" checked ";
	else $use_html="";

	$a_preview = str_replace(">","><font class=list_eng>",$a_preview)."&nbsp;&nbsp;";
	$a_imagebox = str_replace(">","><font class=list_eng>",$a_imagebox)."&nbsp;&nbsp;";
?>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
<colgroup><col width="6px"><col><col width="6px"></colgroup>
<tr height="5px"><td colspan="2"></td></tr>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_page_list"><?=$title?></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
</tr>
<tr height="5px"><td colspan="2"></td></tr>
</table>

<div id="write_div" style="width:<?=$width?>;background-color:#ffffff;border: #E1E1E1 1px solid; padding: 0px;">
<form method="post" name="write" action="write_ok.php" onsubmit="return check_submit();" enctype="multipart/form-data">
<input type="hidden" name="page" value="<?=$page?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="no" value="<?=$no?>" />
<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
<input type="hidden" name="desc" value=<?=$desc?> />
<input type="hidden" name="page_num" value="<?=$page_num?>" />
<input type="hidden" name="keyword" value="<?=$keyword?>" />
<input type="hidden" name="sn" value="<?=$sn?>" />
<input type="hidden" name="ss" value="<?=$ss?>" />
<input type="hidden" name="sc" value="<?=$sc?>" />
<input type="hidden" name="mode" value="<?=$mode?>" />


<!-- �ۼ��� ���� -->
<div id="write_div" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid; padding: 0px;" align="center">
<table style="width:100%;background-color:#ffffff;" cellSpacing="2" cellpadding="0" border="0">
<tr style="background-color:#fbfaf7;">
<td align="center">
	<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
	<?=$hide_start?>
	<tr>
	<td width="70"px class="write_ft1">�̸�</td>
	<td width="100px" class="write_ft1"><input type="text" id="name" name="name" value="<?=$name?>"  maxlength="20" class="write_input2" /></td>
	<td width="70px" class="write_ft1">��й�ȣ</td>
	<td width="100px" class="write_ft1"><input type="password" id="password" name="password" maxlength="20" class="write_input1" /></td>
	<td width="100px"></td>
	<td width="70px"></td>
	<td width=auto></td>
	</tr>

	<tr style="height: 4px;"><td colspan="4" align="center"><div class="layer_dot1"></div></td></tr>
	<?=$hide_end?>

	<tr>
	<td width="70px" class="write_ft1">����</td>
	<td width=auto colspan=4 class="write_ft1"><input type="text" name="subject" value="<?=$subject?>"  maxlength="500" class="write_input2" /></td>
	</tr>
	<tr>
	<td width="70px" class="write_ft1">ī�װ�</td>
	<td width="100px" class="write_ft2" valign="top"><?=$category_kind?>
	</tr>

	<tr>
	<td class="write_ft2" colspan="3" valign="top">
	<?=$hide_notice_start?><label for="cb1"><input onfocus="this.blur();" type="checkbox" name="notice" <?=$notice?> value="1" id="cb1" />��������</label> <?=$hide_notice_end?>
	<?=$hide_html_start?><label for="cb2"><input onfocus="this.blur();" type="checkbox" name=use_html <?=$use_html?> value="<?=$value_use_html?>" checked="checked" onclick='check_use_html(this)' id="cb2" style="display:none;" /></label> <?=$hide_html_end?>
	<?=$hide_secret_start?><label for="cb3"><input onfocus="this.blur();" type="checkbox" name="is_secret" <?=$secret?> value="1" id="cb3" />��б�</label> <?=$hide_secret_end?></td>
	</tr>
	</table>
</td>
</tr>
</table>
</div>
<!-- �ۼ��� �� -->

<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr height="5px"><td colspan="3"></td></tr>


<tr>
<td valign="top" colspan="3">

	<!-- �۾��� �κ� ���� -->
	<div id="write_div" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid; margin-top: 5px;">
		<table style="width:100%;background-color:#ffffff;border:0" cellSpacing="2" cellpadding="0" border="0">
		<tr style="background-color:#fbfaf7;">
		<td>
			<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
				<tr>
				<td valign="top" class="write_ft1">
				
				<!-- ���ĺκ� ���� -->
				����<input type="button" value="����" id="math" /><input type="button" value="�ζ���" id="math2" />
				  <div id="select" style="display:none">
					<div id="top" style="display:inline-block;"  >
					<img id="img01" title="�׸���" src="<?=$dir?>/images/re_-01.png" onmouseover="document.getElementById('div1').style.display = 'block';" onmouseout="document.getElementById('div1').style.display = 'none';"/><img id="img02" title="÷��" src="<?=$dir?>/images/re_-10.png" onmouseover="document.getElementById('div2').style.display = 'block';" onmouseout="document.getElementById('div2').style.display = 'none';"/><img id="img03" title="����" src="<?=$dir?>/images/re_-30.png" onmouseover="document.getElementById('div3').style.display = 'block';" onmouseout="document.getElementById('div3').style.display = 'none';"><img id="img04" title="���б�ȣ" src="<?=$dir?>/images/re_-02.png" onmouseover="document.getElementById('div3').style.display = 'block';" onmouseout="document.getElementById('div3').style.display = 'none';"/><img id="img05" title="������" src="<?=$dir?>/images/re_-05.png" /><img id="img06" title="����" src="<?=$dir?>/images/re_-04.png" /><img id="img07" title="�м�" src="<?=$dir?>/images/re_-06.png" /><img id="img08" title="���" src="<?=$dir?>/images/re_-03.png" />
					</div>
						<div id="div1" style="display: none;" onmouseover="document.getElementById('div1').style.display = 'block'">
							<img id="img101" title="����" src="<?=$dir?>/images/311.png" onmouseover="document.getElementById('div1').style.display = 'block'"/><img id="img102" title="��Ÿ" src="<?=$dir?>/images/321.png" onmouseover="document.getElementById('div1').style.display = 'block'"/><img id="img103" title="����" src="<?=$dir?>/images/331.png" /><img id="img104" title="��Ÿ" src="<?=$dir?>/images/341.png" /><img id="img105" title="ī��" src="<?=$dir?>/images/351.png" /><img id="img106" title="��" src="<?=$dir?>/images/391.png" /><img id="img107" title="�ԽǷ�" src="<?=$dir?>/images/392.png" />
						</div>
						<div id="div2" style="display: none;" onmouseover="document.getElementById('div2').style.display = 'block'">
							<img id="img201" title="��÷��" src="<?=$dir?>/images/44.png"><img id="img202" title="�Ʒ�÷��" src="<?=$dir?>/images/42.png">
						</div>
						<div id="div3" style="display: none;" onmouseover="document.getElementById('div3').style.display = 'block'">
							<img id="img301" title="��������" src="<?=$dir?>/images/800.png"><img id="img302" title="������" src="<?=$dir?>/images/801.png"><img id="img303" title="��������" src="<?=$dir?>/images/804.png"><img id="img304" title="����������" src="<?=$dir?>/images/805.png"><img id="img305" title="������" src="<?=$dir?>/images/802.png"><img id="img306" title="��������" src="<?=$dir?>/images/803.png">
						</div>
				  </div>
				 <!-- ���� �� -->
				 
				<textarea name="memo" id="ir1" class="write_textarea"><?=$memo?></textarea></td>
				</tr>
				<tr>
				<td class="write_ft2" valign="top">
				<label for="reply_mail"><input onfocus="this.blur();" type="checkbox" id="reply_mail" name="reply_mail" value="1" <?php if($data[reply_mail]){echo " checked='checked'";}?>  /> �ڸ�Ʈ ������ <span style="font:8pt ����; color:#F58029;">(�ڸ�Ʈ�� ������� ������ üũ�ϼ���)</span></label></td>
				</tr>
				<tr style="height: 4px;"><td align="center"><div class="layer_dot1"></div></td></tr>
			
				<tr height="5px"><td></td></tr>
			</table>
		</td>
		</tr>
		</table>
	</div>

	<div id="write_div" style="width:100%;background-color:#ffffff;border: #F0F0F0 1px solid; margin-top: 5px;">
		<table style="width:100%;background-color:#ffffff;border:0" cellSpacing="2" cellpadding="0" border="0">
		<tr style="background-color:#fbfaf7;">
		<td>
			<table width="100%" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
				<colgroup><col width="70px"><col></colgroup>
					<!--�±�Ŭ����� ��� -->
				<tr>
				<td class="write_ft1">�±�</td>
				<td class="write_ft1"><input type="text" name="tag" value="<?=$sitelink2?>" maxlength="200" class="write_tag" />&nbsp;<span class="write_ft2">��ǥ(,) ����</span></td>
				</tr>
		

				<?=$hide_sitelink1_start?>
				<tr>
					<td class="write_ft1">��ó</td>
					<td class="write_ft1"><input type="text" name="sitelink1" value="<?=$sitelink1?>"  maxlength="255" class="write_input2" /></td>
				</tr>
				<?=$hide_sitelink1_end?>

				<?=$hide_pds_start?>
				<tr>
					<td class="write_ft1">���� 1</td>
					<td class="write_ft1"><input type="file" id="file1" name="file1" maxlength="255" class="write_input2" /><?=$file_name1?></td>
				</tr>
				<tr>
					<td class="write_ft1">���� 2</td>
					<td class="write_ft1"><input type="file" id="file2" name="file2" maxlength="255" class="write_input2" /><?=$file_name2?></td>

				</tr>
				<?=$hide_pds_end?>
				
				
			</table>
		</td>
		</tr>
		</table>
	</div>
	<!-- �۾��� �κ� �� -->

</td>
</tr>
</table>
</div>





<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
<colgroup><col width="6px"><col><col width="6px"><col width="150px"></colgroup>
<tr height="5px"><td colspan="4"></td></tr>
<tr>
<td><img src="<?=$dir?>/images/bar_head_l.gif" /></td>
<td class="foot_page_list"></td>
<td><img src="<?=$dir?>/images/bar_head_r.gif" /></td>
<td><img onclick="history.back()" src="<?=$dir?>/images/btn_goback.gif" alt="��Ϻ���" style="cursor:pointer;margin: 0px 3px 0px 3px;" />
<input onclick=submitContents() type="image" src="<?=$dir?>/images/btn_complete.gif" accesskey="s" title="�ۼ��Ϸ�" /></td>
</tr>

<tr height="5px"><td colspan="4"></td></tr>
</table>
</form>



<script type="text/javascript">
var oEditors = [];

// �߰� �۲� ���
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// ���� ��� ���� (true:���/ false:������� ����)
		bUseVerticalResizer : true,		// �Է�â ũ�� ������ ��� ���� (true:���/ false:������� ����)
		bUseModeChanger : true,			// ��� ��(Editor | HTML | TEXT) ��� ���� (true:���/ false:������� ����)
		//aAdditionalFontList : aAdditionalFontSet,		// �߰� �۲� ���
		fOnBeforeUnload : function(){
			//alert("�Ϸ�!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//���� �ڵ�
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["�ε��� �Ϸ�� �Ŀ� ������ ���ԵǴ� text�Դϴ�."]);
		setDefaultFont();
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>�̹����� ���� ������� �����մϴ�.<\/span>";
	oEditors.getById["ir1"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["ir1"].getIR();
	alert(sHTML);
}
	
function submitContents(elClickedObj) {
	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// �������� ������ textarea�� ����˴ϴ�.
	
	// �������� ���뿡 ���� �� ������ �̰����� document.getElementById("ir1").value�� �̿��ؼ� ó���ϸ� �˴ϴ�.
	
	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '����';
	var nFontSize = 10;
	oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
}
</script>


<script>
$(document).ready(function(){
  $("#math").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["$$ ���⿡ ������ �Է��ϼ��� $$"]);
	$('#select').toggle( "slow" );
  });
  $("#math2").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\( ���⿡ ������ �Է��ϼ��� )\\"]);
	$('#select').toggle( "slow" );
  });
  $("#img101").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\alpha"]);
  });
  $("#img102").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\beta"]);
  });
  $("#img103").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\gamma"]);
  });
  $("#img104").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\dleta"]);
  });
  $("#img105").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\kappa"]);
  });
  $("#img106").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\nu"]);
  });
  $("#img107").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\epsilon"]);
  });
  
  $("#img201").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["^{}"]);
  });
  $("#img202").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["_{}"]);
  });
  
  $("#img301").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\int"]);
  });
  $("#img302").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\int_{}^{}"]);
  });
  $("#img303").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\iint"]);
  });
  $("#img304").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\iint_{}^{}"]);
  });
  $("#img305").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\oint"]);
  });
  $("#img306").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\oint_{}^{}"]);
  });
  
  $("#img401").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\vec{}"]);
  });
  $("#img501").click(function(){
    oEditors.getById["ir1"].exec("PASTE_HTML", ["\\frac{}{}"]);
  });
    
  
  
});


</script>
