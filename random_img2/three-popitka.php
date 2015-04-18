<?php

$imgdir="http://spacedust.zz.mu/wp-content/themes/thememagic/img/";

$ext="jpg";

$mode=2;

$error="В папке нет картинок!";

$errorfile="http://spacedust.zz.mu/wp-content/themes/thememagic/img/error_001.png";

$NoCacheMode=1;



function NoCache()

{

header("Cache-Control: no-store, no-cache, must-revalidate");

header("Pragma: no-cache");

header("Last-Modified: ".gmdate("D, d m y H:i:s")."GMT");

}



function FileCount($imgdir)

{

$files=0;

$cfile=opendir("$imgdir");



while(($e=readdir($cfile))!==false) $files++;

$files-=3;

return $files;

}



function filetest($ranfile)

{global $imagelist;

 $status = false;

 if (IsSet($imagelist)){

    foreach ($imagelist as $occu) {

        $occu=trim($occu);

        if ($ranfile==$occu) {

            $status=true;

            return $status;

            }

        }

 }

 return $status;

}



function ImgWrite($ranfile)

{global $imagelist;

 $ranfile=trim($ranfile);

 $imagelist[]=$ranfile;

}



function ImgRandom($files)

{global $ext, $imgdir, $imgcounter, $mode, $error, $errorfile;

 $ranfile= mt_rand(1, $files);

 $ranfile= sprintf("%03d", $ranfile);

 if (!filetest($ranfile)) {

    ImgWrite($ranfile);

    Echo "<img src=\"$imgdir$ranfile.".$ext."\">";

    $imgcounter++;

    }

 else {

    if ($imgcounter<$files) ImgRandom($files);

    else {

        if ($mode==1) {

            Echo $error."<br>";

        }

        elseif ($mode==2) {

            Echo "<img src=\"$imgdir$errorfile.".$ext."\">";

            }

        }

    }

}

if ($NoCacheMode==1) NoCache();

$imgcounter=0;

print "<title>Случайный вывод картинок</title><br>";

ImgRandom(FileCount($imgdir));

?>