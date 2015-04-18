$(function(){
	
	$('.bxslider').bxSlider({
		mode: 'fade'
	});
	$('.bxslider2').bxSlider({
		mode: 'fade',
		pause: '30000'
	});
	$('.bxslider3').bxSlider({
		mode: 'horizontal',
		pause: '45000'
	});
	$('.bxslider4').bxSlider({
		mode: 'horizontal',
		pause: '30000'
	});
	$('.bxslider5').bxSlider({
		mode: 'horizontal',
		pause: '45000'
	});
	$('.bxslider6').bxSlider({
		mode: 'horizontal',
		pause: '30000'
	});
	$('.bxslider7').bxSlider({
		mode: 'horizontal',
		pause: '30000'
	});

	// $('.covervid-video').coverVid(1920, 1080);
	$(window).load(function() {    
 
        var theWindow        = $(window),
            $bg              = $("#bg"),
            aspectRatio      = $bg.width() / $bg.height();
 
        function resizeBg() {
 
                if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
                    $bg
                        .removeClass()
                        .addClass('bgheight');
                } else {
                    $bg
                        .removeClass()
                        .addClass('bgwidth');
                }
 
        }
 
        theWindow.resize(function() {
                resizeBg();
        }).trigger("resize");
 
	});
	$("a.example6").fancybox({
		'titlePosition'		: 'outside',
		'overlayColor'		: '#000',
		'overlayOpacity'	: 0.9
	});
	$('.back-page').click(function(){
		history.back();
	});
	$(".menu-button-hider").click(function(){
		var a = $('.menu-fix-1275').css('display');
		if (a == 'block') {
			$('.menu-fix-1275').slideUp(500);
		} else {
			$('.menu-fix-1275').slideDown(500);
		}

		
	});
});