	<?php if ($_SESSION["res"]) {
	echo $_SESSION["res"];
	unset($_SESSION["res"]);}?>
	<form action='' method='POST'>
	<p>Заголовок нового тега:<br />
	<input type='text' name='tags' style='width:420px;'>
	</p>
	<p><input type='submit' name='button' value='Сохранить'></p></form>
	</div>
</div>