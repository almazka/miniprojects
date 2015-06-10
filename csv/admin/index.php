<?php 
define('FILENAME', "../messages.csv");

if (isset($_GET['del'])) {
	$del_id = $_GET['del'];
	$array = array();
	if (($handle = fopen(FILENAME, "r")) !== FALSE) {
		$r = 0;
		while (($data = fgetcsv($handle)) !== FALSE) {
			if ($r == $del_id) {
				unset($data);
			}
				$r++;
				$array[] = $data;
		}
	}
	$fp = fopen(FILENAME, 'a');
	file_put_contents(FILENAME, '');
		foreach ($array as $fields) {
			fputcsv($fp, $fields);
		}
	fclose($fp);
	header("Location: index.php");
	exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
	<meta name="viewport" content="minimal-ui">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="Описание сайта для поисковых систем">
	<link rel="icon" href="../favicon.ico">
	<title>Admin</title>
	<link href="../css/bootstrap.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body class="admin">
<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Robb Armstrong Site</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="../profile.php">Profile</a></li>
						<li><a href="../blog.php">Blog</a></li>
						<li class="active"><a href="../contact.php">Contact</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>

		<div class="container">

			<div class="starter-template">
				<h1>Административная панель</h1>
				<p class="lead">Сообщения пользователей</p>
			</div>

<table class="table table-bordered table-hover">
	<tr class="info">
		<th>Имя</th>
		<th>E-mail</th>
		<th>Сайт</th>
		<th>Сообщение</th>
		<th></th>
	</tr>

<?php

$row = -1;
if (($handle = fopen(FILENAME, "r")) !== FALSE) {
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				echo "<tr>";
				$row++;
				for ($c=0; $c < $num; $c++) {
					echo "<td>".$data[$c]."</td>";
				}
				echo "<td><a href='index.php?del=".$row."' class='btn btn-success'>Удалить</a></td>";
				echo "</tr>";
		}
		fclose($handle);
}
?>
</table>
</div><!-- /.container -->


<script src="../js/jquery-1.11.2.min.js"></script>
<script src="../js/scripts.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>