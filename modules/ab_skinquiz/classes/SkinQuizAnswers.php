<?php

class SkinQuizAnswers extends ObjectModel {

    public $id_skin_quiz_answers;
    public $id_skin_quiz_questions;
    public $answer;
    public $isDry;
    public $isOily;
    public $isCombination;
    public $isNormal;
    public $isSensitive;


    public static  $definition = array(
        'table' => 'skin_quiz_answers',
        'primary' => 'id_skin_quiz_answers',
        'multilang' => false,
        'fields' => array(
            'id_skin_quiz_questions' => array(
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
            'isCombination' => array(
                'type' => self::TYPE_BOOL,
            ),
            'isNormal' => array(
                'type' => self::TYPE_BOOL,
            ),
            'isSensitive' => array(
                'type' => self::TYPE_BOOL,
            ),
        )
    );
}