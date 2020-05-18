
		<div style="height:10px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;">
		</div>
		
		<div style="margin:0 0 0 0; border-bottom: 1px solid #ddd;">
		</div>
				
			<div style="margin:10 10 0 10">
			<table width="100%">
				<tr>
					<td style="font-size: 15px; font-weight:bold; color: #767676; text-align:left; margin: 10 0 0 0;
									padding:5px;">&nbsp;&nbsp;최근 본 동영상</td>
				</tr>
			</table>
			</div>
		
								
								
<div>
								
								<?
								
									$f="./viewedvideo.json";
									//echo $member[user_id];
									
									if ($member[user_id]){
										$name = $member[user_id];
									} else $name = "nobody";
										
																		
										$contents = file_get_contents($f);
										//$contents = utf8_encode($contents);
										
										$temp = json_decode($contents,true); 
										
										
										
										?>
											<table width='100%' style="width:100%; font-style:left; font-size:10pt; border: 1px solid #e1e1e1;">
										<?
										
										foreach ($temp as $index=>$v) {
											if ($v["name"] == $name){
												$v_list = array_reverse($v["Address"]);
												//$v_list = $v["Address"];
												
												// print_r($v_list);
												$end = count($v["Address"]);
												if ($end >5){
													$end = 6;
												} else $end = count($v_list);
												 
												for ($no=0; $no < $end; $no++){
													$v_no = $v_list[$no];
														// echo $v_no;
														
														$sql2 = "SELECT * FROM zetyx_board_video where no = $v_no";
														$result2 = mysql_query($sql2) or die(mysql_error());
                                                    
															$array = array();
															while($row2 = mysql_fetch_array($result2)) {
																//$a_subject2 = "<a href='/bbs/view.php?id=$id&no=$row2[no]'>";
																$subject2 = stripslashes($row2[subject]);                                           
																$sitelink1 = $row2[sitelink1];
																$file_name1 = $row2[file_name1];
																$reg_date = $row2[reg_date];
																#v_no = $row2[no];
																
										?>
																								
													<tr>
																												
														<td style="padding:10px; font-size:14px;" onclick="window.location='http://swave.woobi.co.kr/view.php?id=news&no=<?=$v_no?>'">				
															
															<? if(preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $subject2)){
																echo "<a style='color:#666666' href='/view/news/$v_no'>";
																
																echo mb_strcut($subject2,0, 80,'UTF-8');
																echo "</a>";
															} else {
																echo "<a style='color:#666666' href='/view/news/$v_no'>";
																echo substr($subject2,0, 60);
																echo "</a>";
															}
															?>
															<br>
															
															<?if (time()-$reg_date<60*60){
																?>&nbsp;<? echo round((time()-$reg_date)/60)."분 전";?></font>
															<?} else if (time()-$reg_date<24*60*60){
																?>&nbsp;<? echo round((time()-$reg_date)/60/60)."시간 전";?></font>
															
															<?}
															else {?>
																&nbsp;<?=date('Y-m-d', $reg_date);?></font>
															<?}?>
														</td>
														
														</tr>
														
															<tr><td width="100%" style="border-bottom:1px solid #e1e1e1"></td></tr>

																									
												<?
												
												
												}
												}
												}
											
											}
											?>
											
											</table>
											<?
											
										
										
									
										
							
											?>