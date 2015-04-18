<?php
$menu = array('Home' => 'index.php',
				'About' => 'about.php',
				'Contact' => 'contact.php',
				'Links' => 'links.php');
	/*
	Задание
	Отрисовать навигационное меню на странице, типа
		<a href="contact.php">Contact</a>
	используя массив в качестве структуры меню
	
	Задание 1 
	- Создайте ассоциативный массив $menu
	- Заполните массив соблюдая следующие условия:
		- Название ячейки является пунктом меню, например: Home, About, Contact...
		- Значение ячейки является именем файла, на который будет указывать ссылка, например: index.php, about.php, contact.html...
	*/
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Меню</title>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
</head>
<body>
	<h1>Меню</h1>
	<?php
	foreach ($menu as $item => $value) {
		echo "<a href='$value'>$item</a><br>";
	}
	/*
	Задание 2
	Используя цикл foreach отрисуйте вертикальное меню, структура которого описана в массиве $menu
	*/
	?>
</body>
</html>
