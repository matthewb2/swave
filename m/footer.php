
 <footer>
    	<p>과학전문검색 SWAVE 2017 Design by <a href="http://mobifreaks.com" target="_blank">Mobifreaks</a></p>
 </footer>

 <!--
<div class="bottomMenu">
 
  <img style="border:none" id="top" src="images/arrow-up-128.gif">
</div>
  
  -->
<? include "count.php";?>


<? if ($_GET[id]=="dic"){?>
  <script>
  // 검색어 자동완성 기능
  $(function() {
	  //alert("true");
	  
	  $.post("words2.php", function(data){
							//alert(data);
							data = data.replace(/"/g,'');
							data = data.replace(/\[/g,'');
							data = data.replace(/\]/g,'');
							
							availableTags = data.split(',');	
							$.ui.autocomplete.prototype._renderItem = function (ul, item) {
								item.label = item.label.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + $.ui.autocomplete.escapeRegex(this.term) + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<font color='#ff6600'><i>$1</i></font>");
								return $("<li></li>")
										.data("item.autocomplete", item)
										.append("<a>" + item.label + "</a>")
										.appendTo(ul);
							};
							$( "#dic-word" ).autocomplete({
							  source: availableTags
							});
							
		});
	  

    
	
	
  });
  </script>
<? }?>

  <script>
  // 검색어 자동완성 기능
  $(function() {
	  
	  
	  $.post("words.php", function(data){
							//alert(data);
							data = data.replace(/"/g,'');
							data = data.replace(/\[/g,'');
							data = data.replace(/\]/g,'');
							
							availableTags = data.split(',');	
							
							$( "#main-search" ).autocomplete({
							  source: availableTags
							});
							
		});
	  

    
	
	
  });
  </script>
  <?
$category = $_GET[category];
?>
	<script>
	
	function getSlideDataIndex(swipe){
    var activeIndex = swipe.activeIndex;
    var slidesLen = swipe.slides.length;
    if(swipe.params.loop){
        switch(swipe.activeIndex){
            case 0:
                activeIndex = slidesLen-3;
                break;
            case slidesLen-1:
                activeIndex = 0;
                break;
            default:
                --activeIndex;
        }
    }
    return  activeIndex;
}


  var mySwiper = new Swiper('.swiper-news', {
		calculateHeight:false,
		onSlideChangeEnd:function(swipe){
			var index = getSlideDataIndex(swipe)+1;
			//alert('ok');
			$(".news-title").css({'font-weight':'bold', 
										   'color': '#565656',
										   'border-bottom': '0px solid #28aadc'});
			 $("#header2-"+index).css({'font-weight':'bold', 
										   'color': '#28aadc',
										   'border-bottom': '2px solid #28aadc'});
										   
		}
	});
	
	 // new Swiper('.swiper-news2');

	
  // new Swiper('.swiper-container');   
  var mySwiper2 = new Swiper('.swiper-container', {
	  initialSlide : "<?=$category?>",
		calculateHeight:false,
		onSlideChangeEnd:function(swipe){
			var index = getSlideDataIndex(swipe)+1;
			//alert('ok');
			 //mySwiper2.swipeTo(3, 1000, false);
			$(".news-title").css({'font-weight':'bold', 
										   'color': '#565656',
										   'border-bottom': '0px solid #28aadc'});
			 $("#header2-"+index).css({'font-weight':'bold', 
										   'color': '#28aadc',
										   'border-bottom': '2px solid #28aadc'});
										   
		}
	});
	
		
	
    </script>
	
	
<!-- menus script -->
<script>
 /*
 $("#top").click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
*/
  /**
   * Slide right instantiation and action.
   */
  var slideRight = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-right',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideRightBtn = document.querySelector('#c-button--slide-right');
  
  slideRightBtn.addEventListener('click', function(e) {
	  //alert("test");
    e.preventDefault;
    slideRight.open();
  });


</script>
 
<script>

$(document).scroll(function () {
    var y = $(this).scrollTop();
    if (y > 100) {
        $('.bottomMenu').fadeIn();
    } else {
        $('.bottomMenu').fadeOut();
    }

});
		

$(function() {
	
	 //$("#div1").show();
	
	var count = $('#layer1 li').length;
    var height = $('#layer1 li').height();
	now = $('#layer1 ol').css("top");		

    function step(index) {
		
		if (index == 11) {//처음 엘리먼트를 로드
			 $('#layer1 ol').css("top",now);
			 index = 1;
		}
        $('#layer1 ol').delay(2000).animate({
            top: -height * index,
        }, 500, function() {
            step(index + 1);
        });
    }

    //step(1);
	
	delay(0);

				function delay(i) {
					//alert("test");
					if (i==10){i=0;}
				  
					$('#layer1').find('li').hide();
					
				  $('#layer1 li').eq(i).show();
				  
				    setTimeout(function() { delay(i + 1); }, 2000);
				}
	
});
</script>
<script>	
$( "#clickme" ).click(function() {
  $( "#layer2" ).toggle();
});
</script>	


<script type="text/javascript">


$(document).ready(function(){
	  var id = '<?=$_GET[id]?>';
	 //$('.search-box' ).show();
	 //alert(id);
	 if (id == 'dic') {
		 $('.search-box' ).hide();
	 } else {$('.search-box' ).show();}
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