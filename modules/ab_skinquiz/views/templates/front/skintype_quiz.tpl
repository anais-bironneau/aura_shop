{extends file=$layout}

{block name='content'}

    <section id="main">

        {block name='page_header_container'}
            {block name='page_title' hide}
                <header class="page-header">
                    <h1>{$smarty.block.child}</h1>
                </header>
            {/block}
        {/block}

        {block name='page_content_container'}
            <section id="content" class="page-content card card-block">
                {block name='page_content_top'}{/block}
                {block name='page_content'}

                    <div class="quiz-page-bg">

                        <h1>{$quiz1Title}</h1>

                    </div>

                    {if !$isQuizSubmitted}

                        <form class="quiz-form" method="post" id="form_skinquiz_front">

                            {foreach from=$quizQuestions item=question}

                                <fieldset>

                                    <legend>{$question.question}</legend>

                                    <div class="row">

                                        {foreach from=$quizAnswers item=answer}

                                            {if $answer.id_skin_quiz_questions == $question.id_skin_quiz_questions}

                                                <div class="col-xl-3 col-answer">

                                                    <div class="form-check col-answer-bg">

                                                        <input type="radio" name="answer-{$answer.id_skin_quiz_questions}" id="answer-{$answer.id_skin_quiz_answers}"  value="answer-{$answer.id_skin_quiz_answers}" required>
                                                        <label for="answer-{$answer.id_skin_quiz_answers}">{$answer.answer}</label><br/>

                                                    </div>

                                                </div>

                                            {/if}

                                        {/foreach}

                                    </div>

                                </fieldset>

                            {/foreach}

                            <input type="submit" name="submit_quiz" value="Voir mes résultats" class="btn btn-primary shadow-none quiz-btn">

                        </form>

                    {/if}


                    {if $isQuizSubmitted}

                        {if (isset($dryScore) && isset($higherScore)) && ($dryScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$drySkinTitle}</span></p>

                            <p class="result-description">{$drySkinDescription}</p>



                            <div class="products{if !empty($cssClass)} {$cssClass}{/if}" itemscope itemtype="http://schema.org/ItemList">
                                {foreach from=$products item="product" key="position"}
                                    {include file="catalog/_partials/miniatures/product.tpl" product=$product position=$position}
                                {/foreach}
                            </div>




                        {elseif (isset($oilyScore) && isset($higherScore)) && ($oilyScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$oilySkinTitle}</span></p>

                            <p class="result-description">{$oilySkinDescription}</p>

                        {elseif (isset($combinationScore) && isset($higherScore)) && ($combinationScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$combinationSkinTitle}</span></p>

                            <p class="result-description">{$combinationSkinDescription}</p>

                        {elseif (isset($normalScore) && isset($higherScore)) && ($normalScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$normalSkinTitle}</span></p>

                            <p class="result-description">{$normalSkinDescription}</p>

                        {elseif (isset($sensitiveScore) && isset($higherScore)) && ($sensitiveScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$sensitiveSkinTitle}</span></p>

                            <p class="result-description">{$sensitiveSkinDescription}</p>

                        {else}



                        {/if}

                    {/if}



                    <!-- Page content -->
                {/block}
            </section>
        {/block}

        {block name='page_footer_container'}
            <footer class="page-footer">
                {block name='page_footer'}
                    <!-- Footer content -->
                {/block}
            </footer>
        {/block}

    </section>

{/block}