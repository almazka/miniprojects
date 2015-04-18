<?php
echo "<hr>"."<h1>Таблица умножения</h1>";
$cols = 10; // кол-во td
$rows = 10; // кол-во tr 
$color = 'yellow';
echo "<table align='center', border='1'>";
for ($tr=1; $tr<=$rows; $tr++) { 
	 echo "<tr>";
	 for ($td=1; $td<=$cols; $td++) { 
	 	if ($td==1 or $tr==1) {
	 		echo "<th style='background:$color'>".$tr*$td."</th>";
	 	} else {
	 		echo "<td>".$tr*$td."</td>";
	 	}
	 	
	 	
	 }
	 echo "</tr>";
}
echo "</table>";
?>