<?php
	$imgWidth = 120; //이미지 가로크기 (겔러리)
	$imgHeight = 120; //이미지 세로크기 (겔러리)
	$subjectLength = 20; // 제목 자르기...글자수! (겔러리)
	$memoLength = 300; //내용 자르기 .. 글자수! (웹진)
	$viewWidth = 700; // 내용보기에서 이미지 최대 넓이 (전체)
	$maxDepth = 5; // 계층형 코멘트 최대 단계수 (전체)
?>
<script type="text/javascript" language="JavaScript">
	// 체크박스 전체선택
	var chk = false;
	function CheckAll()
	{
		var checkboxes = document.getElementsByName('cart');
		if (!chk) {
			for (i=0;i<checkboxes.length;i++) {
				checkboxes[i].checked=true;
			}
			chk=true;
		} else{
			for (i=0;i<checkboxes.length;i++) 	{
				checkboxes[i].checked=false;
			}
			chk=false;
		}
	}
	
	function back_top() // 상단으로 부드럽게 이동
	{
		x = document.body.scrollLeft;
		y = document.body.scrollTop;
		step = 2;
		
		while ((x != 0) || (y != 0)) {
			scroll (x, y);
			step += (step * step / 200);
			x -= step;
			y -= step;
			if (x < 0) x = 0;
			if (y < 0) y = 0;
		}
		scroll (0, 0);
	}
	
	function back_bottom() // 하단으로 부드럽게 이동
	{
		endx = document.body.scrollWidth;
		endy = document.body.scrollHeight;
		x = document.body.scrollLeft;
		y = document.body.scrollTop;
		step = 2;
		
		while ((x != endx) || (y != endy)) {
			scroll (x, y);
			step += (step * step / 200);
			x += step;
			y += step;
			if (x > endx) x = endx;
			if (y > endy) y = endy;
		}
		scroll (endx, endy);
	}
	
	document.ondblclick = function () {
		if (document.body.scrollTop<=((document.body.scrollHeight - document.body.clientHeight)/2))
		{
			back_bottom();
		} else {
			back_top();
		}
	}
</script>


