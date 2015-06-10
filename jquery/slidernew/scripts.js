/*$.fn.slider = function() {
	var c_i = 0;
	var i = this.find(".slides_container").find(".slide"); // выборка всех слайдов
	var i_c = i.size(); // количество слайдов
	var cur = null;
	
	function chSlide(d, o, p)
	{
		if(typeof(p) !== 'undefined') 
			c_i = p+1;
		if (d == "n") {
			cur = i.eq(c_i).addClass('fadeInRightBig').removeClass('fadeOutLeftBig').removeClass('fadeOutRightBig');
			i.last().addClass('fadeOutLeftBig');
		
		}
		else {
			if (d == "r") {
				cur.addClass('fadeOutRightBig');
				c_i -= 1;
				if (c_i < 0)
					c_i = i_c - 1;
					
				cur = i.eq(c_i).addClass('fadeInLeftBig').removeClass('fadeOutLeftBig').removeClass('fadeOutRightBig').removeClass('fadeInRightBig');
		}
			if (d == "l") {
				cur.addClass('fadeOutLeftBig');
				c_i += 1;
				if (c_i >= i_c)
					c_i = 0;
					
				cur = i.eq(c_i).addClass('fadeInRightBig').removeClass('fadeOutRightBig').removeClass('fadeOutLeftBig').removeClass('fadeInLeftBig')
			}
		}
		$('.control-slide').removeClass('active').eq(c_i).addClass('active');
		return false
	}
	return this.each(function() {
		var _parent = $(this).parent();
		$(this).append('<a class="prev" href="#">&lt;</a><a class="next" href="#">&gt;</a><div class="sli-links"></div>');
		
		var nav = $(this).children('.sli-links');
		$(_parent).find(".slide").each(function(index) {
			$(nav).append('<span class="control-slide">' + index + '</span>');
		});
		
		chSlide("n", this);
		var x = this;
		
		$("#slides .next").click(function() {
			return chSlide("l", x);
		});
		
		$("#slides .prev").click(function() {
			return chSlide("r", x);
		})
		
		$('.control-slide').click(function(){
				// console.log(active);
			return chSlide("r", x,$(this).index());
		// }
		});
		var slideTime = setInterval(function(){chSlide("l", x)}, 5000);

		$(this).mouseenter(function(){clearInterval(slideTime);}).mouseleave(function(){slideTime = setInterval(function(){chSlide("l", x)}, 5000);});
	})
};*/
/*$.fn.switchArea = function() {
	



	var c_i = 0;
	var i_c = $(this).size();
	var cur = null;
	//var i = $(this).parent().parent().find('.tab-chooser');
	$(".tab-area-main-tabs-1 p").eq(1).mouseenter();
	var cur = $(this).children("p").eq(1).addClass('tab-area-tab-active');
	
	console.log(cur );
	function hoverer(d, o) {
		
		/*if(typeof(p) !== 'undefined') 
			c_i = p+1;
		if (d == "n") {
			/*c_i += 1;
			o.children().eq(1).mouseover();
			console.log(o);
		}


		/*if (!b) {
			c_i = p.index();
			console.log(c_i);
		}
		
		
		c_i += 1;
		if (c_i > i_c){
			c_i = 1;
		}*/

		/*$(p).each(function(idx,o) {
			while($(o).hasClass("tab-area-tab-active")){

			}
			if () {
			c_i = $(o).index();
			
		}
 		
 		cur = p.eq(c_i).next().mouseenter();

		});*/

	/*
		console.log();
		/*cur = i.removeClass().addClass('tab-chooser').animate({left: 245px}, 100);
		//i.last().addClass('fadeOutLeftBig');
		
		}
		else {
			if (d == "l") {
				cur.removeClass().addClass('tab-chooser').animate({left: 400px}, 100);
				c_i += 1;
				if (c_i >= i_c)
				c_i = 0;
					
				/*cur = i.removeClass().addClass('tab-chooser').animate({left: 245px}, 100);*/
		/*}
			if (d == "r") {
				cur.removeClass().addClass('tab-chooser').animate({left: 83px}, 100);
				c_i -= 1;
				if (c_i < 0)
				c_i = i_c - 1;*/
				/*cur = i.eq(c_i).addClass('fadeInRightBig').removeClass('fadeOutRightBig').removeClass('fadeOutLeftBig').removeClass('fadeInLeftBig')*/
			/*}
		}
		$('.tab-area-main-tabs-1 p').removeClass('active').eq(c_i).addClass('active');
		return false
	}
}
		
		hoverer("n", this);
		var x = this;
		
		/*$("#slides .next").click(function() {
			return chSlide("l", x);
		});
		
		$("#slides .prev").click(function() {
			return chSlide("r", x);
		})*/
		
		/*$('.tab-area-main-tabs-1 p').mouseenter(function(){*/
				// console.log(active);
			/*return hoverer("r", x,$(this).index());*/
		// }
		/*});
		var slideTime = setInterval(function(){hoverer("n", x)}, 3000);

		$(this).mouseenter(function(){clearInterval(slideTime);}).mouseleave(function(){slideTime = setInterval(function(){hoverer("n", x)}, 3000);});
	
};*/

