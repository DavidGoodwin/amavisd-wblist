<?php

require_once('common.php');

  
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
