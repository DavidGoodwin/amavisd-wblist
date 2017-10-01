
<style>
    td {
        text-align: center;
    }
    td:first-child {
        background: #FF0;
    }
    td:nth-child(2n+3) {
        background: #CCC;
    }
</style>

<p>Click to view the policy....</p>

<table border=0 width=100%>
    <tr>
        <th>Name</th>
        <th>Spam Lover</th>
        <th>Virus Lover</th>
        <th>Banned Files Lover</th>
        <th>Bad Header Lover</th>
        <th>Bypass Virus Checks</th>
        <th>Bypass Spam Checks</th>
        <th>Bypass Header Checks</th>
        <th>Bypass Banned File Checks</th>
        <th>Spam Tag Level</th>
        <th>Spam Tag2 Level</th>
        <th>Spam Tag3 Level</th>
        <th>Spam Kill Level</th>
    </tr>
    {foreach from=$rows item=row}
        <tr>
            <td>
                <a href="policy.php?id={$row['id']}">{$row['policy_name']|escape:htmlall}</a>
            </td>
            <td>
                {$row['spam_lover']}
            </td>
            <td>{$row['virus_lover']}</td>
            <td>{$row['banned_files_lover']}</td>
            <td>{$row['bad_header_lover']}</td>

            <td>{$row['bypass_virus_checks']}</td>
            <td>{$row['bypass_spam_checks']}</td>
            <td>{$row['bypass_header_checks']}</td>
            <td>{$row['bypass_banned_checks']}</td>

            <td>{$row['spam_tag_level']}</td>
            <td>{$row['spam_tag2_level']}</td>
            <td>{$row['spam_tag3_level']}</td>
            <td>{$row['spam_kill_level']}</td>
        </tr>
    {/foreach}

</table>



<A href="policy.php">Add Policy</A>