<!doctype html>
<html>
<head>
<title></title>
<script type="text/javascript"  src="jquery-1.11.1.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script>
$(function() {
	function toggle ($obj) {
		$obj.siblings('.button').removeAttr('disabled').end()
		.attr('disabled', 'disabled');
	}
	$('#show').on('click',function() {
		$('#box').show();
		toggle($(this));
	});
	$('#hide').on('click',function() {
		$('#box').hide();
		toggle($(this));
	});
$('#switch').on('click.a',function(){
	$('#box').toggle();
});
$('#box').on('click',function(){
	$('.button').trigger('click.a'); 
	$('.button').off('click');
});
$('#toggle').on('click',function(){
	$('#box').fadeToggle();
});

/*$('#toggle').on('click',function(){
	if ($('#box').is(':visible')) {
		$('#box').slideUp();
		$(this).text('Показать');
	} else {
		$('#box').slideDown();
		$(this).text('Скрыть');
	}
});*/
}); // end
</script>
</head>
<body>
<div class="leftpart">
	<h1>Две кнопки:</h1>
		<div>
			<i class="button" id="hide">Скрыть</i>
			<i class="button" id="show">Показать</i>
		</div>
	<h1>Одна кнопка:</h1>
	<i class="button" id="switch">Переключить</i>
	<h1>Плавно:</h1>
	<i class="button" id="toggle">Переключить</i>
</div>
<div class="rightpart" id="box">Клик на блок, чтобы удалить событие появления</div>

</body>
</html>