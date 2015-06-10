<div id="bottom">
	<ul class="toplinks">
	<li><a href="?option=main">Главная</a></li>
	<?php foreach ($footer as $value) { ?>
	<li><a href='?option=menu&id=<?=$value['id']?>'><?=$value['name']?></a></li>
	<?php } ?>
	</ul>
</div>
<div class='copy'>
	<span class='style1'>&copy; SuperWebmaster,  <?=date(Y)?><hr>Powered by <?=$_SERVER['SERVER_SOFTWARE']?></span>
</div>
</div>
</center>
</body>
</html>