	<h1>Нельзя менять имя и добавлять новые теги, можно только удалять</h1>
		<p class="add"><a href='?option=add_tags'> >>> Добавить новые теги <<<</a></p>
		<?php if ($_SESSION["res"]) {
		echo $_SESSION["res"];
		unset($_SESSION["res"]);}
		foreach ($content as $value) {?>
		<p style='font-size: 15px;'><a href="?option=update_tags&id=<?=$value['id']?>"><?=$value['name']?></a> | <a href="?option=delete_tags&del=<?=$value['id']?>">Удалить пункт</a></p>
		<?php } ?>
	</div>
</div>