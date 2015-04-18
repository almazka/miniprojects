<?php
echo "<hr>"."<h1>Функция отрисовки и подсчета</h1>";
function FunTable($cols=10, $rows=10, $color='yellow')
{
	static $cnt=0;
	$cnt++;
	echo "Таблица рисуется $cnt раз";
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
}
FunTable(3,3,'red');
FunTable(4,4,'green');
FunTable();
FunTable(6,6,'#796444');
FunTable(8,8,'#cecece');
?>