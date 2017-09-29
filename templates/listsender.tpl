<h1>Sender List</h1>


<table>
    <tr>
        <th>id</th>
        <th>priority</th>
        <th>email</th>
        <td colspan="2"></td>
    </tr>
    {foreach from=$senders item=row}
        <tr>
            <td>
                {$row['id']}
            </td>

            <td>
               {$row['priority']}

            </td>
            <td>{$row['email']|escape:'htmlall'}</td>
            <td>
                <a href="sender.php?id={$row['id']}"><button>Edit</button></a>
            </td>
            <td>
            <form method="post" action="removesender.php">
                <input type="submit" value="Delete"/>
                <input type="hidden" name="id" value="{$row['id']}"/>
            </form>
            </td>
        </tr>
    {/foreach}

</table>

<h3>Notes</h3>

<p>Through correct use of priority, you should be able to have one policy apply to e.g. david@example.com,
    while everything else @example.com is covered by a different policy</p>
<A href="sender.php">Add new sender</A>