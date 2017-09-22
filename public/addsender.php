<?php
require_once('common.php');


prn_head("Add Sender Entry");
prn_body("Add Sender Entry");

echo <<<EOF

<form action='insertsender.php' method='POST'>;

<table border=0 width=100%>

EOF;

// print out the user data
echo '<tr><td align=center>Priority <select name="priority">';

for ($i = 0; $i < 10; $i++) {
    print "<option";
    if ($i == 7) {
        print " selected";
    }
    print ">$i</option>\n";
}
print "</select></td>
<td align='center'>Email Address <input type='text' name='email' size=30 maxlegth=255>
</td>
</tr>


<tr><td align=center><input type='submit' value='Submit'></td>
<td align=center><input type='reset' value='Reset'></td>
</tr>

<tr><td align=center colspan='2'>
<a href='{$BASEPATH}'>Return</a></td></tr>
</table>
</form>";

prn_copyend();

