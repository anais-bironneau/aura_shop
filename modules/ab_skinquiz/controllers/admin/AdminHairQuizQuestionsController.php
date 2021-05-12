<?php

class AdminHairQuizQuestionsController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'hair_quiz_questions'; //nom de la table sans prefix
        $this->className = 'HairQuizQuestions'; //nom de ma classe du module

        parent::__construct(); //appel du constructeur parent pour pouvoir gérer les traductions

        $this->fields_list = array(
            'id_hair_quiz_questions' => [
                'title' => $this->l('ID') //nom de ma colonne
            ],
            'question' => [
                'title' => $this->l('Question')
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