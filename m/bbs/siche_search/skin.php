<table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="A7A7A7">
<tr bgcolor="f0f0f0">
	<td>
	<B>Siche Search 스킨 만들기</B><BR><BR>
	제가 말해드리고 싶은 점은 우선 스킨 만들기는 좆도 아니다~~ 이겁니다.<BR>
	보여주는 껍데기에 불과 한것 이기 때문에 html의 기본적인 것만 이해하시면 아무 문제 없이 자신의 홈페이지에 걸맞는<BR>
	스킨을 충분히 만드실수 있을 것 입니다.<BR>
	개인 홈페이지를 가지고 있고 제로보드를 사용을 한다는 것은 어느 정도의 html을 이해할수 있을 것입니다.<BR>
	여기서 가장 중요한 것은 table 태그인데 table 태그를 이해 못하신다면 여러 강좌 사이트나 http://eos.pe.kr에서<BR>
	조금만 드려다 보시면 이해할수 있으리라 믿습니다.<BR><BR>
	<FONT COLOR="f0f0f0">이해 못하겠으면 때리쳐~ ㅡ"ㅡ 이것을 이해 못하면 할 마음이 없는거야 따샤~ 하지마 하지마~</FONT>
	</td>
</tr>
</table><BR>
<div style="line-height:140%">
<HR style="height:1">
<B>Skin 파일 설명</B><BR><BR>
<div align="center"><img src="siche_search/images/skin_file_name01.gif"></div><BR>
&nbsp;&nbsp;&nbsp;&nbsp;① <FONT COLOR="#FF6633">head.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 siche search의 제일 상단에 나타나는 부분입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;② <FONT COLOR="#FF6633">title.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 검색이된 게시판의 제목을 나타낼 수 있는 파일입니다. 설정에서 없애 줄수도 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;③ <FONT COLOR="#FF6633">main.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 검색이된 결과물을 최종적으로 뿌려주는 부분입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;④ <FONT COLOR="#FF6633">foot.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 siche search의 제일 하단에 나타나는 부분입니다.<BR><BR>
<div align="center"><img src="siche_search/images/skin_file_name02.gif"><BR><BR>
<img src="siche_search/images/skin_file_name03.gif"></div><BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑤ <FONT COLOR="#FF6633">nosearch.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 검색결과가 없을때 보여주는 부분입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑥ <FONT COLOR="#FF6633">style.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 스킨의 style 값을 정해주는 파일입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑦ <FONT COLOR="#FF6633">outsearch.php</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 외부검색의 스킨입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(스킨폴더안에서 바로 적용이 되는것이 아니라 소스를 복사하여 원하는 곳에 넣어주십시요.)<BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑧ <FONT COLOR="#FF6633">maker.txt</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이파일은 스킨을 만드신분의 저작권이 들어 가는 부분입니다.(<FONT COLOR="#FF6633">※만드신분외 절대 수정불가※)</FONT>
<BR><BR>
<HR style="height:1">
<HR style="height:1">
<B>Skin 파일 변수 설명 및 스킨의 이해</B><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;우선 이놈은 제로보드를 바탕으로 만들어진 놈이어서 스킨을 만들때 편하시라고 변수의 이름을 같게 하였습니다.<BR><BR>
<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="5" height="5" background="siche_search/images/box01.gif"></td>
	<td height="5" background="siche_search/images/box02.gif"></td>
	<td width="5" height="5" background="siche_search/images/box03.gif"></td>
</tr>
<tr>
	<td width="5" background="siche_search/images/box04.gif">&nbsp;</td>
	<td bgcolor="F1F1F1">
	① <FONT COLOR="#FF6633">head.php</FONT><BR><BR>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="siche_search/images/head_source.gif"><BR><BR>
	</div>
	</td>
	<td width="5" background="siche_search/images/box05.gif">&nbsp;</td>
</tr>
<tr>
	<td height="5" background="siche_search/images/box06.gif"></td>
	<td height="5" background="siche_search/images/box07.gif"></td>
	<td height="5" background="siche_search/images/box08.gif"></td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;① <FONT COLOR="#FF6633">head.php</FONT><BR>
