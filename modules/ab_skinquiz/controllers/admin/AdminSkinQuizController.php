<?php

class AdminSkinQuizController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'skin_quiz'; //nom de la table sans prefix
        $this->className = 'SkinQuiz'; //nom de ma classe du module

        parent::__construct(); //appel du constructeur parent pour pouvoir gérer les traductions

        $this->fields_list = array(
            'id_skin_quiz' => [
                'title' => $this->l('ID') //nom de ma colonne
            ],
            'question' => [
                'title' => $this->l('Question')
            ],
            'answer1' => [
                'title' => $this->l('Answer 1')
            ],
            'answer2' => [
                'title' => $this->l('Answer 2')
            ],
            'answer3' => [
                'title' => $this->l('Answer 3')
            ],
            'answer4' => [
                'title' => $this->l('Answer 4')
            ]
        );

        //fields_list : afficher les champs de ma base de données sous forme de tableau

        $this->bootstrap = true;

        //ajout des boutons d'action
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->addRowAction('view');


    }

    // méthode pour le formulaire d'edition
    public function renderForm(){


        $this->fields_form = array(
            'legend' => [
                'title' => $this->module->l('Adding/Modifying Quiz Content')
            ],
            'input' => [
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Question'),
                    'name' => 'question',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Answer 1'),
                    'name' => 'answer1',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Answer 2'),
                    'name' => 'answer2',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Answer 3'),
                    'name' => 'answer3',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Answer 4'),
                    'name' => 'answer4',
                    'required' => true
                ),
            ],
            'submit' => [
                'title' => $this->l('Save')
            ]
        );


        return parent::renderForm();

    }




}