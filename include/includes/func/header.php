<?php
if(isset($_SESSION["adm"])){
	echo '<form name="formout" method="post" action="?logout"><input type="submit" name="sub_logout" value="Logout" style="float:right;"/></form>';
	if(isset($_POST['sub_logout'])){
		session_destroy();
		echo '<meta http-equiv="refresh" content="0; URL=../../index.php">';
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
					<form name="form1" action="?submit" method="post">
