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


function lprn_form($msg) {
	print "<form method=\"POST\" action=\"search.php\">".
	"$msg <input type=\"text\" size=\"40\" name=\"search\" maxlength=255><br>".
	"<input type=\"submit\" value=\"Submit\">".
	"</form>\n";
}

	include_once('php/defines.php');
	prn_head("Search Database");
	prn_body("Search Database");

	print "<table border=0 width=100%>\n";
	
	if(!isset($_REQUEST['search'])) {
		print "<tr><td align=center>Enter client name or email address to search.</td></tr>\n";
		print "<tr><td>&nbsp;</td></tr>\n";
		print "<tr><td align=center>";
		lprn_form("Enter Search Term");
		print "</td></tr>\n";
	
	} else {
		$conn = sql_open();
		// clean up input
		$search = $_REQUEST['search'];
		
		// find in users table
		$qry = "select * from users where email like '%$search%' or fullname like '%$search%' order by email";
		
		$retv = sql_exec($qry, $conn);
		$nrows = sql_num_rows($retv);
		if($nrows > 0) {
			// now find in mailaddr table
			print "<tr><td>There ";
			if($nrows > 1) {
				print "are";
				$p = "s";
				$p2 = "";
			} else {
				print "is";
				$p = "";
				$p2 = "es";
			}
			print " $nrows <u>receiver$p</u> available that match$p2 the term &quot;$search&quot;</td></tr>\n";
			while($row = mysql_fetch_row($retv)) {
				print "<tr><td><a href=\"viewreceiver.php?id=$row[0]\">$row[3] - $row[4]</a></td></tr>\n";
			}
		} else {
			print "<tr><td>There are no <u>receivers</u> matching the term &quot;$search&quot;.</td></tr>\n";
		}

		mysql_free_result($retv);
		
		print "<tr><td>&nbsp;</td></tr>\n";
		// find in users table
		$qry = "select * from mailaddr where email like '%$search%'";
		
		$retv = sql_exec($qry, $conn);
		$nrows =  sql_num_rows($retv);
		if($nrows > 0) {
			// now find in mailaddr table
			print "<tr><td>There ";
			if($nrows > 1) {
				print "are";
				$p = "s";
				$p2 = "";
			} else {
				print "is";
				$p = "";
				$p2 = "es";
			}
			print " $nrows <u>sender$p</u> available that match$p2 the term &quot;$search&quot;</td></tr>\n";
			while($row = mysql_fetch_row($retv)) {
				print "<tr><td><a href=\"viewsender.php?id=$row[0]\">$row[2]</a></td></tr>\n";
			}
		} else {
			print "<tr><td>There are no <u>senders</u> matching the term &quot;$search&quot;</td></tr>\n";
		}

		print "<tr><td>&nbsp;</td></tr>\n";
		print "<tr><td>";
		lprn_form("Search Again?");
		print "</td></tr>\n";
	
		mysql_free_result($retv);
		
		sql_close($conn);
	}
	
  print "<tr><td align=center>".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
	prn_copyend();
?>
