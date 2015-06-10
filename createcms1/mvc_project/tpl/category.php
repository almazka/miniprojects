<div id="mainarea">
<div id="main">
<?php foreach ($content as $value) { ?>
		<div class="post_preview">
			<h2><?=$value['title']?></h2>
			<p><?=$value['date']?></p>
			<p class="prev_img"><img style='margin-right:5px;' width='150px' align='left' src="<?=$value['img_src']?>"><?=$value['description']?></p>
			<p><a href="?option=view&id=<?=$value['id']?>">Читать далее...</a></p>
		</div>
		<?php } ?>
	</div>
</div>