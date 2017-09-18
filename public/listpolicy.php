<?php

require_once('common.php');

	prn_head("List Policy Database");
	prn_body("List Policy Database");

	print "<table border=0 width=100%>\n";
	
	$conn = sql_open();

	// find in users table
	$qry = "select id,policy_name from policy";
		
	$retv = sql_exec($qry, $conn);
	$nrows = sql_num_rows($retv);

	print "<tr><td>".FONT2."List of policy names, click to view policy".FONTE."</td></tr>\n";
	while($row = mysql_fetch_row($retv)) {
		print "<tr><td>".FONT2."<a href=\"viewpolicy.php?id=$row[0]\">$row[1]</a>".FONTE."</td></tr>\n";
	}
	mysql_free_result($retv);
	sql_close($conn);
	
  print "<tr><td align=center>".FONT2;
  print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
  print "</table>\n";
	prn_copyend();
?>
