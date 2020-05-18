
</td>
</tr>






</table>




							
<script>
function add2(){
	var count=0;
	var js_subject = [<?php echo '"'.implode('","', $subject).'"' ?>];
	var js_memo = [<?php echo '"'.implode('","', $memo).'"' ?>];
	var js_no = [<?php echo '"'.implode('","', $no2).'"' ?>];
	var js_hit= [<?php echo '"'.implode('","', $hit).'"' ?>];
	var js_reg= [<?php echo '"'.implode('","', $reg_date).'"' ?>];
	count = document.getElementById("you").childElementCount;
	if (!js_subject[count]){
		$('#you').append('<table border=0><tr><td rowspan="2">다음 영상이 없습니다</td></tr></table>');
					var input = document.querySelector('[name="more"]');
			// Without querySelector API
			// var input = document.getElementsByName('myButton').item(0);

			// disable
			input.setAttribute('disabled', true);
	} else{	//alert(js_array);
		for (var i=count; i<=count+5; i++){
					if (js_subject[i]){
				$('#you').append('<table border=0 width="100%"><tr><td style="width:50%"><a href="/bbs/view.php?id=video&no='+js_no[i]+'"><img style="padding:5px" src="http://img.youtube.com/vi'+js_memo[i]+'/hqdefault.jpg" /></td><td  style="vertical-align:middle;width:50%"><a href="/bbs/view.php?id=video&no='+js_no[i]+'"><span style="font:10pt Nanum Gothic">'+js_subject[i]+'</span></a><br>조회:'+js_hit[i]+'&nbsp;등록:'+js_reg[i]+'</td></tr></table>');
				}
			}	
		}
	
}

function add3(){
	
	var countdiv = document.getElementById("you").childElementCount;
	
	// document.getElementById("you").innerHTML = countdiv;
	var nodiv = <?=$_GET['no']?>;
	//alert(no);
      $.ajax({
				type:"GET",
				cache:false,
				url:'./skin/video/morevideo.php',
				data: {
						no : nodiv,
					count: countdiv
					
					
				}, // pass data 
			   beforeSend: function(){
					 // Handle the beforeSend event
					 $("#you").append("<div id='loading'>로딩중</div>");
				   },
				success:function(result) { 
				$("#loading").remove();
					 var data = $.parseJSON(result);       //json데이터를 파싱
						var output= "";
						
						if (data[0]['subject']!=null){
						for (i=0; i < data.length; i++){
							if (data[i]['subject']!=null){
								
								var content = '<img width="180px" src="http://img.youtube.com/vi'+data[i]['memo']+'/hqdefault.jpg" /></a>';
								output += '<table border=0 width="100%"><tr><td style="width:40%"><a href="/bbs/view.php?id=video&no='+data[i]['no']+'">';
								output += content;
								output += '</td><td style="vertical-align:middle;width:60%"><a href="/bbs/view.php?id=video&no="'+data[i]['no']+'"><span style="font: 10pt Nanum Gothic">'+data[i]['subject']+'</span></a></tr><tr><td style="border: #ffffff 1px solid;font: 9pt Nanum Gothic; vertical-align:top; line-height: 1.5; color:#666666; padding: 3px 0px 0px 0px; text-decoration:none">조회:'+data[i]['hit']+'&nbsp;등록:'+data[i]['reg']+'</td></tr></table>';
							 						 
							 
							}
						}
						
						
					   //$("#you").html(output);
					   $('#you').append(output);
						} else $('#you').append('다음 영상이 없습니다');
				}
	
	});


}

$(document).ready(function() {
	
	var count=0;
	var js_subject = [<?php echo '"'.implode('","', $subject).'"' ?>];
	var js_memo = [<?php echo '"'.implode('","', $memo).'"' ?>];
	var js_no = [<?php echo '"'.implode('","', $no2).'"' ?>];
	var js_hit= [<?php echo '"'.implode('","', $hit).'"' ?>];
	var js_reg= [<?php echo '"'.implode('","', $reg_date).'"' ?>];
	
	if (!js_subject[0]){
		$('#you').append('다음 영상이 없습니다');
	} else{	//alert(js_array);
					
		//alert(js_array);
		for (var i=count; i<=count+5; i++){
			
		$('#you').append('<table border=0 width="100%"><tr><td style="width:50%"><a href="/bbs/view.php?id=video&no='+js_no[i]+'"><img style="padding:5px" src="http://img.youtube.com/vi'+js_memo[i]+'/hqdefault.jpg" /></td><td  style="vertical-align:middle;width:50%"><a href="/bbs/view.php?id=video&no='+js_no[i]+'"><span style="font:10pt Nanum Gothic">'+js_subject[i]+'</span></a><br>조회:'+js_hit[i]+'&nbsp;등록:'+js_reg[i]+'</td></tr></table>');
			
		}
	}
});
</script>
