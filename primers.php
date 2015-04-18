<?php
/*<h2 class="vision"><a href="http://localhost/wp/wordpress/wp-content/myphp/schoolportal/index.php" target="_blank">Смотреть демо >></a></h2>
<h2>Идея:</h2>
Собрать страницу php из кусочков - хэдер, футер, центральная часть.
<h2>Логика:</h2>*/








define("FILES_DIR","F:/openserv/OpenServer/domains/htdocs/createcms1/");

/*<h2 class="vision"><a href="http://localhost/wp/wordpress/wp-content/myphp/schoolportal/index.php" target="_blank">Как это выглядит</a></h2>
<h2>Логика</h2>
Основной файл - index.php, в него подключаются части - хедер (top.inc), меню (menu.inc), футер (bottom.inc), отдельно файл с функциями (lib.inc), файл с изменяемым меню (data.inc) и файл config.inc с константами*/
?>
<h2>Содержимое файлов:</h2>
<h3>index.php:</h3>
<div class="show_code">
<?php
if(file_exists(FILES_DIR."index.php")){
$f = file_get_contents(FILES_DIR."index.php");
$f = htmlspecialchars($f);
echo "<pre>".$f."</pre>";
} else {
echo "Файл ".FILES_DIR."index.php не найден";
}
?>
</div>

<!--

************
<table width="100%">
	<tr>
		<td align="center">
			<h1>Добро пожаловать на наш сайт!</h1>
			<?php
			if (!getMenu($topmenu, false))
			echo MY_ERR_ON_GETMENU;
			?>
		</td>
	</tr>
</table>

++++++++++++
<pre lang="xml">
</pre>
-->