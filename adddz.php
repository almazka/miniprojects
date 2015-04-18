<?php
?>
<!DOCTYPE html PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\" \"http://www.w3.org/TR/html4/loose.dtd\">
<html>
<head>
<link rel="stylesheet" type="text/css" href="template_styles.css">
<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\">
<title>Страница загрузки</title>
</head>
<body>
<h1>Загрузи новые фичи</h1>
<div>
<form action="save2dz.php" method="POST" enctype="multipart/form-data">
<h2>Название фичи: </h2>
<input type="text" name="fichname" />
<hr width="40%" align="left">
<h2 style="display:inline">Файл php: </h2> <input type="file" name="filephp">
<hr width="40%" align="left">
<h2 style="display:inline">Файл авки: </h2><input type="file" name="fileimg">
<hr width="40%" align="left">
<input type="submit">
</form>
</div>
<a href="dz.php">Вернуться на страницу с фичами >>></a>
<?php

		    

?>
</body>
</html>