<script type="text/javascript" language="JavaScript">
	// lightbox_plus.js
	// == written by Takuya Otani <takuya.otani@gmail.com> ===
	// == Copyright (C) 2006 SimpleBoxes/SerendipityNZ Ltd. ==
	/*
	Copyright (C) 2006 Takuya Otani/SimpleBoxes - http://serennz.cool.ne.jp/sb/
	Copyright (C) 2006 SerendipityNZ - http://serennz.cool.ne.jp/snz/
	
	This script is licensed under the Creative Commons Attribution 2.5 License
	http://creativecommons.org/licenses/by/2.5/
	
	basically, do anything you want, just leave my name and link.
	*/
	/*
	Original script : Lightbox JS : Fullsize Image Overlays
	Copyright (C) 2005 Lokesh Dhakar - http://www.huddletogether.com
	For more information on this script, visit:
	http://huddletogether.com/projects/lightbox/
	*/
	// ver. 20060131 - fixed a bug to work correctly on Internet Explorer for Windows
	// ver. 20060128 - implemented functionality of echoic word
	// ver. 20060120 - implemented functionality of caption and close button
	// === utilities ===
	
	// lightbox_plus 관련 - 스킨에서 처리하기위해 부득이 php 내부에 자스삽입함 20060906 - ganji
	function addEvent(object, type, handler)
	{
		if (object.addEventListener) {
			object.addEventListener(type, handler, false);
		} else if (object.attachEvent) {
			object.attachEvent(['on',type].join(''),handler);
		} else {
			object[['on',type].join('')] = handler;
		}
	}
	function WindowSize()
	{ // window size object
		this.w = 0;
		this.h = 0;
		return this.update();
	}
	WindowSize.prototype.update = function()
	{
		var d = document;
		this.w =
		(window.innerWidth) ? window.innerWidth
		: (d.documentElement && d.documentElement.clientWidth) ? d.documentElement.clientWidth
		: d.body.clientWidth;
		this.h =
		(window.innerHeight) ? window.innerHeight
		: (d.documentElement && d.documentElement.clientHeight) ? d.documentElement.clientHeight
		: d.body.clientHeight;
		return this;
	};
	function PageSize()
	{ // page size object
		this.win = new WindowSize();
		this.w = 0;
		this.h = 0;
		return this.update();
	}
	PageSize.prototype.update = function()
	{
		var d = document;
		this.w =
		(window.innerWidth && window.scrollMaxX) ? window.innerWidth + window.scrollMaxX
		: (d.body.scrollWidth > d.body.offsetWidth) ? d.body.scrollWidth
		: d.body.offsetWidt;
		this.h =
		(window.innerHeight && window.scrollMaxY) ? window.innerHeight + window.scrollMaxY
		: (d.body.scrollHeight > d.body.offsetHeight) ? d.body.scrollHeight
		: d.body.offsetHeight;
		this.win.update();
		if (this.w < this.win.w) this.w = this.win.w;
		if (this.h < this.win.h) this.h = this.win.h;
		return this;
	};
	function PagePos()
	{ // page position object
		this.x = 0;
		this.y = 0;
		return this.update();
	}
	PagePos.prototype.update = function()
	{
		var d = document;
		this.x =
		(window.pageXOffset) ? window.pageXOffset
		: (d.documentElement && d.documentElement.scrollLeft) ? d.documentElement.scrollLeft
		: (d.body) ? d.body.scrollLeft
		: 0;
		this.y =
		(window.pageYOffset) ? window.pageYOffset
		: (d.documentElement && d.documentElement.scrollTop) ? d.documentElement.scrollTop
		: (d.body) ? d.body.scrollTop
		: 0;
		return this;
	};
	function UserAgent()
	{ // user agent information
		var ua = navigator.userAgent;
		this.isWinIE = this.isMacIE = false;
		this.isGecko  = ua.match(/Gecko\//);
		this.isSafari = ua.match(/AppleWebKit/);
		this.isOpera  = window.opera;
		if (document.all && !this.isGecko && !this.isSafari && !this.isOpera) {
			this.isWinIE = ua.match(/Win/);
			this.isMacIE = ua.match(/Mac/);
			this.isNewIE = (ua.match(/MSIE 5\.5/) || ua.match(/MSIE 6\.0/));
		}
		return this;
	}
	// === lightbox ===
	function LightBox(option)
	{
		var self = this;
		self._imgs = new Array();
		self._wrap = null;
		self._box  = null;
		self._open = -1;
		self._page = new PageSize();
		self._pos  = new PagePos();
		self._ua   = new UserAgent();
		self._expandable = false;
		self._expanded = false;
		self._expand = option.expandimg;
		self._shrink = option.shrinkimg;
		return self._init(option);
	}
	LightBox.prototype = {
		_init : function(option)
		{
			var self = this;
			var d = document;
			if (!d.getElementsByTagName) return;
			var links = d.getElementsByTagName("a");
			for (var i=0;i<links.length;i++) {
				var anchor = links[i];
				var num = self._imgs.length;
				if (!anchor.getAttribute("href")
				|| anchor.getAttribute("rel") != "lightbox") continue;
				// initialize item
				self._imgs[num] = {src:anchor.getAttribute("href"),w:-1,h:-1,title:'',cls:anchor.className};
				if (anchor.getAttribute("title"))
				self._imgs[num].title = anchor.getAttribute("title");
				else if (anchor.firstChild && anchor.firstChild.getAttribute && anchor.firstChild.getAttribute("title"))
				self._imgs[num].title = anchor.firstChild.getAttribute("title");
				anchor.onclick = self._genOpener(num); // set closure to onclick event
			}
			var body = d.getElementsByTagName("body")[0];
			self._wrap = self._createWrapOn(body,option.loadingimg);
			self._box  = self._createBoxOn(body,option);
			return self;
		},
		_genOpener : function(num)
		{
			var self = this;
			return function() { self._show(num); return false; }
		},
		_createWrapOn : function(obj,imagePath)
		{
			var self = this;
			if (!obj) return null;
			// create wrapper object, translucent background
			var wrap = document.createElement('div');
			wrap.id = 'overlay';
			with (wrap.style) {
				display = 'none';
				position = 'fixed';
				top = '0px';
				left = '0px';
				zIndex = '50';
				width = '100%';
				height = '100%';
			}
			if (self._ua.isWinIE) wrap.style.position = 'absolute';
			addEvent(wrap,"click",function() { self._close(); });
			obj.appendChild(wrap);
			// create loading image, animated image
			var imag = new Image;
			imag.onload = function() {
				var spin = document.createElement('img');
				spin.id = 'loadingImage';
				spin.src = imag.src;
				spin.style.position = 'relative';
				self._set_cursor(spin);
				addEvent(spin,'click',function() { self._close(); });
				wrap.appendChild(spin);
				imag.onload = function(){};
			};
			if (imagePath != '') imag.src = imagePath;
			return wrap;
		},
		_createBoxOn : function(obj,option)
		{
			var self = this;
			if (!obj) return null;
			// create lightbox object, frame rectangle
			var box = document.createElement('div');
			box.id = 'lightbox';
			with (box.style) {
				display = 'none';
				position = 'absolute';
				zIndex = '60';
			}
			obj.appendChild(box);
			// create image object to display a target image
			var img = document.createElement('img');
			img.id = 'lightboxImage';
			self._set_cursor(img);
			addEvent(img,'click',function(){ self._close(); });
			addEvent(img,'mouseover',function(){ self._show_action(); });
			addEvent(img,'mouseout',function(){ self._hide_action(); });
			box.appendChild(img);
			var zoom = document.createElement('img');
			zoom.id = 'actionImage';
			with (zoom.style) {
				display = 'none';
				position = 'absolute';
				top = '15px';
				left = '15px';
				zIndex = '70';
			}
			self._set_cursor(zoom);
			zoom.src = self._expand;
			addEvent(zoom,'mouseover',function(){ self._show_action(); });
			addEvent(zoom,'click', function() { self._zoom(); });
			box.appendChild(zoom);
			addEvent(window,'resize',function(){ self._set_size(true); });
			// close button
			if (option.closeimg) {
				var btn = document.createElement('img');
				btn.id = 'closeButton';
				with (btn.style) {
					display = 'inline';
					position = 'absolute';
					right = '10px';
					top = '10px';
					zIndex = '80';
				}
				btn.src = option.closeimg;
				self._set_cursor(btn);
				addEvent(btn,'click',function(){ self._close(); });
				box.appendChild(btn);
			}
			// caption text
			var caption = document.createElement('span');
			caption.id = 'lightboxCaption';
			with (caption.style) {
				display = 'none';
				position = 'absolute';
				zIndex = '80';
			}
			box.appendChild(caption);
			// create effect image
			if (!option.effectpos) option.effectpos = {x:0,y:0};
			else {
				if (option.effectpos.x == '') option.effectpos.x = 0;
				if (option.effectpos.y == '') option.effectpos.y = 0;
			}
			var effect = new Image;
			effect.onload = function() {
				var effectImg = document.createElement('img');
				effectImg.id = 'effectImage';
				effectImg.src = effect.src;
				if (option.effectclass) effectImg.className = option.effectclass;
				with (effectImg.style) {
					position = 'absolute';
					display = 'none';
					left = [option.effectpos.x,'px'].join('');;
					top = [option.effectpos.y,'px'].join('');
					zIndex = '90';
				}
				self._set_cursor(effectImg);
				addEvent(effectImg,'click',function() { effectImg.style.display = 'none'; });
				box.appendChild(effectImg);
			};
			if (option.effectimg != '') effect.src = option.effectimg;
			return box;
		},
		_set_photo_size : function()
		{
			var self = this;
			if (self._open == -1) return;
			var imag = self._box.firstChild;
			var targ = { w:self._page.win.w - 30, h:self._page.win.h - 30 };
			var orig = { w:self._imgs[self._open].w, h:self._imgs[self._open].h };
			// shrink image with the same aspect
			var ratio = 1.0;
			if ((orig.w >= targ.w || orig.h >= targ.h) && orig.h && orig.w)
			ratio = ((targ.w / orig.w) < (targ.h / orig.h)) ? targ.w / orig.w : targ.h / orig.h;
			imag.width  = Math.floor(orig.w * ratio);
			imag.height = Math.floor(orig.h * ratio);
			self._expandable = (ratio < 1.0) ? true : false;
			if (self._ua.isWinIE) self._box.style.display = "block";
			self._box.style.top  = [self._pos.y + (self._page.win.h - imag.height - 30) / 2,'px'].join('');
			self._box.style.left = [((self._page.win.w - imag.width - 30) / 2),'px'].join('');
			self._show_caption(true);
		},
		_set_size : function(onResize)
		{
			var self = this;
			if (self._open == -1) return;
			self._page.update();
			self._pos.update();
			var spin = self._wrap.firstChild;
			if (spin) {
				var top = (self._page.win.h - spin.height) / 2;
				if (self._wrap.style.position == 'absolute') top += self._pos.y;
				spin.style.top  = [top,'px'].join('');
				spin.style.left = [(self._page.win.w - spin.width - 30) / 2,'px'].join('');
			}
			if (self._ua.isWinIE) {
				self._wrap.style.width  = [self._page.win.w,'px'].join('');
				self._wrap.style.height = [self._page.h,'px'].join('');
			}
			if (onResize) self._set_photo_size();
		},
		_show_action : function()
		{
			var self = this;
			if (self._open == -1 || !self._expandable) return;
			var obj = document.getElementById('actionImage');
			if (!obj) return;
			obj.src = (self._expanded) ? self._shrink : self._expand;
			obj.style.display = 'inline';
		},
		_hide_action : function()
		{
			var self = this;
			var obj = document.getElementById('actionImage');
			if (obj) obj.style.display = 'none';
		},
		_zoom : function()
		{
			var self = this;
			if (self._expanded) {
				self._set_photo_size();
				self._expanded = false;
			} else if (self._open > -1) {
				var imag = self._box.firstChild;
				self._box.style.top  = [self._pos.y,'px'].join('');
				self._box.style.left = '0px';
				imag.width  = self._imgs[self._open].w;
				imag.height = self._imgs[self._open].h;
				self._show_caption(false);
				self._expanded = true;
			}
			self._show_action();
		},
		_show_caption : function(enable)
		{
			var self = this;
			var caption = document.getElementById('lightboxCaption');
			if (!caption) return;
			if (caption.innerHTML.length == 0 || !enable) {
				caption.style.display = 'none';
			} else { // now display caption
				var imag = self._box.firstChild;
				with (caption.style) {
					top = [imag.height + 10,'px'].join(''); // 10 is top margin of lightbox
					left = '0px';
					width = [imag.width + 20,'px'].join(''); // 20 is total side margin of lightbox
					height = '1.2em';
					display = 'block';
				}
			}
		},
		_show : function(num)
		{
			var self = this;
			var imag = new Image;
			if (num < 0 || num >= self._imgs.length) return;
			var loading = document.getElementById('loadingImage');
			var caption = document.getElementById('lightboxCaption');
			var effect = document.getElementById('effectImage');
			self._open = num; // set opened image number
			self._set_size(false); // calc and set wrapper size
			self._wrap.style.display = "block";
			var selects = document.getElementsByTagName("SELECT"); // 셀렉트박스 처리 by 알릭(alik)
			for (i=0;i<selects.length ;i++ )
			{
				if (selects[i].style.visibility != "hidden")
				{
					selects[i].style.visibility = "hidden";
				}
			} // 여기까지
			
			if (loading) loading.style.display = 'inline';
			imag.onload = function() {
				try {
					if (self._imgs[self._open].w == -1) {
						// store original image width and height
						self._imgs[self._open].w = imag.width;
						self._imgs[self._open].h = imag.height;
					}
					if (effect) {
						effect.style.display = (!effect.className || self._imgs[self._open].cls == effect.className)
						? 'block' : 'none';
					}
					if (caption) caption.innerHTML = self._imgs[self._open].title;
					self._set_photo_size(); // calc and set lightbox size
					self._hide_action();
					self._box.style.display = "block";
					self._box.firstChild.src = imag.src;
					self._box.firstChild.setAttribute('title',self._imgs[self._open].title);
					if (loading) loading.style.display = 'none';
				} catch(e) {}
			};
			self._expandable = false;
			self._expanded = false;
			imag.src = self._imgs[self._open].src;
		},
		_set_cursor : function(obj)
		{
			var self = this;
			if (self._ua.isWinIE && !self._ua.isNewIE) return;
			obj.style.cursor = 'pointer';
		},
		_close : function()
		{
			
			var selects = document.getElementsByTagName("SELECT"); // 셀렉트박스 처리 by 알릭(alik)
			for (i=0;i<selects.length ;i++ )
			{
				if (selects[i].style.visibility == "hidden")
				{
					selects[i].style.visibility = "visible";
				}
			} // 여기까지
			
			var self = this;
			self._open = -1;
			self._hide_action();
			self._wrap.style.display = "none";
			self._box.style.display  = "none";
		}
	};
	// === main ===
	addEvent(window,"load",function() {
		var lightbox = new LightBox({
			loadingimg:'<?=$dir?>/lightbox_plus/loading.gif',
			expandimg:'<?=$dir?>/lightbox_plus/expand.gif',
			shrinkimg:'<?=$dir?>/lightbox_plus/shrink.gif',
			effectimg:'<?=$dir?>/lightbox_plus/zzoop.gif',
			effectpos:{x:-40,y:-20},
			effectclass:'effectable'
			//closeimg:'<?=$dir?>/lightbox_plus/close.gif'
		});
	});

	function applyLightbox(img, cmt) {
		var image_width = parseInt('<?=$viewWidth?>');
		if (cmt) {
			image_width = image_width/2;	
		}
		var image_height = 0;

		if(img.width > image_width) 
		{
			image_height = parseFloat(img.width /img.height)
			img.width = image_width;
			img.height = parseInt(image_width / image_height);
			img.style.width = '';
			img.style.height = '';
		}
		
		if(img.parentNode.getAttribute('rel') != 'lightbox') {
			var a = document.createElement('A');
			a.href = img.src;
			a.target = '_blank';
			a.rel ='lightbox';
			img.parentNode.insertBefore( a, img );
			a.appendChild( img );			
		}
	}

	function copyContent(str) 
	{ 
		if (document.selection) 
		{ 
			bResult = window.clipboardData.setData("Text",str); 
			if (bResult) alert('클립보드에 저장되었습니다.'); 
		} else { 
			str = encodeforFlash(str); 
			var flashcopier = 'flashcopier'; 
			if(!document.getElementById(flashcopier)) { 
				var divholder = document.createElement('div'); 
				divholder.id = flashcopier; 
				document.body.appendChild(divholder); 
			} 
			document.getElementById(flashcopier).innerHTML = ''; 
			var divinfo = '<embed src="<?=$dir?>/images/_clipboard.swf" FlashVars="clipboard='+str+'" width="1" height="1" type="application/x-shockwave-flash"></embed>'; 
			document.getElementById(flashcopier).innerHTML = divinfo; 
			alert('클립보드에 저장되었습니다.'); 
		} 
	}; 

	function encodeforFlash(str) 
	{ 
		var SAFECHARS = "0123456789" + 
					  "ABCDEFGHIJKLMNOPQRSTUVWXYZ" + 
					  "abcdefghijklmnopqrstuvwxyz" + 
					  "-_.!~*'()"; 

		var HEX = "0123456789ABCDEF"; 

		var plaintext = str; 
		var encoded = ""; 
		for (var i = 0; i < plaintext.length; i++ ) { 
			var ch = plaintext.charAt(i); 
			if (ch == " ") { 
				encoded += "+"; 
			} else if (SAFECHARS.indexOf(ch) != -1) { 
				encoded += ch; 
			} else { 
				var charCode = ch.charCodeAt(0); 
				if (charCode > 255) { 
					encoded += ch; 
				} else { 
					encoded += "%"; 
					encoded += HEX.charAt((charCode >> 4) & 0xF); 
					encoded += HEX.charAt(charCode & 0xF); 
				} 
			} 
		} 
		return encoded; 
	}; 
</script>

<?php
	$a_member_memo = str_replace("zeroboard","a style='display:none'>",strtolower($a_member_memo));
	$a_member_modify = str_replace("zeroboard","a style='display:none'>",strtolower($a_member_modify));
	$a_login = str_replace("zeroboard","a style='display:none'>",strtolower($a_login));
	$a_logout = str_replace("zeroboard","a style='display:none'>",strtolower($a_logout));
	$a_member_join = str_replace("zeroboard","a style='display:none'>",strtolower($a_member_join));
	$a_setup = str_replace("zeroboard","a style='display:none'>",strtolower($a_setup));
	$a_file_link1 = str_replace("zeroboard","a style='display:none'>",strtolower($a_file_link1));
	$a_file_link2 = str_replace("zeroboard","a style='display:none'>",strtolower($a_file_link2));
?>
	