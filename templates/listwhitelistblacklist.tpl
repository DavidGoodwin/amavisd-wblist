
<style>
    td {
        text-align: center;
    }
    tr:first-child {
        background: #FF0;
    }
    tr:nth-child(2n+3) {
        background: #CCC;
    }
</style>

<table>
    <tr>
        <th>Sender/Mail from</th>
        <th>Recipient email</th>
        <th>Recipient name</th>
        <th>Priority</th>
        <th>State</th>
        <th>Actions</th>
    </tr>
    {foreach from=$senders item=row}
        <tr>
            <td>{$row['sender_email']}</td>
            <td>{$row['recipient_email']}</td>
            <td>{$row['recipient_name']}</td>
            <td>{$row['recipient_priority']}</td>
            <td>
                {if $row['blacklist_whitelist'] == 'W'}
                    Whitelisted
                {elseif $row['blacklist_whitelist'] == 'B'}
                    Blacklisted
                {elseif $row['blacklist_whitelist'] == 'N'}
                    Neutral
                {elseif $row['blacklist_whitelist'] == '0'}
                    Neutral (0)
                {else}
                Score {$row['blacklist_whitelist']}
            {/if}
            </td>
            <td>
                <form method="post" action="removewb.php">
                    <input type="hidden" name="rid" value="{$row['rid']}"/>
                    <input type="hidden" name="sid" value="{$row['sid']}"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
    {/foreach}
</table>


<a href="whitelistblacklist.php">Add new entry</a>
