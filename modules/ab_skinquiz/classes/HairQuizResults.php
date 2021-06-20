<?php

class HairQuizResults extends ObjectModel {

    public $id_hair_quiz_results;
    public $result_name;
    public $result_content;


    public static  $definition = array(
        'table' => 'hair_quiz_results',
        'primary' => 'id_hair_quiz_results',
        'multilang' => false,
        'fields' => array(
            'result_name' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            ),
            'result_content' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            )
        )
    );
}