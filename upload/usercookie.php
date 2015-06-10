<?php
$visitCounter = 0; // верхнюю часть писать до всего кода, т.к. куки
if (isset($_COOKIE["visitCounter"]))
	$visitCounter = $_COOKIE["visitCounter"];
$visitCounter++;
if (isset($_COOKIE["lastVisit"]))
	$lastVisit = $_COOKIE["lastVisit"];
setcookie("visitCounter",$visitCounter,time()+30000);

setcookie("lastVisit",date("d-m-Y H-i-s"),time()+30000);

echo "<h1>Подсчет визитов</h1>";

if ($visitCounter==1) echo "Добро пожаловать!";
else {
	echo "Вы пришли в $visitCounter раз <br>";
	echo "Последнее посещение: $lastVisit";
}
?>