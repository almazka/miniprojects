<?php
echo "<hr>"."<h1>Функция count своими руками</h1>";
function MyCount($item, $mode=0)
{
	if (is_null($item)) 
		return 0;
	if (!is_array($item))
		return 1;
		$lol = 0;
		foreach ($item as $key => $value) {
			if ($mode==1 and is_array($key))
				$lol += MyCount($key,1);
			$lol++;
		}
		return $lol;
	}
	$umma[] = 'lol';
	$umma[] = 'lol3';
	$umma[] = 'lol6';
	$umma[] = 'lol66';
$mik = MyCount($umma);
echo $mik;
?>