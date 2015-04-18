<script>
	name = 'Я - главное окно';
	var win;

	function win_open() {
		var w = 300, h = 200;
		var l = (screen.width - w) / 2;
		var t = (screen.height - h) / 2;
		var p = 'width='+w+', height='+h+', left='+l+', top='+t;
		win = window.open("window-open-new.php", '', p);
	}
	function win_close() {
		if (win && !win.closed) {
			win.focus();
			win.close();
		}
		
	}
	function win_move() {
		if (win && !win.closed) {
			win.focus();
			win.moveBy(50,50);
		}

	}
</script>
<p><a href="javascript:win_open();">Открыть окно</a></p>
<p><a href="javascript:win_close();">Закрыть окно</a></p>
<p><a href="javascript:win_move();">Начать движуху</a></p>