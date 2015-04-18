<?php
    $images = array(
        '001.jpg',
        '002.jpg',
        '003.jpg',
        '004.jpg',
        '005.jpg',
    );
    $image  = $images[array_rand($images)];
    $output = "<img src=\"http://spacedust.zz.mu/wp-content/themes/thememagic/img/" . $image . "\" alt=\"Перезагрузите браузер для нового случайного изображения\" />";
    echo $output;
?>