<?php

require_once('common.php');

  prn_head("Update Receiver");
  prn_body("Update Receiver");

  /* check input data is there */
  
  $id = $_REQUEST['id'];
  $priority = $_REQUEST['priority'];
  $policy = $_REQUEST['policy'];
  $email = $_REQUEST['email'];
  $fn = $_REQUEST['fn'];
  $local = $_REQUEST['local'];
  
  print "<table border=0 width=100%><tr><td align=center>".FONT2;
  print "<font color=\"green\">Processing addition</font><br>\n";
  $conn = sql_open();

  $qry = "update users set\n".
    "\tpriority=$priority,policy_id=$policy,\n".
    "\tlocal='$local',email='$email',\n".
    "\tfullname='$fn'\n".
    "\twhere id=$id";

  $retv = sql_exec($qry, $conn);
  if(!$retv) {
    print "<font color=\"red\">Error processing record.  Please review messages and try again.</font><br>\n";
  } else {
    print "<font color=\"green\">Successfully updated record ID $id for user $fn.</font><br>\n";
	}
	
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>";
  prn_copyend();
  
?>
