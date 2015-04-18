<?php
session_start();
$nChars = 5;
$randStr = substr(md5(uniqid()), 0, $nChars);
$_SESSION["randStr"] = $randStr;
$img = imagecreatetruecolor(220, 50);
$color = imagecolorallocate($img, 50, 100, 123);
imageantialias($img, true);
$x = 20; $y = 30; $delta = 40;
for ($i=0; $i < $nChars; $i++) { 
	$size = rand(18,30);
	$angle = -30 + rand(0,60);
	imagettftext($img, $size, $angle, $x, $y, $color, "arial.ttf", $randStr{$i});
	$x += $delta;
}
header("Content-Type: image/png");
imagepng($img);
?>