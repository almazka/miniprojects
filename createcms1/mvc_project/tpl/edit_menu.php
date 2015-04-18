<div id='mainarea'>
	<div id='main'>
		<p><a href='?option=add_menu'> >>> Добавить новый пункт меню <<<</a></p>
		<?php  	if ($_SESSION["res"]) {
				echo $_SESSION["res"];
				unset($_SESSION["res"]);
			}
			foreach ($content as $value) { ?>
			<p style='font-size: 15px;'>
			<a href="?option=update_menu&id=<?=$value['id']?>"><?=$value['name']?></a> | <a href="?option=delete_menu&del=<?=$value['id']?>">Удалить пункт</a></p>
			<?php } ?>
	</div>
</div>