<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>과학전문검색 에스웨이브</title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0" /> 
  <link rel="stylesheet" media="all" href="style.css" type="text/css">
  
  
  <link rel="icon" href="images/EeO_icon.ico" type="image/x-icon" />
  
   <script type="text/javascript" src="codebird.js"></script>
   
  <script src="js/jquery.min.js"></script>
   <script src="js/swiper.min.js"></script>
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 
 <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/dist/menu.js"></script>
  
  
  <style>
			  
			  body{
				  font-size:14px;
			  }
			  
			  

input {
    
    border: 1px solid #ddd;
    
}


						.login {
			  position: relative;
			  margin: 0 auto;
			  padding: 20px 20px 20px;
			  width: 100%;
			}


			
			 
		
			 
			:-moz-placeholder {
			  color: #c9c9c9 !important;
			  font-size: 13px;
			}
			 
			::-webkit-input-placeholder {
			  color: #ccc;
			  font-size: 13px;
			}
			
			.login:before {
  
  position: absolute;
  top: -8px;
  right: -8px;
  bottom: -8px;
  left: -8px;
  z-index: -1;
  background: rgba(0, 0, 0, 0.08);
  border-radius: 4px;
}
 
 
.login p {
  margin: 10px 0 0;
}
 
.login p:first-child {
  margin-top: 0;
}
 
	</style>
	
	
	
<script type="text/javascript">

   function login_t() {
	//alert('success');
        var cb = new Codebird;
	//alert('success');
        cb.setConsumerKey("I2RyrOV4yqfzSAmIZOeHbSnCI", "Wb6MgBiA9msfHwFZDkkd2m11bdBpIA8KdC9rcvxVOUxOAC8fCw");
        cb.__call(
            "oauth_requestToken", 
            { oauth_callback: "http://m.swave.woobi.co.kr/bbs/tw.php" },
            function (reply, rate, err) {
                if (err) {
                    console.log("error response or timeout exceeded" + err.error);
                }
                if (reply) {
                    // stores it
                    cb.setToken(reply.oauth_token, reply.oauth_token_secret);
					localStorage.setItem("oauth_token", reply.oauth_token);
					localStorage.setItem("oauth_token_secret", reply.oauth_token_secret);
                    // gets the authorize screen URL
                    cb.__call(
                        "oauth_authorize",
                        {},
                        function (reply) {
                            window.location.href = reply;
							
                        }
                    );
					
					
                }
            }
        );
       
    }

</script>



<script>
		// initialize and setup facebook js sdk
		window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '334321873632383',
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		    FB.getLoginStatus(function(response) {
		    	if (response.status === 'connected') {
		    		document.getElementById('status').innerHTML = 'We are connected.';
		    		document.getElementById('login').style.visibility = 'hidden';
		    	} else if (response.status === 'not_authorized') {
		    		document.getElementById('status').innerHTML = 'We are not logged in.'
		    	} else {
		    		document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
		    	}
		    });
		};
		(function(d, s, id){
		    var js, fjs = d.getElementsByTagName(s)[0];
		    if (d.getElementById(id)) {return;}
		    js = d.createElement(s); js.id = id;
		    js.src = "//connect.facebook.net/en_US/sdk.js";
		    fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
		
		// login with facebook with extra permissions
		function fb_login() {
													FB.login(function(response) {
							if (response.authResponse) {
							 console.log('Welcome!  Fetching your information.... ');
							 FB.api('/me', function(response) {
							   // alert('Good to see you, ' + response.name + '.');
							  // localStorage.setItem("fb_username", response.name);
							   //window.location = 'fb_login.php?username=' + response.name;
							   $.post("fb.php",
									{
										
										no: "99",
										id: response.name
									},
									function(){
										//alert("공감되었습니다");
										window.history.go(-1);
									});
							   
							 });
							} else {
							 console.log('User cancelled login or did not fully authorize.');
							}
						});
		}
		
		// getting basic user info
		function getInfo() {
			FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id'}, function(response) {
				document.getElementById('status').innerHTML = response.id;
			});
		}
	</script>
	


</head>

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
	<?include "header.php";?>
<div>
 <article class="underline">
	<div style="magin:0; padding:0">
    
		<form method="post" action="m_login_check.php">
		<table width="98%" border="0" style="margin-top:10px;">
			<tr>
			<td style="margin-top:10px; text-align:center">아이디&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:70%" type="text" name="user_id" value="" placeholder="Username"></p>
			</tr>
			<tr>
			<td style="text-align:center">패스워드 <input style="width:70%" type="password" name="password" value="" placeholder="Password"></p>
			</tr>
			<tr>
			<td style="width:100%;text-align:left">
				<span style="display:inline-block;width:100%;margin-left:20px"><input style="vertical-align:middle" type="checkbox" name="auto_login" checked />
				<span style="display:inline;">자동로그인</span></span></td>
			</tr>
			<tr>
			<td style="text-align:center"><input type="submit" style="width:100%; height:45px; color: #666666;background-color:#ffffff" name="commit" value="Login"></p>
			</td>
			</tr>
			<tr>
			<td style="height:10px; margin:0; border-top: 1px solid #ddd;">
				
			</td>
			</tr>
			<tr>
			<td style="text-align:center"><input type="button" style="width:100%; height:45px; background-color: #31BBEA; color: #fff " value="Twitter" onclick="login_t()" ></p>
			</td>
			</tr>
			<tr>
			<td style="text-align:center"><input type="button" style="width:100%; height:45px; background-color: #42598A; color: #fff " value="Facebook" onclick="fb_login()"></p>
			</td>
			</tr>
		</table>
		</form>
		
	
  </div>
   
 </article>
 
	<footer>
    	<p>과학전문검색 SWAVE 2018 Design by <a href="http://mobifreaks.com" target="_blank">Mobifreaks</a></p>
    </footer>
 </div>
 
<script type="text/javascript">
$(document).ready(function(){
	
	 $('.search-box' ).hide();
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
