<?php
 require_once('common.php');
 
  // check input
  if(!isset($_REQUEST['id']) || !is_numeric($_REQUEST['id'])) {
    // bad input redirect to the search page
    header("Location", "search.php");
    exit;
  }
  prn_head("View Receiver Entry");
  prn_body("View Receiver Entry");

  print "<table border=0 width=100%>\n";
  
  $conn = sql_open();
  
  $id = $_REQUEST['id'];
		
  // get user information first and display it
  $qry = "select * from users where id=$id";

  $res = sql_exec($qry, $conn);
  $nrows = sql_num_rows($res);
  if($nrows != 1) {
    print "<tr><td>".FONT2."Error in retrieving user data, please try again.".FONTE."</td></tr>\n";
  } else {
    $row = mysql_fetch_row($res);
    /* 
     * row[0] id
     * row[1] priority - sort order 0 is low, 9 high
     * row[2] policy
     * row[3] email
     * row[4] full name
     * row[5] local (Y/N)
    */
    $id = $row[0];
    $priority = $row[1];
    $policy = $row[2];
    $email = $row[3];
    $fn = $row[4];
    $local = $row[5];
    
    print "<form action=\"updatereceiver.php\" method=\"POST\">\n";
    print "<input type=\"hidden\" name=\"id\" value=\"$id\">\n";
    
    // print out the user data
    print "<tr><td align=center>".FONT2."ID $row[0]".FONTE."</td><td align=center>".FONT2.""."Priority <select name=\"priority\">";
    for($i = 0 ;$i< 10 ;$i++) {
      print "<option";
      if($i == $priority) print " selected";
      print ">$i\n";
    }
    print "</select>".FONTE."</td>";

    print "<td align=center>".FONT2."Policy <select name=\"policy\">\n";

    mysql_free_result($res);

    $qry = "select id,policy_name from policy";
    $res = sql_exec($qry, $conn);
    
    while($row = mysql_fetch_row($res)) {
      print "<option value=\"$row[0]\"";
      if($row[0] == $policy) {
        print " selected";
      }
      print ">$row[1]\n";
    }
    print "</select>".FONTE."</td>";
    mysql_free_result($res);
    
    print "<td align=center>".FONT2."Local User? <select name=\"local\"><option value=\"Y\"";
    if(strcmp($local, "Y") == 0) print " selected";
    print ">Yes\n<option value=\"N\"";
    if(strcmp($local, "N") == 0) print " selected";
    print ">No</select>".FONTE."</td>";
    
    print "</tr>";
  
    print "<tr><td colspan=\"2\">".FONT2."Full Name <input type=\"text\" name=\"fn\" value=\"$fn\" size=30 maxlegth=255>".FONTE."</td>\n";
    print "<td colspan=\"2\">".FONT2."Email Address <input type=\"text\" name=\"email\" value=\"$email\" size=30 maxlegth=255>".FONTE."</td>\n";
    print "</tr>";
    
    print "<tr><td align=center colspan=\"2\">".FONT2."<input type=\"submit\" value=\"Submit\"></td>\n";
    print "<td align=center colspan=\"2\">".FONT2."<input type=\"reset\" value=\"Reset\"></td>\n";
    print "</tr>";
    
    print "</form>\n";

    // get wblist information, relating senders to mailaddr table
    $qry = "select distinct wblist.sid,mailaddr.email,wblist.wb from wblist,mailaddr where wblist.rid=$id and wblist.sid=mailaddr.id";
    $res = sql_exec($qry, $conn);
    
	  print "<tr><td colspan=\"4\">&nbsp;</td></tr>\n";
	  print "<tr><td colspan=\"4\" align=center><a href=\"addwb.php?rid=$id\">Add New White/Black List Entry</a></td></tr>\n";
    print "<tr><td colspan=\"2\" align=\"center\">EMail Address</td>";
    print "<td align=\"center\">".FONT2."White/Black/Neutral list".FONTE."</td></tr>\n";
    while($row = mysql_fetch_row($res)) {
    	print "<tr><td colspan=\"2\" align=\"center\">".FONT2."<a href=\"viewsender.php?id=$row[0]\">$row[1]</a>".FONTE."</td>".
    		"<td align=\"center\">".FONT2;
    	if(strcmp($row[2], "W") == 0) {
    		print "White";
    	} else if (strcmp($row[2], "B") == 0) {
    		print "Black";
    	} else if (strcmp($row[2], "N") == 0) {
    		print "Neutral";
    	} else if(strcmp($row[2], " ") == 0) {
    		print "Neutral";
    	} else if(strlen($row[2]) == 0) {
    		print "Neutral";
    	} else {
    		printf("%.02f", $row[2]);
    	}
    	
    	print FONTE."</td>\n";
	    print "<td align=\"center\">".FONT2."<a href=\"removewb.php?sid=$row[0]&rid=$id\">Remove</a>/<a href=\"modifywb.php?sid=$row[0]&rid=$id\">Modify</a></td></tr>\n";
    }
    sql_close($conn);
  }
  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
