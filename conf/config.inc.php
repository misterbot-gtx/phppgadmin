<?php

// Função auxiliar para pegar variáveis de ambiente com fallback
function env($key, $default = '') {
    $value = getenv($key);
    return $value !== false ? $value : $default;
}

/**
 * phpPgAdmin central configuration
 */

// Servidor PostgreSQL
$conf['servers'][0]['desc']       = env('PG_DESC', 'PostgreSQL');
$conf['servers'][0]['host']       = env('PG_HOST', '127.0.0.1');
$conf['servers'][0]['port']       = env('PG_PORT', 5432);
$conf['servers'][0]['sslmode']    = env('PG_SSLMODE', 'allow');
$conf['servers'][0]['defaultdb']  = env('PG_DB', 'template1');
$conf['servers'][0]['pg_dump_path']    = env('PG_DUMP_PATH', '/usr/bin/pg_dump');
$conf['servers'][0]['pg_dumpall_path'] = env('PG_DUMPALL_PATH', '/usr/bin/pg_dumpall');

// Configurações gerais
$conf['default_lang']          = env('PG_DEFAULT_LANG', 'auto');
$conf['autocomplete']          = 'default on';
$conf['extra_login_security']  = env('PG_EXTRA_LOGIN_SECURITY', true);
$conf['owned_only']            = env('PG_OWNED_ONLY', false);
$conf['show_comments']         = env('PG_SHOW_COMMENTS', true);
$conf['show_advanced']         = env('PG_SHOW_ADVANCED', false);
$conf['show_system']           = env('PG_SHOW_SYSTEM', false);
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
