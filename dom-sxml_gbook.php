<?php
header("Content-Type: text/html; charset=utf-8");
define("FILE_XML", "filedoc.xml");
if ($_SERVER["REQUEST_METHOD"] == POST) {
	$name = stripcslashes(trim(strip_tags($_POST['name'])));
	$email = stripcslashes(trim(strip_tags($_POST['email'])));
	$msg = stripcslashes(trim(strip_tags($_POST['msg'])));
	$ip = $_SERVER["REMOTE_ADDR"];
	$dt = time();
	
$dom = new DOMDocument ("1.0","utf-8");
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
if (!file_exists(FILE_XML)) {
	$root = $dom->createElement("users");
	$dom->appendChild($root);
} else {
	$dom->load(FILE_XML);
	$root = $dom->documentElement;
}
$n = $dom->createElement("name",$name);
$e = $dom->createElement("email",$email);
$m = $dom->createElement("msg",$msg);
$i = $dom->createElement("ip",$ip);
$d = $dom->createElement("dt",$dt);
$user = $dom->createElement("user");
$user->appendChild($n);
$user->appendChild($e);
$user->appendChild($m);
$user->appendChild($i);
$user->appendChild($d);
$root->appendChild($user);
$dom->save(FILE_XML);
header("Localion: dom-sxml.php.php");exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
  <title>Гостевая книга</title>
</head>
<body>

<h1>Гостевая книга</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя:<br />
<input type="text" name="name" /><br />
Ваш E-mail:<br />
<input type="text" name="email" /><br />
Сообщение:<br />
<textarea name="msg" cols="50" rows="5"></textarea><br />
<br />
<input type="submit" value="Добавить!" />
</form>
<?php
if (file_exists(FILE_XML)) {
	$smxl = simplexml_load_file(FILE_XML);
	$users = (array)$smxl;
	if (is_array($users["user"])) {
		$users = array_reverse($users["user"]);
	} else {
		$users = (array)$users["user"];
	}
	
foreach ($users as $user) {
	$dateuser = date("d-m-Y H:i:s", "$user->dt");
	$msg = nl2br($user->msg);
	echo <<<LABEL
		<hr>
		<p>
		<a href="mailto:{$user->email}">{$user->name}</a> from [{$user->ip}] @ {$dateuser}<br>
		{$msg}
		</p>
LABEL;
}
}

?>
</body>
</html>