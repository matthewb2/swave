<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width, 
		initial-scale=1.0, maximum-scale=1.0,
		user-scalable=no" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="css/style.css"> 
  <script type="text/javascript" src="codebird.js"></script>
 <script src="js/jquery.min.js"></script>
 
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- for swiper -->
	<script src="js/swiper.min.js"></script>
	<link rel="stylesheet" href="css/swiper.min.css">
  
  <script src="js/dist/menu.js"></script>
  


<style>
img {
	border: none;
}
body {
	font-size:14px;
	font-weight:normal;
}


input {
    
    border: 1px solid #ddd;
    
}



.container{
 
  overflow-x: scroll;
  overflow-y: hidden;
  
  padding-left:50px;
  padding-right:50px;
  
  white-space: nowrap;
 background-color:#eeeeee;
  
 -webkit-overflow-scrolling: touch;
  
  
 }
 
.scrolling-wrapper {
 width: 750px;
 display: inline-block;
 
}



.card {
    display: inline-block;
  
  border: 0px solid #eeeeee;
 
  height: 80px;
  background: #ffffff;
  padding:10px 5px 15px 5px;
  font-weight:bold;
  vertical-align:middle
  }

.restart{
font-weight:normal;
}

</style>
<script>


function getWh() {
	
	$.ajax({
    cache: false,
    url: "wf.php",
    dataType: "json",
    success: function(result) {
		//	alert("sss");      
		
		$( ".weather" ).html(result);
		}
	});
	
		
	function show_stock(stock, stname, pp){
//alert("ssss");
	//var stock = "kospi";
	 //document.getElementById("scode").innerHTML = $( "#myselect option:selected" ).val();
	var pricec =[];
           var ldate =[];
	
	$.ajax({
    cache: false,
    url: "newsdata.php",
    dataType: "json",
    success: function(result) {
	   var Alltext = "";
		 $.each(result, function(i, field){
			if (i == stock){
				$.each(field, function(j, f){
					  Alltext += j+","+f+"\n";
	//				alert(f);
					pricec.push(f);
ldate.push(j);
					});
				}
			});
			 		   
		  var ltdate = ldate[ldate.length-1];
res = ltdate.split(".");
ltdate =  parseInt(res[1],10)+"/"+parseInt(res[2],10);
		var today = pricec[pricec.length - 1];
		var yesterday = pricec[pricec.length - 2];
                      
		var diff = (today - yesterday).toFixed(2);
		var rate = (100*diff/yesterday).toFixed(2);
			if (diff > 0){   //상승
				document.getElementById(pp).innerHTML = '<table><tr><td ><span class="restart">'+stname+'<font style="font-size:10px;margin-left:5px">'+ltdate+'</font></span><br><span class="restart" style="font-size:14pt">'
				+today.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+'</span><span class="restart"><img style="height:4px;vertical-align:middle;border:0" src="images/up.gif"><span style="color:red">'+'&nbsp;'+diff+'&nbsp;('+rate+'%)</span></td></tr></table>';
				// 
			} else { //하락
				diff = diff*(-1); rate = rate*(-1.00);
				document.getElementById(pp).innerHTML = '<table><tr><td ><span class="restart">'+stname+'<font style="font-size:10px;margin-left:5px">'+ltdate+'</font></span><br><span class="restart" style="font-size:14pt">'
				+today.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+'</span><span class="restart"><img style="height:4px;vertical-align:middle;border:0" src="images/down.gif"><span style="color:blue">'+'&nbsp;'+diff+'&nbsp;('+rate+'%)</span></td></tr></table>';
				}}
	});

	}
	
	show_stock("kospi", "코스피", "pricec");
	show_stock("kosdaq", "코스닥", "pricec2");
	show_stock("usdkrw", "환율", "pricec3");
	show_stock("dji", "다우지수", "pricec4");
	show_stock("nasdaq", "나스닥", "pricec5");
	
	
	
	 $("#tabs").removeClass("hideAll");

}





</script> 
<style>
 
 
 #loading-mask {
    background-color: white;
    height: 100%;
    left: 0;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999;
}

 
.swiper-news {
  margin: 0 auto;
  position: relative;
  overflow: hidden;
  /* Fix of Webkit flickering */
  z-index: 1;
}

