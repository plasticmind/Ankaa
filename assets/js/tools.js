// FastClick function - https://github.com/dave1010/jquery-fast-click
(function(e){e.fn.fastClick=function(t){return e(this).each(function(){e.FastButton(e(this)[0],t)})};e.FastButton=function(t,n){var r,i;var s=function(){e(t).unbind("touchend");e("body").unbind("touchmove.fastClick")};var o=function(t){t.stopPropagation();s();n.call(this,t);if(t.type==="touchend"){e.clickbuster.preventGhostClick(r,i)}};var u=function(e){if(Math.abs(e.originalEvent.touches[0].clientX-r)>10||Math.abs(e.originalEvent.touches[0].clientY-i)>10){s()}};var a=function(n){n.stopPropagation();e(t).bind("touchend",o);e("body").bind("touchmove.fastClick",u);r=n.originalEvent.touches[0].clientX;i=n.originalEvent.touches[0].clientY};e(t).bind({touchstart:a,click:o})};e.clickbuster={coordinates:[],preventGhostClick:function(t,n){e.clickbuster.coordinates.push(t,n);window.setTimeout(e.clickbuster.pop,2500)},pop:function(){e.clickbuster.coordinates.splice(0,2)},onClick:function(t){var n,r,i;for(i=0;i<e.clickbuster.coordinates.length;i+=2){n=e.clickbuster.coordinates[i];r=e.clickbuster.coordinates[i+1];if(Math.abs(t.clientX-n)<25&&Math.abs(t.clientY-r)<25){t.stopPropagation();t.preventDefault()}}}};e(function(){if(document.addEventListener){document.addEventListener("click",e.clickbuster.onClick,true)}else if(document.attachEvent){document.attachEvent("onclick",e.clickbuster.onClick)}})})(jQuery)

// Our custom stuff

$(document).ready(function() {

	// Disable "faux underlines" on images
	$('img').parent('.entry-content a').css("background-image", "none");

	// NAV
	$("#nav-toggle").fastClick(function(event){
		event.preventDefault();
		$(this).toggleClass('active');
		$('#site-nav').toggleClass('open').slideToggle('fast');
		is_nav_open = $('#site-nav').hasClass('open');
		if(is_nav_open) {
			$('#social-links').fadeIn('fast').removeClass().toggleClass('open');
		} else {
			$('#social-links').fadeOut('fast').removeClass();
		}
		_gaq.push(['_trackEvent', 'Mobile', 'Nav Menu Toggled']);
	});

	// ENTRY-NAV

	$(".entry-navigation a").hover(function(){
        $(this).removeClass('collapsed').addClass('expanded');
        $('.entry-navigation a').not(this).removeClass('expanded').addClass('collapsed');
    },function(){
        $('.entry-navigation a').removeClass('expanded').removeClass('collapsed');
    });

	// SEARCH
	$("#nav-search").fastClick(function(event){
		event.preventDefault();
		$(this).toggleClass('active');
		$('#site-search').slideToggle('fast').toggleClass('open');
		_gaq.push(['_trackEvent', 'Mobile', 'Search Form Toggled']);
	});

	// SHARE
	$("#share-icon").fastClick(function(){
		$(this).parent().toggleClass('active');
		_gaq.push(['_trackEvent', 'Mobile', 'Search Form Toggled']);
	});
	$(document).mouseup(function(e) { // Hide share panel if user clicks anywhere else
	    var container = $("#sharing");
	    if (container.has(e.target).length === 0) {
	        container.removeClass('active');
	    }
	});
	// COMMENT COUNT
	if(typeof disqus_shortname !== 'undefined') {
		var script=document.createElement('script');
		script.async = true;
		script.type='text/javascript';
		script.src='http://' + disqus_shortname + '.disqus.com/count.js';
		$("body").append(script);
		// LOAD COMMENTS
		$("#activate-comments").fastClick(function(event){
			event.preventDefault();
			$(this).toggleClass('active');
			$('#disqus_thread').toggle();
			_gaq.push(['_trackEvent', 'Mobile', 'Comments Toggled']);
			$.ajax({
				type: "GET",
				url: "http://"+disqus_shortname+".disqus.com/embed.js",
				dataType: "script",
				cache: true
			});
		});
	}
	// ARCHIVE NAVIGATION
	$('#archive-chart li').mouseover(function() {
		basename = $(this).children('a:first').attr('href');
	  	$('#archive-chart li').removeClass('boost').addClass('diminish');
	  	$(this).removeClass('diminish').addClass('boost');
		$('.browse').stop(true, true).hide();
		$(basename).stop(true, true).show();
	});
	$('#archive-chart li:first-child').mouseover();

	// EXPAND NAV WHEN SCROLLING PAST FULL IMAGE

	var img_height = $('.entry-featuredimage.ultra-wide img').height();
	if ($(this).scrollTop() >= img_height) {
		$('.site-header').addClass('expanded');
	}
	$(window).scroll(function() {
		delay(function(){
			if ( img_height == null) {
				$('.site-header').addClass('expanded');
			} else {
				if ( $(this).scrollTop() >= img_height ) {
					$('.site-header').addClass('expanded');
				} else {
			    	$('.site-header').removeClass('expanded');
				}				
			}

		}, 10);
	});

	var delay = (function(){
	  var timer = 0;
	  return function(callback, ms){
	    clearTimeout (timer);
	    timer = setTimeout(callback, ms);
	  };
	})();

});