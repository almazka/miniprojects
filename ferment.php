<?php
?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<link rel="stylesheet" type="text/css" href="template_styles.css">
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<title>Картина ферментов</title>
</head>
<body>
<h1>Заполнение базы</h1>

<form class="formferment" action="save2ferments.php" method="POST">
<h2>Сегодня было съедено</h2>
<hr width="20%" align="left">
<div class="number_of_eat">
<b>В граммах:</b><input type="text" name="fichname" />
</div>
<div class="radiolive">
<input type="radio" name="live-no" id="liveid" value="live"><label for="liveid">Живая пища</label><br>
<input type="radio" name="live-no" value="dead" id="deadid" checked=""><label for="deadid">Не живая пища</label>
</div>
<input type="submit" class="graybutton">
</form>
<hr width="20%" align="left">
<div class="view_days">
	<h2>число мес год</h2>
	<table  cellspacing="0" border="2" class="table_ferment">
		<tr>
		<th>Количество<br>живой пищи</th>
		<th>Количество<br>мертвой пищи</th>
		</tr>
		<tr>
			<td>000 гр</td>
			<td>000 гр</td>
		</tr>
	</table>
	<hr width="20%" align="left">
	<h2>число мес год</h2>
	<table cellspacing="0" border="2" class="table_ferment">
		<tr>
		<th>Количество<br>живой пищи</th>
		<th>Количество<br>мертвой пищи</th>
		</tr>
		<tr>
			<td>000 гр</td>
			<td>000 гр</td>
		</tr>
	</table>
	---
	<!--Тут таблица пусть повторяется, выводятся 5 последних дней -->
</div>
<?php

		    

?>
</body>
</html>