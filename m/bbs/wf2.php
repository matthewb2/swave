<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="css/style.min.css"> 
  <script type="text/javascript" src="codebird.js"></script>
 <script src="js/jquery.min.js"></script>
 
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- for swiper -->
	<script src="js/swiper.min.js"></script>
	<link rel="stylesheet" href="css/swiper.min.css">
 
 
  <script src="js/dist/menu.js"></script>
  <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
 
<script>

function getWh() {
	alert("sss");      
	$.ajax({
    cache: false,
    url: "api.openweathermap.org/data/2.5/weather?q=London",
    dataType: "json",
    success: function(result) {
		alert("sss");      
		
	 document.getElementById("myTextArea").innerHTML = result;
		}
	});
}
</script> 

</head>
<body onload="getWh()">

	<div style="padding:10px; margin:10 10 0 10">
				<div id="myTextArea">fffffffffffff</div>
		</div>
		
		
		
</body>
	
</html>