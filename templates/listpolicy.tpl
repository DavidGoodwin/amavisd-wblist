<h1>Policy List</h1>


<p>Click to view the policy....</p>

<table border=0 width=100%>
    {foreach from=$rows item=row}
        <tr>
            <td>
                <a href="viewpolicy.php?id={$row['id']}">{$row['policy_name']|escape:htmlall}</a>
            </td>
        </tr>
    {/foreach}

</table>

