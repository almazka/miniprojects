<?php
if (mail("almazka@flylady.su", "Проверка", "Проверяем отправку")) {
	echo "Отправлено";
}
else {
	echo "Нет";
}
?>