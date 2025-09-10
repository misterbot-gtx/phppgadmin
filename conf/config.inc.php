<?php

define('DIR_ROOT', dirname(__DIR__, 1));

$envFile = DIR_ROOT . '/.env';

if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // Ignora linhas comentadas
        if (strpos(trim($line), '#') === 0) {
            continue;
        }
        // Divide apenas na primeira ocorrência de "="
        if (strpos($line, '=') !== false) {
            list($key, $value) = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);
            putenv("$key=$value");
            $_ENV[$key] = $value;
            $_SERVER[$key] = $value;
        }
    }
}

function env($key, $default = '') {
    $value = getenv($key);
    return $value !== false ? $value : $default;
}


function envBool($key, $default = false) {
    $value = strtolower(env($key, $default ? 'true' : 'false'));
    return in_array($value, ['true', '1', 'yes', 'on'], true);
}

/**
 * phpPgAdmin central configuration
 */

// Servidor PostgreSQL
$conf['servers'][0]['desc']       = env('PG_DESC', 'PostgreSQL');
$conf['servers'][0]['host']       = env('PG_HOST', '127.0.0.1');
$conf['servers'][0]['port']       = (int) env('PG_PORT', 5432);
$conf['servers'][0]['sslmode']    = env('PG_SSLMODE', 'allow');
$conf['servers'][0]['defaultdb']  = env('PG_DB', 'template1');
$conf['servers'][0]['pg_dump_path']    = env('PG_DUMP_PATH', '/usr/bin/pg_dump');
$conf['servers'][0]['pg_dumpall_path'] = env('PG_DUMPALL_PATH', '/usr/bin/pg_dumpall');

// Configurações gerais
$conf['default_lang']          = env('PG_DEFAULT_LANG', 'auto');
$conf['autocomplete']          = 'default on';
$conf['extra_login_security']  = env('PG_EXTRA_LOGIN_SECURITY', 'false');
$conf['owned_only']            = env('PG_OWNED_ONLY', 'false');
$conf['show_comments']         = env('PG_SHOW_COMMENTS', 'true');
$conf['show_advanced']         = env('PG_SHOW_ADVANCED', 'false');
$conf['show_system']           = env('PG_SHOW_SYSTEM', 'false');
$conf['min_password_length']   = 1;
$conf['left_width']            = 200;
$conf['theme']                 = env('PG_THEME', 'default');
$conf['show_oids']             = false;
$conf['max_rows']              = 30;
$conf['max_chars']             = 50;
$conf['use_xhtml_strict']      = false;
$conf['help_base']             = 'http://www.postgresql.org/docs/%s/interactive/';
$conf['ajax_refresh']          = 3;
$conf['plugins']               = array();
$conf['version']               = 19;

?>