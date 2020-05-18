<?include "outlogin.php";?>

<div class="wrap">
    <header id="o-wrapper" class="o-wrapper">
        <div class="logo"><a href="main.php"><img style="margin:10px 0 0 10px" src="images/swave.gif"></a></div>
        <div class="options">
      	<ul class="c-buttons">
      		<? if ($_GET[id]=="image"){?>
			<?} else {?>
			<li>Search</li>
			<?}?>
      		<li id="c-button--slide-right">Menu</li>
      	</ul>
        </div>
        <div class="clear"></div>
<? if ($_GET[id]=="image"){?>
			<?} else {?>
			<div class="search-box">
	    	<form action="ssearch.php">
	    		<input id="main-search" style="padding: 0 0 0 10px; font-size:15px" type="text" name="search" placeholder=" Search .." value="<?=$_GET[search]?>" />
	    		<input type="submit" value="Go" />
	    	</form>
	    	<div class="clear"></div>
	    </div>
			<?}?>
	    
			   
		
    </header>
	
	<script>
	function move_login(){
		var url=location.href;
		localStorage.setItem("url_login",url);
		
		window.location.href = "m_login.php";
		
		
	}
	</script>
	
	<nav id="c-menu--slide-right" class="c-menu c-menu--slide-right">
		  <button class="c-menu__close">Close Menu &rarr;</button>
		  <ul class="c-menu__items">
			<li class="c-menu__item">
				<? if ($_SESSION["zb_logged_no"]){ ?>
				<table width="100%" border="1">
					<tr>
					<td>
						<span style="display:inline-block"><?	print_outlogin("swave"); ?></span>
					</td>
					</tr>
				</table>		
				<? 
				} else {?>
				<table width="100%" border="1"><tr><td>
				<span style="display:inline-block">로그인할 수 있습니다</span>
				</td>
				<td class="c-menu__link">
				<input class="login_b" type="submit" onclick="move_login()" value="로그인">
				</td></tr></table>		
				  <?}?></a></li>
	
			<li class="c-menu__item"><a href="/zboard/doc/" class="c-menu__link">문서</a></li>
			<li class="c-menu__item"><a href="/zboard/news/" class="c-menu__link">뉴스</a></li>
			<li class="c-menu__item"><a href="/zboard/image/" class="c-menu__link">이미지</a></li>
			<li class="c-menu__item"><a href="zboard.php?id=dic" class="c-menu__link">사전</a></li>
			<li class="c-menu__item"><a href="/zboard/video/" class="c-menu__link">동영상</a></li>
			<li class="c-menu__item"><a href="finance.php" class="c-menu__link">증권</a></li>
			<li class="c-menu__item"><a href="http://swave.woobi.co.kr/pmwiki/pmwiki.php" class="c-menu__link">모카위키</a></li>
		  </ul>
	</nav><!-- /c-menu slide-right -->
    
		
	<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

    

		<div style="border-bottom: 1px solid #ddd; overflow-x: scroll;
			-webkit-overflow-scrolling: touch;">
			<table width="500px" style="border-collapse: separate;
    border-spacing: 20px 0px">
				<tr>
				<td id='header2-1' class="news-title"><a href="zboard.php?id=finance">뉴스</a></td> 
					
					<td id='header2-1' class="news-title"><a href="finance.php?id=ci">지수</a></td> 
					
					<td id='header2-1' class="news-title"><a href="finance.php">주식</a></td> 
					<td id='header2-2' class="news-title"><a href="finance.php?id=etf">ETF</a></td> 
					<td id='header2-3' class="news-title"><a href="finance.php?id=cc">암호화폐</a></td> 
					
				</tr>
			</table>
		</div>
	