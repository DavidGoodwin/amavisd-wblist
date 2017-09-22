<h2>Add Receiver</h2>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    .hidden {
        display: none;
    }
</style>


<button id="show_advanced">show advanced fields</button>

{$form}

<script language="JavaScript">
    $('#show_advanced').on('click', function() {
        $('.advanced').toggleClass('hidden');
    });
    $('.advanced').toggleClass('hidden'); // hide by default.
</script>



