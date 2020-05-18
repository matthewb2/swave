<?
	if($member[is_admin]>=3 && !eregi($no.",",$member[board_name])) error("search 설정을 변경할 권한이 없습니다");
	$query = "select skinname, searchname, bbstitle, view_level, list_view_level, width, bgcolor, cut_length1, cut_length2, pagenum, pagegroupnum, targets, c_category, c_bbstitle, searchpoint1, searchpoint2, pagenumpoint1, pagenumpoint2, upfile, downfile, h_comment, f_comment from siche_search where sno = '$sno'";
	$result = mysql_query($query);
	if(!$result){
		$errNO	= mysql_errno($conn);
		$errMSG	= mysql_error($conn);

		echo "에러코드" . $errNO . ":" . $errMSG . "<BR>";
		exit;
	}

	function error_MSG($error_MSG){
		global $bgcolor;
		unset($bgcolor);
		echo "
		<BR><BR>
		<table cellspacing=1 cellpadding=5 width=300 align=center bgcolor=cccccc>
		<tr bgcolor=efefe5 align=center height=33>
			<td><span style=font-size:9pt><B>Message</B></td>
		</tr>
		<tr bgcolor=f5f5f5 align=center>
			<td><span style=font-size:9pt><BR>$error_MSG<BR><BR></td>
		</tr>
		<tr bgcolor=efefe5 align=center>
			<td><input type=button value=\"  Move Back  \" onclick=eval(history.go(-1)) style=border-color:b0b0b0;background-color:dedede;color:666666;font-size:8pt;font-family:Tahoma;height:23px;></td>
		</tr>
		</table>
		<BR><BR>
		";

		exit;
	}

	$skinname			= @mysql_result($result,0,0) or error_MSG('잘못된 경로입니다.');
	$searchname			= mysql_result($result,0,1);
	$bbstitle			= mysql_result($result,0,2);
	$view_level			= mysql_result($result,0,3);
	$list_view_level	= mysql_result($result,0,4);
	$width				= mysql_result($result,0,5);
	$bgcolor			= mysql_result($result,0,6);
	$cut_length1		= mysql_result($result,0,7);
	$cut_length2		= mysql_result($result,0,8);
	$pagenum			= mysql_result($result,0,9);
	$pagegroupnum		= mysql_result($result,0,10);
	$targets			= mysql_result($result,0,11);
	$c_category			= mysql_result($result,0,12);
	$c_bbstitle			= mysql_result($result,0,13);
	$searchpoint1		= mysql_result($result,0,14);
	$searchpoint2		= mysql_result($result,0,15);
	$pagenumpoint1		= mysql_result($result,0,16);
	$pagenumpoint2		= mysql_result($result,0,17);
	$upfile				= mysql_result($result,0,18);
	$downfile			= mysql_result($result,0,19);
	$h_comment			= mysql_result($result,0,20);
	$f_comment			= mysql_result($result,0,21);

	$h_comment			= stripslashes($h_comment);
	$f_comment			= stripslashes($f_comment);

	$searchpoint1		= stripslashes($searchpoint1);
	$searchpoint2		= stripslashes($searchpoint2);
	$pagenumpoint1		= stripslashes($pagenumpoint1);
	$pagenumpoint2		= stripslashes($pagenumpoint2);


	
?>
<SCRIPT LANGUAGE="JavaScript">
<!--
 function check_submit()
 {
  if(!write.width.value) {alert("search 가로크기을 입력하여 주십시요");write.width.focus();return false;}
  if(!write.searchname.value) {alert("검색할 게시판 이름을 입력하여 주십시요");write.searchname.focus();return false;}
  if(!write.view_level.value) {alert("권한 설정을 입력하여 주십시요");write.view_level.focus();return false;}
  if(!write.list_view_level.value) {alert("권한 설정을 입력하여 주십시요");write.list_view_level.focus();return false;}
  if(!write.width.value) {alert("search 가로크기를 입력하여 주십시요");write.width.focus();return false;}
  if(!write.bgcolor.value) {alert("search 배경색상을 입력하여 주십시요");write.bgcolor.focus();return false;}
  if(!write.cut_length1.value) {alert("제목 글자 제한을 입력하여 주십시요");write.cut_length1.focus();return false;}
  if(!write.cut_length2.value) {alert("본문 글자 제한을 입력하여 주십시요");write.cut_length2.focus();return false;}
  if(!write.pagenum.value) {alert("목록수를 입력하여 주십시요");write.pagenum.focus();return false;}
  if(!write.pagegroupnum.value) {alert("페이지수를 입력하여 주십시요");write.pagegroupnum.focus();return false;}
  return false;
 }
