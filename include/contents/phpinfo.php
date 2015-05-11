<?php
define('main', TRUE);

require_once('../includes/loader_content.php');
require_once('../includes/func/header.php');

$x = 0;
if(isset($_SESSION["adm"])){
	phpinfo();
}else{
	echo "Du hast keine Rechte das hier zu sehen. <br/> Bitte erst einloggen: <a href='../../index.php'>Zum Login</a>";
}

require_once('../includes/func/footer.php');
?>