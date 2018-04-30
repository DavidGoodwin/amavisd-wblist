<script src='//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>


{literal}
<script>
    $(document).ready(function () {
        $('.markasham').click(function () {
            mailid = jQuery(this).data('mailid');
            button = jQuery(this);
            // mail_id hiding in data-mailid
            $.ajax({
                url: 'amavis-report.php',
                type: 'POST',
                data: {mail_id: mailid, mark_as: "ham" },
                dataType: "json",
                success: function (result) {
                    console.log(result);
                    button.removeClass('markasham');
                    button.replaceWith('<p>' + result.message + '</p>');
                    //jQuery(button).append(result.message);
                    console.log(result);
                }
            });
        });
        $('.markasspam').click(function () {
            mailid = jQuery(this).data('mailid');
            button = jQuery(this);
            // mail_id hiding in data-mailid
            $.ajax({
                url: 'amavis-report.php',
                type: 'POST',
                data: {mail_id: mailid, mark_as: "spam" },
                dataType: "json",
                success: function (result) {
                    console.log(result);
                    button.removeClass('markasspam');
                    button.replaceWith('<p>' + result.message + '</p>');
                    //jQuery(button).append(result.message);
                    console.log(result);
                }
            });
        });
        $('.releasefromquarantine').click(function () {
            mailid = jQuery(this).data('mailid');
            button = jQuery(this);
            // mail_id hiding in data-mailid
            console.log('RELEASE');
            $.ajax({
                url: 'quarantine-release.php',
                type: 'POST',
                data: {mail_id: mailid},
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    button.removeClass('releasefromquarantine');
                    button.replaceWith('<p>' + result.message + '</p>');
                    //jQuery(button).append(result.message);
                    console.log(result);
                }
            });
        });
    });
</script>
{/literal}

<p>Searching on: {$header|implode:", "} -- {$raw_count} rows found</p>


<p><a href='amavis-recent-mail.php'>Remove any filters and see the last hour's mail</a>
{if !$quarantined_only}
   | <a href='amavis-recent-mail.php?quarantined_only=true'>Show only quarantined mail</a>
{/if}
</p>


{$form}

{include file="pagination-control.tpl"}


<table border='1' padding='2'>
    <tr>
        <th>Time {$_up_down_msgs_time_num}</th>
        <th>Sender {$_up_down_s}</th>
        <th>Recipient {$_up_down_r}</th>
        <th width='100px'>Subject {$_up_down_subj}</th>
        <th>Spam Score</th>
        <th>Delivery Status</th>
        <th>Action</th>
        <th>Tools</th>
        <th>Message Id</th>
    </tr>

    {foreach from=$rows item=mail}
    <tr>
        <td>
            <small>{$mail['time_iso']}</small>
        </td>
        <td>{$mail['sender']|truncate:"50"|escape:"htmlall"}</td>
        <td>{$mail['recipient']|truncate:"50"|escape:"htmlall"}</td>
        <td>
            {if $mail['quar_type'] == 'Q'}
                <a href="quarantine-view.php?mail_id={$mail['mail_id']}">{$mail['subj']}</a>
            {else}
		{if $mail['in_archive']}
		<a title="View in Archive" href="archive-view.php?message_id={$mail['base64_message_id']}">
		{/if}
                {$mail['subj']|truncate:"75"|escape:"htmlall"}
		{if $mail['in_archive']}
		</a>
		{/if}
            {/if}
        </td>

        <td>{$mail['level']}</td>
        <td>{$mail['delivery_status']}</td>
        <td>{$mail['content']}</td>
        <td>{if ($mail['quar_type'] == 'Q' && $mail['ds'] != 'P')}
                <a href="quarantine-view.php?mail_id={$mail['mail_id']}">
                    <button>View</button>
                </a>
                <button class='releasefromquarantine' data-mailid='{$mail['mail_id']} '>Release</button>
            {/if}
        </td>
        <td>{$mail['message_id']|truncate:"30":"..."|escape:"htmlall"}</td>
    </tr>
    {/foreach}
</table>
