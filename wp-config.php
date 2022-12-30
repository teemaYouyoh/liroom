<?php
define( 'WP_CACHE', true ); // Added by WP Rocket

/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки базы данных
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры базы данных: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'ti061721_fourth' );

/** Имя пользователя базы данных */
define( 'DB_USER', 'ti061721_fourth' );

/** Пароль к базе данных */
define( 'DB_PASSWORD', 'Su7_t_37Kg' );

/** Имя сервера базы данных */
define( 'DB_HOST', 'ti061721.mysql.tools' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Z9XjOKVan3)1Uz{;}2}%>9qC3wOYItmaptoiIIJ=1=pSr#FejBxY!OK9tPr=ThXm' );
define( 'SECURE_AUTH_KEY',  '|_nWlEFc(kMndA9%0t6hGalIJSepNkRV?$N=0a!&7lVygn_ZpC3q[oFg$b6$jxW`' );
define( 'LOGGED_IN_KEY',    'h74VXfVt,W!#VL,#@Inj,tbpWxokr.<;[UVrTT1|G=(;S$qBR^=z)c X q(awHql' );
define( 'NONCE_KEY',        ',ft+[:~EYejB Ry/t=)GP& 44&F^*4cQne7!BMI1W>{`SYIoO/Vc,{x:D>BPFo]m' );
define( 'AUTH_SALT',        '(F^f&e8A[o@-emQx;pt=otP7+=&is_7f`MwB1i2&rC]ZvDmQH#g(QX]S726qQq%z' );
define( 'SECURE_AUTH_SALT', 'Ap2X0 !FT|5PC;L>8l#xYP{1GdsVH*zmOo4Ij6B*W YN8M{nu2As +<j<$7I}Ko@' );
define( 'LOGGED_IN_SALT',   'wZ9d^<|~lk>A4KqDE3 -0sIs=YQ/[OE{}K51:]X^A,.ZWc(VMN>eCv0]V;G|V%84' );
define( 'NONCE_SALT',       'Ux/p_MD1+b<EE;l3;e5GA/!=<v#*atSLCOZ5.ufqRO] N|?5|D;<To<M@zo$qGDv' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
