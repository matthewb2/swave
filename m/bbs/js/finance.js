
<script>

function get_usdkrw(){
	var testList = new Array() ;
$.ajax({
    cache: false,
    url: "newsdata.php",
    dataType: "json",
    success: function(result) {
		 
        $.each(result, function(i, field){
			//$("#content").html(i);
			 //
			 if (i == "usdkrw"){
				$.each(field, function(j, f){
					//if ( j.split(".",1) <= end && j.split(".",1) >= start) {
					
					var data = new Object() ;
             
					data.date = j;
					data.price = f;
             
					testList.push(data);
					//$("#content").html();

					//}
				});
				
			
			 }
			
        });
			testList.reverse();
			
		//alert(testList[0].price);
			//	 var jsonInfo = JSON.stringify(testList) ;

		
	
		$("#usdkrw").val(testList[0].price);
	}
    });	
	//return testList[0].price;
}


function showStock(){
	
//	$("#stock-list").show();
    var x = document.getElementById("stock-list");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display =  "none";
    }

}

</script> 


 <script type="text/javascript" language="JavaScript">
 

	
  function prettyPrint() {
	//var col0 = $( "#myselect option:selected" ).val();
    col0 = $("#h_stock").val();	
  
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

   
   sendjson(col0, col1, col2);
  
   
   
}

function prettyPrint2() {
	 col0 = $("#h_stock").val();	
  
   var cars = $('#investorq').val().split(/\n|\r/);
    
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
	
	  sendjson2(col0, col1, col2);
   
   
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
					get_usdkrw();
					var usdkrw = $("#usdkrw").val();
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
					} else if (code =="QTUM"){
						coin_price = parseFloat(data['data']['QTUM']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="LTC"){
						coin_price = parseFloat(data['data']['LTC']['closing_price']);
						$("#aindex").val(coin_price);
					} else if (code =="BTG"){
						coin_price = parseFloat(data['data']['BTG']['closing_price']);
						$("#aindex").val(coin_price);
						//alert(coin_price);
					} else if (code =="EOS"){
						coin_price = parseFloat(data['data']['EOS']['closing_price']);
						//alert(coin_price);
						$("#aindex").val(coin_price);
					}
						//alert(coin_price);
					//	return coin_price;
					});
					//alert(coin_price);
					
					
				
}


