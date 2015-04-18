		<p class="add"><a href='?option=add_project'> >>> Добавить новый проект <<<</a>
		</p>
		<?php if ($_SESSION["res"]) {
		      echo $_SESSION["res"];
		      unset($_SESSION["res"]);
		    }
		foreach ($content as $value) { ?> 
		<p>
			<a href="?option=update_project&id=<?=$value['id']?>"><?=$value['name']?></a> | <a class="del" href="?option=delete_project&del=<?=$value['id']?>">Удалить проект</a>
		</p>
		<?php } ?>
	</div>
</div>