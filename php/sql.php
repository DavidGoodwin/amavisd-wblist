<?php

function db_query($sql, $params = []) {

	$db = db_connect();
	$stmt = $db->prepare($sql);
	$stmt->execute($params);
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $rows;
}

function db_connect() {

	$dsn = DB_TYPE ; // FIX TOOD
	return new \PDO($dsn, $user, $password);
}

function sql_num_rows($res) {
	return(mysql_num_rows($res));
}

function sql_error($con) {
	return(mysql_error($con));
}

function sql_open() {
	$func = "sql_open: ";
	if(($con = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)) == FALSE) {
		$msg = "Could not connect to SQL Database, ".mysql_error();
		prn_error($msg);
		log_error($func.$msg);
		return(FALSE);
	}
	
	if(mysql_select_db(SQL_DB) == FALSE) {
		$msg = "Could not select SQL database, ".mysql_error();
		prn_error($msg);
		log_error($func.$msg);
		return(FALSE);
	}
	
	return($con);
}

function sql_exec($qry, $con) {
	$func = "sql_exec: ";
	if(($res = mysql_query($qry, $con)) == FALSE) {
		$msg = "Could not query SQL database, ".mysql_error();
		prn_error($msg);
		log_error($func.$msg);
		return($res);
	}
	
	return($res);
}


function sql_close($con) {
	mysql_close($con);
	return(TRUE);
}

?>
