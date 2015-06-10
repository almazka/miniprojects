<script>
	var main = 'Я - переменная майн главного окна';
	function f() {
		//alert(window.main);
		//alert(frames.length); // количество внутренних элементов iframe
		var z = frames[0]; // ссылка на первый оконный элемент iframe
		var w = frames.content.example; // значение переменной example внутреннего окна
		var w = frames.content.g(); // вызываем функцию g из внутреннего окна
	}
	function g() {
		alert(main);
	}
</script>
<p><a href="javascript:f()">Кликни здесь раз</a></p>
<iframe src="window-parent2.php" name='content' frameborder="0"></iframe>
