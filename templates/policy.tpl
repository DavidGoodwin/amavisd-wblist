<h2>Add policy entry</h2>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .hidden {
        display: none;
    }
</style>


{$form}

{*

<button id="show_advanced">show advanced fields</button>

<script language="JavaScript">
    $('#show_advanced').on('click', function() {
        $('.advanced').toggleClass('hidden');

        $('.advanced').parent().toggleClass('hidden');

    });
    $('.advanced').parent.toggleClass('hidden'); // hide by default.
</script>
*}



<h3>Notes</h3>

<p>Policies are assigned to local users (recipients).</p>
<p>When you add recipient, you can specify the policy to attach to them.</p>

<p>For example, <strong>foo@bar.com</strong> can be allowed spam, but <strong>@example.com</strong> isn't.</p>

<ul>
    <li>
    SpamAssassin normally scores +ve 0-5, where 5 is deemed probably spam.
    </li>
    <li>If you don't specify a field (e.g. Fallthrough or empty) another policy (at a lower priority) may fill in.</li>
</p>