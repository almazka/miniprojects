<?php
echo "<hr>"."<h1>Меню через функцию</h1>";
$usermenu = array(
'Home' => 'index.php',
'About' => 'about.php',
'Practise' => 'pract.php',
'Results' => 'res.php',
'Contacts' => 'cont.php'
	);
$usermenuHorizont = array(
'HomeH' => 'index.php',
'AboutH' => 'about.php',
'PractiseH' => 'pract.php',
'ResultsH' => 'res.php',
'ContactsH' => 'cont.php'
	);
function Fun2Menu($usermenu, $vertical=true)
{
$styleHorizont = '';
if (!$vertical) {
	$styleHorizont = ' style="display:inline; margin:15px"';
}
echo '<ul style="list-style-type:none">';
foreach ($usermenu as $key=>$value) {
	echo "<li$styleHorizont><a href='http://lol.ru/$value'>$key</a></li>";
}
echo "</ul>";
}
?>
<center> <?=Fun2Menu($usermenu);
Fun2Menu($usermenuHorizont,false);?></center>