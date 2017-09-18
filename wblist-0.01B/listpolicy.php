<?php
/*
 *  Copyright (C) 2008 James Bourne
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
 * Date: Feb 16, 2008
*/

	include_once('php/defines.php');
	prn_head("List Policy Database");
	prn_body("List Policy Database");

	print "<table border=0 width=100%>\n";
	
	$conn = sql_open();

	// find in users table
	$qry = "select id,policy_name from policy";
		
	$retv = sql_exec($qry, $conn);
	$nrows = sql_num_rows($retv);

	print "<tr><td>".FONT2."List of policy names, click to view policy".FONTE."</td></tr>\n";
	while($row = mysql_fetch_row($retv)) {
		print "<tr><td>".FONT2."<a href=\"viewpolicy.php?id=$row[0]\">$row[1]</a>".FONTE."</td></tr>\n";
	}
	mysql_free_result($retv);
	sql_close($conn);
	
  print "<tr><td align=center>".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
	prn_copyend();
?>
