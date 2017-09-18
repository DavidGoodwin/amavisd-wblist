<?php

require_once('common.php');

  prn_head("Update Sender");
  prn_body("Update Sender");

  /* check input data is there */
	$id = $_REQUEST['id'];  
  $priority = $_REQUEST['priority'];
  $email = $_REQUEST['email'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing addition</font><br>\n";
  $conn = sql_open();

  $qry = "update mailaddr set priority=$priority,email='$email' where id=$id";
  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully added updated recrod for sender $email.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
  prn_copyend();
  
?>
