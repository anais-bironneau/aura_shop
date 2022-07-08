<?php

class AdminSkinQuizAnswersController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'skin_quiz_answers';
        $this->className = 'SkinQuizAnswers';

        parent::__construct();

        $this->fields_list = array(
            'id_skin_quiz_answers' => [
                'title' => $this->l('ID Answer')
            ],
            'id_skin_quiz_questions' => [
                'title' => $this->l('ID Question')
            ],
            'answer' => [
                'title' => $this->l('Answer')
            ],
            'isDry' => [
                'title' => $this->l('Dry skin')
            ],
            'isOily' => [
                'title' => $this->l('Oily skin')
            ],
            'isCombination' => [
                'title' => $this->l('Combination skin')
            ],
            'isNormal' => [
                'title' => $this->l('Normal skin')
            ],
            'isSensitive' => [
                'title' => $this->l('Sensitive skin')
            ],
        );


        $this->bootstrap = true;

        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->addRowAction('view');


    }

    public function renderForm(){

        $questionsData = Db::getInstance()->executeS('SELECT id_skin_quiz_questions FROM '._DB_PREFIX_.'skin_quiz_questions');
        $options = [];

        foreach($questionsData as $key => $element)
        {

            foreach($element as $key => $item)
            {
                $item = (int)$item;

                array_push($options,
                    array(
                        'id_option' => $item,
                        'name' => 'Question '.$item.' '
                    )
                );
            }
        }



        $this->fields_form = array(
            'legend' => [
                'title' => $this->module->l('Adding/Modifying Skin Quiz Answers')
            ],
            'input' => [
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Answer'),
                    'name' => 'answer',
                    'required' => true
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('ID Question'),
                    'name' => 'id_skin_quiz_questions',
                    'options' => array(
                        'query' => $options,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Dry skin'),
                    'name' => 'isDry',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('No')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Oily skin'),
                    'name' => 'isOily',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('No')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Combination skin'),
                    'name' => 'isCombination',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('No')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Normal skin'),
                    'name' => 'isNormal',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('No')
                        )
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Sensitive skin'),
                    'name' => 'isSensitive',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Yes')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('No')
                        )
                    ),
                ),
            ],
            'submit' => [
                'title' => $this->l('Save')
            ]
        );


        return parent::renderForm();

    }




}