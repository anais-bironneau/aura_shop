<?php

class HairQuizQuestions extends ObjectModel {

    public $id_hair_quiz_questions;
    public $question;


    // tableau de definition de ma classe
    public static  $definition = array(
        'table' => 'hair_quiz_questions', //nom de la table sans le préfixe
        'primary' => 'id_hair_quiz_questions', //clé primaire
        'multilang' => false, //pas de champ multilangue
        'fields' => array( //champs en plus de la clé primaire
            'question' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            )
        )
    );
}