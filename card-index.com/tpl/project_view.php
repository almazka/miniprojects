		<h2><?=$content['name']?></h2>
		<a href="<?=$content['file_view']?>" target="_blank">Демо</a>
		<?php 
		$end = "";
		if ($content['other_files']) {
			$end = "ы";
		}
		 ?>
		<h3>Файл<?=$end?> проекта:</h3>
		<ul class="fa-ul">
			<li><i class="fa-li fa fa-file-code-o fa-2x"></i><?=$content['file_view']?> | <i class="button-hider">Развернуть код файла</i>
			<div class="menu-fix-1275">
			<?php
			showCode($content['file_view']);
			?>
			</div>
			</li>
			<?php 
			if ($content['other_files']) {
				$other = string2array($content['other_files']);
				foreach ($other as $value) {?>
			 	<li><i class="fa-li fa fa-file-text-o fa-2x"></i><?=$value?> | <i class="button-hider">Развернуть код файла</i>
				<div class="menu-fix-1275">
				<?php
				showCode($value);
				?>
			 	</div>
			 	</li>
			<?php }} ?>
			</ul>
		</p>
		<p></p>
	</div>
</div>