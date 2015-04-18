<div id="bottom">
<ul class="toplinks">
	<li><a href="?option=notes">Записки</a></li>
	<li><a href="?option=project">Проекты</a></li>
	<?php foreach ($footer as $value) { ?>
	<li><a href='?option=category&id=<?=$value['id']?>'><?=$value['name']?></a></li>
	<?php } ?>
</ul>
</div>
<div class='copy'>
	<span class='style1'>&copy; SuperWebmaster,  <?=date(Y)?><hr>Powered by <?=$_SERVER['SERVER_SOFTWARE']?></span>
</div>
</div>
</center>
<p style="margin-left: 0px;" id="back-top"><a href="#top"><span></span>Наверх</a></p>
</body>
</html>