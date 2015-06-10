<?php
/**
* 
*/
abstract class Localization
{
	
	function formatMoney($sum)
	{
		number_format($sum);
	}
	function translate($phrase)
	{
		return $phrase;
	}
}

class English extends Localization
{
	function formatMoney($sum)
	{
		$text='';
		if ($sum < 0) {
			$text .= '-';
			$sum = abs($sum);
		}
		$text .= '$'.number_format($sum,2,'.',',');
		return $text;
	}
}
class Russian extends Localization
{
	function formatMoney($sum)
	{
		$text .= number_format($sum,2,',','.');
		return $text;
	}
	function translate($phrase)
	{
		if ($phrase = 'yes') {
			return 'да';
		}
		if ($phrase = 'no') {
			return 'нет';
		}
	}
}
echo 'English ================ <br>';
$local = new English();
echo $local->formatMoney(123456).'<br>';
echo $local->translate('yes').'<br>';
echo 'Russian ================ <br>';
$local = new Russian();
echo $local->formatMoney(999999).'<br>';
echo $local->translate('yes').'<br>';


/*
Имеется несколько файлов разных типов, в зависимости от типа выводится соответствующий адрес


abstract class FileNamingStrategy{
	abstract function FileFrom();
}
class GifFile extends FileNamingStrategy{
	function FileFrom(){
		return "http://www.gif.ru";
	}
}
class JpegFile extends FileNamingStrategy{
	function FileFrom(){
		return "http://www.jpg.ru";
	}
}
class PdfFile extends FileNamingStrategy{
	function FileFrom(){
		return "http://www.pdf.ru";
	}
}
class OtherFile extends FileNamingStrategy{
	function FileFrom(){
		return "http://www.ya.ru";
	}
}


$arr = array('test.jpg','test.png','test.pdf','test.png','test.gif');
foreach ($arr as $fileName) {
	if(strpos($fileName, '.gif'))
	$obj = new GifFile();
elseif (strpos($fileName, '.jpg'))
	$obj = new JpegFile();
elseif (strpos($fileName, '.pdf'))
	$obj = new PdfFile();
else
	$obj = new OtherFile();
$link = $obj->FileFrom();

	echo "Файл ".$fileName." скачан с сервиса ".$link."<br>";
}*/

/*
abstract class FileNamingStrategy{
	abstract function createLinkName($fileName);
}
class ZipFile extends FileNamingStrategy{
	function createLinkName($fileName){
		return "http://localhost/download/$fileName.zip";
	}
}
class TarGzFile extends FileNamingStrategy{
	function createLinkName($fileName){
		return "http://localhost/download/$fileName.tar.gz";
	}
}
if(strstr($_SERVER["HTTP_USER_AGENT"], "Win"))
	$obj = new ZipFile();	
else
	$obj = new TarGzFile();

$link1 = $obj->createLinkName("file_one");
$link2 = $obj->createLinkName("file_two");	

print <<<LIST
<h1>Список файлов для скачивания:</h1>
<p>
<a href="$link1">Первый файл</a><br>
<a href="$link2">Второй файл</a>
</p>
LIST;
*/
?>