<?

//echo "dddddddddddddddd";
$id = "kospi";

$result = mysql_query("select * from $t_board"."_$id ", $connect) or die(mysql_error());

		
		while($data=mysql_fetch_array($result)) {
			// $subject = cut_str(stripslashes($data[subject]),$textlen)."</font></b>";
			
		$memo = cut_str(stripslashes($data[memo]),50)."</font></b>";
			
		}
		
		preg_match_all ('!\d+!', $memo, $matches);
		//echo 개인 $matches[0];
		preg_match_all ('/\+|\-/', $memo, $updown);
		//print_r($updown);
		echo "<span style='font-size:11px'>개인" . $updown[0][0]. number_format($matches[0][0], 0, '.', ',')."  ";
		echo "외국인" .$updown[0][1] .number_format($matches[0][1], 0, '.', ',')."  ";
		
		echo "기관". $updown[0][2] .number_format($matches[0][2], 0, '.', ',')."</span>";
		
		?>