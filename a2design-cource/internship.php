/********************************
************ Где что ************
********************************/
Файл Apache2.conf
sudo subl /etc/apache2/apache2.conf

Файл php.ini
sudo subl /etc/php5/apache2/php.ini

Файл hosts
sudo subl /etc/hosts

Все файлы .conf для сайтов сервера лежат в
sudo subl /etc/apache2/sites-available/[site.com.conf]


/********************************
****** Настройка htaccess ******
********************************/

DirectoryIndex index.php
через пробел задать можно файл, который будет открываться по умолчанию

ErrorDocument 404 http://personalhomepage.loc/404.html
Через пробел пишем нужны код ошибки и через пробел адрес страницы, которую надо выводить при этой ошибке

Для того, чтобы определить, на какую страницу идет перенаправление, даже если в адресе страница, которая есть в папке - mode rewrite. Подробнее гуглить, и тут http://stackoverflow.com/questions/3522921/htaccess-redirect-all-pages-to-single-page

Кодировка
AddDefaultCharset utf8

Отключить показ ошибок php
php_value error_reporting 1

Другие настройки, например, на сайте http://htaccess.net.ru/ спец этому посвященный

Паролить папку через файл .htaccess - http://www.answerium.com/article21/

/********************************
********** Изучабельно **********
********************************/
Адаптивочка
modernizr
bem
clear fix

