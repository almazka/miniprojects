<h1>Выстраиваем дерево папок</h1>
<p class="catalogs">
<?php 
function dirs($dir, $tab) // функция для вывода дерева папок
{
    $d = opendir($dir);
    while ($name = readdir($d)) {
        if ($name=="." or $name=="..") { // обязательно с точками папки убирать
            continue;
        }
        if (is_dir($name)) {
            echo "<b>".$tab."[$name]</b><br>";
            $tab .= '-';
            dirs($dir."/$name",$tab);
        }else
        echo "$tab$name<br>";
            }
closedir($d);
}
dirs(".", "");
?></p>