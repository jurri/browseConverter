<?php
#   Copyright by FeTTsack
#   Support www.fettsack.de.vc

defined('main') or die('no direct access');

//Konfiguration zur Anzeige von Fehlern
//Auf http://www.php.net/manual/de/function.error-reporting.php sind die verfügbaren Modi aufgelistet

//Seit php-5.3 ist eine Angabe der TimeZone Pflicht

if (version_compare(phpversion(), '5.3') != -1) {
	if (E_ALL > E_DEPRECATED) {
		@error_reporting(E_ERROR | E_WARNING | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING);
	} else {
		@error_reporting(E_ERROR | E_WARNING | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING);
	}
	date_default_timezone_set('Europe/Berlin');
} else {
	@error_reporting(E_ERROR | E_WARNING | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING);
}
//date_default_timezone_set('Europe/Berlin');
@ini_set('display_errors','on');

require_once('include/includes/config.php');

// Weiterhin sollte alle Aufrufe von htmlspecialchars mit der Konstante erfolgen
if (@ini_get('default_charset') != HP_CHARSET) {
    @ini_set('default_charset', HP_CHARSET);
}

require_once('include/includes/global.php');

# fremde classes laden
if (version_compare(PHP_VERSION, '5.3') == -1) {
    require_once('include/includes/class/xajax.php4.inc.php');
} else {
    require_once('include/includes/class/xajax.php5.inc.php');
}

# load all needed func
require_once('include/includes/func/db.php');
require_once('include/includes/func/escape.php');
require_once('include/includes/func/debug.php');


# load language
require_once ('include/includes/lang/de.php');


session_start();
db_connect();
?>