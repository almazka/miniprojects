<?php 


/*$arResult = array(3) { [2181]=> array "ID"=> "2181" "NAME"=> "Название первого элемента" "IMG_PATH"=> NULL "DESC"=> "" "HREF"=> NULL } 
[2182]=> array ("ID"=> "2182", "NAME"=> "Название второго элемента", "IMG_PATH"=> NULL ,"DESC"=> "" ,"HREF"=> NULL ) 
	[2183]=> array ("ID"=> "2183", "NAME"=> "Название третьего элемента", "IMG_PATH"=> "/upload/iblock/684/684a5fabfdd11fa5b59a635d00f041b2.jpg", "DESC"=> "Привет, это содержимое анонса", "HREF"=> NULL) */ 

/*$arResult = array (
	"2181"=> array ("ID"=> "2181", "NAME"=> "Название первого элемента", "IMG_PATH"=> NULL, "DESC"=> "", "HREF"=> NULL),
	"2182"=> array ("ID"=> "2182", "NAME"=> "Название второго элемента", "IMG_PATH"=> NULL ,"DESC"=> "" ,"HREF"=> NULL ),
	"2183"=> array ("ID"=> "2183", "NAME"=> "Название третьего элемента", "IMG_PATH"=> "/upload/iblock/684/684a5fabfdd11fa5b59a635d00f041b2.jpg", "DESC"=> "Привет, это содержимое анонса", "HREF"=> NULL)  
	);
var_dump($arResult);
foreach($arResult as $key => $value) {
   echo $arResult[$key] ."\n";
   echo $value . "\n";
   echo 'sdfdfs $value' ."\n";
   echo "sdfdfs $value" ."\n";
   echo "$arResult => $value.\n";
   echo $arResult[$key] . '=>' . $value."\n";
 } */
echo "<img src=".$value['IMG_PATH']."><br />";

?>