<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи и ABSPATH. Дополнительную информацию можно найти на странице
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется скриптом для создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения вручную.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'site');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'rafikider');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '-pC7Dqjk.7G3@lgL,|jV15zVg[x!Qev;KNkE?R)Y6Ab3Y/66ozLj+P20[bm-QWSv');
define('SECURE_AUTH_KEY',  'P%fSKtVql7Nb33~]e-4Lb`BrNR`Up^#}bjSeRxjAZMIo(>zkq-PS3-}n;x(bPt(!');
define('LOGGED_IN_KEY',    'B9V@w)G{g<FC%c)57w>K_a~D.FAe1P)x^Z-(>Y6s;~#&4CCV/k.hJxkyaoX3kMLz');
define('NONCE_KEY',        'HJA#/{IRpBBD3#x |*4j ?L&BDn^{*dav#y*]-U:-UUi.c{^h)[n1n+Jr2`iF[,,');
define('AUTH_SALT',        'Ozj^Lf`<9Toi+j%n0yL>P_9XE4%O??,r54 _xO_xUn: Lhsa14Z#] (2_;P7BOY|');
define('SECURE_AUTH_SALT', ':1D!RfB`-ls]/-QzQzno&KRNmY.e|z .Gq_&Uc6ez>ff4+Grw}4%ec};8IZ7/<ue');
define('LOGGED_IN_SALT',   'TuQ{,u+|H-!0,P9~=!ee:H>Q7!h:ys9bgE<`{AfPEbJWE+YHYaF6,5+=UKWB;?kV');
define('NONCE_SALT',       'Pnku|hQ$ZKBnf:D};P69I8-sk}V>Hwa6 Y|1MrO_to@goGZ*6vT^7+.%9C8M=q~j');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
