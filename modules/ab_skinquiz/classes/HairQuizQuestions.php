<?php

class HairQuizQuestions extends ObjectModel {

    public $id_hair_quiz_questions;
    public $question;


    public static  $definition = array(
        'table' => 'hair_quiz_questions',
        'primary' => 'id_hair_quiz_questions',
        'multilang' => false,
        'fields' => array(
            'question' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            )
        )
    );
}


