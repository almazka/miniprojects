$(document).ready(function() {

	// Tab area 1
	
	$('.tab-area-box-1 p').hover(function(){
		
		if ( $(this).hasClass('tab-area-tab-active') ) {
			return;
		} else {
			$('.tab-area-box-1 p').removeClass('tab-area-tab-active');
			$(this).addClass('tab-area-tab-active');
		}
	
	});

	$('.tab-area-1-first-tab').hover(function(){
		$('.tab-chooser').removeClass().addClass('tab-chooser').animate({left: '83px'}, 100);
	});
	$('.tab-area-1-second-tab').hover(function(){
		$('.tab-chooser').removeClass().addClass('tab-chooser').animate({left: '245px'}, 100);
	});
	$('.tab-area-1-third-tab').hover(function(){
		$('.tab-chooser').removeClass().addClass('tab-chooser').animate({left: '400px'}, 100);
	});

	// Tab area 2
	
	$('.tab-area-box-2 p').hover(function(){
		
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

});