<?php
include "config.php";

$db = sqlite_open(BASE_NAME);
if (!$db) {
	exit('Error '.sqlite_error_string(sqlite_last_error($db)));
}
echo "БД ".BASE_NAME." создана...";
sqlite_close($db);
?>