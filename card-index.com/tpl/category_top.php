<ul class="toplinks">
	<li><a href="?option=notes">Записки</a></li>
	<li><a href="?option=project">Проекты</a></li>
	<?php foreach ($footer as $value) { ?>
	<li><a href='?option=category&id=<?=$value['id']?>'><?=$value['name']?></a></li>
	<?php } ?>
</ul>