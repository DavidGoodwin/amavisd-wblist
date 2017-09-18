<?php

require_once('common.php');

  prn_head("Remove Sender");
  prn_body("Remove Sender");

  /* check input data is there */
  
  $sid = $_REQUEST['sid'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing removal</font><br>\n";
  $conn = sql_open();

	/* first remove any wblist entries */
	
  $qry = "delete from wblist where sid=$sid";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully removed WBList records.</font><br>\n";
	}
	
  $qry = "delete from mailaddr where id=$sid";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully removed Sender record.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  prn_copyend();
  
?>
