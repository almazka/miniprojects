<?
define(DB_NAME, 'e:\databases\test-test.db');
$db = new SQLite3(DB_NAME);

	$sql = "CREATE TABLE articles (
						id INTEGER PRIMARY KEY AUTOINCREMENT,
						title TEXT,
						description TEXT,
						text TEXT,
						date INTEGER,
						img_src TEXT)";
	
	$db-> exec($sql) or die($db->lastErrorMsg());
	
	$sql = "CREATE TABLE category (
							id INTEGER PRIMARY KEY AUTOINCREMENT,
							name TEXT)";
	
	$db-> exec($sql) or die($db->lastErrorMsg());
	
	$sql = "CREATE TABLE menu (
							id INTEGER PRIMARY KEY AUTOINCREMENT,
							name TEXT,
							text TEXT)";
	$sql = "CREATE TABLE users (
							id INTEGER PRIMARY KEY AUTOINCREMENT,
							username TEXT,
							password )";
	
	/*$sql = "INSERT INTO category(id,name)
			SELECT 1 as id, 'Политика' as name
			UNION SELECT 2 as id, 'Культура' as name
			UNION SELECT 3 as id, 'Спорт' as name";
	
	$db-> exec($sql) or die($db->lastErrorMsg());*/

if (DB_NAME) {
	echo "База данных создана.";
}
?>