		<?php  if ($_SESSION["res"]) {
		echo $_SESSION["res"];
		unset($_SESSION["res"]);
		}
		?>
		<form enctype='multipart/form-data' action='' method='POST'>
			<p>Заголовок статьи:<br />
			<input type='text' name='title' style='width:420px;'>
			</p>
			<p>Текст:<br /> ВНИМАНИЕ! НЕ ИСПОЛЬЗОВАТЬ ОДИНАРНЫЕ КАВЫЧКИ!
			<textarea name='text' cols='50' rows='7'></textarea>
			</p>
			<p>Теги:<br />
			<input type='text' name='tags' style='width:420px;'>
			</p>
			<select name='categ'>
			<?php  foreach ($categ as $value) { ?>
			<option value='<?=$value['id']?>'><?=$value['name']?></option>
			<?php } ?>
			</select>
			<p><input type='submit' name='button' value='Сохранить'></p>
		</form>
	</div>
</div>