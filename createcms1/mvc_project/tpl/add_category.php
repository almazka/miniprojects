<div id='mainarea'>
	<div id='main'>
	<?php if ($_SESSION["res"]) {
	echo $_SESSION["res"];
	unset($_SESSION["res"]);}?>
	<form action='' method='POST'>
	<p>Заголовок нового пункта категории:<br />
	<input type='text' name='name' style='width:420px;'>
	</p>
	<p><input type='submit' name='button' value='Сохранить'></p></form>
	</div>
</div>