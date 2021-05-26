<?php

class AdminHairQuizQuestionsController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'hair_quiz_questions';
        $this->className = 'HairQuizQuestions';

        parent::__construct();

        $this->fields_list = array(
            'id_hair_quiz_questions' => [
                'title' => $this->l('ID')
            ],
            'question' => [
                'title' => $this->l('Question')
            ]
        );


        $this->bootstrap = true;

        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->addRowAction('view');


    }

    public function renderForm(){


        $this->fields_form = array(
            'legend' => [
                'title' => $this->module->l('Adding/Modifying Hair Quiz Questions')
            ],
            'input' => [
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Question'),
                    'name' => 'question',
                    'required' => true
                )
            ],
            'submit' => [
                'title' => $this->l('Save')
            ]
        );


        return parent::renderForm();

    }

}