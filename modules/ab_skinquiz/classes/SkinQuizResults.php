<?php

class SkinQuizResults extends ObjectModel {

    public $id_skin_quiz_results;
    public $result_name;
    public $result_content;


    // tableau de definition de ma classe
    public static  $definition = array(
        'table' => 'skin_quiz_results', //nom de la table sans le préfixe
        'primary' => 'id_skin_quiz_results', //clé primaire
        'multilang' => false, //pas de champ multilangue
        'fields' => array(
            'result_name' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            ),
            'result_content' => array(
                'type' => self::TYPE_STRING, //type de donnée (string, int, date, float, bool, ...)
                'validate' => 'isCleanHtml', //regle de validation que l'on souhaite. (optionnel)
                'required' => true
            )
        )
    );
}