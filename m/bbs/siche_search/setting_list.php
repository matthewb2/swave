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
<?
	$query_list = mysql_query("select sno, skinname, searchname, targets, c_bbstitle from siche_search order by sno",$connect);

	echo "<table align=\"center\" cellspacing=\"1\" cellpadding=\"5\" width=\"100%\" bgcolor=\"bbbbbb\">";
	echo "<tr bgcolor=\"efefe5\" align=\"center\">";
	echo "<td width=\"5%\"><B>no</B></td><td width=\"30%\"><B>search 스킨</B></td><td width=\"15%\"><B>게시판 수</B></td><td width=\"10%\"><B>타겟</B></td><td width=\"10%\"><B>제목유무</B></td><td width=\"10%\"><B>미리보기</B></td><td width=\"10%\"><B>수정</B></td><td width=\"10%\"><B>삭제</B></td>";
	echo "</tr>";
	while($row = mysql_fetch_array($query_list)){

		$sno				= $row[sno];
		$skinname		= $row[skinname];
		$searchname = $row[searchname];
		$targets			= $row[targets];
		$c_bbstitle			= $row[c_bbstitle];

		$c_searchname	= explode("/",$searchname);
		$search_count	= count($c_searchname);
		$search_count	= $search_count - 1;

		$skinmaker = file("siche_search_skin/$skinname/maker.txt");
        $skinmaker = trim($skinmaker[0]);
        if(file_exists("siche_search_skin/$skinname/maker.txt")){ereg("http://([0-9a-zA-Z./@~?&=_]+)", $skinmaker, $makerurl);$makerurl = $makerurl[0];}else{$makerurl = "#";}

		if($c_bbstitle == "1"){$bbstitle1 = "O";}else{$bbstitle1 = "X";}

		echo "
		<tr align=\"center\" bgcolor=\"ffffff\">
			<td>".$sno."</td>
			<td><a href=\"".$makerurl."\" target=\"_blank\">".$skinname."</a></td>
			<td>".$search_count."</td>
			<td>".$targets."</td>
			<td>".$bbstitle1."</td>
			<td><A HREF=\"ssearch.php?sno=".$sno."\" target=\"_blank\">view</A></td>
			<td><A HREF=\"".$PHP_SELF."?exec=setting&sno=".$sno."\">setup</A></td>
			<td><A HREF=\"".$PHP_SELF."?exec2=s_delete_ok&sno=".$sno."\" onclick=\"return confirm('해당 search를 삭제하시겠습니까')\">delete</A></td>
		</tr>
		";
	
	}
	echo "</table>";
?>