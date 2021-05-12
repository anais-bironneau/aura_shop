<?php

require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizAnswers.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizResults.php');

class Ab_SkinQuizHairType_QuizModuleFrontController extends ModuleFrontController {

    public function initContent(){

        parent::initContent();

        // fetch from default ps_config table, title customizable in modules BO
        $quiz1Title = Configuration::get('QUIZ2_TITLE');

        // fetch from custom module table, questions & answers customizable in new tab created with custom AdminController
        $quizQuestions = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'hair_quiz_questions');
        $quizAnswers = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'hair_quiz_answers');

        // for SMARTY to display quiz form when nothing has been submitted
        $isQuizSubmitted = false;

        if(Tools::isSubmit('submit_quiz')){

            $isQuizSubmitted = true;
        }

        $this->context->smarty->assign(array(
            'quiz2Title' => $quiz1Title,
            'quizQuestions' => $quizQuestions,
            'quizAnswers' => $quizAnswers,
            'isQuizSubmitted' => $isQuizSubmitted
        ));

        $this->setTemplate('module:ab_skinquiz/views/templates/front/hairtype_quiz.tpl');


    }

    public function postProcess(){

        if(Tools::isSubmit('submit_quiz')){

            $isQuizSubmitted = true;


            // fetches all questions IDs to help us loop to get all values from submitted form below
            // foreach needed to clear the nested associative arrays inside
            $data = Db::getInstance()->executeS('SELECT id_hair_quiz_questions FROM '._DB_PREFIX_.'hair_quiz_questions');
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
            $normalScore = 0;

            // transforms fetched inputs' values into proper integer ID that we can use to fetch the designated answers in database, and all data we need to determine the quiz's result
            foreach($answersIDList as $key => $id)
            {
                $id = substr($id, strpos($id, '-') +1);
                $id = (int)$id;

                $answers = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'hair_quiz_answers WHERE id_hair_quiz_answers = '.$id.'');

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
                    if ($item["isNormal"] === "1")
                    {
                        $normalScore++;
                    }
                }
            }

            // determining which category has the highest score
            $higherScore = max($dryScore, $oilyScore, $normalScore);

            // fetches all planned results (id, names and description)
            $normalHairResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'hair_quiz_results WHERE id_hair_quiz_results = 1');
            $oilyHairResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'hair_quiz_results WHERE id_hair_quiz_results = 3');
            $dryHairResult = Db::getInstance()->executeS('SELECT *  FROM '._DB_PREFIX_.'hair_quiz_results WHERE id_hair_quiz_results = 2');



            $this->context->smarty->assign(array(
                'isQuizSubmitted' => $isQuizSubmitted,
                'data' => $data,

                'dryScore' => $dryScore,
                'oilyScore' => $oilyScore,
                'normalScore' => $normalScore,
                'higherScore' => $higherScore,

                'normalHairTitle' => $normalHairResult[0]['result_name'],
                'oilyHairTitle' => $oilyHairResult[0]['result_name'],
                'dryHairTitle' => $dryHairResult[0]['result_name'],

                'normalHairDescription' => $normalHairResult[0]['result_content'],
                'oilyHairDescription' => $oilyHairResult[0]['result_content'],
                'dryHairDescription' => $dryHairResult[0]['result_content'],
            ));


        }
    }


}