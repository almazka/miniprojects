<?php
/////////////////////////////
/////   Php Images   /////
/////     Version 1   /////
/////  By Hormold  /////
/////////////////////////
$dir="http://spacedust.zz.mu/wp-content/themes/thememagic/img";/// ������� ����� � ����
$openthisdir=opendir($dir);
while ($k=readdir($openthisdir))
{
$m=substr($k,-4);
if ($m=='.jpg' or $m=='.png' or $m=='.gif') $array[]=$k;
}
closedir($openthisdir);
$number=rand(0,count($array)-1);
echo "<A HREF='$dir/$array[$number]'><img src='$dir/$array[$number]' WIDTH='150' HEIGHT='150' alt=''></A><br>";
$size=filesize("photo/$array[$number]");

echo "����:$array[$number]<BR>";///����� ��������

echo "������:$size ��. ";///����� �������
/// ��������� �� �������! �� ��������!
?>