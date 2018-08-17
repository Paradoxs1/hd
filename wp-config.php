<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'hd');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '!Vva9NUG8|@morbYh~VZvZfDOZ^F9iT}O=Qux8z/Lj)Uxy8=^!5U_KMXJ;k5Q1Nr');
define('SECURE_AUTH_KEY',  'C0<I$t0jpo%nU~~&SMH+]ibxmmEa.GJiEDXTH/;y{sq:82V+?FuVDGXymfGIyt&D');
define('LOGGED_IN_KEY',    '?KrXXWqEQiw+-8o(?ZUU4m+>-L;FPF+j?D!l&qky/Hz6I=|Nn[)haqqgb[~I-5F%');
define('NONCE_KEY',        '=~zIx!V/}21K[./PiJb4GA8cRRE1sE)2uga57xiPe_J q _W5Bg/K)w:mCes)TM`');
define('AUTH_SALT',        'X72Qg9Bq;:^p/`0?S mNrBadiT=ELiAiV{NA|u TW>BVWcwW,ZXf!4_ogH|9..3$');
define('SECURE_AUTH_SALT', 'V}U^8U%,%R.qO`3W:Pxl,~FON%{1b=V71c.qJxzI7aUfbsX3mmo$ld! m,!}|_L1');
define('LOGGED_IN_SALT',   'v?F*bIEHa N(K{`/)`Bh?A/ @/_Y ^Z-x/! !M:TV}er#/OZx+$y4(*Vcu tC7GF');
define('NONCE_SALT',       '`Y5`/RpZNx<P:C]Rz?:c+}B]H1i,78VBoVDMlA#P+FNR|Fidkb,H}suo1>ya1^iH');

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
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
