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

                        <h1>{$quiz2Title}</h1>

                    </div>

                    {if !$isQuizSubmitted}

                        <form class="quiz-form" method="post" id="form_skinquiz_front">

                            {foreach from=$quizQuestions item=question}

                                <fieldset>

                                    <legend>{$question.question}</legend>

                                    <div class="row">

                                        {foreach from=$quizAnswers item=answer}

                                            {if $answer.id_hair_quiz_questions == $question.id_hair_quiz_questions}

                                                <div class="col-xl-4 col-answer">

                                                    <div class="form-check col-answer-bg">

                                                        <input type="radio" name="answer-{$answer.id_hair_quiz_questions}" id="answer-{$answer.id_hair_quiz_answers}"  value="answer-{$answer.id_hair_quiz_answers}" required>
                                                        <label for="answer-{$answer.id_hair_quiz_answers}">{$answer.answer}</label><br/>

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
                                <span>{$dryHairTitle}</span></p>
                            <p class="result-description">{$dryHairDescription}</p>
                            <p class="result-title">{l s='We recommend' mod='ab_skinquiz'}</p>


                            <div class="products{if !empty($cssClass)} {$cssClass}{/if}" itemscope itemtype="http://schema.org/ItemList">
                                {foreach from=$products item="product" key="position"}
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                        {include file="catalog/_partials/miniatures/product.tpl" product=$product position=$position}
                                    </div>
                                {/foreach}
                            </div>


                        {elseif (isset($oilyScore) && isset($higherScore)) && ($oilyScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$oilyHairTitle}</span></p>
                            <p class="result-description">{$oilyHairDescription}</p>
                            <p class="result-title">{l s='We recommend' mod='ab_skinquiz'}</p>

                            <div class="products{if !empty($cssClass)} {$cssClass}{/if}" itemscope itemtype="http://schema.org/ItemList">
                                {foreach from=$products item="product" key="position"}
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                        {include file="catalog/_partials/miniatures/product.tpl" product=$product position=$position}
                                    </div>
                                {/foreach}
                            </div>


                        {elseif (isset($normalScore) && isset($higherScore)) && ($normalScore == $higherScore)}

                            <p class="result-title">{l s='You have' mod='ab_skinquiz'}
                                <span>{$normalHairTitle}</span></p>
                            <p class="result-description">{$normalHairDescription}</p>
                            <p class="result-title">{l s='We recommend' mod='ab_skinquiz'}</p>

                            <div class="products{if !empty($cssClass)} {$cssClass}{/if}" itemscope itemtype="http://schema.org/ItemList">
                                {foreach from=$products item="product" key="position"}
                                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                        {include file="catalog/_partials/miniatures/product.tpl" product=$product position=$position}
                                    </div>
                                {/foreach}
                            </div>


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