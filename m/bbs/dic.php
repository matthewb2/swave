<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 

   
	<base href="http://m.swave.woobi.co.kr/bbs/"> <!-- .htaccess 리다이텍트 때문에 베이스를 지정함 -->
	


  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="css/style.css"> 
 <script src="js/jquery.min.js"></script>
 
 <script src="js/jquery-ui.js"></script>
				
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- for swiper -->
	<script src="js/swiper.min.js"></script>
	<link rel="stylesheet" href="css/swiper.min.css">
 
 
  <script src="js/dist/menu.js"></script>

</script>
  
<style type="text/css">
.input[type=text] {
-webkit-ime-mode:inactive;
-moz-ime-mode:inactive;
-ms-ime-mode:inactive;
ime-mode:inactive;
}
</style>
</head>

<body>


<script>
	function move_login(){
		var url=location.href;
		localStorage.setItem("url_login",url);
		
		window.location.href = "m_login.php";
		
		
	}
	
	function clear_f(){
		

     document.getElementById("dic-word").value = "";
     // document.getElementById("textfield2").value = "";
	 
	 $('#dic-word').focus();

		
	}
	
	</script>
	<?
	include "header.php";
?>
	
    

<form method="get" name="search" action="<?=$PHP_SELF?>" onsubmit="return check_search_form(this)" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="select_arrange" value="<?=$select_arrange?>" />
<input type="hidden" name="desc" value="<?=$desc?>" />
<input type="hidden" name="page_num" value="<?=$page_num?>" />
<input type="hidden" name="selected" />
<input type="hidden" name="exec" />
<input type="hidden" name="sn" value="<?=$sn?>" />
<input type="hidden" name="ss" value="<?=$ss?>" />
<input type="hidden" name="sc" value="<?=$sc?>" />
<input type="hidden" name="category" value="<?=$category?>" />
<input type="hidden" name="search" value="<?=$search?>" />
<div class="ui-widget" >
<table width="100%">
<tr>
		<td width="100%">
			<input id="dic-word" style="diplay:inline-block;
			font-size:16px; margin:15px 0px 0px 3px; padding-left:3px; width:80%; height:35px; color:#9A9893; background-color: #ffffff; border: 1px solid #EDE8D9;" name="keyword" value="<?=$keyword?>" />
			<input style="diplay:inline-block; border:0; height:50px; width:50px; margin: 0px 0px 0px 0px" type="image" src="images/search5.gif"  align="absMiddle" />
		
		</td>
		
	</tr>
		
</table>
</div>

</form>


<?

$search = $_GET['keyword'];
$count=0;

function remich($str){
	
	$contdic = $str;
	
	$contdic = str_replace("단어", "<br>", $contdic);
				
				$contdic = str_replace("미국식", "", $contdic);
				$contdic = str_replace("영국식", "", $contdic);
				$contdic = str_replace("중요", "", $contdic);
				$contdic = str_replace("교과서", "", $contdic);
				$contdic = str_replace("중고등학교", "", $contdic);
				$contdic = str_replace("고교", "", $contdic);
				$contdic = str_replace("영어2", "", $contdic);
				$contdic = str_replace("영어1", "", $contdic);
				$contdic = str_replace("중3", "", $contdic);
				$contdic = str_replace("미국·영국", "", $contdic);
				$contdic = str_replace("더보기", "", $contdic);
				
				
				$contdic = preg_replace("/\[(.*?)\]/","",$contdic);
	return $contdic;
				
}


