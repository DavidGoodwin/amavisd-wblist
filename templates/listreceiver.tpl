<h1>Recipient List</h1>


<table>
    <tr><th>id</th>
    <th>priority</th>
    <th>policy</th>
    <th>fullname</th>
    <th>email</th>
    </tr>
    {foreach from=$receivers item=row}
        <tr>
            <form action="receiver.php" method="POST">
                <input type="hidden" name="id" value="{$row['id']}">
                <input type="hidden" name="fullname" value="{$row['fullname']|escape:"htmlall"}"/>
                <input type="hidden" name="email" value="{$row['email']|escape:"htmlall"}"/>

                <td>
                    <a href="receiver.php?id={$row['id']}">{$row['id']}</a>
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

                <td><input type="submit" value="update"></td>
            </form>
        </tr>
    {/foreach}

</table>


{*
    // get wblist information, relating senders to mailaddr table
    $qry = "select distinct wblist.sid,mailaddr.email,wblist.wb from wblist,mailaddr where wblist.rid=$id and wblist.sid=mailaddr.id";
    $res = sql_exec($qry, $conn);

    print "<tr><td colspan=\"4\">&nbsp;</td></tr>\n";
    print ">Add New White/Black List Entry</a></td></tr>\n";
    print "<tr><td colspan=\"2\" align=\"center\">EMail Address</td>";
        print "<td align=\"center\">".FONT2."White/Black/Neutral list".FONTE."</td></tr>\n";
    while($row = mysql_fetch_row($res)) {
    print "<tr><td colspan=\"2\" align=\"center\">".FONT2."<a href=\"viewsender.php?id=$row[0]\">$row[1]</a>".FONTE."</td>".
        "<td align=\"center\">".FONT2;
            if(strcmp($row[2], "W") == 0) {
            print "White";
            } else if (strcmp($row[2], "B") == 0) {
            print "Black";
            } else if (strcmp($row[2], "N") == 0) {
            print "Neutral";
            } else if(strcmp($row[2], " ") == 0) {
            print "Neutral";
            } else if(strlen($row[2]) == 0) {
            print "Neutral";
            } else {
            printf("%.02f", $row[2]);
            }

            print FONTE."</td>\n";
        print "<td align=\"center\">".FONT2."<a href=\"removewb.php?sid=$row[0]&rid=$id\">Remove</a>/<a href=\"modifywb.php?sid=$row[0]&rid=$id\">Modify</a></td></tr>\n";
    }
    sql_close($conn);
    }
    print "<tr><td align=center colspan=\"4\">".FONT2;
            print "<a href=\"".BASEPATH."\">Return</a></td></tr>\n";
    print "</table>\n";
print "<tr><td>&nbsp;</td></tr>\n";
prn_copyend();
?>

*}