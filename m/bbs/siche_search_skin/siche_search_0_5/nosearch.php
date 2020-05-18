	<table width="100%" cellspacing="0" cellpadding="0" border="0">
	<tr>
		<td width="32" height="282" background="<?=$dir?>l_drop.gif">&nbsp;</td>
		<td width="auto" style="padding:10" valign="top">
		
		<?if($total_su == 0 && $view_level_check == 1) {?>
		<img src="<?=$dir?>p.gif" align="absmiddle">
		<?=$member[level]?>레벨로 검색할수 있는 게시판이 존재하지 않습니다.
		
		
		<?} elseif($total_su == 0 && $view_level_check == 0){?>
		<img src="<?=$dir?>p.gif" align="absmiddle">
		<B>검색어 <font color="#8C6239">'<?=$search?>'</FONT> 에 대한 검색결과가 없습니다.</B><br><br>
		ㆍ검색어 철자에 잘못이 있는지 확인해보세요.<br>
		ㆍ검색어의 단어수를 줄이거나, 다른 검색어로 검색해 보세요.


		<?} elseif($list_view_level_check == 1) {?>
		<img src="<?=$dir?>p.gif" align="absmiddle">
		<?=$list_view_level?> 레벨 이상 회원들만 검색을 하실 수 있습니다.
		
		
		<?} else {?>
		<img src="<?=$dir?>p.gif" align="absmiddle">
		제로보드 통합 검색 <B><?=$siche_search_ver?></B> 입니다.<br><br>
		ㆍ검색하실 단어를 써넣어 주십시요.<br>
		ㆍ띄어 쓰기로 두 단어 이상의 검색이 가능합니다.<br>
		ㆍ사용상 문의나 불편한 점이 있으시면
		<a href="http://eos.pe.kr" target="_blank">http://eos.pe.kr</A>에 글을 남겨주십시요.<br>
		ㆍ메일 문의는 답변해 드리지 않습니다.
		<?}?>
		</td>
		<td width="32" height="282" background="<?=$dir?>r_drop.gif">&nbsp;</td>
	</tr>
	</table>