if ($search){
	//echo "<script>alert(".$search.");</script>";
			$conn = mysql_connect("localhost", "swave", "starman");
	
			mysql_select_db("swave", $conn);
			$sql = "select * from search_word where word like '%$search%'";
			
			
			$searchTerms = explode(' ', $search);
			$searchTermBits = array();
			foreach ($searchTerms as $term) {
				$term = trim($term);
				if (!empty($term)) {
					$searchTermBits[] = "word LIKE '%$term%'";
				}
			}
			
			$result = mysql_query("SELECT * FROM search_word WHERE ".implode(' AND ', $searchTermBits));
			
			//for db search_word
			$result = mysql_query($sql) or die(mysql_error());
			while($row = mysql_fetch_assoc($result)) {
				$count++;
				$contdic = strip_tags($row[word]);
				$str = preg_replace("/\[(.*?)\]/","",$contdic);
				
				//$str = 'Fry me a Beaver. Fry me a Beaver! Fry me a Beaver? Fry me Beaver no. 4?! Fry me many Beavers... End';
				$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $str); // split text into sentences
				//print_r($sentences);
				
					$contdic = remich($contdic);
				
			
				
				?>
				


						<? foreach ($sentences as $contdic){  // print sentence by one line
					
									
									preg_match("/\b$search\b/",$contdic,$matches);
									//print_r($matches);
									if ($matches[0]){
									$contdic = preg_replace("/\b($search)\b/", "<span style='color:#1A0DAB'>".$search."</span>", $contdic);
								
									
									?>
									<span style="padding:5px; font-family:tahoma;font-size:12pt;color:#666666">
									
									<?=$contdic;?></span>
									<br>
								<?$aacontdic .=$contdic.".  ";?>
									<?}
									
					}?>
				
				
				<?
				}?>
				
					
					
						<div style="margin:0 0 0 0; border-bottom: 1px solid #ddd;"></div>
					
					<?
				// for db dic
			$searchTermBits = array();
			foreach ($searchTerms as $term) {
				$term = trim($term);
				if (!empty($term)) {
					$searchTermBits[] = "memo LIKE '%$term%'";
				}
			}
			
				$result = mysql_query("SELECT * FROM zetyx_board_dic WHERE ".implode(' AND ', $searchTermBits));
			while($row = mysql_fetch_assoc($result)) {
				$contdic = strip_tags($row[memo]);
				$str = preg_replace("/\[(.*?)\]/","",$contdic);
				
				//$str = 'Fry me a Beaver. Fry me a Beaver! Fry me a Beaver? Fry me Beaver no. 4?! Fry me many Beavers... End';
				$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $str); // split text into sentences
				//print_r($sentences);
				
				$contdic = str_replace($search, "<span style='color:#1A0DAB'>".$search."</span>", $contdic);
				
				
			
				
				?>
				<div style="margin:20px">
					<div style="width:90%; margin: 0 auto; ">
					
	
					<? foreach ($sentences as $contdic){  // print sentence by one line
					
						preg_match("/\b$search\b/",$contdic,$matches);
									//print_r($matches);
									if ($matches[0]){
											$contdic = str_replace($search, "<span style='color:#1A0DAB'>".$search."</span>", $contdic);
										
												$contdic = remich($contdic);
											?>
											<span style="font-family:tahoma;font-size:12pt;color:#666666">
											
											<?=$contdic?></span>
											<br>
												<?$acontdic .=$contdic.".  ";?> 
										<?}
					}?>
					</div>
				</div>
				<?
				}
			
}
			?>
			<?

if ($search){
	//echo "<script>alert(".$search.");</script>";
			$conn = mysql_connect("localhost", "swave", "starman");
	
			mysql_select_db("swave", $conn);
			$sql = "select * from zetyx_board_dic where subject like '%$search%'";
			$result = mysql_query($sql) or die(mysql_error());
			
			?>
					<table width="100%" border="0">
								<?
								while($row = mysql_fetch_array($result)) {
										//$count++;
										$contdic = strip_tags($row[memo]);
									
										$str = preg_replace("/\[(.*?)\]/","",$contdic);
										
										//$str = 'Fry me a Beaver. Fry me a Beaver! Fry me a Beaver? Fry me Beaver no. 4?! Fry me many Beavers... End';
										$sentences = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $str); // split text into sentences
										//print_r($sentences);
										
											$contdic = remich($str);
										
										?>
										
										<? foreach ($sentences as $contdic){  // print sentence by one line
													preg_match("/\b$search\b/",$contdic,$matches);
														//print_r($matches);
														if ($matches[0]){
														$contdic = preg_replace("/\b($search)\b/", "<span style='color:#1A0DAB'>".$search."</span>", $contdic);
													
														
														?>
														<?	if ($member[user_id]=="admin"){?>
														<input checked type="checkbox" name="del[]" value="<?=$row[no]?> ">
														<tr>
															<td>								<?}?>
															<span style="font-family:tahoma;padding:5px; font-size:16px;color:#666666">
																<?=$contdic;?></span>
															</td>
														</tr>
															<?$acontdic .=$contdic.".  ";?> 
														<?}
														
										}?>
									
									<?
									}
					}
								?>
								
						</table>
			

