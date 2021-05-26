<?php

class SkinQuizQuestions extends ObjectModel {

    public $id_skin_quiz_questions;
    public $question;


    public static  $definition = array(
        'table' => 'skin_quiz_questions',
        'primary' => 'id_skin_quiz_questions',
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