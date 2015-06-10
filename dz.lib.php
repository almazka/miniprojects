<?php
define('DB_HOST', 'localhost');
define('DB_LOGIN', 'mysql');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'fichi');
mysql_connect(DB_HOST,DB_LOGIN,DB_PASSWORD);
mysql_select_db(DB_NAME) or die(mysql_error());
$uploaddir = 'upload/';
if ($_FILES['filephp']['error']==0 && $_FILES['fileimg']['error']==0) {
			$tempphp = $_FILES['filephp']['tmp_name'];
			$tempimg = $_FILES['fileimg']['tmp_name'];
		    $namephp = $_FILES['filephp']['name'];
		    $nameimg = $_FILES['fileimg']['name'];
		    move_uploaded_file($tempphp, $uploaddir.$namephp);
		    move_uploaded_file($tempimg, $uploaddir.$nameimg);
		}
if (!empty($_POST['fichname'])) {
  $fn = $_POST['fichname'];
 }
function save($fn, $namephp, $nameimg)
{
	$sql = "INSERT INTO maintable (trixname,link,image) VALUES('$fn', '$namephp', '$nameimg')";
	mysql_query($sql) or die(mysql_error());
}
function db2array($data)
{
	$arr = array();
	while ($row = mysql_fetch_assoc($data)) {
		$arr[] = $row;
	}
	return $arr;
}
function myFichi()
	{
		$sql = "SELECT trixname,link,image FROM maintable";
		$result = mysql_query($sql) or die(mysql_error());
		return db2array($result);
	}
?>