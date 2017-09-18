<?php

require_once('common.php');

  prn_head("Remove WBList");
  prn_body("Remove WBList");

  /* check input data is there */
  
  $rid = $_REQUEST['rid'];
  $sid = $_REQUEST['sid'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing removal</font><br>\n";
  $conn = sql_open();

  $qry = "delete from wblist where rid=$rid and sid=$sid";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully removed WBList record.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  prn_copyend();
  
?>
