<div>
								<div style=" font-family:Nanum Gothic;font-size:11pt;padding:10px">
								다음 동영상
								</div>
								<?
								if (!$member[user_id]){
								//최근 본 동영상 목록에 현재 동영상 번호를 집어 넣음
									
									$f="./video.json";

									//	flie_get_content($f);

									$temp=array(array());
									$contents = file_get_contents($f);
									
									//$contents = utf8_encode($contents);
									
									$num = json_decode($contents);
									//echo count($num);
									//echo $_GET[no];
									//echo "Got Irix";
									if($_GET[no]){		
											
										if (in_array($_GET[no], $num)) {
											
												if (count($num) >= 8){
													//echo "<script>alert('test');</script>";
													//echo count($num);
													$num = array_slice($num, 0, 8);
												}
											} else {
																				
												array_unshift($num, $_GET[no]);
												//echo $num;
												if (count($num) >= 8){
													//echo "<script>alert('test');</script>";
													//echo count($num);
													$num = array_slice($num, 0, 8);
												}
												file_put_contents($f, json_encode($num));
											}
											
									}
									
									$string = $data[subject];
									
									$word = explode(' ', $string);
									$word = array_filter($word);
									
									$del = array("the","of", "a", "did", "it", "went", "about",
									"comming", "tv","이제","정말","좀","하고","싶다", "who","in", "hd",
									"from","on", "to", "with", "around", "up", "down", "모든","추찬","how",
									"dows","work","where","we","come","from", "HD", "full","is","all","오늘",
									"KBS","PD","대하사극","그","후", "특집","못하는","않는다","싸이월드","연인",
									"알고","was","video","i","day","now","넌","me","what","say","whats",
									"by","HD","short","my","DAY","last","when",
									"vs","part","during", "at", "the","will","make", "to", "and");
									$word = array_diff($word, $del);
									
									//$delu = array();
									$del2 = array();
									foreach($del as $key) {   //첫번째 알파벳을 대문자로 바꿔서 제거
									$delu = ucfirst($key);
									array_push($del2, $delu);
									}
									$word = array_diff($word, $del2);
									
								
									//print_r($word);
									
									$sql = "select * from zetyx_board_video where '1'='0'";
									
									
																		

									foreach ($word as $value) {
										
											$value = preg_replace('/\[/', '', $value);
											$value = preg_replace('/\]/', '', $value);
											$value = preg_replace('/\…/', '', $value);
											$value = preg_replace('/:/', '', $value);
											$value = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $value);
											
											if (preg_match('/\\d/', $value)==0)
											{
												//숫자가 포함되어 있지 않은 단어만 검색에 포함
												//조사를 제거
												$value = preg_replace('/은$|과$/','',$value);
												$value = preg_replace('/는$/','',$value);
												$value = preg_replace('/를$/','',$value);
												$value = preg_replace('/을$/','',$value);
												$value = preg_replace('/의$|로$/','',$value);
												
											
													
												if ($value){
													
													$sql .= "or subject like '%$value%'";
												}
											

											}
											
																							
										
									}
									//echo $sql;
									
									
									$sql .= "order by vote desc, reg_date desc";
								//mysql_query('SET CHARACTER SET utf8');  	
									$result = mysql_query($sql) or die(mysql_error());
									
									$subject=array();
									$memo=array();
									$no2 = array();
									$hit = array();
									$reg_date = array();
									
								while($row2=mysql_fetch_array($result)){
									
									
									$a_subject2 = "<a href='/bbs/view.php?id=$id&no=$row2[no]'>";
											$subject2 = stripslashes($row2[subject]);
											$sitelink1 = $row2[sitelink1];
											$date2 = date("m-d", $row2[reg_date]);
											$reg_date[] = $date2; 
											$hit2 = $row2[hit];
											$hit[] = $hit2;
											$subject[] = $row2[subject];
											$no2[] = $row2[no];
											 $temp = explode("embed",$row2[memo]);
											$temp = explode("\\",$temp[1]);
											$memo[] = $temp[0];
																							
									?>
									
									<?
									
											}?>
								<?
								}
								if ($member[user_id]){
									//최근 본 동영상 목록에 현재 동영상 번호를 집어 넣음
									
									$f="./video.json";

									//	flie_get_content($f);

									$temp=array(array());
									$contents = file_get_contents($f);
									
									//$contents = utf8_encode($contents);
									
									$num = json_decode($contents);
									//echo count($num);
									//echo $_GET[no];
									//echo "Got Irix";
									if($_GET[no]){		
											
										if (in_array($_GET[no], $num)) {
											
												if (count($num) >= 8){
													//echo "<script>alert('test');</script>";
													//echo count($num);
													$num = array_slice($num, 0, 8);
												}
											} else {
																				
												array_unshift($num, $_GET[no]);
												//echo $num;
												if (count($num) >= 8){
													//echo "<script>alert('test');</script>";
													//echo count($num);
													$num = array_slice($num, 0, 8);
												}
												file_put_contents($f, json_encode($num));
											}
											
									}
									
									$string = $data[subject];
									
									$word = explode(' ', $string);
									$word = array_filter($word);
									
									$del = array("the","of", "a", "did", "it", "went", "about",
									"comming", "tv","이제","정말","좀","하고","싶다", "who","in", "hd",
									"from","on", "to", "with", "around", "up", "down", "모든","추찬","how",
									"dows","work","where","we","come","from", "HD", "full","is","all","오늘",
									"KBS","PD","대하사극","그","후", "특집","못하는","않는다","싸이월드","연인",
									"알고","was","video","i","day","now","넌","me","what","say","whats",
									"by","HD","short","my","DAY","last","when",
									"vs","part","during", "at", "the","will","make", "to", "and");
									$word = array_diff($word, $del);
									
									//$delu = array();
									$del2 = array();
									foreach($del as $key) {   //첫번째 알파벳을 대문자로 바꿔서 제거
									$delu = ucfirst($key);
									array_push($del2, $delu);
									}
									$word = array_diff($word, $del2);
									
								
									//print_r($word);
									
									$sql = "select * from zetyx_board_video where '1'='0'";
									
									
																		

									foreach ($word as $value) {
										
											$value = preg_replace('/\[/', '', $value);
											$value = preg_replace('/\]/', '', $value);
											$value = preg_replace('/\…/', '', $value);
											$value = preg_replace('/:/', '', $value);
											$value = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $value);
											
											if (preg_match('/\\d/', $value)==0)
											{
												//숫자가 포함되어 있지 않은 단어만 검색에 포함
												//조사를 제거
												$value = preg_replace('/은$|과$/','',$value);
												$value = preg_replace('/는$/','',$value);
												$value = preg_replace('/를$/','',$value);
												$value = preg_replace('/을$/','',$value);
												$value = preg_replace('/의$|로$/','',$value);
												
											
													
												if ($value){
													
													$sql .= "or subject like '%$value%'";
												}
											

											}
											
																							
										
									}
									//echo $sql;
									
									
									$sql .= "order by vote desc, reg_date desc";
								//mysql_query('SET CHARACTER SET utf8');  	
									$result = mysql_query($sql) or die(mysql_error());
									
									$subject=array();
									$memo=array();
									$no2 = array();
									$hit = array();
									$reg_date = array();
									
								while($row2=mysql_fetch_array($result)){
									
									
									$a_subject2 = "<a href='/bbs/view.php?id=$id&no=$row2[no]'>";
											$subject2 = stripslashes($row2[subject]);
											$sitelink1 = $row2[sitelink1];
											$date2 = date("m-d", $row2[reg_date]);
											$reg_date[] = $date2; 
											$hit2 = $row2[hit];
											$hit[] = $hit2;
											$subject[] = $row2[subject];
											$no2[] = $row2[no];
											 $temp = explode("embed",$row2[memo]);
											$temp = explode("\\",$temp[1]);
											$memo[] = $temp[0];
																							
									?>
									
									<?
									
											}
								
								
								
								}
								
								
								?>
								
									
							<div id="you" style="padding:5px;width:100%"></div>
									
								<div style="padding:5px">
									
									<input class="more" name="more" type="button" onclick="add2();" value="더보기" />
								
								</div>
</div>