<? //if ($_SESSION["zb_logged_no"]){
$amemo = strip_tags($aacontdic.$acontdic);
$amemo = $subject.$amemo;
$amemo = preg_replace("/[#\&\+\-%@=\/\\\:;,\'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $amemo);

$amemo = str_replace("'", "", $amemo);
$amemo = str_replace('"', '', $amemo); 
$amemo = str_replace("100", "", $amemo); 
$amemo = str_replace("130", "", $amemo); 
$amemo = str_replace("0 0 0", "", $amemo); 
$amemo = str_replace("..", "", $amemo); 
$amemo = str_replace("     ", "", $amemo); 
$amemo = str_replace("朴", "박", $amemo); 
$amemo = str_replace("前", "전", $amemo); 
$amemo = str_replace("nbsp", "", $amemo); 


include_once "include/Html2Text.php";
$html = new Html2Text($amemo);

$amemo = $html->getText();  // Hello, "WORLD"

preg_match_all("/[\xA1-\xFE]/i", $amemo, $temp);

foreach ($temp as $key=>$val){
	$han_len += sizeof($val);
}
//echo $han_len;
preg_match_all("/[aA-zZ]/i", $amemo, $temp);

foreach ($temp as $key=>$val){
	$eng_len += sizeof($val);
}
//echo $han_len;

$lang = "en-us";

$amemo = substr($amemo, 0, 1000);

?>

<table width="<?=$width?>" cellSpacing="0" cellpadding="0" border="0" style="table-layout: fixed">
<tr height="15px">


<?	if ($_GET[keyword] !="" && $count == 0){echo "<div style='margin-top:100px; vertical-align:middle; align:center'><span style='margin-top:100px; align:center'>검색결과가 없습니다</span></div>";}

//echo $count;

$contdic = str_replace("미국식","",$contdic);
	
		
$contdic = str_replace("영국식","",$contdic);
 if($_GET['keyword']!="" && $count != 0){?>
	<td colspan="2" style="padding:5px">
 	
	<span style="height:100px"><a href="javascript:;" onclick="window.open('https://twitter.com/intent/tweet?&text=<?=urlencode(subject_cut(str_replace('&nbsp;','',strip_tags($contdic)),100))?>', '_blank');" target="_self">
			트위터에 게시</a></span>
</td>
</tr>
<tr>
<td colspan="2" style="padding:5px">
 <audio controls style="  background-color: #95B9C7;">
  <source src="http://api.voicerss.org/?key=9d94286f0ea4437bb721d946928e2d4e&hl=<?=$lang?>&src='<?=$amemo?>'" type="audio/mpeg">
	</audio>
</td>	
<?}?>
</tr>
	
<tr>
<td align="right" colspan="2">

	<input type="button" class="submit_button" style="width:100%;height:50px" value="새로고침" onclick="clear_f()"></a></td>

</tr>

<tr height="350px"><td colspan="2"></td></tr>

</table>


<script>



</script>

<?

//}
?>			



<? if ($_GET[id]=="dic"){?>
  <script>
  // 사전 단어 자동완성
  $(function() {
	  //alert("true");
	  
	  $.post("words2.php", function(data){
							
							data = data.replace(/\\t/g,'     ');
							
							//availableTags = data.split(',');	
							
							var parsed = JSON.parse(data);

							var arr = [];

							for(var x in parsed){
							  arr.push(parsed[x]);
							}
							
							$.ui.autocomplete.prototype._renderItem = function (ul, item) {
								item.label = item.label.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<font color='#ff6600'><i>$1</i></font>");
								return $("<li></li>")
										.data("item.autocomplete", item)
										.append("<a>" + item.label + "</a>")
										.appendTo(ul);
							};
							$.ui.autocomplete.filter = function (ul, item) {
							var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(item), "i");
							return $.grep(ul, function (value) {
								return matcher.test(value.label || value.value || value);
							});
						};
							
							$( "#dic-word" ).autocomplete({
							  source: arr,
							   //select: SetLocations, 
             selectFirst: true, //here
							  minLength: 3
							});
							
		});
	  

    
	
	
  });
  </script>
<? }?>
