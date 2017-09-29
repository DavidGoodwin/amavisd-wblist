<html>
<head>
    <title>{$title|default:'Amavisd Configuration'}</title>
</head>

<body>

<header>

</header>


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