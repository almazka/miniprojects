<?php
/* Фишка в том, что описание объекта SomeObject находится в файле одноименном с расширением php, он его сам ищет в папке и как бы на лету инклюдит */
spl_autoload_extensions('.php');
spl_autoload_register();
$obj = new SomeObject();
?>