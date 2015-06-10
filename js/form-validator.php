<h1>Проверка формы перед отправкой</h1>
<script>
	function checkForm() {
		var myform = document.myform;
		var elem = myform.elements;
		var isEmpty = false;
		for (var i = 0; i < elem.length; i++) {
			if (elem[i].type==='text') {
				if (elem[i].value==='') {
					elem[i].style.borderColor = 'red';
					isEmpty = true;
				} else {
					elem[i].style.borderColor = '';
				}
			} 
		}
		if (isEmpty) alert('Заполните все поля');
		else myform.submit();
	}
</script>
<form action="" id="myform" name="myform">
	<fieldset>
		<legend>Форма</legend>
		<div>
			<label for="txt1">Поле 1</label>
			<input type="text" name="p1" id="txt1">
		</div>
		<div>
			<label for="txt1">Поле 2</label>
			<input type="text" name="p2" id="txt2">
		</div>
		<div>
			<label for="txt1">Поле 3</label>
			<input type="text" name="p3" id="txt3">
		</div>
		<div>
			<label for="txt1">Поле 4</label>
			<input type="text" name="p4" id="txt4">
		</div>
		<div>
			<label for="txt1">Поле 5</label>
			<input type="text" name="p5" id="txt5">
		</div>
		<div>
			<a href="javascript:checkForm()">Передать форму</a>
		</div>
	</fieldset>
</form>