<?php

require_once('common.php');

  prn_head("Add WBList");
  prn_body("Add WBList");

  /* check input data is there */
  
  $rid = $_REQUEST['rid'];
  $sid = $_REQUEST['sid'];
  $wb = $_REQUEST['wb'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing addition</font><br>\n";
  $conn = sql_open();

  $qry = "insert into wblist values\n".
    "\t($rid,$sid,'$wb')";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully added WBList record.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  prn_copyend();
  
?>
