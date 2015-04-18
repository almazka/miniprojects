		<?php
		if ($_SESSION["res"]) {
		echo $_SESSION["res"];
		unset($_SESSION["res"]);}
		?>
		<form enctype='multipart/form-data' action='' method='POST'>
			<p>Заголовок:<br />
			<input type='text' name='title' style='width:420px;' value="<?=$content['title']?>">
			<input type='hidden' name='id' style='width:420px;' value="<?=$content['id']?>">
			</p>
			<p>Текст:<br />
			<textarea name='text' cols='50' rows='7'><?=trim($content['text'])?>
			</textarea>
			</p>
			<p>Рубрика:<br />
			<select name='categ'>
			<?php  	foreach ($categ as $value) {
					if ($content['category_id'] == $value['id']) {?>
					<option selected value="<?=$value['id']?>"><?=$value['name']?>
					</option>
					<?php } else { ?>
					<option value="<?=$value['id']?>"><?=$value['name']?>
					</option>
					<?php }} ?>
			</select>
			</p>
			<p><input type='submit' name='button' value='Сохранить'></p>
		</form>
	</div>
</div>