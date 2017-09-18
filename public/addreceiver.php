<?php
require_once('common.php');
  
  prn_head("Add Receiver Entry");
  prn_body("Add Receiver Entry");

  print "<table border=0 width=100%>\n";
  
  $conn = sql_open();
  
  print "<form action=\"insertreceiver.php\" method=\"POST\">\n";
    
  // print out the user data
  print "<tr><td align=center>".FONT2.""."Priority <select name=\"priority\">";
  for($i = 0 ;$i< 10 ;$i++) {
    print "<option";
    if($i == 7) print " selected";
    print ">$i\n";
  }
  print "</select>".FONTE."</td>";

  print "<td align=center>".FONT2."Policy <select name=\"policy\">\n";

  mysql_free_result($res);

  $qry = "select id,policy_name from policy";
  $res = sql_exec($qry, $conn);
    
  while($row = mysql_fetch_row($res)) {
    print "<option value=\"$row[0]\">$row[1]\n";
  }

  print "</select>".FONTE."</td>";
  mysql_free_result($res);
    
  print "<td align=center>".FONT2."Local User? <select name=\"local\"><option value=\"Y\">Yes\n";
  print "<option value=\"N\">No</select>".FONTE."</td>";
  print "</tr>";
  
  print "<tr><td colspan=\"2\">".FONT2."Full Name <input type=\"text\" name=\"fn\" size=30 maxlegth=255>".FONTE."</td>\n";
  print "<td colspan=\"2\">".FONT2."Email Address <input type=\"text\" name=\"email\" size=30 maxlegth=255>".FONTE."</td>\n";
  print "</tr>";
    
  print "<tr><td align=center colspan=\"2\">".FONT2."<input type=\"submit\" value=\"Submit\"></td>\n";
  print "<td align=center colspan=\"2\">".FONT2."<input type=\"reset\" value=\"Reset\"></td>\n";
  print "</tr>";
    
  print "</form>\n";

  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
