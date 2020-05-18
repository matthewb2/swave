<? $conn = mysql_connect("localhost", "swave", "starman");
	
						mysql_select_db("swave", $conn);
												

						$sql = "SELECT DISTINCT * FROM zetyx_board_webzine where '1'='1' order by reg_date desc limit 1";
						//$sql = "SELECT * FROM search_relate WHERE rword1 IS NOT NULL order by rand()";
						//$sql = "SELECT DISTINCT * FROM finance_ci WHERE '1'='1' order by name";
						//echo "okay";
						$result = mysql_query($sql) or die(mysql_error());

						
						while($row = mysql_fetch_assoc($result)) {
							
							if ($row['name'] != ""){
								if ($row[file_name2]){
								$filename= str_replace("data/webzine/","data/webzine/resized/", $row[file_name2]);
								} else $filename = "data/webzine/resized/notready.gif"; 
							echo "<table width='95%'>";
							//echo $row[file_name1];
							echo "<tr><td><a href='view.php?id=webzine&no=$row[no]'><img class='webzine-img' data-src='http://swave.woobi.co.kr/bbs/".$filename."'></a></td></tr>";
							
							echo "<tr><td ><a style='font-size:14px; margin-left:5px; color:#000000' href='view.php?id=webzine&no=$row[no]'>".$row['subject']."</a></td></tr>";
							echo "</table>";
							
							
								
							}
						}
						?>
