		<?php  if ($_SESSION["res"]) {
		echo $_SESSION["res"];
		unset($_SESSION["res"]);
		}
		?>
		<form enctype='multipart/form-data' action='' method='POST'>
			<p>Название проекта:<br />
			<input type='text' name='name' style='width:420px;'>
			</p>
			<p>Название папки:<br />
			<input type='text' name='namefolder' style='width:420px;'>
			</p>
			<p>Ключевой файл для демо:<br />
			<input type='file' name='file_view'>
			</p>
			<p>Другие файлы:<br />
			<input type='file' name='userfile[]' multiple='true'>
			</p>
			<p>Теги:<br />
			<input type='text' name='tags' style='width:420px;'>
			</p>
			<p>Рубрика:
			<select name='categ'>
			<?php  foreach ($categ as $value) { ?>
			<option value='<?=$value['id']?>'><?=$value['name']?></option>
			<?php } ?>
			</select>
			</p>
			<p><input type='submit' name='button' value='Сохранить'></p>
		</form>
	</div>
</div>