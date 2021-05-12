<?php

class AdminHairQuizAnswersController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'hair_quiz_answers';
        $this->className = 'HairQuizAnswers';

        parent::__construct();

        $this->fields_list = array(
            'id_hair_quiz_answers' => [
                'title' => $this->l('ID Answer') //nom de ma colonne
            ],
            'id_hair_quiz_questions' => [
                'title' => $this->l('ID Question') //nom de ma colonne
            ],
            'answer' => [
                'title' => $this->l('Answer') //nom de ma colonne
            ],
            'isDry' => [
                'title' => $this->l('Dry skin') //nom de ma colonne
            ],
            'isOily' => [
                'title' => $this->l('Oily skin') //nom de ma colonne
            ],
            'isNormal' => [
                'title' => $this->l('Normal skin') //nom de ma colonne
            ],
        );


        $this->bootstrap = true;

        //ajout des boutons d'action
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->addRowAction('view');


    }

    // méthode pour le formulaire d'edition
    public function renderForm(){

        $questionsData = Db::getInstance()->executeS('SELECT id_hair_quiz_questions FROM '._DB_PREFIX_.'hair_quiz_questions');
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
                    ),
                );
            }
        }



        $this->fields_form = array(
            'legend' => [
                'title' => $this->module->l('Adding/Modifying Hair Quiz Answers')
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
                    'name' => 'id_hair_quiz_questions',
                    'options' => array(
                        'query' => $options,
                        'id' => 'id_option',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Dry scalp'),
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
                    'label' => $this->l('Oily scalp'),
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
                    'label' => $this->l('Normal scalp'),
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
            ],
            'submit' => [
                'title' => $this->l('Save')
            ]
        );


        return parent::renderForm();

    }




}