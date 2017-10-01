<html>
<head>
    <title>{$title|default:'Amavisd Configuration'}</title>
</head>

<body>


<style>
    form {
        margin-bottom: 0em !important;
    }
</style>


<header>
    <p><a href="listrecipient.php">Recipients</a> | <a href="listsender.php">Senders</a> | <a href="listpolicy.php">Policies</a> | <a href="listwhitelistblacklist.php">BlackList/Whitelist</a></p>
</header>

<h1>{$title|default:'Unspecified title'}</h1>


{if !empty($flash['error'])}
    <ul class="error">
        {foreach from=$flash['error'] item=m}
            <li>{$m|escape:htmlall}</li>
        {/foreach}
    </ul>
{/if}
{if !empty($flash['message'])}
    <ul class="info">
        {foreach from=$flash['message'] item=m}
            <li>{$m|escape:htmlall}</li>
        {/foreach}
    </ul>
{/if}


    {include file="$inner_template"}

<br/>
<br/>

<footer>
    <small>Managing and maintaining Amavisd whitelist/blacklist </small>
</footer>
</body>

</html>