<table width="95%" cellpadding="5" cellspacing="0" border="0" align="center">
<tr>
	<td width="125">&nbsp;&nbsp;&nbsp;<FONT COLOR="#3399FF">&lt;?=$width?&gt;</FONT></td>
	<td width="">: 설정페이지에서 search 가로크기 의 값이 들어 갑니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$dir?&gt;</FONT></td>
	<td>: 스킨폴더의 경로입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$sn?&gt;</FONT></td>
	<td>: 이름 체크박스의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$ss?&gt;</FONT></td>
	<td>: 제목 체크박스의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$sm?&gt;</FONT></td>
	<td>: 내용 체크박스의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$search?&gt;</FONT></td>
	<td>: 검색어의 값 입니다.</td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;?if($sn=="1"){echo "checked";}?&gt; 이놈들은 처음 검색을 하고 그 검색한 내용이 남아있도록 하는 것입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;예를 들어 저놈들을 지웠다고 가정하면 제목을 클릭하고 "siche"라는 단어로 검색을 했을 경우 검색 결과가 나옵니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;허나 검색창은 처음 처럼 비워져 있을 것입니다. 결론은 있어도 돼고 없어도 돼는 넘인데 편의상 넣어 둔 것입니다.<BR><BR>
<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="5" height="5" background="siche_search/images/box01.gif"></td>
	<td height="5" background="siche_search/images/box02.gif"></td>
	<td width="5" height="5" background="siche_search/images/box03.gif"></td>
</tr>
<tr>
	<td width="5" background="siche_search/images/box04.gif">&nbsp;</td>
	<td bgcolor="F1F1F1">
	② <FONT COLOR="#FF6633">title.php</FONT><BR><BR>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="siche_search/images/title_source.gif"><BR><BR>
	</div>
	</td>
	<td width="5" background="siche_search/images/box05.gif">&nbsp;</td>
</tr>
<tr>
	<td height="5" background="siche_search/images/box06.gif"></td>
	<td height="5" background="siche_search/images/box07.gif"></td>
	<td height="5" background="siche_search/images/box08.gif"></td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;② <FONT COLOR="#FF6633">title.php</FONT><BR>
<table width="95%" cellpadding="5" cellspacing="0" border="0" align="center">
<tr>
	<td width="125">&nbsp;&nbsp;&nbsp;<FONT COLOR="#3399FF">&lt;?=$title_name?&gt;</FONT></td>
	<td width="">: 해당 게시판이 id 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$dir?&gt;</FONT></td>
	<td>: 스킨폴더의 경로입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$a_title?&gt;</FONT></td>
	<td>: 해당 게시판의 링크 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$total_su?&gt;</FONT></td>
	<td>: 해당 게시판의 검색된 수 입니다.</td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;if($title_name == "bbs_free"){$title_name = "자유게시판";} 이놈은 게시판 id가 "bbs_free"일 경우 $title_name 변수 값을<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;자유게시판으로 변경을 하라는 말입니다. 이런 식으로 반복하여 게시판의 이름을 임의로 변경하여 보여줄수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;만약 게시판 이름대신 이미지로 대체하시려면 {$title_name = "&lt;img src=&lt;?=$dir?&gt;해당이미지 border=0&gt;"} 이런식으로<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;하면 이미지로도 대체할수 있습니다.<BR><BR>
<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="5" height="5" background="siche_search/images/box01.gif"></td>
	<td height="5" background="siche_search/images/box02.gif"></td>
	<td width="5" height="5" background="siche_search/images/box03.gif"></td>
</tr>
<tr>
	<td width="5" background="siche_search/images/box04.gif">&nbsp;</td>
	<td bgcolor="F1F1F1">
	③ <FONT COLOR="#FF6633">main.php</FONT><BR><BR>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="siche_search/images/main_source.gif"><BR><BR>
	</div>
	</td>
	<td width="5" background="siche_search/images/box05.gif">&nbsp;</td>
</tr>
<tr>
	<td height="5" background="siche_search/images/box06.gif"></td>
	<td height="5" background="siche_search/images/box07.gif"></td>
	<td height="5" background="siche_search/images/box08.gif"></td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;③ <FONT COLOR="#FF6633">main.php</FONT><BR>
