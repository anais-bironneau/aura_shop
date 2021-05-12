<?php

require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuiz.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizAnswers.php');

class Ab_SkinQuizResults_QuizModuleFrontController extends ModuleFrontController {

    public function initContent(){

        parent::initContent();


        $this->setTemplate('module:ab_skinquiz/views/templates/front/results_quiz.tpl');

    }


}