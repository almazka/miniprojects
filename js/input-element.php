<script>
	function h() {
		var f = document.myform.elements.email;
		console.log(f);
		console.log(f.form.method);
		console.log(f.value);
		
	}
</script>
<form action="" name="myform" method="post">
<input type="hidden" name="userid" value="12345">
	<fieldset>
		<legend>Однострочные</legend>
		<div>
		<label><span>E-mail:</span><input type="text" name="email" value="vasya@ty.ru"></label>
		</div>
		<div>
			<label><span>Пароль</span><input type="password" name="pass"></label>
		</div>
	</fieldset>
	<fieldset><legend>Многострочные</legend></fieldset>
	<div>
		<label><span>Обо мне</span><textarea name="about"></textarea></label>
	</div>
	<div>
		<a href="javascript:h()">Кликнуть</a>
		<button type="submit">Отправить</button>
		<button type="reset">Сбросить</button>
	</div>
</form>