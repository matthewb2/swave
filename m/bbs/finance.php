<!DOCTYPE html>
<head>
  <meta charset="utf-8" />
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />

  <link rel="stylesheet" href="css/style.css"> 
  <link rel="stylesheet" href="finance.css"> 
  
  <script type="text/javascript" src="codebird.js"></script>
 <script src="js/jquery.min.js"></script>
 
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- for swiper -->
	<script src="js/swiper.js"></script>
	<link rel="stylesheet" href="css/swiper.css">
 
 
  <script src="js/dist/menu.js"></script>
 

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
 
 <style>
 
 body{
	 padding:0px;
	 margin:0px;
 }
 
td {
height:27px;
font-size:13px;
padding-left:3px;
vertical-align:middle;

}
 
.stockc{
width:80px;
	
		background-color: #FEFEFE;
    border: 1px solid #ddd;
    -webkit-appearance:none;
    border-radius: 0px 3px 3px 0px;
    color: #555 !important;
   	
    font-size: 12px;
    
    text-align: center;
    
	height: 30px;
    box-sizing: border-box;
    
    cursor: pointer;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;
	

}


input {
    
    border: 1px solid #ddd;
vertical-align:middle;
    
}


input[type="text"]{

height:30px;
padding-left:3px;

}

input[type="radio"]{
vertical-align:top;

}

 .hideAll{
	 visibility:hidden;
 }
 .s_header{
	 text-align:center;
 }
 
 img {
	 border:0;
 }
 
 #sise td{
padding-left:3px;
	 border: 1px solid #ddd;
 }

 #investors-content td{
padding-left:3px;
	 border: 1px solid #ddd; 
 }
.s_header{
	 
}

.s_content{
	
	 text-align:left;
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


function showStock(){
	
//	$("#stock-list").show();
    var x = document.getElementById("stock-list");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display =  "none";
    }

}

	
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
	
	
	
	 

</script> 


 <script type="text/javascript" language="JavaScript">
 
 function insertText()
									  {
										
									document.getElementById("myTextArea").value += document.getElementById("adate").value+
									", "+document.getElementById("aindex").value+"\r"; 
									$('#aindex').val('');
									  }
									  

function insertData(){
var gain = $("input[name='chk_gain']:checked").val()+document.getElementById("gain_q").value;
var fore = $("input[name='chk_fore']:checked").val()+document.getElementById("fore_q").value;
var init = $("input[name='chk_init']:checked").val()+document.getElementById("init_q").value;
var all = gain + ";"+fore + ";"+init;

document.getElementById("gain_q").value="";
document.getElementById("fore_q").value="";
document.getElementById("init_q").value="";
//alert(all);
		
										
		document.getElementById("myInvestArea").value += $("#adate2").val()+","+all;
		 }
									  
									  
  function prettyPrint() {
	//var col0 = $( "#myselect option:selected" ).val();
    col0 = $("#stock_name").val();	
  
   var cars = $('#myTextArea').val().split(/\n|\r/);
    
   var col1 = [];
   var col2 = [];
   
   for (i = 0; i < cars.length; i++) {
		if (/\S/.test(cars[i])) {
			var fruits = cars[i].split(',');
			
			//alert(fruits[1].toString());
			
			
			col1.push(fruits[0]);
			col2.push(fruits[1]);
		}
	
 
	}
	//alert(col0);
	
	sendjson(col0, col1, col2);
   
   
}



function sendjson(col0, col1, col2) {
   
  
$.post("sendstock.php",
					{
						stock: col0,
						no: col1,
						price: col2,
					//	bad: bad
					},
					function(){
						//값 필드를 비움
						$('#aindex').val="";
						alert("저장되었습니다");
					});

}


  function prettyPrint2() {
	//var col0 = $( "#myselect option:selected" ).val();
    col0 = $("#stock_name").val();	
  
   var cars = $('#myInvestArea').val().split(/\n|\r/);
    
   var col1 = [];
   var col2 = [];
   
   for (i = 0; i < cars.length; i++) {
		if (/\S/.test(cars[i])) {
			var fruits = cars[i].split(',');
			
			//alert(fruits[1].toString());
			
			
			col1.push(fruits[0]);
			col2.push(fruits[1]);
		}
	
 
	}
	//alert(col0);
	
	sendjson2(col0, col1, col2);
   
   
}



