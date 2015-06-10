<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'new-mtv');

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
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '5mOh2os$>n`+Gk&B&d%|k$0o|3Vrp-(+h1?2I4-l]s!mjgl$%T]M`_=Ue>?V_r{>');
define('SECURE_AUTH_KEY',  'AV86cvrB.#G .,VccxV$%&(|Si)nb$7H-6Z66iC%;fSJ78Y|PjB86(>Ix95t||{G');
define('LOGGED_IN_KEY',    'aXy%41a9a~u%FthqaKcei+6CC4|KM1:ho`Y$W,(++.yl-qTszHOyE?UZ_?9?;)Ry');
define('NONCE_KEY',        'H$CdcW,171J;l;l}+^{geHKm#+o-;dN,v,r:ZXQ8c#Z~3iAv%:Nh^9G?b!-[w/go');
define('AUTH_SALT',        'w*g-|Fk<8KxodexWW^Jr!?5ky[T|XOS#4lnU?mkcN8,HWWtGBvZ>D(>kNd%{>f{9');
define('SECURE_AUTH_SALT', 'G1SsolK]}$~wZ+isV>/j0&,P,F6p.Og/c[t{x}f}{W^t1nXo]jgR<Qtb) n|w(LV');
define('LOGGED_IN_SALT',   'R{zTBao^P=~0B]:.((&11iX/P|mq{~lq0rfPIHdn4:#ZSZakXc=A/jK-eT5-QGxF');
define('NONCE_SALT',       'p*?I=Y}S=gVQCZlt,o2q$L!C>;9 *?Y8d+EWk`C<^<|N,}Zn</!?K |jG%|J%bRv');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
define('UPLOAD_MAX_FILESIZE', '3000MB');
define('POST_MAX_SIZE', '3000MB');