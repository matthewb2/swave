<?include "outlogin.php";?>

<div class="wrap">
    <header id="o-wrapper" class="o-wrapper">
        <div class="logo"><a href="main.php"><img style="margin:10px 0 0 10px" src="images/swave.gif"></a></div>
        <div class="options">
      	<ul class="c-buttons">
      		<? if ($_GET[id]=="image" || $_GET[id]=="news" || $_GET[id]=="dic"){?>
			<?} else {?>
			<li>Search</li>
			<?}?>
      		<li id="c-button--slide-right">Menu</li>
      	</ul>
        </div>
        <div class="clear"></div>
<? if ($_GET[id]=="image" || $_GET[id]=="news" || $_GET[id]=="dic"){?>
	
			<?} else {?>
			<div class="search-box" style="display:hidden">
	    	<form action="ssearch.php">
	    		<input id="main-search" onclick="latest_search()" style="padding: 0 0 0 10px; font-size:15px" type="text" name="search" placeholder=" Search .." value="<?=$_GET[search]?>" />
	    		<input type="submit" value="Go" />
	    	</form>
	    	<div class="clear"></div>
	    </div>
			<?}?>
	    
			   
		
    </header>
	
	<script>
	function latest_search(){
		
		///alert("ddd");
		// get from localStorage
		
	}
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
				<table width="100%" border="0">
					<tr>
					<td>
						<span style="display:inline-block"><?	print_outlogin("swave"); ?></span>
					</td>
					</tr>
				</table>		
				<? 
				} else {?>
				<table width="100%" border="0">
				<tr><td style="height:60px">
					<span style="display:inline-block">로그인할 수 있습니다</span>
				</td>
				<td class="c-menu__link">
				<input class="login_b" type="submit" onclick="move_login()" value="로그인">
				</td></tr></table>		
				  <?}?></a></li>
	
			<li class="c-menu__item"><a href="/zboard/doc/" class="c-menu__link" style="color:#666666">문서</a></li>
			<li class="c-menu__item"><a href="zboard.php?id=news" class="c-menu__link" style="color:#666666">뉴스</a></li>
			
			<li class="c-menu__item"><a href="zboard.php?id=dic" class="c-menu__link" style="color:#666666">사전</a></li>
			<li class="c-menu__item"><a href="/zboard/video/" class="c-menu__link" style="color:#666666">동영상</a></li>
			<li class="c-menu__item"><a href="finance.php?id=ci" class="c-menu__link" style="color:#666666">증권</a></li>
			<li class="c-menu__item"><a href="http://swave.woobi.co.kr/pmwiki/pmwiki.php" class="c-menu__link" style="color:#666666">모카위키</a></li>
		  </ul>
	</nav><!-- /c-menu slide-right -->
    
		
	<div id="c-mask" class="c-mask"></div><!-- /c-mask -->

    
