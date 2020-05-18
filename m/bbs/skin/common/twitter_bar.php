		<tr>

		<td colspan="2">
		<div id="sticky" style="display:inline;z-index:9999">
			
				<a href="javascript:;" onclick="window.open('https://twitter.com/intent/tweet?&text=<?=urlencode(subject_cut(str_replace('&nbsp;','',strip_tags($subject)),80).subject_cut(str_replace('&nbsp;','',strip_tags($memo)),90))?>&url=<?=urlencode($sns_postlink)?>', '_blank');" target="_self">
				<img style="margin:5px 0px 0 5px" src="<?=$dir?>/images/twitter_icon.png" /></a>
					
			<a href="javascript:;" onclick="window.open('http://www.facebook.com/sharer/sharer.php?u=<?=urlencode(substrhan(str_replace('&nbsp;','',strip_tags($memo)),100,'...'))?>', 'sharer','toolbar=0,status=0,width=1000,height=600');" target="_self">
							<img style="margin-top:5px" src="<?=$dir?>/images/facebook_icon.png" /></a>
				
				<div style="width:80px; height:30px; display:inline-block;">
				<table border=0>
					<tr>
						<td style="font-size:9pt; padding:3px; vertical-align:middle">
						조회 : <?=number_format($hit)?>
						</td>
					</tr>
					</table>
				</div>
				<div style="width:60px; height:30px; display:inline-block;">
					
					<table border=0>
					<tr>
						<td style="width:30px;font-size:9pt; padding:0px; vertical-align:middle">
						<img src="images/thumbup.gif" id="imgClickAndChange" 
						style="height:12px; font-size:9pt; margin-top: 0px;" onclick="AddClick()">
						</td>
						<td id="cc1" style="font-size:9pt;display:inline-block;margin-top:5px">
						</td>
					</tr>
					</table>
				</div>
				<div style="width:110px; height:30px; display:inline-block;">
					
					<table border=0>
					<tr>
						<td style="width:50px;font-size:9pt; padding:0px; text-align:right; vertical-align:middle">
						<img src="images/thumbdown.gif" id="imgClickAndChange2" 
						style="height:12px; font-size:9pt; margin: 5px 15px 0 0;" onclick="AddClick2()">
						</td>
						<td id="cc2" style="font-size:9pt;display:inline-block;margin-top:5px;text-align:right;">
						</td>
					</tr>
					</table>
				</div>
		</div>

		</td>
		</tr>
		
	