<?php

require_once('common.php');

  prn_head("Update Receiver");
  prn_body("Update Receiver");

  /* check input data is there */
  
  $rid = $_REQUEST['rid'];
  $sid = $_REQUEST['sid'];
  $wb = $_REQUEST['wb'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing addition</font><br>\n";
  $conn = sql_open();

  $qry = "update wblist set\n".
    "\twb='$wb'\n".
    "\twhere sid=$sid and rid=$rid";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully updated record for sender $semail to receiver $remail.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>";
  prn_copyend();
  
?>
