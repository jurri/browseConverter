<?php
//-- mysql verbindung
define ( 'DBHOST', 'localhost' );   # sql host
define ( 'DBUSER', 'root');  		# sql user
define ( 'DBPASS', 'hannibal');  	# sql pass
define ( 'DBDATE', 'browsconvert');  	# sql datenbank

//-- oracle verbindung
define('DBPASSOCI', 'xpert');  			# oracle pass
define('DBUSEROCI', 'XPERTAPPDEV');  	# oracle schema
define('DBSERVEROCI', 'localhost/xe'); 	# oracle server

//-- Charset Konfig
define('HP_CHARSET', 'ISO-8859-1');
define('HP_DB_CHARSET', 'latin1');
define('HP_ENTITIES_FLAGS', defined('ENT_HTML401') ? ENT_COMPAT | ENT_HTML401 : ENT_COMPAT);

?>