<?php

class AdminSkinQuizResultsController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'skin_quiz_results';
        $this->className = 'SkinQuizResults';

        parent::__construct();

        $this->fields_list = array(
            'id_skin_quiz_results' => [
                'title' => $this->l('ID')
            ],
            'result_name' => [
                'title' => $this->l('Result Name')
            ],
            'result_content' => [
                'title' => $this->l('Result Content')
            ],
        );


        $this->bootstrap = true;

        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->addRowAction('view');


    }


    public function renderForm(){


        $this->fields_form = array(
            'legend' => [
                'title' => $this->module->l('Adding/Modifying Skin Quiz Results')
            ],
            'input' => [
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Result Name'),
                    'name' => 'result_name',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Result Content'),
                    'name' => 'result_content',
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