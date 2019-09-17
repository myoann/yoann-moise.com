<?php if (session_id() == '') {
    session_start();
}

define('SESSION_LOCALE_KEY', 'ix_locale');
define('DEFAULT_LOCALE', 'en_US');
define('LOCALE_REQUEST_PARAM', 'lang');
define('WEBSITE_DOMAIN', 'messages');

if (array_key_exists(LOCALE_REQUEST_PARAM, $_REQUEST)) {
    $current_locale = $_REQUEST[LOCALE_REQUEST_PARAM];
    $_SESSION[SESSION_LOCALE_KEY] = $current_locale;
} elseif (array_key_exists(SESSION_LOCALE_KEY, $_SESSION)) {
    $current_locale = $_SESSION[SESSION_LOCALE_KEY];
} else {
    $current_locale = DEFAULT_LOCALE;
}

putenv("LC_ALL=$current_locale");
setlocale(LC_ALL, $current_locale);
bindtextdomain(WEBSITE_DOMAIN, dirname(__FILE__) . '/lang');
bind_textdomain_codeset(WEBSITE_DOMAIN, 'UTF-8');
textdomain(WEBSITE_DOMAIN);