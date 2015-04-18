
<?php
$result = $news -> getNews();
if (!is_array($result)) {
	$errMsg = 'Произошла ошибка при выводе ленты';
}else{
echo "Всего последних новостей - ".count($result);
foreach ($result as $value) {
	$id = $value['id'];
	$title = $value['title'];
	$cat = $value['category'];
	$desc = nl2br($value['description']);
	$dt = date('d-m-Y H-i-s', $value['datetime']);
	?>
	<hr>
	<h3><?=$title?></h3>
	<p><?=$desc."<br>[".$cat."] @ $dt</p>"?>
	<p align='right'>
	<a href='news.php?del=<?=$id?>'>Удалить</a>
	</p>
	<?php
}}
	?>
