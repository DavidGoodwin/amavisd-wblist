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
  prn_head("Add Receiver");
  prn_body("Add Receiver");

  /* check input data is there */
  
  $priority = $_REQUEST['priority'];
  $policy = $_REQUEST['policy'];
  $email = $_REQUEST['email'];
  $fn = $_REQUEST['fn'];
  $local = $_REQUEST['local'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing addition</font><br>\n";
  $conn = sql_open();

  $qry = "insert into users values\n".
    "\t(0,$priority,$policy,'$email','$fn','$local')";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully added record for user $fn.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>";
  prn_copyend();
  
?>
