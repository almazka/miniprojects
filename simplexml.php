<?php
	$sxml = simplexml_load_file("catalog.xml")
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
			foreach ($sxml->book as $book) {
				echo "<tr>";
				echo "<td>".$book->author."</td>";
				echo "<td>".$book->title."</td>";
				echo "<td>".$book->pubyear."</td>";
				echo "<td>".$book->price."</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>