<?php

require_once('common.php');

  
  // check input
  if(!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
    // bad input redirect to the search page
    header("Location", "search.php");
    exit;
  }
  prn_head("View Sender Entry");
  prn_body("View Sender Entry");

  print "<table border=0 width=100%>\n";
  
  $conn = sql_open();
  
  $id = $_REQUEST['id'];
		
  // get user information first and display it
  $qry = "select * from mailaddr where id=$id";

  $res = sql_exec($qry, $conn);
  $nrows = sql_num_rows($res);
  if($nrows != 1) {
    print "<tr><td>".FONT2."Error in retrieving user data, please try again.".FONTE."</td></tr>\n";
  } else {
    $row = mysql_fetch_row($res);
    /* 
     * row[0] id
     * row[1] priority - sort order 0 is low, 9 high
     * row[2] email
    */
    $id = $row[0];
    $priority = $row[1];
    $email = $row[2];
    
    print "<form action=\"updatesender.php\" method=\"POST\">\n";
    print "<input type=\"hidden\" name=\"id\" value=\"$id\">\n";
    
    // print out the user data
    print "<tr><td align=center>".FONT2."ID $row[0]".FONTE."</td><td align=center>".FONT2.""."Priority <select name=\"priority\">";
    for($i = 0 ;$i< 10 ;$i++) {
      print "<option";
      if($i == $priority) print " selected";
      print ">$i\n";
    }
    print "</select>".FONTE."</td>";

    print "<td align=\"center\">".FONT2."Email Address <input type=\"text\" name=\"email\" value=\"$email\" size=30 maxlegth=255>".FONTE."</td>\n";
    print "</tr>";
    
    print "<tr><td align=center colspan=\"2\">".FONT2."<input type=\"submit\" value=\"Submit\"></td>\n";
    print "<td align=center colspan=\"2\">".FONT2."<input type=\"reset\" value=\"Reset\"></td>\n";
    print "</tr>";
    
    print "</form>\n";

    // get wblist information, relating senders to mailaddr table
    $qry = "select distinct wblist.rid,users.email,wblist.wb from wblist,users where wblist.sid=$id and wblist.rid=users.id";
    $res = sql_exec($qry, $conn);
    
	  print "<tr><td colspan=\"4\">&nbsp;</td></tr>\n";
	  print "<tr><td colspan=\"4\" align=center>".FONT2."<a href=\"removesender.php?sid=$id\">Remove this entry</a>".FONTE."</td></tr>\n";
    print "<tr><td colspan=\"2\" align=\"center\">EMail Address</td>";
    print "<td colspan=\"2\" align=\"center\">".FONT2."White/Black/Neutral list".FONTE."</td></tr>\n";
    while($row = mysql_fetch_row($res)) {
    	print "<tr><td colspan=\"2\" align=\"center\">".FONT2."<a href=\"viewreceiver.php?id=$row[0]\">$row[1]</a>".FONTE."</td>".
    		"<td colspan=\"2\" align=\"center\">".FONT2;
    	if(strcmp($row[2], "W") == 0) {
    		print "White";
    	} else if (strcmp($row[2], "B") == 0) {
    		print "Black";
    	} else {
    		print "Neutral";
    	}
    	print FONTE."</td></tr>\n";
    }
    sql_close($conn);
  }
  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
