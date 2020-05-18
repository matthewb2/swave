<? // for ($page=1; $page<=$total_page; $page++){ 


				for ($j=($page-1)*$page_num; $j<$page*$page_num-1; $j++){
					//echo $j;
					if ($j < $total-($page-1)*$page_num){
					if ($subject[$j] != "" && $memo[$j] != ""){
							// echo "<script>alert($j);</script>";
				
						 if ($id=="dic"){?>
							<tr width='100%'>
							<td style="height:10px; padding:10px">
							<? $memo = preg_replace("/<img[^>]+\>/i", "", $memo[$j]);?>
							<?=$memo?>
							</td>
						<?	} else { 
							// echo $j;
							?>
							<tr width='100%'>
								<td style="font-size:12pt; vertical-align:top; line-height:150%; border-bottom:1px solid #e1e1e1; height:60px; padding:5px; font-size:11pt; color:#000000" 
														onclick="window.location='view.php?id=<?=$board[$j]?>&no=<?=$no[$j]?>'">
									<? if ($board[$j] == "video")
										{?>
										<table border="0" width="100%" style="table-layout:fixed">
										<tr><td width="70%" style="font-size:15px; padding:0px; vertical-align:top; word-wrap:break-word">
											&nbsp;<img src="images/icon_sm_page_white.gif" />&nbsp;<font color="#000000">
											<? if(preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $subject[$j])){
													echo mb_strcut($subject[$j],0, 90,'UTF-8');
												} else {
													echo substr($subject[$j],0, 45);
												}
												?>
												<br>
												<span style="color:#0060A6; font-size:10pt">&nbsp;
													<? $sitelink1[$j] = str_replace("http://","",$sitelink1[$j]); 
													$sitelink1[$j] = str_replace("https://","",$sitelink1[$j]); 
													
													?>
													<a href="http://<?=$sitelink1[$j]?>"><?=$sitelink1[$j]?></a>
												</span>
										
											</td>
											<td style="word-wrap:break-word">
											<?
											 if (preg_match('/youtube/', $sitelink1[$j])){ 
													$pc = explode("v=", $sitelink1[$j]);
												?><img width="100px" src="http://img.youtube.com/vi/<?=$pc[1]?>/hqdefault.jpg" />
											 <?} 
												?>
											</td>
										</tr>
										</table>
										<?}
								else{?>
										
										<?
										$memoi = $memo[$j];
										$memoi = strip_tags($memoi);
										$memoi = str_replace("&nbsp&nbsp","",$memoi);
										$memoi = str_replace("&nb","",$memoi);
										$memoi = str_replace("sp;","",$memoi);
										$memoi = subject_cut($memoi, 120);
										//$memoi = str_replace("DCINSIDE MULGALL","http://gallery.dcinside.com/physicalscience",$memoi);
										?>
										<?if ($file_name1[$j]){
														if ($board[$j] == "news" || $board[$j] == "image"){   //뉴스이거나 이미지가 있을 때
														?>
															<table border="0" width="100%" style="table-layout:fixed">
																<tr><td colspan="2" width="70%" style="vertical-align:top; word-wrap:break-word">
																&nbsp;<img src="images/icon_sm_page_white.gif" />&nbsp;
																<font style="font-size:14px; color:000000">
															<? if(preg_match('/[\xA1-\xFE][\xA1-\xFE]/', $subject[$j])){
																echo mb_strcut($subject[$j],0, 70,'UTF-8');
															} else {
																echo substr($subject[$j],0, 45);
															}
															?>
															
															<font size="2" color="#0060A6">&nbsp;
															<? $sitelink1[$j] = str_replace("http://","",$sitelink1[$j]); 
															$sitelink1[$j] = str_replace("https://","",$sitelink1[$j]); 
															
															?>
													
															<a href="http://<?=$sitelink1[$j]?>"><?=subject_cut($sitelink1[$j],50)?></a>
															</font>
															</tr><td style="font-size:14px; margin-top:5px; vertical-align:top">
																<?
																echo $memoi;
																//echo "DDDDDD";
																?>
																</td>
															<td style="width:40%; height:100px; padding:0 10px 0px 10px; font-size:13pt; 
																			word-wrap:break-word; color:#000000" 
																	onclick="window.location='<?=$sitelink1[$j]?>'">
															<?
															$file_name1[$j] = str_replace('/home/swave50/www/bbs/','',$file_name1[$j]);
															//echo $file_name1[$j];
															echo "<img style='width:100%; height:100px; padding 0 10px 10px 0' src='http://swave.woobi.co.kr/bbs/".$file_name1[$j]."'>";
															}
															?>
															</td></tr>
														</table>
														<?
										} else {?>
														<!--그림도 없고 아무 것도 없을 때 -->
													<?	if ($subject[$j] == "" || $subject[$j] == null || $subject[$j] == "undefined" ){
										} else{?>
														<table border="0" width="100%" style="color:#000000; table-layout:fixed">
															<tr>
															<td style="font-size:11pt; word-wrap:break-word; color:#000000;">
																<img src="images/icon_sm_page_white.gif" />
																<span style="color:#000000"><?=$subject[$j]?>
															</td>
															</tr>
															<tr>
															<td style="font-size:11pt;word-wrap:break-word">
																<span style="color:#000000"><?=$memoi?></font>
															</td>
															</tr>
															<tr>
															<td style="word-wrap:break-word">
																<span style="color:#666666"><?=$reg_date[$j]?></font>
															</td>
															</tr>
														</table>
												<? }?>
										<?
										}?>
																
										
										</td>
								</tr>
								<?
								}
							}	 
					}
					}
				}?>