/* 실시간 검색어 레이어 전용
*/



#layer1 {
	padding:0px;
	height:45px;

	
	
}


#layer1 li img{
	display:hidden;	
}

#layer1 a img  {  
		border: none;  
		
}  


#layer1 a {
  color:#000000;
    text-decoration: none;
	
}

#layer1 a:hover {
    text-decoration: none;
}

#layer1 ul,  #layer1 li {list-style-type:none;
			margin:0; padding:0
			}

#layer1 ol {list-style-type:none;}

#layer1 li {float;left;

  display: none;
  }



  
#layer2 {
	   
	   list-style-type:none;
		display: none;
        width: 100%;
        z-index: 1;        
        font-weight: normal;
		margin:0px
        
}

#layer2 ul {
	  width: 100%;
      padding:0;
	  margin:0px
        
}


#layer2 ul > li{
	  width: 100%;
      padding:0;
   list-style-type:none;
 margin:10px 10px 10px 0;
       
}

#layer2 ul li img{
             vertical-align:middle;
}


.realtime-li{
	height:20px;
	margin-right:10px;
	padding-right:10px;
}


#layer2 a img  {  
border: none;  
}  

.news-title{
	font-size: 14px;
	font-weight:bold;
	width:60px;
	text-align:center;
	padding: 10px;
	border: 0px solid #666666;
}

::-webkit-scrollbar { 
    display: none; 
}


.w_header .w_content {
    display: none;
    padding : 5px;
	width:100%;
}


 </style>
</head>

<body onload="getWh()"  id="tabs" class="hideAll">
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
	
	
	include "header.php";
 
	
	
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
				
				$new_list = array();
				$new_list_pre = array();
				//숫자면 제외
				 foreach ($list as $value) {
					if (is_numeric($value)){
					} else {
					$new_list[] = $value;
					}
				}
				
				foreach ($list_pre as $value) {
					if (is_numeric($value)){
					} else {
					$new_list_pre[] = $value;
					}
				}
				// print_r($new_list);
				//print_r($list);
				//print_r($list_pre);
				/////////////
				

