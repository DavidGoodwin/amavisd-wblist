<?php

include_once('php/defines.php');

prn_head("Add Policy Entry");
prn_body("Add Policy Entry");

$FONT2 = FONT2;
$FONTEND = FONTE;

echo <<<EOF

<table border=0 width="100%">;
<form action="insertpolicy.php" method="POST">
    <tr><td width=50% align=left>{$FONT2}Policy name. (<font color="red">This is the only required field.</font>)</font>{$FONTEND}</td>
    <td width=50% align=left>{$FONT2}<input type=text name=policy_name size=30 maxlength=255>{$FONTEND}</td></tr>
    
EOF;

foreach (['virus_lover' => 'Virus Lover',
             'spam_lover' => 'Spam Lover',
             'banned_files_lover' => 'Banned Files Lover',
             'bad_header_lover' => 'Bad Header Lover',
             'bypass_virus_checks' => 'Bypass Virus Checks',
             'bypass_spam_checks' => 'Bypass Spam Checks',
             'bypass_bamned_checks' => 'Bypass Banned File Checks',
             'bypass_header_checks' => 'Bypass Banned Header Checks',
             'spam_modifies_subj' => 'Spam Modifies Subject',
             'warnvirusrecip' => 'Warn Virus Recipient?',
             'warnbannedrecip' => 'Warn Banned File Recipient?',
             'wanbadhrecip' => 'Warn Bad Header Recipient?',

         ] as $name => $label) {
    echo "<tr>
<td>{$FONT2}$label{$FONTEND}</td>
<td>{$FONT2}
<select name='{$name}'>
    <option value='Y'>Yes</option>
    <option value='N'>No</option>
    <option value='' selected>Default</option>
    </select>
    </td>
    </tr>";
}


print "<tr><td colspan=2 align=center>" . FONT2 . "These should be floating point if not left blank.<br>\n<b>Warning:</b> setting incorrect values will cause mail to be dropped!" . FONTE . "</td></tr>\n";

foreach(['spam_tag_level' => 'Insert header tags starting at what level?',
            'spam_tag2_level' => 'Mark as spam starting at what level?',
            'spam_kill_level' => 'Spam quarantine only cutoff?',
            'spam_dsn_cutoff_level' => 'Do Not send notifications after this level.',
            'spam_quarantine_cutoff_level' => 'No longer quarantine after this level.',
            ] as $name => $label) {
    echo "<tr><td>{$FONT2}{$label}{$FONTEND}</td>";
    echo "<td>{$FONT2}<input type='text' name='{$name}' size='6' maxlength='6'>{$FONTEND}</td>td></tr>\n";
}

print "<tr><td colspan=2><br></td></tr>\n";

print "<tr><td colspan=2 align=center>" . FONT2 . "Leave everything else to the default values (blank) or change <b>ONLY</b> if you know what you are doing!" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Quarantine Virus To?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=virus_quarantine_to size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Quarantine Spam To?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=spam_quarantine_to size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Quarantine Banned Files To?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=banned_quarantine_to size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Quarantine Bad Headers To?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=bad_header_quarantine_to size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Quarantine Clean Messages To?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=clean_quarantine_to size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Quarantine All Other Messages To?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=other_quarantine_to size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Address extension for virus messages." . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=addr_extension_virus size=6 maxlength=6>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Address extension for spam messages." . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=addr_extension_spam size=6 maxlength=6>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Address extension for banned file messages." . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=addr_extension_banned size=6 maxlength=6>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Address extension for bad header messages." . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=addr_extension_bad_header size=6 maxlength=6>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "New virus admin email to?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=newvirus_admin size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Other virus admin email to?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=virus_admin size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Banned file admin email to?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=banned_admin size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Bad header admin email to?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=bad_header_admin size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Spam admin email to?" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=spam_admin size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Set Spam message subject to include:" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=spam_subject_tag size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Set Spam message subject second level to include:" . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=spam_subject_tag2 size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Maximum Message Size to Scan (in bytes)." . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=message_size_limit size=10 maxlength=10>" . FONTE . "</td></tr>\n";

print "<tr><td>" . FONT2 . "Comma seperated list of bad rule names." . FONTE . "</td>\n";
print "<td>" . FONT2 . "<input type=text name=banned_rulenames size=30 maxlength=64>" . FONTE . "</td></tr>\n";

print "<tr><td align=center><input type=\"submit\" value=\"Form\"></td>\n";
print "<td align=center><input type=\"reset\" value=\"Reset Form\"></td></tr>\n";
print "</form>\n";

print "<tr><td align=center colspan=\"4\">" . FONT2;
print "<a href=\"" . BASEPATH . "\">Return</a></td></tr>\n";
print "</table>\n";
print "<tr><td>&nbsp;</td></tr>\n";
prn_copyend();

