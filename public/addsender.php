<?php
require_once('common.php');

  
  prn_head("Add Sender Entry");
  prn_body("Add Sender Entry");

  print "<table border=0 width=100%>\n";
  
  print "<form action=\"insertsender.php\" method=\"POST\">\n";
    
  // print out the user data
  print "<tr><td align=center>".FONT2.""."Priority <select name=\"priority\">";
  for($i = 0 ;$i< 10 ;$i++) {
    print "<option";
    if($i == 7) print " selected";
    print ">$i\n";
  }
  print "</select>".FONTE."</td>";

  print "<td align=\"center\">".FONT2."Email Address <input type=\"text\" name=\"email\" size=30 maxlegth=255>".FONTE."</td>\n";
  print "</tr>";
    
  print "<tr><td align=center>".FONT2."<input type=\"submit\" value=\"Submit\"></td>\n";
  print "<td align=center>".FONT2."<input type=\"reset\" value=\"Reset\"></td>\n";
  print "</tr>";
    
  print "</form>\n";

  print "<tr><td align=center colspan=\"2\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