if (count($new_list) >=1){
 $word = @array_count_values($new_list);
				//$word = @array_count_values($list);
				$word_pre = @array_count_values($new_list_pre);
	}			
				//print_r($word);
			  
				arsort($word);
				arsort($word_pre);
				
				$word = array_slice($word, 0, 10);                  // 몇 개까지 순위를 표시할 것인지 지정
				$word_pre = array_slice($word_pre, 0, 10);
			  
			  
				?>
				
					
	<div style="margin-left:20px;">
	
	<!--검색 순위 -->
		<? include "mrealtime.php";?>
	
	
	
		
	
	</div>	
	
	<div style="height:5px; background-color:#ffffff; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>
	<div style="border-bottom: 1px solid #ddd;"></div>
	
		

		
		<div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="400px" style="border-collapse: separate;
    border-spacing: 20px 0px">
				<tr>
					<td id='header2-1' class="news-title" style="padding-left:0px;margin-left:0px"><a style="padding-left:-10px;margin-left:0px" href="zboard.php?id=news&category=4">IT</a></td> 
					<td id='header2-2' class="news-title"><a href="zboard.php?id=news&category=6">신소재</a></td> 
					<td id='header2-3' class="news-title"><a href="zboard.php?id=news&category=7">우주</a></td> 
					<td id='header2-4' class="news-title"><a href="zboard.php?id=news&category=8">의료</a></td>
					<td id='header2-5' class="news-title"><a href="zboard.php?id=news&category=9">환경</a></td>
				</tr>
			</table>
		</div>
		
	
		<div>
			<div class="swiper-news">
				
				<div class="swiper-wrapper">
							
					<? print_news("default/default_bbs","뉴스", "news", 5, 450) ?>
				
				
				</div>
				 
				
			</div>
		</div>
			
	
					<div style="height:10px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>

		
			<!--증권 -->
		
	
		
		<div id="scrollquestion" class="container" >
				<div class="scrolling-wrapper" id="inner">
							<div class="card" id="pricec" onclick="window.location='finance.php?id=ci">
							
							</div>
							
						
							<div class="card" id="pricec2" onclick="window.location='zboard.php?id=kosdaq'">
							
									
							</div>
							<div class="card" id="pricec3" onclick="window.location='zboard.php?id=kosdaq'">
						
									
							</div>
							<div class="card" id="pricec4" onclick="window.location='zboard.php?id=kosdaq'">
				
									
							</div>
							<div class="card" id="pricec5" onclick="window.location='zboard.php?id=kosdaq'">
								
									
							</div>
							
							
				</div>
						
				
					
		</div>
			
		
		
			<div style="height:10px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>
		
	<div style="margin:0 0 0 0; border-bottom: 1px solid #ddd;"></div>
		
		<div style="margin:10 10 0 10">
			<table width="100%">
				<tr>
					<td style="font-size: 15px; font-weight:bold; color: #767676; text-align:left; margin: 10 0 0 0;
									padding:5px;">&nbsp;&nbsp;<a style='color:#666666' href="zboard.php?id=webzine">웹진</a> </td>
				</tr>
			</table>
		</div>
			
			
		
			<div style="margin:0 0 0 0; border-bottom: 1px solid #ddd;"></div>
			
				<? //print_webzine("default","웹진", "webzine", 5, 500) 
				
				include "view_webzine.php";
				?>
				
				
			
			
			<div style="height:10px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>
		
				<table border='0' width='100%' cellpadding='10' cellspacing='20'>
					<tr>
						
						<td style="border:0;padding-left:5px">
							<span class="weather" style="padding:10px 0 0 10px"></span>
						</td>
					</tr>
								
				</table>
			
			
			<div style="height:10px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>
		
		
			
		
	
		<div style="margin:0 0 0 0; border-bottom: 1px solid #ddd;"></div>
				
			<div style="margin:10 10 0 10">
				<table width="100%">
					<tr>
						<td style="font-size: 15px; font-weight:bold; color: #767676; text-align:left; margin: 10 0 0 0;
										padding:5px;">&nbsp;&nbsp;이슈 </td>
					</tr>
				</table>
			</div>
		<div style="margin:0 0 0 0; border-bottom: 1px solid #ddd;"></div>
		<div style="margin:10px 0 0 0; padding:5px;border-bottom: 0px solid #ddd;">
			
				<div class="swiper-container">
					<div class="swiper-wrapper">
				
						<? print_issue("default","전기차", "icar", 5, 500) ?>
				
					</div>
					 <div class="swiper-pagination"></div>
				</div>
				<div class="clear"></div>
			
		
		</div>
		
			<div style="height:10px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>
	
		
		
			<div style="margin:10 10 0 10">
				<table width="100%">
					<tr>
						<td style="font-size: 15px; font-weight:bold; color: #767676; text-align:left; margin: 10 0 0 0; 
						padding:5px;">트위터 </td>
					</tr>
				</table>
			</div>
		
			<div style="margin-left:-10px">
				<a class="twitter-timeline"  href="https://twitter.com/rbskwabe/likes" data-chrome="noheader nofooter noscrollbar" data-widget-id="664761298912055296"></a>
				       
		    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          </div>
		
		
	
			
			
		<div style="height:0px; background-color:#f9f9f9; margin:0 0 0 0; border-bottom: 0px solid #ddd;"></div>
		


		<div style="margin:0 10 0 10; border-bottom: 1px solid #ddd;"></div>
				<!-- arrow -->
<div id='bottomMenu' style='position: fixed;
    bottom: 20px; z-index:999;
    right: 20px; opacity: 0.5;
    filter: alpha(opacity=50); /* For IE8 and earlier */'>
 
  <img style='border:none' id='top' src='images/arrow-up-128.gif'>
</div>
		<? include "footer.php"; ?>
	
	
	
</body>
	
<script type="text/javascript">


 $("#top").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "fast");
  return false;
});


$(document).ready(function(){
	
	
});

function addnews(numi){

$.ajax({


cache:false,

url:"news_get.php",



dataType:"json",


success:function(result){
}
});


	$("#more-"+numi).append("<tr><td>more</td></tr>");
}

