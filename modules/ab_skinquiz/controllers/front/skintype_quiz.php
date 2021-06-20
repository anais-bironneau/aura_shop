<?php

require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizAnswers.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizResults.php');

class Ab_SkinQuizSkinType_QuizModuleFrontController extends ModuleFrontController {

    public function initContent(){

        parent::initContent();

        // fetch from default ps_config table, title customizable in modules BO
        $quiz1Title = Configuration::get('QUIZ1_TITLE');

        // fetch from custom module table, questions & answers customizable in new tab created with custom AdminController
        $quizQuestions = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'skin_quiz_questions');
        $quizAnswers = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'skin_quiz_answers');

        // for SMARTY to display quiz form when nothing has been submitted
        $isQuizSubmitted = false;

        if(Tools::isSubmit('submit_quiz')){

            $isQuizSubmitted = true;
        }

        $this->context->smarty->assign(array(
            'quiz1Title' => $quiz1Title,
            'quizQuestions' => $quizQuestions,
            'quizAnswers' => $quizAnswers,
            'isQuizSubmitted' => $isQuizSubmitted
        ));

        $this->setTemplate('module:ab_skinquiz/views/templates/front/skintype_quiz.tpl');


    }

    public function postProcess(){

        if(Tools::isSubmit('submit_quiz')){

            $isQuizSubmitted = true;


            // fetches all questions IDs to help us loop to get all values from submitted form below
            // foreach needed to clear the nested associative arrays inside
            $data = Db::getInstance()->executeS('SELECT id_skin_quiz_questions FROM '._DB_PREFIX_.'skin_quiz_questions');
            $questionsID = [];


            foreach($data as $key => $element)
            {

                foreach($element as $key => $item)
                {
                    array_push($questionsID, $item);

                }
            }

            // fetches values from submitted inputs, since we don't know their name attribute which contained their tied question's ID, we use the $questionsID we filled before
            $answersIDList = [];

            foreach($questionsID as $key => $id)
            {
                array_push($answersIDList, Tools::getValue('answer-'.$id));
            }

            // initializing variables to define the quiz score
            $dryScore = 0;
            $oilyScore = 0;
            $combinationScore = 0;
            $normalScore = 0;
            $sensitiveScore = 0;

            // transforms fetched inputs' values into proper integer ID that we can use to fetch the designated answers in database, and all data we need to determine the quiz's result
            foreach($answersIDList as $key => $id)
            {
                $id = substr($id, strpos($id, '-') +1);
                $id = (int)$id;

                $answers = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'skin_quiz_answers WHERE id_skin_quiz_answers = '.$id.'');

                // setting the score on each category for every answer
                foreach($answers as $key => $item)
                {
                    if ($item["isDry"] === "1")
                    {
                        $dryScore++;
                    }
                    if ($item["isOily"] === "1")
                    {
                        $oilyScore++;
                    }
                    if ($item["isCombination"] === "1")
                    {
                        $combinationScore++;
                    }
                    if ($item["isNormal"] === "1")
                    {
                        $normalScore++;
                    }
                    if ($item["isSensitive"] === "1")
                    {
                        $sensitiveScore++;
                    }
                }
            }

            // determining which category has the highest score
            $higherScore = max($dryScore, $oilyScore, $combinationScore, $normalScore, $sensitiveScore);

            // fetches all planned results (id, names and description)
            $combinationSkinResult = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'skin_quiz_results WHERE id_skin_quiz_results = 1');
            $normalSkinResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'skin_quiz_results WHERE id_skin_quiz_results = 2');
            $oilySkinResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'skin_quiz_results WHERE id_skin_quiz_results = 3');
            $sensitiveSkinResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'skin_quiz_results WHERE id_skin_quiz_results = 4');
            $drySkinResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'skin_quiz_results WHERE id_skin_quiz_results = 5');


            // defining the categories we need
            $id_category = 0;

            if ($higherScore === $dryScore)
            {
                $id_category = 33;

            } elseif ($higherScore === $oilyScore)
            {
                $id_category = 34;

            } elseif ($higherScore === $combinationScore)
            {
                $id_category = 35;

            } elseif ($higherScore === $sensitiveScore)
            {
                $id_category = 36;

            } elseif ($higherScore === $normalScore)
            {
                $id_category = 37;
            }


            // get all the categories data we need to display advised products later
            $category = new Category($id_category,$this->context->language->id);
            $products = $category->getProducts($this->context->language->id, 1, 100, 'price', 'asc');


            // manually adding attributes that arent present in the objects retrieved, because tpl template (same as vanilla) needs them and we dont have any other choice
            for ($i = 0; $i < count($products); $i++)
            {
                $products[$i]['url'] = $products[$i]['link'];
                $products[$i]['has_discount'] = Product::isDiscounted($products[$i]['id_product']);
                $products[$i]['price_amount'] = $products[$i]['orderprice'];
                $products[$i]['id'] = $products[$i]['id_product'];
                $products[$i]['cover'] = $this->context->link->getImageLink($products[$i]['link_rewrite'], $products[$i]['cover_image_id'],'home_default');

            }

            $isPageQuizResult = true;


            $this->context->smarty->assign(array(
                'isQuizSubmitted' => $isQuizSubmitted,
                'data' => $data,

                'products' => $products,
                'isPageQuizResult' => $isPageQuizResult,

                'dryScore' => $dryScore,
                'oilyScore' => $oilyScore,
                'combinationScore' => $combinationScore,
                'normalScore' => $normalScore,
                'sensitiveScore' => $sensitiveScore,
                'higherScore' => $higherScore,

                'combinationSkinTitle' => $combinationSkinResult[0]['result_name'],
                'normalSkinTitle' => $normalSkinResult[0]['result_name'],
                'oilySkinTitle' => $oilySkinResult[0]['result_name'],
                'sensitiveSkinTitle' => $sensitiveSkinResult[0]['result_name'],
                'drySkinTitle' => $drySkinResult[0]['result_name'],

                'combinationSkinDescription' => $combinationSkinResult[0]['result_content'],
                'normalSkinDescription' => $normalSkinResult[0]['result_content'],
                'oilySkinDescription' => $oilySkinResult[0]['result_content'],
                'sensitiveSkinDescription' => $sensitiveSkinResult[0]['result_content'],
                'drySkinDescription' => $drySkinResult[0]['result_content'],
            ));

        }
    }

}