
jQuery(document).ready(function($){
	
	var $window = $(window),
        $menu = $('div.menu');
	
	function checkWindowSize() {
		var width = $window.width();
		if ( width < 824 ) {
			return $menu.addClass('nav-mobile');
		}
		$menu.removeClass('nav-mobile');
	}
	
	$window
        .resize(checkWindowSize)
        .trigger('checkWindowSize');
		
	checkWindowSize();
	
	/* prepend menu icon */
	$('div.menu').prepend('<div id="menu-icon">Menu</div>');
	
	/* toggle nav */
	$("#menu-icon").on("click", function(){
		$("div.menu > ul").slideToggle();
		$(this).toggleClass("active");
	});
	
	
	/* preloader */
	$('#load-cycle').hide();
	
	/* jquery cycle */
	$('.cycle-slideshow').show();
	
	$('#slide-wrap').hover(function() {
		$('#sliderprev').fadeIn(200);
		$('#slidernext').fadeIn(200);
	}, function() {
		$('#sliderprev').fadeOut(200);
		$('#slidernext').fadeOut(200);
	});
		
	
	/* toggle search box */
	$("#search-icon").on("click", function(){
		$("body").scrollTop(0);
		$("#search-box-wrap").slideToggle();
	});
	
	$("#close-x").on("click", function(){
		$("#search-box-wrap").slideUp();
	});
	

	/* post box hovers */
	$(".post-box").bind("mouseenter", function() {
		$(this).find(".entry-content").fadeTo(400, 1);
		$(this).find(".go-button a").fadeTo(400, 1);
		$(this).find("img").fadeTo(400, 0.3);
	});
	
	$(".post-box").bind("mouseleave", function() {
		$(this).find(".entry-content").fadeTo(400, 0);
		$(this).find(".go-button a").fadeTo(400, 0);
		$(this).find("img").fadeTo(400, 0.7);
	});

	document.getElementById("menu-icon").innerHTML = "<span class='genericon genericon-menu'></span>";

});