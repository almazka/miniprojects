		<p class="add"><a href='?option=add_notes'> >>> Добавить новую заметку <<<</a>
		</p>
		<?php if ($_SESSION["res"]) {
		      echo $_SESSION["res"];
		      unset($_SESSION["res"]);
		    }
		foreach ($content as $value) { ?> 
		<p>
			<a href="?option=update_notes&id=<?=$value['id']?>"><?=$value['title']?></a> | <a class="del" href="?option=delete_notes&del=<?=$value['id']?>">Удалить статью</a>
		</p>
		<?php } ?>
	</div>
</div>