	<?php foreach ($content as $value) { ?>
		<h2><?=$value['title']?></h2>
		<p class='textarea'><img style='margin-right=5px;' src="<?=$value['img_src']?>"></p>
		<p><?=$value['text']?></p>
<?php } ?>
	</div>
</div>