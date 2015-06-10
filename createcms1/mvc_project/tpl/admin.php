<div id='mainarea'>
	<div id='main'>
		<p><a href='?option=add_articles'> >>> Добавить новую статью <<<</a>
		</p>
		<?php if ($_SESSION["res"]) {
		      echo $_SESSION["res"];
		      unset($_SESSION["res"]);
		    }
		foreach ($content as $value) { ?> 
		<p style='font-size: 15px;'>
			<a href="?option=update_articles&id=<?=$value['id']?>"><?=$value['title']?></a> | <a href="?option=delete_articles&del=<?=$value['id']?>">Удалить статью</a>
		</p>
		<?php } ?>
	</div>
</div>