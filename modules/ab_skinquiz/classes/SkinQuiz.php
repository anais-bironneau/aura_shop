<?php

class SkinQuiz extends ObjectModel {

    public $id_skin_quiz;
    public $question;
    public $answer1;
    public $answer2;
    public $answer3;
    public $answer4;


    // tableau de definition de ma classe
    public static  $definition = array(
        'table' => 'skin_quiz', //nom de la table sans le préfixe
        'primary' => 'id_skin_quiz', //clé primaire
        'multilang' => false, //pas de champ multilangue
        'fields' => array( //champs en plus de la clé primaire
            'question' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            ),
            'answer1' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            ),
            'answer2' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            ),
            'answer3' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            ),
            'answer4' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            )
        )
    );
}