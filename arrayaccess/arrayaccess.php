<?php
/*class Db
{
	private $_db;
	function __construct()
	{
		$this->_db = new SQLiteDatabase('users.db');
	}
	function userExists($name)
	{
		return (boolean)$this->_db->query("SELECT count(*) FROM users WHERE name='$name'");
	}
	function getUserId($name)
	{
		$result = $this->_db->arrayQuery("SELECT inn FROM users WHERE name='name'");
		return $result[0][0];
	}
	function setUserId($name, $inn)
	{
		$this->_db->query("INSERT INTO users VALUES('$name', $inn)");
	}
	function removeUser($name)
	{
		$this->_db->query("DELETE FROM users WHERE name='$name'");
	}
}
class UserToInn implements ArrayAccess
{
	private $_db;
	function __construct()
	{
		$this->_db = new Db();
	}
	function __destruct()
	{
		unset($this->_db);
	}
	function offsetExists($name)
	{
		return $this->_db->userExists($name);
	}
	function offsetUnset($name)
	{
		$this->_db->removeUser($name);
	}
	function offsetSet($name, $inn)
	{
		$this->_db->setUserId($name, $inn);
	}
	function offsetGet($name)
	{
		return $this->_db->getUserId($name);
	}
}
$obj = new UserToInn();
if (isset($obj['John'])) {
	echo $obj['John'];
}
*/

/* в итоге с объектом работать можно как с массивом  */
class Book implements ArrayAccess
{
	private $_props = array();
	function offsetExists($item)
	{
		return isset($this->_props[$item]);
	}
	function offsetUnset($item)
	{
		unset($this->_props[$item]);
	}
	function offsetSet($item, $value)
	{
		$this->_props[$item] = $value;
	}
	function offsetGet($item)
	{
		return $this->_props[$item];
	}
}
$book = new Book;
$book['title'] = 'Алиса в стране чудес';
if (isset($book['title']))
	echo $book['title']."<br>";
unset($book['title']);
$book['title'] = 'Php5';
$book['author'] = 'John Smith';
$book['isbn'] = '87896896976';
print_r($book);
?>