$(document).ready(function() {
/*if($('.tab-area-main-tabs-1').length > 0)
	$('.tab-area-main-tabs-1').switchArea();*/
	
	function hov(ob) {
		
	}
$('.tab-area-main-tabs-1').mouseenter();
// Tab area 1	
	$('.tab-area-main-tabs-1 p').on("mouseenter",function(){
		if ( $(this).hasClass('tab-area-tab-active') ) {
			return;
		} else {
			$('.tab-area-box-1 p').removeClass('tab-area-tab-active');
			$(this).addClass('tab-area-tab-active');
		}
	});

$("div.container div.tab-area-main-tabs-1").on("mouseenter","p",function(){
	var pix;
	if ($(this).hasClass("tab-area-1-first-tab")) {pix="83px"}
	if ($(this).hasClass("tab-area-1-second-tab")) {pix="245px"}
	if ($(this).hasClass("tab-area-1-third-tab")) {pix="400px"}
	$('.tab-chooser').removeClass().addClass('tab-chooser').animate({left: pix}, 100);
});


/*$("div.container div.tab-area-main-tabs-1").on("mouseout","p",function(){
	return hoverer("r", x,$(this).index());
}*/
	// Tab area 2
	
/*	$('.tab-area-box-2 p').hover(function(){
		
		if ( $(this).hasClass('tab-area-tab-active') ) {
			return;
		} else {
			$('.tab-area-box-2 p').removeClass('tab-area-tab-active');
			$(this).addClass('tab-area-tab-active');
		}
	
	});

	$('.tab-area-2-first-tab').hover(function(){
		$('.tab-area-image-box-2').children('img').attr('src', 'img/tabs-img-2-01.png');
	});
	$('.tab-area-2-second-tab').hover(function(){
		var imageSrc = $('.tab-area-image-box-2').children('img').attr('src', 'img/tabs-img-2-02.png');
	});
	$('.tab-area-2-third-tab').hover(function(){
		var imageSrc = $('.tab-area-image-box-2').children('img').attr('src', 'img/tabs-img-2-03.png');
	});

	// Footer-form1 validate

		$(".free-consultation").submit(function() {
			
			var passed = true;
			var icount = 0;
			var e = $(this);
			var fname = e.attr("name");
			var res;

			$(".free-consultation[name="+fname+"] input[type='text']").each(function() {
				var inptype = $(this).attr("name");
				var inpvalue = $(this).val();
				
				res = inputValidate(inptype, inpvalue);
				if (res === undefined) {
					$(this).addClass("notvalid");
					passed = false;
					return false;
				}
			});

			if (passed) {
				$('.hidden-form-box').css({'display':'block'}).animate({'opacity':'1'}, 200);
				$("body").delay(300).css({'overflow':'hidden'});
			}
			return false;
		});

		$(".free-consultation input[type='text']").focus(function() {
			$(this).removeClass("notvalid");
		});

	function inputValidate(type, val) {
		var passed = false;
		
		switch (type) {
			case "name":
				var pattern = new RegExp(/^[а-яА-ЯёЁ]{1,15}$/);
				passed = pattern.test(val); 
				break
			case "phone":
				var pattern =  new RegExp(/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{6,10}$/);
				passed = pattern.test(val); 
				break
		}

	if (passed) return true;

	}

	// Footer form to hidden-footer-form

	$('.hidden-form-button, .close-form-hidden, .hidden-form-divider').click(function(){
		$('.hidden-form-box').animate({'opacity':'0'}, 200, function(){
			$(this).css({'display':'none'});
			$("body").delay(300).css({'overflow':'initial'});
		});
		return false;
	});
	
	// Comparison area

	$('.comparison-point, .table-icon-question').hover(function(){
		$(this).children('.tool-tip-box').css('display', 'block').animate({'opacity': '1'}, 300);
	}, function(){
		$(this).children('.tool-tip-box').animate({'opacity': '0'}, 300, function(){
			$(this).css('display', 'none');
		})
	});
*/
});