<?php

require_once('common.php');


// check input
if (!isset($_REQUEST['rid']) || !is_numeric($_REQUEST['rid'])) {
    // bad input redirect to the search page
    header("Location", BASEURL . "search.php");
    exit;
}
prn_head("Add Whitelist Entry");
prn_body("Add Whitelist Entry");

print "
<form action='insertwb.php' method='POST'>
<table border=0 width=100%>\n";


$rid = (int)$_REQUEST['rid'];

echo "<input type='hidden' name='rid' value='{$rid}'>";

$qry = "SELECT id,email FROM mailaddr";

$rows = db_query($qry);

print " <tr><td colspan='2'>Select sender to add: <select name='sid'>";

foreach ($rows as $row) {
    print "<option value={$row['id']}>{$row['email']}</option>";
}
print "</select></td></tr>

<tr><td align=center colspan ='2'><input type='text' name='wb' size='5' maxlength='5'></td></tr>
<tr><td align=center><input type='submit' value='Submit'></td>
<td align=center><input type='reset' value='Reset'></td>
</tr>

<tr><td align=center colspan='4'>
<a href='{$BASEPATH}'>Return</a></td></tr>
</table>
</form>";

prn_copyend();
