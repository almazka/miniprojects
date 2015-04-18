	<ul class="all_view">
	<?php foreach ($content as $value) { ?>
		<li><a href="?option=notes_view&id=<?=$value['id']?>"><?=$value['title']?></a></li>
	<?php } ?>
	</ul>
	</div>
</div>