//-->
</SCRIPT>
<form method="post" action="<?=$PHP_SELF?>" name="write" onsubmit="check_submit();">
<input type="hidden" name="exec" value="setting">
<input type="hidden" name="exec2" value="setting_ok">
<input type="hidden" name="sno" value="<?=$sno?>">
<table cellspacing="0" cellpadding="5" border="0" width="98%" align="center">
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>그룹번호</B></td>
	<td height="30"><A HREF="ssearch.php?sno=<?=$sno?>" target="_blank">siche search no : <?=$sno?></a></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>스킨</B></td>
	<td>
	<select name=skinname>
	<?
	// /skin 디렉토리에서 디렉토리를 구함
	$skin_dir="siche_search_skin";
	$handle=opendir($skin_dir);
	while ($skin_info = readdir($handle))
		{
			if(!eregi("\.",$skin_info))
				{
				if($skin_info==$skinname) $select="selected"; else $select="";
				echo"<option value=$skin_info $select>$skin_info</option>";
				}
				}
				closedir($handle);
	?>
     </select>
	</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td bgcolor="d0d0d0" colspan="2" align="center"><B>기본 설정</B></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>검색할 게시판 이름</B></td>
	<td><input type="text" style="width:250" name="searchname" value="<?=$searchname?>">&nbsp;&nbsp;게시판 이름 사이를 "/" 로 구분해 주십시요.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>게시판 제목</B></td>
	<td><input type="text" style="width:250" name="bbstitle" value="<?=$bbstitle?>">&nbsp;&nbsp;게시판 제목 사이를 "/" 로 구분해 주십시요.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>권한 설정</B></td>
	<td><input type="text" style="width:220" name="view_level" value="<?=$view_level?>">&nbsp;&nbsp;위의 게시판 이름과 순서를 맞추어서 기입하세요.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>검색 권한 설정</B></td>
	<td><input type="text" style="width:10%" name="list_view_level" value="<?=$list_view_level?>">&nbsp;&nbsp;지정한 값보다 사용자 레벨이 낮으면 검색이 불가능합니다.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>search 가로크기</B></td>
	<td><input type="text" style="width:10%" name="width" value="<?=$width?>">&nbsp;&nbsp;search 가로크기 (100이하이면 %로 설정)</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>search 배경색상</B></td>
	<td><input type="text" style="width:10%" name="bgcolor" value="<?=$bgcolor?>"></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>제목 글자 제한</B></td>
	<td><input type="text" style="width:10%" name="cut_length1" value="<?=$cut_length1?>" maxlength="3">&nbsp;&nbsp;지정된 길이 이상의 제목글은 ... 로 나머지 표시 (0:사용안함)</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>본문 글자 제한</B></td>
	<td><input type="text" style="width:10%" name="cut_length2" value="<?=$cut_length2?>" maxlength="3">&nbsp;&nbsp;지정된 길이 이상의 본문글은 ... 로 나머지 표시 (0:사용안함)</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>페이지당 목록 수</B></td>
	<td><input type="text" style="width:10%" name="pagenum" value="<?=$pagenum?>" maxlength="2">&nbsp;&nbsp;한페이지당 출력될 목록의 수</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>페이지 표시 수</B></td>
	<td><input type="text" style="width:10%" name="pagegroupnum" value="<?=$pagegroupnum?>" maxlength="2">&nbsp;&nbsp;목록의 아래부분에 표시될 페이지의 갯수</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>타겟 지정</B></td>
	<td><input type="text" style="width:10%" name="targets" value="<?=$targets?>">&nbsp;&nbsp;제목을 클릭 했을때의 타겟을 지정해 주십시요.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>카테고리 출력 여부</B></td>
	<td><input type="radio" name="c_category" value="1" <?if($c_category == 1){echo "checked";}?>>O&nbsp;<input type="radio" name="c_category" value="2" <?if($c_category == 2){echo "checked";}?>>X</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>게시판 제목 출력 여부</B></td>
	<td><input type="radio" name="c_bbstitle" value="1" <?if($c_bbstitle == 1){echo "checked";}?>>O&nbsp;<input type="radio" name="c_bbstitle" value="2" <?if($c_bbstitle == 2){echo "checked";}?>>X</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>검색어 강조</B></td>
	<td><input type="text" style="width:25%" name="searchpoint1" value="<?=$searchpoint1?>"><img src="t.gif" width="10" height="1"><?=$searchpoint1?>검색어<?=$searchpoint2?><img src="t.gif" width="10" height="1"><input type="text" style="width:25%" name="searchpoint2" value="<?=$searchpoint2?>">&nbsp;&nbsp;작은따음표만 사용하세요.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>현재 페이지 강조</B></td>
	<td><input type="text" style="width:25%" name="pagenumpoint1" value="<?=$pagenumpoint1?>"><img src="t.gif" width="25" height="1"><?=$pagenumpoint1?>1<?=$pagenumpoint2?><img src="t.gif" width="25" height="1"><input type="text" style="width:25%" name="pagenumpoint2" value="<?=$pagenumpoint2?>">&nbsp;&nbsp;작은따음표만 사용하세요.</td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td bgcolor="d0d0d0" colspan="2" align="center"><B>게시판 상, 하단에 표시될 내용 설정</B></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>상단에 불러올 파일</B></td>
	<td><input type="text" style="width:100%" name="upfile" value="<?=$upfile?>"></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>상단에 출력할 내용</B></td>
	<td><textarea name="h_comment" cols="70" rows="10" class="textarea" style="width:100%;"><?=$h_comment?></textarea></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>하단에 불러올 파일</B></td>
	<td><input type="text" style="width:100%" name="downfile" value="<?=$downfile?>"></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td width="150" bgcolor="efefe7">&nbsp;&nbsp;&nbsp;<B>하단에 출력할 내용</B></td>
	<td><textarea name="f_comment" cols="70" rows="10" class="textarea" style="width:100%;"><?=$f_comment?></textarea></td>
</tr>
<tr>
	<td height="1" bgcolor="bbbbbb" colspan="2"></td>
</tr>
<tr>
	<td align="right" colspan="2"><input type="image" src="siche_search/images/modify_ok.gif" onsubmit="level_check()">&nbsp;&nbsp;<img src="siche_search/images/modify_no.gif" onClick=reset() border="0" style="cursor:hand"></td>
</tr>
</form>
</table>