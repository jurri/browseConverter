<?php
#   Copyright by FeTTsack


defined ('main') or die ( 'no direct access' );

$count_query_xyzXYZ = 0;

/****************************************************************************
## Oracle SQL config 
*/

if($global_db == 'oracle'){
	function oci_db(){
		define('oci_conn', @oci_connect(DBUSEROCI, DBPASSOCI, DBSERVEROCI));
		if (!oci_conn) { //ausgabe des Fehlers
			$e = oci_error();
			echo "Connection zum Schema: ".DBUSEROCI." ging schief<br/>";
			echo "Bitte überprüfen sie ihre Oracle daten !!!<br/>";
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}
		return(oci_conn);
	}

	function db_query($erg){
		$execute = oci_parse(oci_db(), $erg);
		oci_execute($execute);
		oci_close(oci_conn);
		return($execute);
	}

	function oci_datetime($erg){
		$exec = "to_date('$erg', 'dd.mm.yyyy hh24:mi:ss')";
		return($exec);
	}

	function oci_date($erg){
		$exec = "to_date('$erg', 'dd.mm.yyyy')";
		return($exec);
	}

	function oci_time($erg){
		$exec = "to_date('$erg', 'hh24:mi:ss')";
		return($exec);
	}
}

######################################################################################
/****************************************************************************
## mySQL config 
*/

if($global_db == 'mysql'){
	function db_connect(){
		if(defined('CONN')){
			return;
		}
		define( 'CONN', @mysql_pconnect(DBHOST, DBUSER, DBPASS));
		$db = @mysql_select_db(DBDATE, CONN);

		if(!CONN){
			die('Verbindung nicht m&ouml;glich, bitte pr&uuml;fen Sie ihre mySQL Daten wie Passwort, Username und Host<br />');
		}
		
		if(!$db){
			die('Kann Datenbank "'.DBDATE.'" nicht benutzen : ' . mysql_error(CONN));
		}
	}

	function db_close(){
		mysql_close(CONN);
	}

	function db_query($q){
		global $count_query_xyzXYZ;
		$count_query_xyzXYZ++;
		return (@mysql_query($q, CONN));
	}

	function db_result($erg, $zeile=0, $spalte=0){
		return (mysql_result($erg,$zeile,$spalte));
	}

	function db_fetch_assoc($erg){
		return (mysql_fetch_assoc($erg));
	}

	function db_fetch_row($erg){
		return (mysql_fetch_row($erg));
	}

	function db_fetch_object($erg){
		return (mysql_fetch_object($erg));
	}

	function db_num_rows($erg){
		return (mysql_num_rows ($erg));
	}

	function db_last_id(){
		return ( mysql_insert_id (CONN));
	}

	function db_count_query($query){
		return (db_result(db_query($query),0));
	}

	function db_list_tables($db){
		return (mysql_list_tables ($db, CONN));
	}

	function db_tablename($db, $i){
		return (mysql_tablename($db, $i));
	}

	function db_check_erg ($erg){
		if($erg == false OR @db_num_rows($erg) == 0){
			exit ('Es ist ein Fehler aufgetreten');
		}
	}
}

?>