-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2014 г., 09:23
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `card-index`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Jquery и CSS'),
(5, 'PHP'),
(7, 'My usability');

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `category_id` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `text` (`text`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=162 ;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `title`, `tags`, `img_src`, `text`, `category_id`) VALUES
(151, 'Фавикон как сделать', 'favicon', '', 'После title внутри head вставляем:\r\n<link rel="shortcut icon" href="адрес/favicon.png">', 2),
(152, 'Гардиентодел', 'гардиент, ссылки', '', 'http://www.colorzilla.com/gradient-editor/', 2),
(149, 'Переключатель двух пунктов без JQuery', 'переключатель, ползунок, ссылки', '', 'http://proto.io/freebies/onoff/', 2),
(150, 'Меню по центру', 'выравнивание, меню', '', 'Типичная ситуация - меню в ul из лишек. \r\nСделать по центру - надо чтобы у li не было флоатов, чтобы они были inline-block, \r\nУ ul сделать text-align: center', 2),
(148, 'Ссылки по модульным сеткам', 'модульная сетка, ссылки', '', 'http://bootstrap-ru.com/\r\nhttp://960.gs/', 2),
(147, 'Проверка правильности верстки', 'валидация, ссылки', '', 'http://validator.w3.org/', 2),
(143, 'Просмотр массива', 'массив, проверка', '', 'echo "<pre>";\r\nprint_r($content);\r\necho "</pre>";\r\nexit;', 5),
(144, 'К изучению по верстке', 'ссылки', '', 'http://www.photoshop-master.ru/\r\nAuto Refresh Plus\r\nhttp://bootstrap-ru.com/\r\n\r\nЕсть сайт cssavords типа того название, там лучшие сайты по верстке, с лучшими фичами. Каждый день сайт дня, сайт месяца есть, гениально для поиска фишек.', 2),
(145, 'Изучай слайдеры как пишутся', 'слайдер, ссылки', '', 'http://www.slidesjs.com/', 2),
(146, 'Офигенный лайтбокс', 'лайтбокс, ссылки', '', 'http://www.arvd.ru/ru/exhibition/view?id=22\r\n\r\nКлоны лайтбоксов тут\r\nhttp://dustweb.ru/2008/07/lightbox_n_clones/', 2),
(153, 'Гуглить как про', 'поиск', '', '16 способов "гуглить" как профессионал\r\n\r\n1. Исключение из Google поиска\r\nЧтобы исключить из поисковой выдачи какое либо слово, фразу, символ и т.п., достаточно перед ним поставить знак "-” (минус), и оно не появится в результатах поиска.\r\nДля примера, я ввёл в строку поиска следующую фразу: "бесплатный хостинг –.ru” и в поисковой выдаче нет ни одного .ru сайта, кроме оплаченных рекламных объявлений.\r\n\r\n2. Поиск по синонимам\r\nИспользуйте символ "~” для поиска схожих слов к выбранному. Например в результате выражения: "~лучшие фильмы -лучшие" вы увидите все ссылки на страницы, содержащие синонимы слова "лучшие”, но ни одно из них не будет содержать этого слова.\r\n\r\n3. Неопределённый поиск\r\nНа тот случай, если вы не определились с конкретным ключевым словом для поиска, поможет оператор "*”.\r\nНапример фраза "лучший редактор * изображений” подберёт лучшие редакторы для всех типов изображений, будь то цифровые, растровые, векторные и т.д.\r\n\r\n4. Поиск на выбор из вариантов\r\nИспользуя оператор "|”, можно осуществить Google поиск по нескольким сочетаниям фраз, заменяя несколько слов в различных местах.\r\nНапример, введём фразу "купить чехол | ручку” выдаст нам страницы, содержащие либо "купить чехол”, либо "купить ручку”\r\n\r\n5. Значение слова\r\nЧтобы узнать значение того или иного слова, достаточно ввести в поисковую строку "define:” и после двоеточия искомую фразу.\r\n\r\n6. Точное совпадение\r\nДля нахождения точного совпадения поисковой выдачи с запросом достаточно заключить ключевики в кавычки.\r\n\r\n7. Поиск по определённому сайту\r\nЧтобы осуществить поиск ключевых слов только по одному сайту, достаточно прибавить к искомой фразе следующий синтаксис – "site:”.\r\n\r\n8. Обратные ссылки\r\nЧтобы узнать расположение ссылок на интересующий сайт, достаточно ввести следующий синтаксис: "links:” и далее адрес интересующего сайта.\r\n\r\n9. Конвертер величин\r\nПоисковая система Google также умеет конвертировать величины по запросу пользователя.\r\nНапример, нам нужно узнать, сколько составляет 1 кг в фунтах. Набираем следующий запрос: "1 кг в фунтах”\r\n\r\n10. Конвертер валют\r\nДля того, чтобы узнать курс валют по официальному курсу, набираем следующий поисковой запрос: "1 [валюта] в [валюта]”\r\n\r\n11. Время по городу\r\nЕсли хотите узнать время по какому либо городу, то используйте синтаксис: "time” или русский аналог "время" и название города.\r\n\r\n12. Google калькулятор\r\nGoogle умеет считать онлайн! Достаточно вбить пример в строку поиска и он выдаст результат.\r\n\r\n13. Поиск по типам файлов\r\nЕсли вам необходимо найти что-то по конкретному типу файла, то у Google есть оператор "filetype:” который осуществляет поиск по заданному расширению файла.\r\n\r\n14. Поиск кэшированной страницы\r\nУ Google есть собственные сервера, где он хранит кэшированные страницы. Если нужна именно такая, то воспользуйтесь оператором: "cached:”\r\n\r\n15. Прогноз погоды по городу\r\nЕщё одним оператором поиска у Google является оператор погоды. Достаточно вбить "weather” и город, как вы увидите, будет у вас дождь или нет\r\nИзображение\r\n\r\n16. Переводчик\r\nМожно переводить слова сразу, не отходя от поисковика. За перевод отвечает следующий синтаксис: "translate [слово] into [язык]”', 7),
(154, 'Идеальная тень', 'тень', '', 'box-shadow: 0 2px 10px rgba(0,0,0,0.6);\r\n\r\nПоследнюю циферку если увеличивать, тень темнее, но все равно прозрачная. Уменьшаем - менее темная.\r\n\r\nМожно светлую, если сделать (255, 255, 255, 0.6)', 2),
(155, 'Проверка уникальности', 'проверка, уникальность, ссылки', '', '1. Сайт http://www.content-watch.ru/text/\r\nна нем я\r\nАлена\r\nпароль rafikiskaz\r\n\r\n2. Программа для проверки http://advego.ru/plagiatus/\r\n\r\n3. Сайт text.ru\r\n', 2),
(156, 'Тошнотность проверка', 'тошнотность, проверка, ссылки', '', 'http://istio.com/rus/text/analyz/', 7),
(157, 'Кнопки социальных сетей', 'кнопки, ссылки', '', 'http://mojwp.ru/social-buttons.html', 2),
(158, 'Файл .htaccess', 'htaccess', '', 'AddDefaultCharset UTF-8\r\nphp_flag get_magic_quotes_gpc off\r\nOptions Indexes FollowSymLinks\r\n<IfModule dir_module>\r\n    DirectoryIndex\r\n</IfModule>', 5),
(159, 'Нерешенные задачи', 'недоделки', '', 'Папка /dz2/mod2/session/ Так и не знаю, как сразу в массив загнать это сесионное значение\r\n/mod2/if.php Не работает if, хотела там по-крутому сделать из POST, ан не работает\r\n\r\nРазвитие интернет-магазина.\r\n\r\nНужно сделать изменяемое количество товаров, чтобы в корзине можно было менять и сохранять\r\nСделать возможность внесения изменений в каталог и пересохранения\r\n\r\nФишка с регистрацией, сделать, чтобы заказы незарегестрированных очищались, сессионные файлы удалялись, а зарегенные, если не дозаказали, при следующем заказе видели бы содержимое своей корзины\r\n\r\nСделать группы пользователей. Для каждого пользователя свои возможности, менеджеры, юзеры, админы что могут менять, что показывается, что нет\r\n\r\nОшибка какая-то непонятная при запуске файла client.php, там тема сервисов и я ее не очень поняла, разобраться не могу, там еще принимает участие файл stock.wsdl\r\nНедоизуала тему RPC, ничего не понятно... плюнула\r\n\r\nНадо довести до ума файл PDONewsDB.class-IteratorAggregate-ArrayIterator, там перевести написание с обычного SQlite на PDO, начала и не закончила. Довести до ума, чтобы все работало, запись - вывод новостей\r\n\r\nВ интернет-магазине eshop после произведения заказа на странице, где должен написать "Заказ принят"	- пишет ошибку, но в файл лог все вносит.', 5),
(160, 'Назад ссылка', 'навигация', '', '<a onclick="window.history.back();">Вернуться назад >></a>', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `file_view` varchar(255) NOT NULL,
  `other_files` text NOT NULL,
  `id_category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `project`
--

INSERT INTO `project` (`id`, `name`, `tags`, `file_view`, `other_files`, `id_category`) VALUES
(8, 'Всплывающее меню', 'всплывашки, меню', 'file/popup_menu/index.html', 'file/popup_menu/jquery.js,file/popup_menu/template_styles.css', 2),
(9, 'Вкладки', 'вкладки', 'file/tabs/index.html', 'file/tabs/jquery.js,file/tabs/template_styles.css', 2),
(10, 'Галерея Jquery', 'галерея', 'file/gallery/galery-new.html', 'file/gallery/jquery.js,file/gallery/jquery2.js,file/gallery/photo_gal.js,file/gallery/prettyPhoto.css,file/gallery/prettyPhoto.js,file/gallery/prettyPhoto2.css,file/gallery/template_styles.css', 2),
(11, 'Карусель', 'карусель, слайдер', 'file/carousel/index.html', 'file/carousel/carousel.js,file/carousel/styles-carousel.css', 2),
(12, 'Переключатель диапазона цен с ползунком', 'переключатель, ползунок, диапазон', 'file/switch_price/index.html', 'file/switch_price/examples.css,file/switch_price/jquery.min-max.js,file/switch_price/jquery.ui-slider.js,file/switch_price/jquery-1.6.1.min.js,file/switch_price/main.css', 2),
(13, 'Ползунок с селектом', 'select, ползунок, переключатель', 'file/switch_select/hotelrooms.html', 'file/switch_select/jquery.js,file/switch_select/jquery.ui.mouse.js,file/switch_select/jquery.ui.slider.css,file/switch_select/jquery.ui.slider.js,file/switch_select/jquery.ui.theme.css,file/switch_select/jquery.ui.widget.js', 2),
(14, 'Слайдер мегакрутой', 'слайдер', 'file/slider/index.html', 'file/slider/jquery.js,file/slider/template_styles.css', 2),
(15, 'Карусель самокатающаяся', 'слайдер, карусель', 'file/carousel_slide/index.html', 'file/carousel_slide/jquery.js,file/carousel_slide/template_styles.css', 2),
(16, 'Стилезованный селект', 'select', 'file/select/index.html', 'file/select/jquery.selectbox.js,file/select/jquery.selectbox.min.js,file/select/jquery2.1.js,file/select/selectbox.css', 2),
(17, 'Стрелки треугольнички в CSS', 'стрелки', 'file/arrows/index.html', 'file/arrows/template_styles.css', 2),
(18, 'Спамерство', 'спамерство', 'file/spam/index.html', 'file/spam/fone.jpg,file/spam/jquery.js,file/spam/pixfone.png,file/spam/style.css,file/spam/Скриншот 2014-08-17 17.33.20.png', 7),
(19, 'Заголовки', 'заголовок', 'file/title/zagolovki.html', '', 2),
(20, 'Вывод случайных картинок', 'рандом', 'file/random_img/one-popitka.php', '', 5),
(21, 'Вывод случайных картинок2', 'рандом', 'file/random_img2/three-popitka.php', '', 5),
(22, 'Вывод случайных картинок3', 'рандом', 'file/random_img3/two-popitka.php', '', 5),
(23, 'Верстка пиксель в пиксель', 'верстка', 'file/pixel/pixLayout.js', 'file/pixel/Подключаемый код.txt', 2),
(24, 'eshop', 'eshop', 'file/eshop/catalog.php', 'file/eshop/add2basket.php,file/eshop/add2cat.php,file/eshop/basket.php,file/eshop/create_db.php,file/eshop/delete_from_basket.php,file/eshop/eshop_db.inc.php,file/eshop/eshop_lib.inc.php,file/eshop/orderform.php,file/eshop/orders.log,file/eshop/orders.php,file/eshop/save2cat.php,file/eshop/saveorder.php', 5),
(26, 'Сохранение в файл', 'файл, сохранение', 'file/tofile/file.php', 'file/tofile/fileuser.txt', 5),
(27, 'Запись порядка посещения страниц через сессии', 'сессии, счетчик', 'file/session/page1.php', 'file/session/menu.inc.php,file/session/page2.php,file/session/page3.php,file/session/savepage.inc.php,file/session/visited.inc.php', 5),
(28, 'create db', 'db', 'file/create_db/create_db.php', '', 5),
(30, 'Обкатка switch', 'switch', 'file/switch/switch.php', '', 5),
(31, 'Обкатка цикла for', 'for, циклы', 'file/for/for.php', '', 5),
(32, 'Отрисовка меню циклом foreach', 'меню', 'file/menu_foreach/menu.php', '', 5),
(35, 'Обкатка while', 'while, циклы', 'file/while/while.php', '', 5),
(36, 'Меню горизонтальное и вертикальное', 'меню', 'file/menu_ver-gor/menu.php', '', 5),
(37, 'Таблица умножения', 'таблица умножения, циклы', 'file/table/table.php', '', 5),
(38, 'ArrayAccess', 'интерфейсы, arrayaccess, массив', 'file/arrayaccess/arrayaccess.php', '', 5),
(39, 'spl_autoload', 'spl, autoload', 'file/spl_autoload/autoload.php', '', 5),
(41, 'Капча', 'капча, графика', 'file/captcha/capcha.php', 'file/captcha/capchaimg.php', 5),
(42, 'Загрузка файла в папку', 'файл, сохранение', 'file/file_to_folder/filetofolder.php', '', 5),
(43, 'Функция count своими руками', 'count', 'file/count/functioncount.php', '', 5),
(44, 'Информация про PHP', 'phpinfo', 'file/php_info/info.php', '', 5),
(45, 'Отрисовка и подсчет таблиц из функции', 'функции, таблицы', 'file/table_function/tablefunction.php', '', 5),
(46, 'Дерево файлов', 'дерево', 'file/three/threefolders.php', '', 5),
(47, 'Подсчет посещений Cookie', 'cookie, счетчик', 'file/cookie/usercookie.php', '', 5),
(48, 'Мои заметки по PHP', 'мои заметки', 'file/php/indexmy.php', '', 5),
(49, 'Мои заметки по JQuery', 'мои заметки', 'file/Jquery/myjquery.js', '', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET cp1251 NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `name`, `count`) VALUES
(58, 'массив', 2),
(59, 'проверка', 3),
(60, 'ссылки', 10),
(61, 'слайдер', 4),
(62, 'лайтбокс', 1),
(63, 'валидация', 1),
(64, 'модульная сетка', 1),
(65, 'всплывашки', 1),
(66, 'меню', 4),
(67, 'вкладки', 1),
(68, 'галерея', 1),
(70, 'карусель', 2),
(71, 'переключатель', 3),
(72, 'ползунок', 3),
(73, 'диапазон', 1),
(74, 'select', 2),
(75, 'стрелки', 1),
(77, 'выравнивание', 1),
(78, 'спамерство', 1),
(79, 'favicon', 1),
(80, 'заголовок', 1),
(81, 'гардиент', 1),
(82, 'поиск', 1),
(83, 'тень', 1),
(84, 'уникальность', 1),
(85, 'тошнотность', 1),
(86, 'кнопки', 1),
(87, 'рандом', 3),
(88, 'верстка', 1),
(89, 'eshop', 1),
(90, 'cookie', 1),
(91, 'счетчик', 2),
(92, 'файл', 2),
(93, 'сохранение', 2),
(94, 'сессии', 1),
(95, 'db', 1),
(96, 'if', 0),
(97, 'switch', 1),
(98, 'for', 1),
(99, 'циклы', 3),
(100, 'таблица умножения', 1),
(102, 'while', 1),
(103, 'htaccess', 1),
(104, 'интерфейсы', 1),
(105, 'arrayaccess', 1),
(106, 'spl', 1),
(107, 'autoload', 1),
(108, 'капча', 1),
(109, 'графика', 1),
(110, 'недоделки', 1),
(111, 'count', 1),
(112, 'phpinfo', 1),
(113, 'функции', 1),
(114, 'таблицы', 1),
(115, 'дерево', 1),
(116, 'навигация', 1),
(118, 'заметки', 1),
(119, 'мои заметки', 2),
(120, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
