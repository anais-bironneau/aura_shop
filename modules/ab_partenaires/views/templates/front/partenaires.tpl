
{if isset($data)}

    <div class="row ">

        {foreach from=$data item=partenaire}

            <div class="col-md-3 text-center" >

                <p class="text-center" style="font-family:'Open Sans Light'; font-size: 2rem; text-transform: uppercase; text-align: center">{$partenaire.nom}</p>

                <p class="text-center" style="font-family:'Open Sans Light'; text-transform: lowercase; font-style: italic; text-align: center">{$partenaire.description}</p>

                <img src="{$partenaire.image}" class="img-fluid">

            </div>

        {/foreach}

    </div>

{/if}