function sendjson2(col0, col1, col2) {
   
  
$.post("sendstock2.php",
					{
						stock: col0,
						no: col1,
						price: col2,
					//	bad: bad
					},
					function(){
						//값 필드를 비움
						$('#aindex').val="";
						alert("저장되었습니다");
					});

}


function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}




function coin_api(code){
	
					
 $.get('https://api.bithumb.com/public/ticker/ALL', function(data) {
					var usdkrw = 1061;
						var coin_price;
					if (code == "BTC"){
						coin_price = parseFloat(data['data']['BTC']['closing_price']);
						$("#aindex").val(coin_price);
                    } else if (code =="BCH"){
						coin_price = parseFloat(data['data']['BCH']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="ETH"){
						coin_price = parseFloat(data['data']['ETH']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="ETC"){
						coin_price = parseFloat(data['data']['ETC']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="XRP"){
						coin_price = parseFloat(data['data']['XRP']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="QUTM"){
						coin_price = parseFloat(data['data']['QUTM']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="LTC"){
						coin_price = parseFloat(data['data']['LTC']['closing_price']);
						$("#aindex").val(coin_price);
					}
					
						//alert(coin_price);
					//	return coin_price;
					});
					//alert(coin_price);
					
					
				
}
function setStock(scode){
	$('#stock_name').val(scode);
	
	getStock(scode); 
	

		scode = document.getElementById("stock_name").value;
	if (scode == "kospi" || scode == "kosdaq"){
		
	   
	   document.getElementById("investors").innerHTML  = "<tr><td style='text-align:center' class='news-title'><a href='#'>투자자별 매매동향</a></td></tr>";
	   
	   $('#investors-kospi').attr('style','visibility:visible');
	   getInvestors(scode);
		
	   
	}

	
}

function getInvestors(scode){
	//alert("ddd");
	//alert(scode);

    //document.getElementById("investors-foot").innerHTML="";
	
	document.getElementById("investors-content").innerHTML ="<tr><td class='s_header'>일자</td><td class='s_header'>개인</td><td class='s_header'>외국인</td><td class='s_header'>기관</td></tr>";
			  
	$.ajax({
		cache: false,
		url: "newsdata3.php",
		dataType: "json",
		success: function(result) {
			stock_date = [];
			gain = [];
			var Alltext = [];
				$.each(result, function(i, field){			   
					if (i == scode){
							
						$.each(field, function(f, g){
							  Alltext += f+","+g+"\n";			
							//alert(f);
							stock_date.push(f);
							gain.push(g);
										
							});
									
						}
						
					});
						
						
			//	alert(stock_date);
				  stock_date.reverse();
				  gain.reverse();
					   
				   for (index=0; index< 10; index++){
					   tm = gain[index].split(";");
					   tm[0]= tm[0].replace(" ","");
						tm[1]= tm[1].replace(" ","");
						tm[2]= tm[2].replace(" ","");
						
						if (tm[0].substring(0,1)=="+"){
								tmp=tm[0].replace("+","");
								tm[0] = "  <span style='color:red'> "+tmp+"</span>";

						}else if (tm[0].substring(0,1)=="-"){
								tmp=tm[0].replace("-","");
								tm[0] = "  <span style='color:#4682bf'> "+tmp+"</span>";

						}
						if (tm[1].substring(0,1)=="+"){
								tmp=tm[1].replace("+","");
								tm[1] = "  <span style='color:red'> "+tmp+"</span>";

						}
						if (tm[1].substring(0,1)=="-"){
								tmp=tm[1].replace("-","");
								tm[1] = "  <span style='color:#4682bf'> "+tmp+"</span>";

						}
						
						if (tm[2].substring(0,1)=="+"){
								tmp=tm[2].replace("+","");
								tm[2] = "  <span style='color:red'> "+tmp+"</span>";

						}else if (tm[2].substring(0,1)=="-"){
								tmp=tm[2].replace("-","");
								tm[2] = "  <span style='color:#4682bf'> "+tmp+"</span>";

						}
						 document.getElementById("investors-content").innerHTML  += "<tr><td class='s_content'>"+stock_date[index]+"</td><td class='s_content'>"+tm[0]+"</td><td class='s_content'>"+tm[1]+"</td><td class='s_content'>"+tm[2]+"</td></tr>";
					}
							number = document.getElementById("invest_number").value;
					number = Number(number);
				//	alert(number);
				//content_sise(number, stock_date, stock_price);
				
				//다음 이전
				//document.getElementById("sise").innerHTML +="</table>";
				document.getElementById("investors_foot").innerHTML ="<tr><td width='100%' style='text-align:center;padding-right:0px'><span id='next_invest' class='stock_b' >다음</span></td></tr>";
				
				document.getElementById("next_invest").addEventListener('click',function ()
					{
					 
					 //validation code to see State field is mandatory.  
					 number +=1;
					 //alert(number);
					 content_invest(number, stock_date, gain);
					}  
				); 	
						
			if ($("#isadmin").val() == "admin" && ( $('#stock_name').val() == "kospi" || $('#stock_name').val() =="kosdaq")){
				$('#myInvestArea').attr('style','visibility:visible');
				$('#myInvestTable').attr('style','visibility:visible');
				$('#investor_form').attr('style','visibility:visible');
				
			var textarea = document.getElementById("myInvestArea");
			textarea.value = Alltext;
			//var textarea = document.getElementById('textarea_id');
			textarea.scrollTop = textarea.scrollHeight;
			}
			
			
			}
	   });
	   
	   
					
}

function content_sise(number, stock_date, stock_price){
	
	for (index=number*10; index< 10+number*10; index++)
				{
					if (index == stock_price.length-1){
						document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td></td><td></td></tr>";
				
					} else {
					
					if(stock_date[index]){
						var change;
						if (scode == "kosdaq" || scode =="wti" || scode == "nasdaq" || scode =="usdkrw"
							|| scode =="kospi200"){
							change = (stock_price[index] - stock_price[index+1]).toFixed(2);
							change = numberWithCommas(change);
						} else {
						
						change = (stock_price[index] - stock_price[index+1]).toFixed(0);
						//change = numberWithCommas(change);
							
						}
						var rates = (change/stock_price[index+1]*100).toFixed(2);
						
						if (change>0){
								stock_price[index] = numberWithCommas(stock_price[index]);
								change = numberWithCommas(change);
								document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td style='color:red'><img style='border:0;padding:2px; height:9px; vertical-align:middle' src='images/up.gif'>"+change+"</td><td style='color:red'><img style='border:0;padding:2px; height:9px;vertical-align:middle' src='images/up.gif'>"+rates+"</td></tr>";
					
						}
						else if (change<0){
							change = change*(-1);
							change = numberWithCommas(change);
							rates = rates*(-1);
							stock_price[index] = numberWithCommas(stock_price[index]);
							document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td style='color:#4682bf'><img style='border:0;padding:2px; height:9px;vertical-align:middle' src='images/down.gif'>"+change+"</td><td style='color:#4682bf'><img style='border:0;padding:2px; height:9px;vertical-align:middle' src='images/down.gif'>"+rates+"</td></tr>";
					
						} else if (change==0){
							stock_price[index] = numberWithCommas(stock_price[index]);
							document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td style='color:#000000'>"+change+"</td><td style='color:#000000'>"+rates+"</td></tr>";
						}
					}
					}
				}
		document.getElementById("sise_number").value = number+1;
	
}

function content_invest(number, invest_date, invest_price){
	
	for (index=number*10; index< 10+number*10; index++)
				{
					tm = gain[index].split(";");
					   tm[0]= tm[0].replace(" ","");
						tm[1]= tm[1].replace(" ","");
						tm[2]= tm[2].replace(" ","");
						
						if (tm[0].substring(0,1)=="+"){
								tmp=tm[0].replace("+","");
								tm[0] = "  <span style='color:red'> "+tmp+"</span>";

						}else if (tm[0].substring(0,1)=="-"){
								tmp=tm[0].replace("-","");
								tm[0] = "  <span style='color:#4682bf'> "+tmp+"</span>";

						}
						if (tm[1].substring(0,1)=="+"){
								tmp=tm[1].replace("+","");
								tm[1] = "  <span style='color:red'> "+tmp+"</span>";

						}
						if (tm[1].substring(0,1)=="-"){
								tmp=tm[1].replace("-","");
								tm[1] = "  <span style='color:#4682bf'> "+tmp+"</span>";

						}
						
						if (tm[2].substring(0,1)=="+"){
								tmp=tm[2].replace("+","");
								tm[2] = "  <span style='color:red'> "+tmp+"</span>";

						}else if (tm[2].substring(0,1)=="-"){
								tmp=tm[2].replace("-","");
								tm[2] = "  <span style='color:#4682bf'> "+tmp+"</span>";

						}
						 document.getElementById("investors-content").innerHTML  += "<tr><td class='s_content'>"+stock_date[index]+"</td><td class='s_content'>"+tm[0]+"</td><td class='s_content'>"+tm[1]+"</td><td class='s_content'>"+tm[2]+"</td></tr>";
					
				}
		document.getElementById("investor_number").value = number+1;
	
}

function getStock(scode) {
	
	//document.getElementsByTagName("li").style.color= "blue";
	//alert(lis);
	$('.news-title').attr('style','color:#83C7E1');
	$('#'+scode).attr('style','color:#28AADC');
	
	//alert("ddd");	
	document.getElementById("sise_number").value =0;
	if (scode == "BTC" || scode =="BCH" || scode =="ETH"
				|| scode =="ETC"|| scode == "XRP"){
		
		//$("#aindex").val("0000");
		coin_api(scode);
	}
	
	if (!scode){ 
		scode = "kospi";
	}
	//document.getElementById("scode").innerHTML = scode
	
	var pricec =[];
	//alert("printed");
	$.ajax({
    cache: false,
    url: "newsdata.php",
    dataType: "json",
    success: function(result) {
	   var Alltext = "";
	   stock_date=[];
	   stock_price=[];
	   
	    $.each(result, function(i, field){
			
					
			if (i == scode){
				var count=0;
				 document.getElementById("sise").innerHTML ="";
				 document.getElementById("sise_foot").innerHTML ="";
				 //field = field.slice(0,10);
				$.each(field, function(j, f){
					
					  Alltext += j+","+f+"\n";
					// alert(f);
					pricec.push(f);
					stock_date.push(j);
					stock_price.push(f);
					
					// document.getElementById("sise").innerHTML +="<tr><td>"+j+"</td><td>"+f+"</td></tr>";
					// document.getElementById("sise").innerHTML ="ddddd";
					 
					});
				}
			});
					stock_date.reverse();
					stock_price.reverse();
			
			document.getElementById("sise").innerHTML ="<tr><td class='s_header'>일자</td><td class='s_header'>가격</td><td class='s_header'>전일대비</td><td class='s_header'>변동율(%)</td></tr>";
			
			if (stock_price.length == 1){
			 // document.getElementById("sise").innerHTML ="<table border='1'>";
		
				document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[0]+"</td><td>"+stock_price[0]+"</td><td></td><td></td></tr>";
				
			}
			else {
				// document.getElementById("sise").innerHTML ="<table border='1'>";
		
				// for (index=0; index< stock_price.length; index++)
					number = document.getElementById("sise_number").value;
					number = Number(number);
				//	alert(number);
				content_sise(number, stock_date, stock_price);
				
				//다음 이전
				//document.getElementById("sise").innerHTML +="</table>";
				document.getElementById("sise_foot").innerHTML +="<tr><td width='100%' style='text-align:center;padding-right:0px'><span id='next_sise' onclick=''>다음</span></td></tr>";
				
				document.getElementById("sise_foot").addEventListener('click',function ()
					{
					 
					 //validation code to see State field is mandatory.  
					 number +=1;
					 //alert(number);
					 content_sise(number, stock_date, stock_price);
					}  ); 	
			}			
		   
		  
		//$("#h_stock").val(scode);
		//$("#h_price").val(stock_date[0]);
		//alert($("#isadmin").val());
		if ($("#isadmin").val() == "admin"){
			var textarea = document.getElementById("myTextArea");
			textarea.value = Alltext;
			//var textarea = document.getElementById('textarea_id');
			textarea.scrollTop = textarea.scrollHeight;
		}
		
		//alert("ddd");
		getPrint(3);
		
		/*
		var today = pricec[pricec.length - 1];
		var yesterday = pricec[pricec.length - 2];
		var diff = (today - yesterday).toFixed(2);
		var rate = (100*diff/yesterday).toFixed(2);
		
			if (diff > 0){
				document.getElementById("pricec").innerHTML = '&nbsp;&nbsp;<span style="color:#ff3300;font-size:16px">'+today.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+'</span>&nbsp;&nbsp;&nbsp;<span style="color:#ff3300;font-size:14px"><img style="vertical-align:middle" src="images/up.gif">'
				+numberWithCommas(diff)+'&nbsp;&nbsp;&nbsp;(+'+rate+'%)</span>';
				// 
			} else { diff = diff*(-1); rate = rate*(-1.00);
				document.getElementById("pricec").innerHTML = '&nbsp;&nbsp;<span style="color:#3366FF;font-size:16px">'+today.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+'</span>&nbsp;&nbsp;&nbsp;<span style="color:#3366FF;font-size:14px"><img style="vertical-align:middle" src="images/down.gif">'
				+numberWithCommas(diff)+'&nbsp;&nbsp;&nbsp;(-'
				+rate+'%)</span>';
			}
		*/
		
		}
		
	});
}



  </script>
  
 <style>
img {
   border: none;
}
 
.swiper-news {
  margin: 0 auto;
  position: relative;
  overflow: hidden;
  /* Fix of Webkit flickering */
  z-index: 1;
}

.stock-title{
		font-size: 14px;
	font-weight:normal;
	text-align:center;
	padding: 8px;
	border: 0px solid #666666;
}

.news-title{
	font-size: 13px;
	font-weight:normal;
	text-align:center;
	padding: 8px;
	border: 0px solid #666666;
}

::-webkit-scrollbar { 
    display: none; 
}

 </style>
 
 <style>
   
 .box {
    width: 100%;
	margin-left:10px;
    overflow-x: scroll;
	padding:0px;
}



.select {
	width:100%;
		background-color: #FEFEFE;
    border: 1px solid #ddd;
    -webkit-appearance:none;
    border-radius: 0px 3px 3px 0px;
    color: #555 !important;
   	
    font-size: 12px;
    
    text-align: center;
    
	height: 30px;
    box-sizing: border-box;
    
    cursor: pointer;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;"
	}
	
.select_button {
	width:100px;
		background-color: #FEFEFE;
    border: 1px solid #ddd;
    -webkit-appearance:none;
    border-radius: 0px 3px 3px 0px;
    color: #555 !important;
   	
    font-size: 12px;
    
    text-align: center;
    
	height: 30px;
    box-sizing: border-box;
    
    cursor: pointer;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;
	}

.stock{
	width:90%;
		background-color: #FEFEFE;
    border: 1px solid #ddd;
    -webkit-appearance:none;
    border-radius: 0px 3px 3px 0px;
    color: #555 !important;
   	
    font-size: 12px;
    
    text-align: center;
    
	height: 30px;
    box-sizing: border-box;
    
    cursor: pointer;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;
	}

	.stockb{
	
		background-color: #FEFEFE;
    border: 1px solid #ddd;
    -webkit-appearance:none;
    border-radius: 0px 3px 3px 0px;
    color: #555 !important;
   	
    font-size: 12px;
    
    text-align: center;
    
	height: 30px;
    box-sizing: border-box;
    
    cursor: pointer;
    -webkit-transition: all 0.20s ease-in-out;
    -moz-transition: all 0.20s ease-in-out;
    -ms-transition: all 0.20s ease-in-out;
    -o-transition: all 0.20s ease-in-out;
	}
	

	textarea{color: #666;
	 border: 1px solid #ddd;
	 width:300px;
	
	}
	
#stock-list {           /* 관심종목 스타일 속성 */
	/*visibility:hidden;*/
	margin:0px;
	padding:0px;
	list-style: none;
	background-color: #eeeeee;
	text-align:center;
	width:100%;
} 
#stock-list li{
	padding:3px;
}
   </style>
</head>

<body onload="getWh()"  id="tabs" class="hideAll">
<?

	
	include "header.php";
 
    $conn = mysql_connect("localhost", "swave", "starman");
	
	mysql_select_db("swave", $conn);
										
	?>
	<input type="hidden" id="isadmin" value=<?=$member[user_id]?>>
	<input type="hidden" id="stock_name" value="kospi">
	
	

		<div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="500px" style="border-collapse: separate;
    border-spacing: 20px 0px">
				<tr>
					<td id='header2-1' class="stock-title" style="width:40px" ><a href="zboard.php?id=news&category=4">뉴스</a></td> 
					<td id='header2-1' class="stock-title" style="width:40px"><a href="finance.php?id=ci">지수</a></td> 
					<td id='header2-1' class="stock-title" style="width:50px"><a href="finance.php?id=ix">시장지표</a></td> 
					<td id='header2-2' class="stock-title" style="width:50px"><a href="zboard.php?id=news&category=5">주식</a></td> 
					<td id='header2-3' class="stock-title" style="width:50px"><a href="finance.php?id=cc">암호화폐</a></td> 
					
				</tr>
			</table>
		</div>
	
	
	
	
	
	

	
	
	
	
	<div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="100%" style="  border-collapse: separate;
    border-spacing: 20px 0px">
				<tr>
					<td id='header2-1' class="news-title"><a href="zboard.php?id=news&category=4">종목</a></td> 
					
				</tr>
			</table>
	</div>	
		
	<div>
		<!--- 관심종목 리스트 -->
				<ul id="stock-list">
				  <?
					$ss = $_GET['id'];
					$sql = "SELECT * FROM finance_$ss order by name";    
	 
			
						$result = mysql_query($sql) or die(mysql_error());  

						$array = array();
						while($row = mysql_fetch_assoc($result)) {  
							
							echo "<li id='".$row[code]."' class='news-title' style='font-size:13px; font-weight:normal'  onclick=setStock('".$row[code]."')>".$row['name']."</li>";
							
						}

					
						
						
						
				  ?>
				</ul>
		
	
	</div>
<div style="border-bottom: 1px solid #ddd;"></div>
	 <div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<input type="hidden" id="sise_number" value=0 />
			<table width="100%" style="  border-collapse: separate">
				<tr>
					<td id='header2-1' class="news-title">
						<a href="zboard.php?id=news&category=4">시세</a></td> 
	
				
				</tr>
				<tr>
				<td>
						<table id="sise" width="100%">
							
						</table>
						
						<table id="sise_foot" width="100%" border="0">
						</table>
				</td>
				</tr>
			</table>
		</div>	
		
	
			<table style="margin:5px 0 0 0">
			<?	if ($member[user_id]=="admin"){?>
				<tr>
	
					<td colspan="2" style="vertical-align:top">
					<textarea width="100%" id="myTextArea"  <? if ($member[user_id] == 'admin'){}else echo 'readonly="readonly"';?> autocomplete="off" width="100%" rows="10"></textarea></td> 
					</td>
				</tr>
			
				<tr>
				<td >
					<input  id='adate' type="text" value="<?=date('Y.m.d')?>"></input>
				</td>
				<td>
					<input id='aindex' type="text"></input>
				</td>
				</tr>
				<tr>
				<td colspan="2">
					<input type="button" value="추가" class="stock" onclick="insertText();">
				</td>
				</tr>
				  
			<?}?>	
			</table>	
			
			
				 <? if ($member[user_id]=="admin"){?>
<button class="stockb" onclick="prettyPrint()">시세 저장</button>
	<? }?>

	<!-- 시세 끝 차트 시작 -->
	
				<div style="border-bottom: 1px solid #ddd;"></div>
	 <div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="100%" style="  border-collapse: separate;
    border-spacing: 20px 0px">
				<tr>
					<td id='header2-1' class="news-title"><a href="zboard.php?id=news&category=4">차트</a></td> 
	
				
				</tr>
			</table>
		</div>	
	

<div style="margin:5px 0 0 0">

<button class="stockc" onclick="getPrint(1);">1개월</button>
<button class="stockc" onclick="getPrint(3);">3개월</button>
<button class="stockc" onclick="getPrint(6);">6개월</button>
<button class="stockc" onclick="getPrint(12);">&nbsp;&nbsp;1년&nbsp;&nbsp;</button>

</div>
<div class="box">
    <canvas style="padding:10px;  display: inline; width:100%; height:280px" id="myChart" ></canvas>
</div>



		
				 <div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			</div>
			
		<!-- 투자자별 매매동향 -->	
		<div style="border-bottom: 0px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="100%" style="border-collapse: separate;
					border-spacing: 20px 0px; visivibity:hidden"
					id = "investors">
					
			</table>
		</div>	
		<div>
			<table width="100%" id = "investors-content">
					
			</table>
			<table id="investors_foot" width="100%" border="0">
						</table>
		<input type="hidden" id="invest_number" value=0 />
		</div>
		<div>
		<table style="margin:5px 0 0 0;width:100%">
			<? if ($member[user_id]=="admin"){?>
				<tr>
	
					<td style="vertical-align:top">
					<textarea style="visibility:hidden" id="myInvestArea"  width="100%" rows="10"></textarea></td> 
					</td>
				</tr>
				<tr>
				<td width="100%">
				<table style="visibility:hidden" id="myInvestTable">
					<tr><td width="50px">개인</td>
						<td width="60px"><input type="radio" name="chk_gain" value="+">매수</td>
								<td width="60px"><input type="radio" name="chk_gain" value="-">매도</td>
								<td><input type="text" style="width:150px" id="gain_q">
						 </td>
					</tr>
					<tr><td width="50px">외국인</td>
						<td width="60px"><input type="radio" name="chk_fore" value="+">매수</td>
								<td width="60px"><input type="radio" name="chk_fore" value="-">매도</td>
								<td><input type="text" style="width:150px" id="fore_q">
						 </td>
					</tr>
					<tr><td width="50px">기관</td>
						<td width="60px"><input type="radio" name="chk_init" value="+">매수</td>
								<td width="60px"><input type="radio" name="chk_init" value="-">매도</td>
								<td><input type="text" style="width:150px" id="init_q">
						 </td>
					</tr>
				</table>
				</td>
				</tr>
			<?}?>
		</table>
		</div>
		<div style="width:100%">
		<table width="100%" border="0" style="visibility:hidden; margin:5px 0 0 0;width:100%" id="investor_form">
			<tr>
			<? if ($member[user_id]=="admin"){?>
		
				
					<td >
					<input id='adate2' type="text" value="<?=date('Y.m.d')?>"></input>
					</td>
					<td>
					<input type="button" value="추가" style="width:100%" class="stockb" onclick="insertData();">
					</td>
				
			<?}?>
			</tr>
				<tr>
					<td width="100%">
								 <? if ($member[user_id]=="admin"){?>
					<button class="stockb" style="width:100%" onclick="prettyPrint2()">정보 저장</button>
					<? }?>
					</td>
					
				</tr>
	</table>
	</div>
	

	
		
		 <div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="100%" style="  border-collapse: separate;
					border-spacing: 20px 0px">
				<tr>
					<td id='header2-1' class="news-title"><a href="zboard.php?id=news&category=4">API</a></td> 
	
				
				</tr>
				
			</table>
		</div>	
		<div style="border-bottom: 1px solid #ddd;">
					<ul style="padding:0px; margin:0px;list-style:none">
						<?
					$ss = $_GET['id'];
					$sql = "SELECT * FROM finance_$ss order by name";    
	 
			
						$result = mysql_query($sql) or die(mysql_error());  

						$array = array();
						while($row = mysql_fetch_assoc($result)) {  
						
							echo "<li style='padding:5px; font-size:13px; font-weight:normal' onclick='window.location.href=api_stock.php'>".$row['name']."</li>";
							
						}

					
						
						
						
				  ?>
					
					
						</ul>
					
					</form>
		</div>
	
			
		
		
		<? include "footer.php"; ?>
	
	
	
</body>

<script>

function getWh(){

$("#tabs").removeClass("hideAll");

$('#stock_name').val('kospi');
	 getStock('kospi');
	 
	scode = document.getElementById("stock_name").value;
	

}

$(document).ready(function(){
	
	
	//$('#stock-list').attr('style','visibility:visible');
	
	// $('#stock-list').attr('style','visibility:visible');
	// $('#stock-name').val("kospi");
	 
});

	
function getPrint(mon) {
	var month= mon;
	if (month==null){
		month=3;
	}
	
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1; //January is 0!
	var yyyy = today.getFullYear();
	//alert(yyyy);
	var stock2 = document.getElementById("stock_name").value;
	
	$.ajax({
    cache: false,
    url: "newsdata.php",
    dataType: "json",
    success: function(result) {
		var af =[];
		var ai =[];
        $.each(result, function(i, field){
          
			 if (i == stock2){
				 //alert("ddd");
				 //alert(end);
				 
					$.each(field, function(j, f){
							ym = j.split(".");
							if (month == 3){
								if (ym[0] == yyyy && ym[1] <= mm){
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								} else if (ym[0] == yyyy-1 && ym[1] >= mm+9){
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								}
							}
							if (month == 1){
								if (ym[0] == yyyy && ym[1] == mm){
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								} else if (   ym[0] ==yyyy&& ym[1] == mm-1 && ym[2]>dd  ){

											af.push(f);
											ai.push(ym[1]+"."+ym[2]);
											} else if (  mm ==1 &&ym[0] ==yyyy-1 && ym[1]== 12 && ym[2] > dd    ){
																				af.push(f);
																				ai.push(ym[1]+"."+ym[2]);
											}
							}
							
							if (month == 6){
								if (ym[0] == yyyy && ym[1] <= mm){
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								} else if (ym[0] == yyyy-1 && ym[1] >= mm+6){
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								}
							}
							
							if (month == 12){
								if (ym[0] == yyyy) {
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								} else if (ym[0] == yyyy-1 && ym[1] > mm ){
									af.push(f);
									ai.push(ym[1]+"."+ym[2]);
								}
							}
							
						
					});
				 // af.push(field);
				 //ai.push(i);
			 }
			 
			
        });
		
		//alert(ai);
		
		if (ai.length >= 9 ){
			ai = ntharray(ai, 9);
			af = ntharray(af, 9);
			
		}
		displayLine2(ai,af);	
	}
    });
	
	
	function ntharray(oldArr, maxVal){
		var arr=[];
		var delta = Math.floor( oldArr.length / maxVal );

		// avoid filter because you don't want
		// to loop over 10000 elements !
		// just access them directly with a for loop !
		//                                 |
		//                                 V
		for (i = 0; i < oldArr.length; i=i+delta) {
		  arr.push(oldArr[i]);
		}

		return arr;
	}
	function displayLine2(ai, af) {
		var ctx = document.getElementById("myChart").getContext('2d');
		//alert(ai);
		var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: ai,
					datasets: [{
						//label: '# of Votes',
						data: af,
						lineTension:0,
						pointRadius : 0,
						backgroundColor: [
						
							'rgba(54, 162, 235, 0.2)'
							
						],
						borderColor: [
							
							'rgba(54, 162, 235, 1)'
							
						],
						borderWidth: 1
					}]
				},
				options: {
					 //showXLabels: 2,
					  bezierCurve : false,
					  
					  legend:{
						  display: false
					  },
					scales: {
						xAxes: [{
							ticks: {
								autoSkip: true,
								maxTicksLimit: 10
							}
						}]
					}
				}
});
  
  }
  
  
}
</script>
</html>
