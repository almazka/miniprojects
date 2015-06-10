<div class="menu_left">
	<div id="spacer" style="margin-bottom:15px;">
		<div id="rc-bg"></div>
	</div>
	<h2>Облако тегов:</h2>
	<ul class='quick-links'>
	<?php foreach ($left_bar as $value) { ?>
		<li><a href='?option=category&id=<?=$value['id']?>'><?=$value['name']?></a></li>
	<?php } ?>
	</ul>
</div>