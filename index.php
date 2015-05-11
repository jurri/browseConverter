<?php
define('main', TRUE);

require_once('include/includes/loader.php');

if(isset($_POST['sub_insert'])){
	$name = $_POST['t_name'];
	$psw = md5($_POST['t_name'].''.$_POST['t_psw']);
	echo $psw;
	$erg = db_fetch_assoc(db_query("SELECT count(*) ANZAHL FROM tblusr_user WHERE usr_strname = '$name' AND usr_strpsw = '$psw' AND usr_bolactive = 1"));
	if($erg['ANZAHL'] == 1){
		$_SESSION["adm"] = "admin";
		echo '<meta http-equiv="refresh" content="0; URL=./include/contents/index.php">';
	}else{
		echo "false";
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Convert in Your Browser</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<!-- start header -->
<div id="header">
	<h1>Browser Converter</h1>
	<p>derzeit nur beta....</p>
</div>
<!-- end header -->
<!-- start page -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<!-- start content -->
				<div id="content">
					<div class="post">
					<form name="form_login" action="?login" method="post"/>
					<?php	
if($global_dev == true){					
	if(!isset($_SESSION["adm"])){
		echo '<h3>DEV-Mod</h3>';
		echo '<table><tr><th>Loginname:</th><td><input name="t_name" type="text" value=""/></td></tr><tr><th>Passwort:</th><td><input name="t_psw" value="" type="password"></td></tr><tr><td colspan="2"><input name="sub_insert" value="login" type="submit"></td></tr></table>';
	}else{
		echo 'Sie sind bereits eingeloggt und werden in 5 sec. weitergeleitet.<meta http-equiv="refresh" content="5; URL=./include/contents/index.php">';
	}
}else{
	$_SESSION["adm"] = "user";
	echo '<meta http-equiv="refresh" content="0; URL=./include/contents/index.php">';
}	
					?>
					</form>
					</div>
				</div>
				<!-- end content -->
				<!-- start sidebar -->
				<div id="sidebar">
					<ul>
						<li>
							<h2></h2>
						</li>
					</ul>
				</div>
				<!-- end sidebar -->
				<div style="clear:both">&nbsp;</div>
			</div>
		</div>
	</div>
<div id="footer">
	<p>&copy;2014 All Rights Reserved &nbsp;&bull;&nbsp; by <a href="http://fettsack.de.vc" rel="nofollow">FeTTsack</a></p>
</div>
</body>
</html>