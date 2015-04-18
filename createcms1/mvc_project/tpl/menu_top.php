<ul class="toplinks">
	<li><a href="?option=main">Главная</a></li>
	<?php foreach ($menu_top as $value) { ?>
	<li><a href="?option=menu&id=<?=$value['id']?>"><?=$value['name']?></a></li>
<?php } ?>
<li><a href="?option=admin">Админка</a></li>
</ul>