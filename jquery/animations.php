<!doctype html>
<html>
<head>
	<meta charset=utf-8>
	<title>Основы анимации</title>
	<script type="text/javascript"  src="jquery-1.11.1.min.js"></script>
	<script>
		$(function(){
			var content = $('div.content');
			var winW = $(window).width() / 2 - content.outerWidth() / 2;
			var winH = $(window).height() / 2 - content.outerHeight() / 2;
			$('.resize').on('click', function() {
				content.animate({
					'font-size':'+=2'
				});
			});
			$('.inbottom').on('click', function() {
				content.animate(
					{'font-size':'+=2'},
					{duration: 500}
				).animate({'top':300}, 3000);
			});
			$('.inbottomqueue').on('click', function() {
				content.animate(
					{'font-size':'+=2'},
					{duration: 500}
				).animate({'top':300}, {duration: 3000, queue:false});
			});
			$('.movecenter').on('click', function() {
				content.animate({
					'left': winW,
					'position': 'absolute'
				});
			});
			$('.diagcenter').on('click', function() {
				content.animate({
					'left': winW,
					'top': winH,
					'position': 'absolute'
				});
			});
			$('.rightbottom').on('click', function() {
				content.animate({
					'left': winW,
					'position': 'absolute'
				})
				.animate({'top': winH}, 3000);
			});
			$('.superbottom').on('click', function() {
				content.animate({
					'left': winW,
					'position': 'absolute'
				})
				.animate({'top': winH}, {duration:200, queue:false});
			});
			$('button').on('click', function() {
				
			});
			$('button').on('click', function() {
				
			});
			$('button').on('click', function() {
				
			});
		}); // end
	</script>
	<style>
		.content{
			width: 400px;
			background: yellow;
			padding: 2em;
			position: relative;
		}
	</style>
</head>
<body>
<p><button class="resize">Анимация увеличение текста</button></p>
<p><button class="inbottom">Увеличить текст и стечь вниз последовательно</button></p>
<p><button class="inbottomqueue">Увеличить текст и стечь вниз одновременно</button></p>
<p><button class="movecenter">Поехать до середины</button></p>
<p><button class="diagcenter">По диагонали в центр</button></p>
<p><button class="rightbottom">До середины и медленно вниз</button></p>
<p><button class="superbottom">Вжик вниз</button></p>
<p><button>Анимация</button></p>
<div class=content>
	<h1>Какой-то текст</h1>
	<p>
	Неспроста свинцовый сосуд мгновенно открывает квазиупругую колбу. Карусель быстра и кратковременна. Часто бывает, что ядерная лапка груба и продуманна. Очевидно, феноменальная шестерня брезентового комплекта бережно увеличивает тайную лампу. Изящное значение резко и метастабильно. Платиновая инерция перегоревшего изолятора образовывает разделение.
	</p>
</div>

<script>

</script>

</body>
</html>










