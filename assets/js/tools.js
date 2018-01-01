// Our custom stuff
(function($) {
$(document).ready(function() {

	// Disable "faux underlines" on images
	$('img').parent('.entry-content a').css("background-image", "none");

	// NAV
	$( ".hamburger" ).on( "click", function(event) {
		event.preventDefault();
		$(this).toggleClass('is-active');
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
	$("#nav-search").on( "click", function(event){
		event.preventDefault();
		$(this).toggleClass('active');
		$('#site-search').slideToggle('fast').toggleClass('open');
		_gaq.push(['_trackEvent', 'Mobile', 'Search Form Toggled']);
	});

	// SHARE
	$("#share-icon").on( "click", function(){
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
		$("#activate-comments").on( "click", function(event){
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

	$(".entry-featuredimage.ultra-wide img").load(function(){
  		var img_height = $(this).height();
		if ($(this).scrollTop() >= img_height) {
			$('.site-header').addClass('expanded');
		}
		$(window).scroll(function() {
			console.log(img_height);
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

	});

	var delay = (function(){
	  var timer = 0;
	  return function(callback, ms){
	    clearTimeout (timer);
	    timer = setTimeout(callback, ms);
	  };
	})();
});
})(jQuery);