<html>
<head>
 <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" href="favicon.ico" type="image/x-icon">
   <title>과학전문검색 SWAVE </title>
   <link rel="stylesheet" href="style.css">
   
<script src="jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="codebird.js"></script>
				
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 					<script src="js/jquery.totop.js"></script>
					<link rel="stylesheet" href="css/totopFA.css">
					<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
   
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
   <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
  
  	<script src="./js/canvasjs.min.js"></script>
<script type="text/javascript">
function layerControl_over(){
	var f1=document.getElementById("layer1").style;
	var f2=document.getElementById("layer2").style;
		f2.display='';
		f1.display='none';

}

function layerControl_out(){
	var f1=document.getElementById("layer1").style;
	var f2=document.getElementById("layer2").style;
		f2.display='none';
		f1.display='';

}
</script>
	
	<script language="JavaScript">
  
  function startp(){
	  getFile();
	  canvasjsChart();
	  
	  
  }
  
function canvasjsChart(){


var stock2 = $( "#myselect option:selected" ).val();
var stock = $( "#myselect option:selected" ).text();
	$.getJSON("newsdata3.json", function(result){
		var af =[];
		var ai =[];
        $.each(result, function(i, field){
          
			 if (i == stock2){
				$.each(field, function(j, f){
					  af.push(f);
						ai.push(j);
				});
			 // af.push(field);
			 //ai.push(i);
			 }
			
        });
	 displayCandle(stock, ai,af);	
    });
	
	function displayCandle(stock, ai,af){
		
		var dataCandle = new Array();
		var price = new Array();
		for (i = 0; i < ai.length; i++) {
		//alert(parseInt(ai[i].substr(0,2)));
		//alert(parseInt(ai[i].substr(2,4)));
		 dataCandle[i] = { 'x': new Date(2017, parseInt(ai[i].substr(0,2)-1), parseInt(ai[i].substr(2,2))),
							'y': af[i]
						};
						
		}
		//dataCandle += "]";
		//alert(dataCandle);
		
		var chart = new CanvasJS.Chart("chartContainer", {
				title: {
					//text: stock
				},
				zoomEnabled: true,
				axisY: {
					includeZero: false,
					//title: "Prices",
					//prefix: ""
				},
				axisX: {
					interval:5
				},
				data: [
				{
					type: "candlestick",
					dataPoints:  dataCandle
					// [
					//	{ x: new Date(2017, 01, 01), y: [5198, 5629, 5159, 5385] },
					//	{ x: new Date(2012, 02, 01), y: [5366, 5499, 5135, 5295] },
					// ]
				}
				]
			});
			chart.render();

	}
}
  
  function prettyPrint() {
	var col0 = $( "#myselect option:selected" ).val();
  //alert(col0);
   var cars = $('#myTextArea').val().split(/\n|\r/);
    
   var col1 = [];
   var col2 = [];
   var col3 = [];
   var col4 = [];
   var col5 = [];
   
   for (i = 0; i < cars.length; i++) {
		if (/\S/.test(cars[i])) {
			var fruits = cars[i].split(',');
			//fruits.toString();
			//alert(cars[0].split(','));
			
			col1.push(fruits[0]);
			col2.push(fruits[1]);
			col3.push(fruits[2]);
			col4.push(fruits[3]);
			col5.push(fruits[4]);
		}
	
 
	}
	//alert(col2);
	
	sendjson(col0, col1, col2, col3, col4, col5);
   
   
}

function sendjson(col0, col1, col2, col3, col4, col5) {
   
  
$.post("jsontest3.php",
					{
						stock: col0,
						no: col1,
						open: col2,
						high: col3,
						low: col4,
						close: col5,
						
					//	bad: bad
					},
					function(){
						alert("공감되었습니다");
					});

}


function Print() {
   
   var colume1 = ["0305","0306","0307","0308"];
   var colume2 = ["15455","15475","15555","15355"];
$.post("jsontest.php",
					{
						no: colume1,
						price: colume2,
					//	bad: bad
					},
					function(){
						alert("공감되었습니다");
					});

}

function getFile() {
	var stock = $( "#myselect option:selected" ).val();
	$.ajax({
    cache: false,
    url: "newsdata3.json",
    dataType: "json",
    success: function(result) {
	    var Alltext = "";
	  
		 $.each(result, function(i, field){
			 
			if (i == stock){
				$.each(field, function(j, f){
					//alert(f);
					  Alltext += j+","+f+"\n";
				});
			}
		 });
		   document.getElementById("myTextArea").value = Alltext;
		}
	});
}

function getPrint() {
	var stock2 = $( "#myselect option:selected" ).val();
	
	
	$.ajax({
    cache: false,
    url: "newsdata3.json",
    dataType: "json",
    success: function(result) {
	   var af =[];
		var ai =[];
        $.each(result, function(i, field){
          
			 if (i == stock2){
				$.each(field, function(j, f){
					  af.push(f);
						ai.push(j);
				});
			 // af.push(field);
			 //ai.push(i);
			 }
			
        });
	 displayLine2(ai,af);	
		}
	});
	
	
	
	function displayLine2(ai, res) {
    var data = {
        labels: ai,
        datasets: [
            {
                label: "Prime and Fibonacci",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: res
            }
        ]
    };
    var ctx = document.getElementById("lineChart").getContext("2d");
    var options = {  //Boolean - Whether the line is curved between points
    bezierCurve : false};
    var lineChart = new Chart(ctx).Line(data, options);
  }

}
  </script>
   
</head>
<body onload="startp()">
<?
 $_zb_url = "/bbs/";
	$_zb_path="/home/swave50/www/bbs/";
	include "header.php";?>
	
		<div style="width:100%; position:absolute; z-index:0">
 <select  id="myselect">
  <option value="kospi">코스피</option>
  <option value="kosdaq">코스닥</option>
  <option value="053800">안랩</option>
  <option value="004770">써니전자</option>
</select> 
<br>
<textarea id="myTextArea" cols=50 rows=10></textarea>
<br>
<button onclick="prettyPrint()">send to json</button>
<button onclick="getFile()">get from file</button>
<button onclick="Print()">transfer test</button>
<button onclick="canvasjsChart()">show graph</button>

<div id="chartContainer" style="height: 400px; width: 100%;">
</div>
<?
			include "footer.php"; ?>
			
			
</body>
</html>