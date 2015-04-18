<?php
/* Задание 1
- опишите функцию-обработчик начальных тегов
- опишите функцию-обработчик закрывающих тегов
- опишите функцию-обработчик текстового содержимого
- создайте парсер
- зарегистрируйте функции-обработчики
*/
$parser = xml_parser_create("UTF-8");
function OnStart($xml,$tag,$attr)
{
	if ($tag != "CATALOG" and $tag !="BOOK") {
		echo "<td>";
	}
	if ($tag == "BOOK") {
		echo "<tr>";
	}
}
function OnEnd($xml,$tag)
{
	if ($tag != "CATALOG" and $tag !="/BOOK") {
		echo "</td>";
	}
	if ($tag == "BOOK") {
		echo "</tr>";
	}
}
function OnText($xml,$data)
{
	echo $data;
}
xml_set_element_handler($parser, "OnStart", "OnEnd");
xml_set_character_data_handler($parser, "OnText");

?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 5 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
	<title>Каталог</title>
</head>
<body>
	<h1>Каталог книг</h1>
	<table border="1", width="100%">
		<tr>
			<th>Автор</th>
			<th>Название</th>
			<th>Год издания</th>
			<th>Цена, руб</th>
		</tr>
		<?php
		$doc_xml = file_get_contents("catalog.xml");
		xml_parse($parser, $doc_xml);
		?>
	</table>
</body>
</html>