function getStock(list) {
		
	
	var stock = $(list).val();
	var scode = $(list).attr('id');
	
	//alert(scode);
	
	$("#c_code").val(scode);
	$("#c_name").val(stock);
	
	if (scode == "BTC" || scode =="BCH" || scode =="BTG" || scode =="ETH" || scode =="ETC" || scode == "XRP" || scode == "LTC" || scode == "QTUM" || scode == "EOS" ){
		
	//	$("#aindex").val("0000");
		coin_api(scode);  //코인 가격 호출
	//	$("#aindex").val("0000");
		
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
				//alert(scode);
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
			//alert(stock_date);
			document.getElementById("sise").innerHTML ="<tr><td class='s_header'>일자</td><td class='s_header'>가격</td><td class='s_header'>전일대비</td><td class='s_header'>변동율(%)</td></tr>";
			
			if (stock_price.length == 1){
			 // document.getElementById("sise").innerHTML ="<table border='1'>";
			
				document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[0]+"</td><td>"+numberWithCommas(stock_price[0])+"</td><td></td><td></td></tr>";
						
			}
			else {
				// document.getElementById("sise").innerHTML ="<table border='1'>";
		
				// for (index=0; index< stock_price.length; index++)
				for (index=0; index< 10; index++)
				{
					if (index == stock_price.length-1){
						document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+numberWithCommas(stock_price[index])+"</td><td></td><td></td></tr>";
				
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
								document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td style='color:red'><img style='border:0;padding:2px; height:9px; vertical-align:bottom' src='images/up.gif'>"+change+"</td><td style='color:red'><img style='border:0;padding:2px; height:9px;vertical-align:bottom' src='images/up.gif'>"+rates+"</td></tr>";
					
						}
						else if (change<0){
							change = change*(-1);
							change = numberWithCommas(change);
							rates = rates*(-1);
							stock_price[index] = numberWithCommas(stock_price[index]);
							document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td style='color:blue'><img style='border:0;padding:2px; height:9px;vertical-align:bottom' src='images/down.gif'>"+change+"</td><td style='color:blue'><img style='border:0;padding:2px; height:9px;vertical-align:bottom' src='images/down.gif'>"+rates+"</td></tr>";
					
						} else if (change==0){
							stock_price[index] = numberWithCommas(stock_price[index]);
							document.getElementById("sise").innerHTML +="<tr><td>"+stock_date[index]+"</td><td>"+stock_price[index]+"</td><td style='color:#000000'>"+change+"</td><td style='color:#000000'>"+rates+"</td></tr>";
						}
					}
					}
				}
				//다음 이전
				//alert(document.getElementById('daypage').value);
				//document.getElementById("sise").innerHTML +="</table>";
				document.getElementById("sise_foot").innerHTML +="<tr><td width='50%'>이전</td><td width='50%' style='text-align:right;padding-right:20px'><span onclick=''>다음</span></td></tr>";
					
			}			
		   
		  
		$("#h_stock").val(scode);
		$("#h_price").val(stock_date[0]);
		//alert($("#isadmin").val());
		if ($("#isadmin").val() == "admin"){
			document.getElementById("myTextArea").value = Alltext;
		}
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
	
	
	//투자자별 매매동향
	if (scode =="kospi" || scode == "kosdaq"){    
			document.getElementById("dongh").innerHTML="<tr><td id='header2-1' class='news-title'>투자자별 매매동향</td> </tr>";
			
					
		$.ajax({
				cache: false,
				url: "whodata.php",
				dataType: "json",
				success: function(result) {
					var Alltext="";
						istock_date=[];
						istock_price=[];
					   
					document.getElementById("private").value = "";
				document.getElementById("fore").value = "";
				document.getElementById("institute").value = "";
					
				//alert("ddd");
					 $.each(result, function(i, field){
			
					
						if (i == scode){
							//var count=0;
							//document.getElementById("isise").innerHTML ="";
							//document.getElementById("isise_foot").innerHTML ="";
							 //field = field.slice(0,10);
							$.each(field, function(j, f){
								//document.getElementById("isise").innerHTML ="<tr><td class='s_header'>일자</td><td class='s_header'>가격</td><td class='s_header'>전일대비</td><td class='s_header'>변동율(%)</td></tr>";
			
								  Alltext += j+","+f+"\n";
								 //alert(f);
								//pricec.push(f);
								istock_date.push(j);
								istock_price.push(f);
								
								// document.getElementById("sise").innerHTML +="<tr><td>"+j+"</td><td>"+f+"</td></tr>";
								// document.getElementById("sise").innerHTML ="ddddd";
								 
								});
							}
					});
					// 투자자별 매매동향
					istock_date.reverse();
					istock_price.reverse();
					var index=0;
					
					//document.getElementById("isise").innerHTML = "<table styel='border-collaspe:separate;'>";
					document.getElementById("isise").innerHTML = "<tr><td class='s_header' style='width:30%'>일자</td><td class='s_header'>개인</td><td class='s_header'>외국인</td><td class='s_header'>기관</td></tr>";
			
					for (index=0; index< 10; index++)
				{
					//split to separate elements
					//istock_price[index]
					var res = istock_price[index].split(";");
					for (i=0; i<=2; i++){
						if(res[i].substr(1,1) == '-'){
							res[i] = "<span style='color:blue'>"+numberWithCommas(res[i].substr(2,res[i].length-1))+"</span>";
						} else {
							res[i] = "<span style='color:red'>"+numberWithCommas(res[i].substr(2,res[i].length-1))+"</span>";
							
						}
					}
					document.getElementById("isise").innerHTML +="<tr><td>"+istock_date[index]+"</td><td>"+res[0]+"</td><td>"+res[1]+"</td><td>"+res[2]+"</td></tr>";
					
				}
					//document.getElementById("isise").innerHTML +="</table>";
				
					//alert(f);
					if ($("#isadmin").val() == "admin"){
							document.getElementById("investorq").value = Alltext;
						}
						


				}
		});
	} else{
		document.getElementById("dongh").innerHTML="";
			
	}
	var dateObj = new Date();
			var month = dateObj.getUTCMonth() + 1; //months from 1-12
			var day = dateObj.getUTCDate();
			var year = dateObj.getUTCFullYear();
			
			newdate = year + "." + month + "." + day;
			document.getElementById("input-tx").innerHTML = "<tr><td style='width:100%; vertical-align:top'>"
			+ "<textarea width='100%' id='investorq' autocomplete='off' width='100%' rows='10'></textarea></td>" 
			+ "		</td></tr>";
			
			
			document.getElementById("input-iq").innerHTML="<tr><td colspan='3'><input id='idate' type='text' value="+newdate+"></input>"
					+"</td></tr><tr><td>"
					+"개인&nbsp;&nbsp;&nbsp;&nbsp;</td>"
					+"<td>매수<input id='adate' name='private' type='radio' value='+'></input>"
					+"</td>"
					+"	<td>&nbsp;매도<input id='adate' name='private' type='radio' value='-'></input>"
					+"	<input id='private' type='text'></input>"
					+"	</td>"
					+"	</tr>"
					+"<tr><td>"
					+"	외국인 &nbsp;</td>"
					+"	<td>매수<input name='fore' type='radio' value='+'></input>"
					+"</td>"
					+"	<td>&nbsp;매도<input name='fore' type='radio' value='-'></input>"
					+"	<input id='fore' type='text'></input>"
					+"</td>"
					+"</tr>"
					+"<tr><td HEIGHT='30px'>"
					+"기관&nbsp;&nbsp;&nbsp;&nbsp;</td>"
					+"<td>매수<input id='adate' name='inst' type='radio' value='+'></input>"
					+"</td>"
					+"<td>&nbsp;매도<input id='adate' name='inst' type='radio' value='-'></input>"
					+"<input id='institute' type='text'></input>"
					+"</td>"
					+"</tr>"
					+"<tr>"
					+"<td colspan='3'>"
					+"	<input type='button' value='추가' class='stock' onclick='insertText2();'>"
					+"	</td>"
					+"</tr>"
					+"	<tr>"
					+"	<td>"
					+"<button class='stockb' onclick='prettyPrint2()'>정보 저장</button></td></tr>";
}

					

  </script>
 