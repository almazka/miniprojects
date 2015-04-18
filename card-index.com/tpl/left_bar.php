<div class="category_left">
	<h2>Теги:</h2>
	<ul class='quick-links'>
	<?php foreach ($left_bar as $value) { ?>
		<li><a href='?option=tags&id=<?=$value['id']?>' title="Записей: <?=$value['count']?>"><?=$value['name']?></a></li>
	<?php } ?>
	</ul>
</div>
<div id="mainarea">
	<div id='main'>
		<a class="prev" onclick="window.history.back();"><< Вернуться назад</a>
