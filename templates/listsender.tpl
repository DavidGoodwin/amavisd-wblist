<h1>Sender List</h1>


<table>
    <tr>
        <th>id</th>
        <th>priority</th>
        <th>email</th>

    </tr>
    {foreach from=$senders item=row}
        <tr>
            <td>
                <a href="sender.php?id={$row['id']}">{$row['id']}</a>
            </td>

            <td>
               {$row['priority']}

            </td>

            <td>{$row['email']|escape:'htmlall'}</td>
        </tr>
    {/foreach}

</table>


<A href="sender.php">Add new sender</A>