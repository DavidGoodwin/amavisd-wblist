<?php
/*
 *  Copyright (C) 2004 James Bourne
 *
 *    This program is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program; if not, write to the Free Software
 *    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * Author: James Bourne
 * Email: jbourne@hardrock.org
 * Date: Oct 31, 2004
*/
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
