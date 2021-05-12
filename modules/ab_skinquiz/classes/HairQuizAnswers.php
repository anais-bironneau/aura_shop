<?php

class HairQuizAnswers extends ObjectModel {

    public $id_hair_quiz_answers;
    public $id_hair_quiz_questions;
    public $answer;
    public $isDry;
    public $isOily;
    public $isNormal;


    public static  $definition = array(
        'table' => 'hair_quiz_answers',
        'primary' => 'id_hair_quiz_answers',
        'multilang' => false,
        'fields' => array(
            'id_hair_quiz_questions' => array(
                'type' => self::TYPE_INT,
                'validate' => 'isUnsignedInt',
                'required' => true
            ),
            'answer' => array(
                'type' => self::TYPE_STRING,
                'validate' => 'isCleanHtml',
                'required' => true
            ),
            'isDry' => array(
                'type' => self::TYPE_BOOL,
            ),
            'isOily' => array(
                'type' => self::TYPE_BOOL,
            ),
            'isNormal' => array(
                'type' => self::TYPE_BOOL,
            ),
        )
    );
}