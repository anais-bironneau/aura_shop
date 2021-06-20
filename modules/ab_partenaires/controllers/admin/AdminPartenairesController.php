<?php

class AdminPartenairesController extends ModuleAdminController
{
    public function __construct(){

        $this->table = 'partenaires';
        $this->className = 'Partenaires';

        parent::__construct();

        $this->fields_list = array(
            'id_partenaires' => [
                'title' => $this->l('ID Partenaire')
            ],
            'nom' => [
                'title' => $this->l('Nom')
            ],
            'description' => [
                'title' => $this->l('Description')
            ],
            'image' => [
                'title' => $this->l('URL de l\'image')
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
                'title' => $this->module->l('Ajouter des avis de partenaires')
            ],
            'input' => [
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Nom'),
                    'name' => 'nom',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Description'),
                    'name' => 'description',
                    'required' => true
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->l('Image'),
                    'name' => 'image',
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