<?php

class Partenaires extends ObjectModel {

    public $id_partenaires;
    public $nom;
    public $description;
    public $image;


    public static  $definition = array(
        'table' => 'partenaires',
        'primary' => 'id_partenaires',
        'multilang' => false,
        'fields' => array(

            'nom' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            ),
            'description' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            ),
            'image' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            ),
        )
    );
}