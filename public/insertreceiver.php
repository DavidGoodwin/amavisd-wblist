<?php

require_once('common.php');

  prn_head("Add Receiver");
  prn_body("Add Receiver");

  /* check input data is there */
  
  $priority = $_REQUEST['priority'];
  $policy = $_REQUEST['policy'];
  $email = $_REQUEST['email'];
  $fn = $_REQUEST['fn'];
  $local = $_REQUEST['local'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing addition</font><br>\n";
  $conn = sql_open();

  $qry = "insert into users values\n".
    "\t(0,$priority,$policy,'$email','$fn','$local')";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully added record for user $fn.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>";
  prn_copyend();
  
?>
