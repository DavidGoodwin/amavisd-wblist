

<table>
    <tr><th>id</th>
    <th>priority</th>
    <th>policy</th>
    <th>fullname</th>
    <th>email</th>
        <th colspan="2"></th>
    </tr>
    {foreach from=$recipients item=row}
        <tr>
            <form action="recipient.php" method="POST">
                <input type="hidden" name="id" value="{$row['id']}">
                <input type="hidden" name="fullname" value="{$row['fullname']|escape:"htmlall"}"/>
                <input type="hidden" name="email" value="{$row['email']|escape:"htmlall"}"/>

                <td>
                    <a href="recipient.php?id={$row['id']}">{$row['id']}</a>
                </td>
                <td>
                    <select name="priority">
                        {foreach from=$priorities item=priority}
                            <option value="{$priority}"
                                    {if $row['priority'] == $priority}selected="selected"{/if}>{$priority}</option>
                        {/foreach}
                    </select>

                </td>

                <td>
                    <select name="policy_id">
                        {foreach from=$policies item=policy}
                            <option value="{$policy['id']}"
                                    {if $row['policy_id'] == $policy['id']}
                                        selected="selected"
                                    {/if}
                            >{$policy['policy_name']|escape:htmlall}</option>
                        {/foreach}
                    </select>


                </td>
                <td>
                    {$row['fullname']}
                </td>
                <td>{$row['email']}</td>

                <td><input type="submit" value="update">
                </td>
            </form>
            <td>
                <form method="POST" action="removerecipient.php">
                    <input type="hidden" name="id" value="{$row['id']}"/>
                    <input type="submit" value="Delete"/>
                </form>
            </td>
        </tr>
    {/foreach}

</table>

<p>
<a href="recipient.php">Add new recipient</a>
</p>

<h3>Notes</h3>

<p><strong>Higher priorities</strong> take effect first.</p>

<p>You do not need to add all recipients within your organisation here; only those you wish to have :

    <ul>
    <li>entries in a whitelist/blacklist, or</li>
    <li>customised policy control for.</li>
</ul>

</p>