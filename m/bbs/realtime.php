				
			<?
			//echo "test";
			$url = '/home/swave50/www/bbs/testdata.json';
			
			
			$content = file_get_contents($url);
			$json = json_decode($content, true);

			 for ($i = 0; $i <= count($json); $i++) {
				 	if ( $json[$i]['time'] >= time() - 60*60*24*30){
						$list[$i] = $json[$i]['term'];
									
									//echo $json[$i]['time'];
									//echo $json[$i]['term'];
								if ( $json[$i]['time'] <= time() - 60*5){
										$list_pre[$i] = $json[$i]['term'];
									} 
					}
			}


			$list = array_filter($list);
				$list_pre = array_filter($list_pre);
				////////////////

				$list = array_filter($list);
				$list_pre = array_filter($list_pre);
				
				
				//print_r($list_pre);
				/////////////
				$word = array_count_values($list);
				$word_pre = array_count_values($list_pre);
				
				//print_r($word_pre);
			  
				arsort($word);
				arsort($word_pre);
				
				$word = array_slice($word, 0, 10);                  // 몇 개까지 순위를 표시할 것인지 지정
				$word_pre = array_slice($word_pre, 0, 10);
			  
			  
				?>
				
				
				<div id="book" style="display:block;">
					<ul >
                       <?  
					  				    $j=0;
						foreach($word as $key=>$val){
							//if ($key == "0"){
							//}else{
								$titles = str_replace(" ", "&nbsp;",$key);
								$j++;
								$old = 0;
								$new = 0;
								$new = array_search($key, array_keys($word));
								if (array_search($key, array_keys($word_pre))){
									$old = array_search($key, array_keys($word_pre));
									} else $old = "1000";
								if ($old == "1000"){
								echo "<li><a title=$titles href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'><img src=images/$j.png>&nbsp;&nbsp;".mb_substr($key, 0, 15, 'utf-8')."</span>&nbsp;"."<img style='vertical-align:middle' src='/bbs/images/new.gif' /></a></li>";
								}
								elseif ($old-$new>0){
								echo "<li><a title=$titles href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'><img src=images/$j.png>&nbsp;&nbsp;".mb_substr($key, 0, 15, 'utf-8')."</span>&nbsp;"."<img src='/bbs/images/up02.gif' />".($old-$new)."</a></li>";
								}
								elseif ($old-$new == 0){
								echo "<li><a title=$titles href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'><img src=images/$j.png>
								</span>&nbsp;".mb_substr($key, 0, 15, 'utf-8')."&nbsp;"."<img src='/bbs/images/minus.gif' /></a></li>";
									
								} else {
									echo "<li><a title=$titles href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'><img style='  border: 0 none;' src=images/$j.png>&nbsp;
									".mb_substr($key, 0, 15, 'utf-8')." "."<img src='/bbs/images/down02.gif' />".($new-$old)."</a></li>";
								}
							//}
						
						} ?>

                    </ul>
			</div>
		
		
