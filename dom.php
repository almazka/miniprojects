<?php
$dom = new DomDocument();
$dom->load("catalog.xml");
$root = $dom->documentElement;

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
			foreach ($root->childNodes as $book) {
				if ($book->nodeType == 1) {
					echo "<tr>";
						foreach ($book->childNodes as $childBook) {
							if ($childBook->nodeType == 1) {
								echo "<td>".$childBook->textContent."</td>";
							}
							
						}
					echo "</tr>";
				}
			}
		?>
	</table>
</body>
</html>