<table width="95%" cellpadding="5" cellspacing="0" border="0" align="center">
<tr>
	<td width="125">&nbsp;&nbsp;&nbsp;<FONT COLOR="#3399FF">&lt;?=$a_subject?&gt;</FONT></td>
	<td width="">: 해당 게시물의 링크 값 입니다.(target은 설정 페이지에서 설정가능)</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$subject?&gt;</FONT></td>
	<td>: 해당 게시물의 제목 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$a_self?&gt;</FONT></td>
	<td>: 해당 게시물의 링크 값 입니다.(target은 현재창)</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$a_blank?&gt;</FONT></td>
	<td>: 해당 게시물의 링크 값 입니다.(target은 새창)</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$name?&gt;</FONT></td>
	<td>: 해당 게시물의 작성자의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$view_level_check?&gt;</FONT></td>
	<td>: 해당 게시물의 권한 체크 값 입니다..</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$memo?&gt;</FONT></td>
	<td>: 해당 게시물의 내용 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$date?&gt;</FONT></td>
	<td>: 해당 게시물의 작성 날짜 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$hit?&gt;</FONT></td>
	<td>: 해당 게시물의 읽은 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$dir?&gt;</FONT></td>
	<td>: 스킨폴더의 경로입니다.</td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;?=$a_self?&gt; 와 &lt;?=$a_blank?&gt; 은 target 값이 고정 되어 있는 것이고 &lt;?=$a_subject?&gt;의 target 값은<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;설정 페이지에 '타겟 지정' 에 들어가 있는 값이 target으로 정해 집니다.<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<FONT COLOR="ff0000">[02.06.01]</FONT> 현재 회원의 레벨 값이 게시판의 레벨 값보다 크면 $view_level_check에 1이라는 값이 들어 갑니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;즉, 현재 회원의 레벨 값으로 볼수 없는 게시물일때 $view_level_check에 1이 들어 간다는 말이지요.<BR><BR>
<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="5" height="5" background="siche_search/images/box01.gif"></td>
	<td height="5" background="siche_search/images/box02.gif"></td>
	<td width="5" height="5" background="siche_search/images/box03.gif"></td>
</tr>
<tr>
	<td width="5" background="siche_search/images/box04.gif">&nbsp;</td>
	<td bgcolor="F1F1F1">
	④ <FONT COLOR="#FF6633">foot.php</FONT><BR><BR>
	<div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="siche_search/images/foot_source.gif"><BR><BR>
	</div>
	</td>
	<td width="5" background="siche_search/images/box05.gif">&nbsp;</td>
</tr>
<tr>
	<td height="5" background="siche_search/images/box06.gif"></td>
	<td height="5" background="siche_search/images/box07.gif"></td>
	<td height="5" background="siche_search/images/box08.gif"></td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;④ <FONT COLOR="#FF6633">foot.php</FONT><BR>
<table width="95%" cellpadding="5" cellspacing="0" border="0" align="center">
<tr>
	<td width="125">&nbsp;&nbsp;&nbsp;<FONT COLOR="#3399FF">&lt;?=$nosearchs?&gt;</FONT></td>
	<td width="">: 검색 결과가 없을때 주석의 시작 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$nosearche?&gt;</FONT></td>
	<td>: 검색 결과가 없을때 주석의 끝 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$width?&gt;</FONT></td>
	<td>: 설정페이지에서 search 가로크기 의 값이 들어 갑니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$ttotal_su?&gt;</FONT></td>
	<td>: 총 검색 결과의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$a_prev_page?&gt;</FONT></td>
	<td>: 이전 페이지 그룹이 있을때 생기는 링크 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$print_page?&gt;</FONT></td>
	<td>: 각 페이지의 링크 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$a_next_page?&gt;</FONT></td>
	<td>: 다음 페이지 그룹이 있을때 생기는 링크 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$dir?&gt;</FONT></td>
	<td>: 스킨폴더의 경로입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$sn?&gt;</FONT></td>
	<td>: 이름 체크박스의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$ss?&gt;</FONT></td>
	<td>: 제목 체크박스의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$sm?&gt;</FONT></td>
	<td>: 내용 체크박스의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$search?&gt;</FONT></td>
	<td>: 검색어의 값 입니다.</td>
</tr>
</table>
<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;?=$nosearchs?&gt; 이놈은 검색 결과 값이 없을 경우 즉 &lt;?=$ttotal_su?&gt; 값이 '0' 일때 '&lt;!--'의 값을 갖습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;?=$nosearche?&gt; 이놈은 '--&gt;'의 값을 갖습니다. 고로 &lt;?=$ttotal_su?&gt; 값이 '0' 일때 두 변수 사이에 있는<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;것들은 주석 처리가 되어 보여지지 않게 됩니다.<BR><BR>
<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="5" height="5" background="siche_search/images/box01.gif"></td>
	<td height="5" background="siche_search/images/box02.gif"></td>
	<td width="5" height="5" background="siche_search/images/box03.gif"></td>
</tr>
<tr>
	<td width="5" background="siche_search/images/box04.gif">&nbsp;</td>
	<td bgcolor="F1F1F1">
	⑤ <FONT COLOR="#FF6633">nosearch.php</FONT><BR><BR>
	<div>&nbsp;&nbsp;&nbsp;
	<img src="siche_search/images/nosearch_source.gif"><BR><BR>
	</div>
	</td>
	<td width="5" background="siche_search/images/box05.gif">&nbsp;</td>
