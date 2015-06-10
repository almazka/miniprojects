<script>
	function h() {
		var f = document.search;
		console.log(f.elements);
	}
</script>
<form action="http://google.ru/search" target="_blank" name="search">
	<fieldset>
		<legend>Я ищу</legend>
		<div>
		<label><span>Слово</span><input type="text" name="q" value="Уарабей"></label>
		</div>
	</fieldset>
	<div>
		<a href="javascript:h()">Кликнуть</a>
		<button type="submit">Отправить</button>
		<button type="reset">Сбросить</button>
	</div>
</form>