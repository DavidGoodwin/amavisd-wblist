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
  
  // check input
  if(!isset($_REQUEST['rid']) || !is_numeric($_REQUEST['rid'])) {
    // bad input redirect to the search page
    header("Location", BASEURL."search.php");
    exit;
  }
  prn_head("Add Whitelist Entry");
  prn_body("Add Whitelist Entry");

  print "<table border=0 width=100%>\n";
  
  $conn = sql_open();
  
  $rid = $_REQUEST['rid'];
		
  print "<form action=\"insertwb.php\" method=\"POST\">\n";
  print "<input type=\"hidden\" name=\"rid\" value=\"$rid\">\n";
    
  // get user information first and display it
  $qry = "select id,email from mailaddr";

  $res = sql_exec($qry, $conn);

  print "<tr><td colspan=\"2\">".FONT2."Select sender to add: <select name=\"sid\">";
  /* eventually will have to replace this with a search popup/java paste input box */
  while($row = mysql_fetch_row($res)) {
    print "<option value=$row[0]>$row[1]\n";
  }
  print "</select>".FONTE."</td></tr>\n";

	print "<tr><td align=center colspan=\"2\">".FONT2."<input type=\"text\" name=\"wb\" size=5 maxlength=5></td></tr>\n";
  print "<tr><td align=center>".FONT2."<input type=\"submit\" value=\"Submit\"></td>\n";
  print "<td align=center>".FONT2."<input type=\"reset\" value=\"Reset\"></td>\n";
  print "</tr>";
    
  print "</form>\n";

  sql_close($conn);
  
  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
