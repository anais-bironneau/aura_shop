{if isset($displayHours) && $displayHours}
<div id="display-hours">

    <p class="display-hours-title">Un souci ?</p>
    <p class="display-hours-number">{$hotlineNumber}</p>
    <p class="display-hours-info">{$daysHotline} <br/>
        {$hotlineOpeningTime} - {$hotlineClosingTime}</p>

</div>
{/if}