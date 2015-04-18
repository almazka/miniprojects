<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Кнопки</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript">
var count = 0;
function f() {
	count++;
	var b = document.forms[0].bView;
	var i = document.forms[0].iView;
	i.value = 'Кликов: ' + count;
	b.textContent = 'Кликов: ' + count;
}
</script>
</head>
<body>
<form action="">
	<fieldset>
		<legend>Кнопки</legend>
		<div class="block">
			<button type="button" name='bView'>Кликов: 0</button>
			<input type="text" name='iView' value="Кликов: 0"/>
			<button type="button" name='click'><a href="javascript:f();">Кликнуть</a></button>
		</div>
	</fieldset>
</form>
</body>
</html>