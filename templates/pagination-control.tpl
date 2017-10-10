{if $pages->pageCount > 1}
    <style>
        div#paginator {
            width: 100%;
        }
        div#paginator > table td {
            width: 22px;
        }
        div#paginator > table td span {
            display: inline-block;
            text-align: center;
            width: 32px;
        }
    </style>
    <div id="paginator" >
        <p style="color: #666">Page {$pages->current} of {$pages->pageCount}</p>
        <table style="border-collapse: collapse">
            <tr>
                <td style="width: 100px">
                    {if isset($pages->previous)}
                        <a href="?{$query_string_without_page}&page={$pages->previous}#results" rel="prev" title="Go back one page">
                            <i class="fa fa-arrow-left"></i> Previous
                        </a>
                    {/if}
                </td>


                {foreach from=$pages->pagesInRange key='myId' item='i'}
                    <td>
                        {if $i != $pages->current }
                            <a href="?{$query_string_without_page}&page={$i}#results" rel="{$i}" title="Go to page {$i}"><span>{$i}</span></a>
                        {else}
                            <span><strong>{$i}</strong></span>
                        {/if}
                    </td>
                {/foreach}

                <td style="width: 85px">
                    {if isset($pages->next)}
                        <a style="float: right" href="?{$query_string_without_page}&page={$pages->next}#results" rel="next" title="Go forward one page">Next <i class="fa fa-arrow-right fa-3"></i></a>

                    {/if}
                </td>

        </table>
    </div>
{/if}