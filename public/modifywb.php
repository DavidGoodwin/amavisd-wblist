<?php
 
require_once('common.php');
 
  // check input
  if(!isset($_REQUEST['rid']) || !is_numeric($_REQUEST['rid']) ||
  		!isset($_REQUEST['sid']) || !is_numeric($_REQUEST['sid'])) {
    // bad input redirect to the search page
    header("Location", "search.php");
    exit;
  }
  prn_head("Modify Whitelist Entry");
  prn_body("Modify Whitelist Entry");

  print "<table border=0 width=100%>\n";
  
  $conn = sql_open();
  
  $rid = $_REQUEST['rid'];
  $sid = $_REQUEST['sid'];
		
  // get user information first and display it
  $qry = "select wb from wblist where rid=$rid and sid=$sid";

  $res = sql_exec($qry, $conn);
  $nrows = sql_num_rows($res);
  if($nrows != 1) {
    print "<tr><td>".FONT2."Error in retrieving user data, please try again.".FONTE."</td></tr>\n";
  } else {
    $row = mysql_fetch_row($res);
    /* 
     * row[0] W/B/N/Score
    */
    $wb = $row[0];
		mysql_free_result($res);
		
		$qry = "select email from mailaddr where id=$sid";
		$res = sql_exec($qry, $conn);
    $row = mysql_fetch_row($res);
    $semail = $row[0];
    mysql_free_result($res);
    
		$qry = "select email from users where id=$rid";
		$res = sql_exec($qry, $conn);
    $row = mysql_fetch_row($res);
    $remail = $row[0];
    mysql_free_result($res);
    
    print "<form action=\"updatewb.php\" method=\"POST\">\n";
    print "<input type=\"hidden\" name=\"rid\" value=\"$rid\">\n";
    print "<input type=\"hidden\" name=\"sid\" value=\"$sid\">\n";
    print "<input type=\"hidden\" name=\"remail\" value=\"$remail\">\n";
    print "<input type=\"hidden\" name=\"semail\" value=\"$semail\">\n";
    
    print "<tr><td align=\"center\" colspan=\"2\">".FONT2."Changing WB List for sender <u>$semail</u> to receiver <u>$remail</u></td></tr>\n";
    print "<tr><td align=\"center\" colspan=\"2\">".FONT2."[W]hite/[B]lack/[N]eutral/Score <input type=\"text\" name=\"wb\" value=\"$wb\" size=5 maxlegth=5>".FONTE."</td>\n";
    print "</tr>";
    
    print "<tr><td align=center>".FONT2."<input type=\"submit\" value=\"Submit\"></td>\n";
    print "<td align=center>".FONT2."<input type=\"reset\" value=\"Reset\"></td>\n";
    print "</tr>";
    
    print "</form>\n";

    sql_close($conn);
  }
  print "<tr><td align=center colspan=\"4\">".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  print "<tr><td>&nbsp;</td></tr>\n";
  prn_copyend();
?>
