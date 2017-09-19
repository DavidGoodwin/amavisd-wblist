<?php

require_once('common.php');

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

$fields = [
    ['name' => 'virus_lover', 'label' => 'Virus Lover', 'type' => 'selectyn_'],
    ['name' => 'spam_lover', 'label' => 'Spam Lover', 'type' => 'selectyn_'],
    ['name' => 'banned_files_lover', 'label' => 'Banned Files Lover', 'type' => 'selectyn_'],
    ['name' => 'bypass_virus_checks', 'label' => 'Bypass Virus Checks', 'type' => 'selectyn_'],
    ['name' => 'bypass_spam_checks', 'label' => 'Bypass Spam Checks', 'type' => 'selectyn_'],
    ['name' => 'bypass_banned_checks', 'label' => 'Bypass Banned File Checks', 'type' => 'selectyn_'],
    ['name' => 'bypass_header_checks', 'label' => 'Bypass Header Checks', 'type' => 'selectyn_'],
    ['name' => 'spam_modifies_subj', 'label' => 'Spam Modifies Subject', 'type' => 'selectyn_'],
    ['name' => 'warnvirusrecip', 'label' => 'Warn Virus Recipient', 'type' => 'selectyn_'],
    ['name' => 'warnbannedrecip', 'label' => 'Warn Banned File Recipient', 'type' => 'selectyn_'],
    ['name' => 'warnbadhrecip', 'label' => 'Warn Bad Header Recipient', 'type' => 'selectyn_'],

    ['name' => 'spam_tag_level', 'label' => 'Insert header tags starting at what level?', 'type' => 'text'],
    ['name' => 'spam_tag2_level', 'label' => 'Mark as spam startin gat what level?', 'type' => 'text'],
    ['name' => 'spam_kill_level', 'label' => 'Spam Quarantine only cutoff', 'type' => 'text'],
    ['name' => 'spam_dsn_cutoff_level', 'label' => 'Do Not send notifications after this level', 'type' => 'text'],
    ['name' => 'spam_quarantine_cutoff_level', 'label' => 'Do not quarantine after this level', 'type' => 'text'],


    ['name' => 'virus_quarantine_to', 'label' => 'Quarantine Virus To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength'=> 64],
    ['name' => 'spam_quarantine_to', 'label' => 'Quarantine Spam To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength'=> 64],
    ['name' => 'banned_quarantine_to', 'label' => 'Quarantine Banned Files to?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength'=> 64],
    ['name' => 'bad_header_quarnatine_to', 'label' => 'Bad Header Quarantine To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength'=> 64],
    ['name' => 'other_quarantine_to', 'label' => 'Quarantine All Other Messages To?', 'advanced' => true, 'type' => 'text', 'size' => 30, 'maxlength'=> 64],

    ['name' => 'addr_extension_virus', 'label' => 'Address extension for virus messages', 'advanced' => true, 'type' => 'text', 'size' =>6, 'maxlength'=> 6],
    ['name' => 'addr_extension_spam', 'label' => 'Address extension for spam messages', 'advanced' => true, 'type' => 'text', 'size' =>6, 'maxlength'=> 6],
    ['name' => 'addr_extension_banned', 'label' => 'Address extension for banned messages', 'advanced' => true, 'type' => 'text', 'size' =>6, 'maxlength'=> 6],
    ['name' => 'addr_extension_bad_header', 'label' => 'Address extension for bad header messages', 'advanced' => true, 'type' => 'text', 'size' =>6, 'maxlength'=> 6],

    ['name' => 'newvirus_admin', 'label' => 'New virus admin email to?', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],
    ['name' => 'virus_admin', 'label' => 'Other virus admin email to?', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],
    ['name' => 'banned_admin', 'label' => 'Banned header admin email to?', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],
    ['name' => 'bad_header_admin', 'label' => 'Bad header admin email to?', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],
    ['name' => 'spam_admin', 'label' => 'Spam admin email to?', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],
    ['name' => 'spam_subject_tag', 'label' => 'Set Spam Message subject to include...', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],
    ['name' => 'spam_subject_tag2', 'label' => 'Set Spam Message second level subject to include...', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],

    ['name' => 'message_size_limit', 'label' => 'Maximum Message size to scan (bytes)', 'advanced' => true, 'type' => 'text', 'size' =>10, 'maxlength'=> 10],
    ['name' => 'banned_rulenames', 'label' => 'Comma seperated list of bad rule names', 'advanced' => true, 'type' => 'text', 'size' =>30, 'maxlength'=> 64],

];

foreach ($fields as $spec) {

    $spec['advanced'] = isset($spec['advanced']) ? $spec['advanced'] : false;

    $advanced_or_normal = $spec['advanced'] ? "advanced" : "normal";

    echo "
<tr>{$FONT2}{$spec['label']}{$FONTEND}</td>
      <td>{$FONT2}";

    echo "<label for={$spec['name']}>{$spec['label']}</label>";

    if ($spec['type'] == 'selectyn_') {
        echo "
<select name='{$spec['name']}'>
    <option value='Y'>Yes</option>
    <option value='N'>No</option>
    <option value='' selected='selected'>Default</option>
    </select>
    ";
    }

    if ($spec['type'] == 'text') {
        $spec['size'] = isset($spec['size']) ? $spec['size'] : 6;
        $spec['maxlength'] = isset($spec['maxlength']) ? $spec['maxlength'] : 6;

        echo "<input type='text' class="$advanced_or_normal" name='{$spec['name']}' size='${spec['size']}' maxlength='${spec['maxlength']}'/>";
    }


    echo "{$FONTEND}</td></tr>";
}


print "<tr><td align=center><input type=\"submit\" value=\"Form\"></td>\n";
print "<td align=center><input type=\"reset\" value=\"Reset Form\"></td></tr>\n";
print "</form>\n";

print "<tr><td align=center colspan=\"4\">" . FONT2;
print "<a href=\"" . BASEPATH . "\">Return</a></td></tr>\n";
print "</table>\n";
print "<tr><td>&nbsp;</td></tr>\n";
prn_copyend();

