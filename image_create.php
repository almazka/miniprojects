<?php
//$img = imagecreatetruecolor(500, 300);
$img = imagecreatefrompng(filename);
imageantialias($img, true);
$red = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$blue = imagecolorallocate($img, 0, 0, 255);
$black = imagecolorallocate($img, 0, 0, 0);
$silver = imagecolorallocate($img, 192, 192, 192);
$white = imagecolorallocate($img, 255, 255, 255);
// imageline($img, 20, 40, 80, 250, $white);
imagefilledrectangle($img, 100, 100, 200, 200, $red);

/*
$points = array(0,0,100,200,300,200);
imagepolygon($img, $points, 3, $green);
imageellipse($img, 200, 150, 70, 60, $black);
imagefilledarc($img, 100, 200, 200, 200, 0, 40, $silver, IMG_ARC_NOFILL | IMG_ARC_EDGED);
imagettftext($img, 30, 10, 150, 300, $green, "arial.ttf", "HELLOOOOOOO");
*/


header("Content-Type: image/png");
imagepng($img);
?>