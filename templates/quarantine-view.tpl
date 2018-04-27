<h2>Quarantined Email</h2>

<h3>Attachments</h3>
<ul>
    {foreach from=$attachments item=attachment}
        <li>{$attachment.filename|escape:"htmlall"} - {$attachment.content_type}</li>
    {/foreach}
</ul>


<h3>Plain Text Content</h3>
<pre>
    {$mail_plain|escape:"htmlall"}
</pre>

<h3>HTML Content</h3>
<pre>
    {$mail_html_safe|escape:"htmlall"}
</pre>

<h3>RAW BODY</h3>
<pre>
{$mail_raw|escape:"htmlall"}
</pre>
