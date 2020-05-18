<? 
	include "_head.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <script src="js/jquery.min.js"></script>
</head>
<body>
<?

include "header.php";
?>

<body>
<!--
	Author Details
	==============

	Author: Mobifreaks
	Author URL: http://mobifreaks.com

	Attribution( is must on every page, where this work is used. should be visible to naked eye and Search engine bot[ means should not use noindex, nofollow relations ]):

	// a healty attribution looks like following
	<a href="http://mobifreaks.com" target="_blank">Design by Mobifreaks</a>

	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/

	if any regards of infringement, may lead to lawsuit under Digital Millennium Copyright Act (DMCA)

	For Attribution removal request. please consider contacting us through http://mobifreaks.com/feedback/ or mail us at support[at]mobifreaks.com
 -->
 <?
	$stime=(double)microtime()+time();

	function error_MSG($error_MSG){
		global $bgcolor;
		unset($bgcolor);
		echo "
		<SCRIPT LANGUAGE=JavaScript>
		alert ('$error_MSG');
		history.go(-1);
		</SCRIPT>
		";

		exit;
	}
	

	
	$search = $_GET[search];
	
	//include $dir."head.php";
		
	//$query = "select * from zetyx_board_doc where name like '%$search%'";
	$query = "select * from zetyx_board_doc where subject like '%$search%' or memo like '%$search%'";
	
	$result = mysql_query($query);
	
	echo "<table><tr>"
	while($row = mysql_fetch_array($result)) {
	   //echo $row[subject];
	   $subject = $row[subject];
	   $memo = $row[memo];
	   
	   ?>
		<td style="height:50px; font-style:left; font-size:10pt; border: 1px solid #cccccc; padding:5px; cursor:pointer" 
		onclick="window.location='view.php?id=<?=$id?>&no=<?=$no?>';">
		<?=$subject?>
<?	
	echo "</tr></table>";
}
	
	
?>
</div>


  <footer>
    	<p>&copy; domain.tld 2012. Design by <a href="http://mobifreaks.com" target="_blank">Mobifreaks</a></p>
    </footer>
  </div>
 
<script type="text/javascript">
$(document).ready(function(){
	
	 $('.search-box' ).show();
		   $('.menu' ).hide();   

  
});
   window.addEventListener("load",function() {
	  // Set a timeout...
	  setTimeout(function(){
	    // Hide the address bar!
	    window.scrollTo(0, 1);
	  }, 0);
	});
   $('.search-box,.menu' ).hide();   
   $('.options li:first-child').click(function(){	
   		$(this).toggleClass('active'); 	
   		$('.search-box').toggle();        			
   		$('.menu').hide();  		
   		$('.options li:last-child').removeClass('active'); 
   });
   $('.options li:last-child').click(function(){
   		$(this).toggleClass('active');      			
   		$('.menu').toggle();  		
   		$('.search-box').hide(); 
   		$('.options li:first-child').removeClass('active'); 		
   });
   $('.content').click(function(){
   		$('.search-box,.menu' ).hide();   
   		$('.options li:last-child, .options li:first-child').removeClass('active');
   });
</script>
<!--
	Author Details
	==============

	Author: Mobifreaks
	Author URL: http://mobifreaks.com

	Attribution( is must on every page, where this work is used. should be visible to naked eye and Search engine bot[ means should not use noindex, nofollow relations ]):

	// a healty attribution looks like following
	<a href="http://mobifreaks.com" target="_blank">Design by Mobifreaks</a>

	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/

	if any regards of infringement, may lead to lawsuit under Digital Millennium Copyright Act (DMCA)

	For Attribution removal request. please consider contacting us through http://mobifreaks.com/feedback/ or mail us at support[at]mobifreaks.com
 -->
</body>
</html>