</tr>
<tr>
	<td height="5" background="siche_search/images/box06.gif"></td>
	<td height="5" background="siche_search/images/box07.gif"></td>
	<td height="5" background="siche_search/images/box08.gif"></td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑤ <FONT COLOR="#FF6633">nosearch.php</FONT><BR>
<table width="95%" cellpadding="5" cellspacing="0" border="0" align="center">
<tr>
	<td width="125">&nbsp;&nbsp;&nbsp;<FONT COLOR="#3399FF">&lt;?=$dir?&gt;</FONT></td>
	<td width="">: 스킨폴더의 경로입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$total_su?&gt;</FONT></td>
	<td>: 총 검색 결과의 값 입니다.</td>
</tr>
<tr>
	<td><FONT COLOR="#3399FF">&nbsp;&nbsp;&nbsp;&lt;?=$search?&gt;</FONT></td>
	<td>: 검색어의 값 입니다.</td>
</tr>
</table>
<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;여기서 또다시 &lt;?=$total_su?&gt; 변수를 사용합니다. &lt;?if($total_su == 0){?&gt; 검색 결과가 하나도 없다는 말이겠죠?<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이렇게 검색 결과가 아무것도 없으면 &lt;?=$search?&gt; 변수로 검색어를 한번 확인 시켜 주고 검색된 결과가 없다는<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;멘트를 뿌려줍니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;?} else {?&gt; 모르시는 분도 있겠지만 이것은 위의 결과가 아니면.. 고로 $total_su가 0이 아니면.. 을 뜻 합니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;그러니 $total_su의 값이 1이나 2나 3이나 기타 등등등등~ 의 값을 가지면 해당 부분을 뿌려 주는 것입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;핫~! 그러면 검색 결과가 있을때의 경우를 말하는 것인가요~? 라고 생각하실텐데 nosearch.php는 검색결과가<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;없을때 그리고 바로 ssearch.php로 들어 왔을때만 나타나는 페이지 입니다. 그냥 그렇게 생각하십시요.<BR><BR>
<table width="95%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="5" height="5" background="siche_search/images/box01.gif"></td>
	<td height="5" background="siche_search/images/box02.gif"></td>
	<td width="5" height="5" background="siche_search/images/box03.gif"></td>
</tr>
<tr>
	<td width="5" background="siche_search/images/box04.gif">&nbsp;</td>
	<td bgcolor="F1F1F1">
	⑥ <FONT COLOR="#FF6633">outsearch.php</FONT><BR><BR>
	<div>&nbsp;&nbsp;&nbsp;
	<img src="siche_search/images/outsearch_source.gif"><BR><BR>
	</div>
	</td>
	<td width="5" background="siche_search/images/box05.gif">&nbsp;</td>
</tr>
<tr>
	<td height="5" background="siche_search/images/box06.gif"></td>
	<td height="5" background="siche_search/images/box07.gif"></td>
	<td height="5" background="siche_search/images/box08.gif"></td>
</tr>
</table><BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑥ <FONT COLOR="#FF6633">outsearch.php</FONT><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;이놈은 스킨이 바로 적용이 되는 놈이 아닙니다. 외부 검색을 설명 하기 위해서 만들어 놓은 것 입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;우선 원하시는 페이지에 outsearch.php 소스를 붙여 넣으시고요. target, action 부분만 수정해주시면 됩니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;target 같은 경우는 프레임으로 나누어져 있는 홈페이지의 경우 검색 결과 값을 뿌려줄 프레임의 이름을 넣으시고<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;action은 ssearch.php 파일의 경로를 적어 주시면 됩니다.<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;<FONT COLOR="#FF6633">※ 살짝 정리</FONT><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;위의 소스들을 주~욱 보시면 아시겠지만 처음에 시작된 head.php 마지막 부분에 테이블 태그가 시작되어<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;foot.php 1~2 번째 줄에서 닫습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;결국 하나의 페이지를 4 토막을 내어서 따로따로 저장하시면 스킨이 완성이 되는 것이지요.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;그리고 각 상황 마다 nosearch.php가 살짝 살짝 끼어 드는 것 이지요.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;거기다가 변수들을 첨가하여 값들을 뿌려주면 스킨 만들기는 따사시한 죽 먹기 입니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;주의 하실 것은 input 태그중에 type이 'hidden' 값을 가진 놈들을 절대로 빼먹으면 안됩니다.<BR><BR>
<HR style="height:1">
</div>