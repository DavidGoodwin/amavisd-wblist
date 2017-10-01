
{$form}

<h3>Notes</h3>
<ul>
    <li>'email' can be '@.' to catch everything, or '@domain.name' or 'specific.user@domain.name'</li>
    <li>priority - higher values take effect first.
    <li>You do not have to add recipient entries for everyone - only those you want non-standard policies/control.</li>
</ul>

{if $show_wblist}
<h2>White/Blacklist entries</h2>

    <table>
        <tr>
            <th>sender</th>
            <th>Black/Whitelist/Neutral/Score</th>
            <th></th>
        </tr>
    {foreach from=$wblist item=row}
        <tr>
            <td><A href="sender.php?id={$row['sid']}">{$row['sid']} {$row['email']}</A></td>
            <td>{$row['wb']}</td>
            <td>Remove?</td>
        </tr>
    {/foreach}

{/if}