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