function add5(){
			// alert("secuss");
			$.ajax({
    cache: false,
    url: "wf_all.php",
    dataType: "json",
    success: function(result) {
						//alert(result);
		$( "#w_content" ).append(result);
		$( "#w_image1" ).hide();
		$( "#w_image2" ).show();
				}
			});
   
}

function add6(){
			
		$( "#w_image2" ).hide();
		
		var myNode = document.getElementById("w_content");
		myNode.innerHTML = '';
		$( "#w_image1" ).show();
			
}
 
$("#clickme3").click(function() {
  
  $( "#w_image1" ).toggle();
  $( "#w_image2").show();
  $( "#w_content" ).toggle();
  
  
});




</script>
	
	
	<script type="text/javascript" language="javascript">
	
	
	
function bouncediv(diobject){	
 //alert('called');
  // -> removing the class
  if (diobject == "right"){
	element = document.getElementById("inner");

  element.classList.remove("bounce");
  
  // -> triggering reflow /* The actual magic */
  // without this it wouldn't work. Try uncommenting the line and the transition won't be retriggered.
  element.offsetWidth = element.offsetWidth;
  
  // -> and re-adding the class
  element.classList.add("bounce");
  } else {
  //alert("ddd");
  element = document.getElementById("inner");

  element.classList.remove("bounce-left");
  
  // -> triggering reflow /* The actual magic */
  // without this it wouldn't work. Try uncommenting the line and the transition won't be retriggered.
  element.offsetWidth = element.offsetWidth;
  
  // -> and re-adding the class
  element.classList.add("bounce-left");
  
  
  }
}



$(document).ready(function() {	
    $('body').show();
	
 // $(".webzine-img").attr( 'src', $(".webzine-img").attr( 'data-src' ) );
	// DOM ELEMENTS
	$.each($('.webzine-img'), function () { 
		//alert($(this).attr("classname"));
		$(this).attr('src', $(this).attr( 'data-src' ));
	});

}); // end ready


$(document).ready(function() {	


 document.getElementById('scrollquestion').addEventListener("touchstart", touchHandler, false);
 document.getElementById('scrollquestion').addEventListener("touchmove", touchHandler, false);
 document.getElementById('scrollquestion').addEventListener("touchend", touchHandler, false);
 
	 $('.container').scrollLeft($('.container').scrollLeft() + 50);// initial scrollbar position
//alert("dd");
	 });


function touchHandler(e){
	var start = 0;
	var end = 490;
	var pad = 50;
	 var width = $('#scrollquestion').outerWidth();  //650
	scrollWidth = $('.container').scrollLeft();
	 // alert(scrollWidth);
	if (e.type == "touchstart"){
		// alert( $('.container').scrollLeft());
		start = $('.container').scrollLeft()
	
	} else if( e.type == "touchend"){
	
		//alert($('.container').scrollLeft());
		scrollLeft = $('.container').scrollLeft();
		//alert(scrollLeft);
		
		var scrollWidth = $('#scrollquestion')[0].scrollWidth; 
		var width = $('#scrollquestion').outerWidth();  //650
		 //alert();
		if (scrollLeft < start+pad ){
				//bouncediv("left");
				//alert(scrollLeft);
			$('.container').animate({scrollLeft:start+pad},'50');
			
		
		
		
		} else if (scrollLeft > end ){
		//alert($('.container').scrollLeft());
			$('.container').animate({scrollLeft:end-50},'50');
        
		}
	}
}

$('#scrollquestion').scroll( function() {
        var $width = $('#scrollquestion').outerWidth()
        var $scrollWidth = $('#scrollquestion')[0].scrollWidth; 
        var $scrollLeft = $('#scrollquestion').scrollLeft();
		
		var end = 490;
	var pad = 50;

        if ($scrollWidth - $width === $scrollLeft){
   //         alert('right end');
            	$('.container').animate({scrollLeft:end-50},'50');
        }
        if ($scrollLeft===0){
     //alert('left end');
     //           bouncediv("left");
	 	$('.container').animate({scrollLeft:50},'50');
		
        }
    });


$('.tap-main-td').click(function() {
   $(this).css('backgroundColor', '#eeeeee');
});
 </script>

 
</html>
