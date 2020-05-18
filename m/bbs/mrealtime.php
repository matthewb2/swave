<div id="layer1">
<table border="0" cellspacing="0" cellpadding="0" style="padding:0px;margin:0px; border-spacing:0px; border:0; border-collapse:collapse;">
		<tr>
		<td width="65px" ><span style="background-color: #f9f9f9;
								border: 0px solid #ddd;
								padding:0px;
								width:100%;
								font-size:13px;
								height:100%;
								text-align:center;
								-webkit-appearance:none;">실시간검색
		</span></td>
		<td width="230px" style="font-size:13px">
		
				<ul><ol><?  
					  				  $i=0;
						foreach($word as $key=>$val){
							//if ($key == "0"){
							//}else{
								$i++;
								$old = 0;
								$new = 0;
							$new = array_search($key, array_keys($word));
							if (array_search($key, array_keys($word_pre))){
							$old = array_search($key, array_keys($word_pre));
							} else $old = "1000";
							if ($i == 1){ 
								 $key = "안희정을 석방하라";
								//	$key = "철원 총기사망 진실";
								}
							if (mb_strlen($key) >= 16){
								$s_key = mb_substr($key, 0, 10, 'utf-8')."..";
							} else $s_key = $key;
							//echo "<script>alert(".$old.")</script>";
							//echo "<li><a href='search.php?search=".$key."'>". $i."&nbsp;".iconv("UTF-8", "EUC-KR", $key)."&nbsp;".($old-$new)."</a></li>";
							if ($old == "1000"){
							echo "<li><a href='ssearch.php?sm=1&search=".$key."'><img style='vertical-align:middle' src='images/$i.png'>&nbsp;&nbsp;".$s_key."&nbsp;&nbsp;"."<img style='vertical-align:middle' src='/bbs/images/new.gif' /></a></li>";
							}
							elseif ($old-$new>0){
							echo "<li><a href='ssearch.php?sm=1&search=".$key."'><img style='vertical-align:middle' src='images/$i.png'>&nbsp;&nbsp;".$s_key."&nbsp;&nbsp;&nbsp;"."<img style='vertical-align:middle' src='/bbs/images/up02.gif' /><font style='vertical-align:middle'>".($old-$new)."</font></a></li>";
							}
							elseif ($old-$new <0){
							echo "<li><a href='ssearch.php?sm=1&search=".$key."'><img style='vertical-align:middle' src='images/$i.png'>&nbsp;&nbsp;".$s_key."&nbsp;&nbsp;&nbsp;"."<img style='vertical-align:middle' src='/bbs/images/down02.gif' /><font style='vertical-align:middle'>".($new-$old)."</font></a></li>";
							}

							else echo "<li><a href='ssearch.php?sm=1&search=".$key."'><img style='vertical-align:middle' src='images/$i.png'>&nbsp;&nbsp;".$s_key."&nbsp;&nbsp;"."  ─ </a></li>";
							
							
							
						//}
						}?>

					</ol>
                </ul>
		</td>
		<td>
			<img id="clickme" src="images/arrow.gif" style="height:30px; padding:15px 0 0 0">
		</td>
		</table>

</div>
<div id="layer2">

<table border="0" width="100%">
		<tr>
		<td>	<a style="font-size:13px">실시간검색</a></td>
		<td>
			<img id="clickme2" src="images/arrow2.gif" style="float:right; height:30px; padding:15px 30px 0 0">
		</td>
		</tr>
</table>
	
	
<table width="100%" style="margin:0">
		<tr>
		<td width="100%" style="margin:0;font-size:13px">
					<ul style="margin:0;width:100%">
						<?  
					  				    $j=0;
						foreach($word as $key=>$val){
							//if ($key == "0"){
							//}else{
							$titles = str_replace(" ", "&nbsp;",$key);
							$j++;
							$old = 0;
							$new = 0;
							if ($j == 1){ 
								 $key = "안희정을 석방하라";
								//			$key = "철원 총기사망 진실";
						
								}
							$new = array_search($key, array_keys($word));
							if (array_search($key, array_keys($word_pre))){
						$old = array_search($key, array_keys($word_pre));
						} else $old = "1000";
						
							if ($old == "1000"){
							echo "<li class='realtime-li'><a href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'>
							<img style='vertical-align:middle' src=images/$j.png>
							<span style='display:inline-block; width:80%; margin-bottom:5px'>
							&nbsp;".mb_substr($key, 0, 20, 'utf-8')."</span>"."<img style='margin-bottom:1px' src='/bbs/images/new.gif' /></a></li>";
							}
							elseif ($old-$new>0){
							echo "<li class='realtime-li'><span href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'><img style='margin-bottom:3px' src=images/$j.png><span style='display:inline-block; width:80%'>&nbsp;&nbsp;".mb_substr($key, 0, 20, 'utf-8')."</span>&nbsp;"."<img style='margin-bottom:1px' src='/bbs/images/up02.gif' />".($old-$new)."</span></li>";
							}
							
							elseif ($old-$new<0){
							echo "<li class='realtime-li'><span href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=".urlencode($key)."'><img style='margin-bottom:3px' src=images/$j.png><span style='display:inline-block; width:80%'>&nbsp;&nbsp;".mb_substr($key, 0, 20, 'utf-8')."</span>&nbsp;"."<img style='margin-bottom:1px' src='/bbs/images/down02.gif' />".($new-$old)."</span></li>";
							}
							elseif ($old-$new == 0){?>
							<li class='realtime-li' onclick="window.location='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=<?=urlencode($key)?>'"><span title=$titles href='ssearch.php?sno=1&page=1&siche=search&oga=or&sm=1&ss=1&search=<?=urlencode($key)?>'>
							<img style='margin-bottom:1px' src="images/<?=$j?>.png"><span style='display:inline-block; width:80%'>&nbsp;&nbsp;<?=mb_substr($key, 0, 20, 'utf-8')?></span>
							&nbsp;<img style='vertical-align:middle' src='/bbs/images/minus.gif' /></a></li>
							<?}
							echo "<li style='width:100%; overflow:hidden; 
												height:1px; vertical-align:middle; border-bottom:1px solid #e1e1e1'></li>";
								
						//}
																
						}
						?>

                    </ul>
					</td>
		
		</table>
	</div>	
