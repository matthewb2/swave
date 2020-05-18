<?
	
?>
<table cellspacing="1" cellpadding="5" border="0" width="100%" bgcolor="A7A7A7">
<tr bgcolor="f0f0f0">
	<td>
	<B><?=$siche_search_ver?> 관리자 페이지입니다.</B><BR><BR>
	관리자 페이지에서는 검색할 게시판의 선택과 스킨 선택등의 설정을 하는 곳입니다.<BR><BR>
	이 놈은 제로보드의 검색 부분의 기능 향상을 위한 프로그램으로 제로보드가 설치 되어 있는 곳에서만 작동이 됩니다.<BR>
	PHP와 MY-SQL로 제작하였으며 아직 공부하는 단계라 많은 점이 부족합니다.<BR>
	앞으로 많은 색다른 기능과 이쁜 스킨을 계속적으로 추가 시킬 것 입니다.<BR>
	바라는 점이나 잘못된 부분의 질탄은 <A HREF="http://eos.pe.kr" target="blank">http://eos.pe.kr</A>에 글을 남겨 주시면 앞으로의 개발에 최대한 방영하겠습니다.
	</td>
</tr>
</table><BR>
<div style="line-height:140%">
<HR style="height:1">
<B>1. 저작권 및 유의사항</B><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;① siche search는 <A HREF="http://eos.pe.kr" target=blank>http://eos.pe.kr</A> 와 <A HREF="http://nzeo.com" target=blank>http://nzeo.com</A>에서만 배포가 가능합니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;② 라이센스를 절대로 변경하실 수 없습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;③ siche search의 소스를 수정 및 재배포를 금지합니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;④ siche search를 사용으로 인한 어떠한 문제도 siche에겐 책임이 없습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑤ siche는 언제든지 개발을 중단할 수 있고, 유지 및 보수의 의무가 없습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑥ 사용상 의문이나 의견을 제시하고 싶으신 분은 http://eos.pe.kr에 글을 남겨 주십시오.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(메일로는 답변하지 않습니다.)<BR>
&nbsp;&nbsp;&nbsp;&nbsp;⑦ 스킨의 저작권은 각 스킨을 제작한 분들에게 있습니다.
<BR><BR>
<HR style="height:1">

<HR style="height:1">
<B>2. 히스토리 및 기능</B><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>[version 0.5]</B><BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ날짜가 엉터리로 나오는 것을 수정하였습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ오류문을 한 페이지가 아닌 경고창으로 바꾸었습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ공백 부분의 연산자를 or 또는 and로 선택할 수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ날짜, 이름, 제목으로 정렬을 선택할 수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ검색되는 시간을 체크 하여 foot.php에 뿌려 줍니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(v0.5스킨에서는 관리자에게만 보여줍니다.)
<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>[version 0.4]</B><BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ카테고리 기능을 포함 시켰습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ카테고리를 클릭한 후에 검색을 하면 해당 게시판에서만 검색이 가능합니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ페이지 목록 표시수가 넘어 갈때 제일 앞으로 제일 뒤로 버튼 추가 시켰습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ기본 정렬을 최근 글로 수정하였습니다.
<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>[version 0.3]</B><BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ0.3버젼이 너무 허접한 관계로 버젼업은 안하고 그냥 다시 0.3으로 배포..-_-;;<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ파일 추출로 인한 오류를 잡았습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ많은 게시판의 검색을 위해 필드 속성을 변경하였습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ검색을 할수 있는 권한도 따로 설정을 할수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ권한 설정 레벨에 걸리면 나오는 경고문을 없애고 아예 검색을 안하도록 했습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ코멘트 검색시 제목앞에 ⓒ이 붙고 코멘트의 글내용이 뿌려 집니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;→ ⓒ 마크나 코멘트 나오는부분을 고치려면 스킨 폴더안에 cmain.php를 수정하시면 됩니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;→ 코멘트 검색를 포함해서 다른 필드를 같이 검색할 경우 코멘트에 우선순위가 있습니다.
<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ그룹 관리가 가능해 졌습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ게시판 제목을 관리자페이지에서 설정을 할 수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ코멘트의 검색을 할수 있게끔 하였습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ링크와 파일의 값을 가져 올수 있습니다.
<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>[version 0.2]</B><BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ권한 설정을 할수 있게끔 하였습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ로그인 풀림 현상의 버그를 잡았습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ페이지수가 나오지 않는 버그를 잡았습니다.
<BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>[version 0.1]</B><BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ첫 배포 버젼<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ관리자 페이지(현재 페이지)를 통해 사용자에 맞게 설정을 할 수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ스킨이 지원되어 각 사용자의 홈페이지에 맞게 사용 할 수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ검색할 게시판만 지정해서 쓸 수 있습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ비밀글은 검색이 안되도록 하였습니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;ㆍ띄어쓰기(스페이스키)로 구분하여 OR 검색이 가능합니다.<BR><BR>
<HR style="height:1">

<HR style="height:1">
<B>3. 사용방법</B><BR><BR>
&nbsp;&nbsp;&nbsp;&nbsp;① 제로보드에서 하나의 게시판을 사용하듯이 사용하시면 됩니다.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;② 외부검색을 달때에는 기본 스킨에 들어 있는 outsearch.php를 알맞게 수정하셔서 원하시는 곳에 소스를 넣어 주십시요.<BR>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;프레임이나 아이프레임으로 홈페이지를 제작 했을때에는 달때에는 &lt;form&gt; 태그안에 꼭 target을 잡아 주십시요.
<BR><BR>
<HR style="height:1">
</div>