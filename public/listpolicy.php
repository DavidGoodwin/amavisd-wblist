<?php

require_once('common.php');

prn_head("List Policy Database");
prn_body("List Policy Database");


// find in users table
$qry = "SELECT id,policy_name FROM policy";

$rows = db_query($qry);

print "<table border=0 width=100%>\n";
print "<tr><td><span class='$FONT2'>List of policy names, click to view policy</span></td></tr>\n";
foreach ($rows as $row) {
    print "<tr><td><span class='$FONT2'><a href=\"viewpolicy.php?id=${row['id']}\">{$row['policy_name']}</a></span></td></tr>\n";

}

print "<tr><td align=center><a href=\"" . BASEPATH . "\">Return</a></td></tr></table>";

prn_copyend();
