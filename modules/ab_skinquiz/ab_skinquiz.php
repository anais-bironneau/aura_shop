<?php

require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuiz.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizAnswers.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizResults.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizAnswers.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizResults.php');

class Ab_SkinQuiz extends Module
{
    public function __construct()
    {
        $this->name = 'ab_skinquiz';
        $this->displayName = 'Skin Quiz';
        $this->tab = 'front_office_features';
        $this->version = '0.1.0';
        $this->author = 'Anais Bironneau';
        $this->description = 'Module to let the customers take a skin & hair type skin in order to give them advice on which products would suit them best.';
        $this->bootstrap = true;

        parent::__construct();
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displaySkinQuiz')
            || !$this->registerHook('displayHome')
            || !$this->registerHook('actionFrontControllerSetMedia')
            || !$this->installTableSkinQuizQuestions()
            || !$this->installTableHairQuizQuestions()
            || !$this->installTableSkinQuizAnswers()
            || !$this->installTableHairQuizAnswers()
            || !$this->installTableSkinQuizResults()
            || !$this->installTableHairQuizResults()
            || !$this->installTabSkinQuiz('AdminCatalog', 'AdminSkinQuiz', 'Skin Quiz')
            || !$this->installTabSkinQuizQuestions('AdminCatalog', 'AdminSkinQuizQuestions', 'Skin Quiz Questions')
            || !$this->installTabHairQuizQuestions('AdminCatalog', 'AdminHairQuizQuestions', 'Hair Quiz Questions')
            || !$this->installTabSkinQuizAnswers('AdminCatalog', 'AdminSkinQuizAnswers', 'Skin Quiz Answers')
            || !$this->installTabHairQuizAnswers('AdminCatalog', 'AdminHairQuizAnswers', 'Hair Quiz Answers')
            || !$this->installTabSkinQuizResults('AdminCatalog', 'AdminSkinQuizResults', 'Skin Quiz Results')
            || !$this->installTabHairQuizResults('AdminCatalog', 'AdminHairQuizResults', 'Hair Quiz Results')
        ) {
            return false;

        } else {

            return true;
        }
    }

    public function installTableSkinQuizQuestions()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'skin_quiz_questions (
                id_skin_quiz_questions INT UNSIGNED NOT NULL AUTO_INCREMENT,
                question TEXT NOT NULL,
                PRIMARY KEY (id_skin_quiz_questions)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function installTableHairQuizQuestions()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'hair_quiz_questions (
                id_hair_quiz_questions INT UNSIGNED NOT NULL AUTO_INCREMENT,
                question TEXT NOT NULL,
                PRIMARY KEY (id_hair_quiz_questions)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function installTableSkinQuizAnswers()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'skin_quiz_answers (
                id_skin_quiz_answers INT UNSIGNED NOT NULL AUTO_INCREMENT,
                id_skin_quiz_questions INT UNSIGNED NOT NULL,
                answer TEXT NOT NULL,
                isDry TINYINT,
                isOily TINYINT,
                isCombination TINYINT,
                isNormal TINYINT,
                isSensitive TINYINT,
                PRIMARY KEY (id_skin_quiz_answers)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function installTableHairQuizAnswers()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'hair_quiz_answers (
                id_hair_quiz_answers INT UNSIGNED NOT NULL AUTO_INCREMENT,
                id_hair_quiz_questions INT UNSIGNED NOT NULL,
                answer TEXT NOT NULL,
                isDry TINYINT,
                isOily TINYINT,
                isNormal TINYINT,
                PRIMARY KEY (id_hair_quiz_answers)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function installTableSkinQuizResults()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'skin_quiz_results (
                id_skin_quiz_results INT UNSIGNED NOT NULL AUTO_INCREMENT,
                result_name TEXT NOT NULL,
                result_content TEXT NOT NULL,
                PRIMARY KEY (id_skin_quiz_results)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function installTableHairQuizResults()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'hair_quiz_results (
                id_hair_quiz_results INT UNSIGNED NOT NULL AUTO_INCREMENT,
                result_name TEXT NOT NULL,
                result_content TEXT NOT NULL,
                PRIMARY KEY (id_hair_quiz_results)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function getContent()
    {
        if (Tools::isSubmit('submit_ab_skinquiz')){

            $quiz1Title = Tools::getValue('QUIZ1_TITLE');
            $quiz2Title = Tools::getValue('QUIZ2_TITLE');


            /* safe delete later start */

            $q1 = Tools::getValue('Q1');
            $q1a1 = Tools::getValue('Q1A1');
            $q1a2 = Tools::getValue('Q1A2');
            $q1a3 = Tools::getValue('Q1A3');
            $q1a4 = Tools::getValue('Q1A4');

            $q2 = Tools::getValue('Q2');
            $q2a1 = Tools::getValue('Q2A1');
            $q2a2 = Tools::getValue('Q2A2');
            $q2a3 = Tools::getValue('Q2A3');
            $q2a4 = Tools::getValue('Q2A4');

            $q3 = Tools::getValue('Q3');
            $q3a1 = Tools::getValue('Q3A1');
            $q3a2 = Tools::getValue('Q3A2');
            $q3a3 = Tools::getValue('Q3A3');
            $q3a4 = Tools::getValue('Q3A4');

            $q4 = Tools::getValue('Q4');
            $q4a1 = Tools::getValue('Q4A1');
            $q4a2 = Tools::getValue('Q4A2');
            $q4a3 = Tools::getValue('Q4A3');
            $q4a4 = Tools::getValue('Q4A4');

            $q5 = Tools::getValue('Q5');
            $q5a1 = Tools::getValue('Q5A1');
            $q5a2 = Tools::getValue('Q5A2');
            $q5a3 = Tools::getValue('Q5A3');
            $q5a4 = Tools::getValue('Q5A4');

            $q6 = Tools::getValue('Q6');
            $q6a1 = Tools::getValue('Q6A1');
            $q6a2 = Tools::getValue('Q6A2');
            $q6a3 = Tools::getValue('Q6A3');
            $q6a4 = Tools::getValue('Q6A4');

            $q7 = Tools::getValue('Q7');
            $q7a1 = Tools::getValue('Q7A1');
            $q7a2 = Tools::getValue('Q7A2');
            $q7a3 = Tools::getValue('Q7A3');
            $q7a4 = Tools::getValue('Q7A4');

            /* safe delete later end */

            Configuration::updateValue('QUIZ1_TITLE', $quiz1Title);
            Configuration::updateValue('QUIZ2_TITLE', $quiz2Title);

            /* safe delete later start */

            Configuration::updateValue('Q1', $q1);
            Configuration::updateValue('Q1A1', $q1a1);
            Configuration::updateValue('Q1A2', $q1a2);
            Configuration::updateValue('Q1A3', $q1a3);
            Configuration::updateValue('Q1A4', $q1a4);

            Configuration::updateValue('Q2', $q2);
            Configuration::updateValue('Q2A1', $q2a1);
            Configuration::updateValue('Q2A2', $q2a2);
            Configuration::updateValue('Q2A3', $q2a3);
            Configuration::updateValue('Q2A4', $q2a4);

            Configuration::updateValue('Q3', $q3);
            Configuration::updateValue('Q3A1', $q3a1);
            Configuration::updateValue('Q3A2', $q3a2);
            Configuration::updateValue('Q3A3', $q3a3);
            Configuration::updateValue('Q3A4', $q3a4);

            Configuration::updateValue('Q4', $q4);
            Configuration::updateValue('Q4A1', $q4a1);
            Configuration::updateValue('Q4A2', $q4a2);
            Configuration::updateValue('Q4A3', $q4a3);
            Configuration::updateValue('Q4A4', $q4a4);

            Configuration::updateValue('Q5', $q5);
            Configuration::updateValue('Q5A1', $q5a1);
            Configuration::updateValue('Q5A2', $q5a2);
            Configuration::updateValue('Q5A3', $q5a3);
            Configuration::updateValue('Q5A4', $q5a4);

            Configuration::updateValue('Q6', $q6);
            Configuration::updateValue('Q6A1', $q6a1);
            Configuration::updateValue('Q6A2', $q6a2);
            Configuration::updateValue('Q6A3', $q6a3);
            Configuration::updateValue('Q6A4', $q6a4);

            Configuration::updateValue('Q7', $q7);
            Configuration::updateValue('Q7A1', $q7a1);
            Configuration::updateValue('Q7A2', $q7a2);
            Configuration::updateValue('Q7A3', $q7a3);
            Configuration::updateValue('Q7A4', $q7a4);

            /* safe delete later end */
        }

        return $this->displayForm();

    }

    // to create a form through HelperForm
    public function displayForm()
    {

        // array containing form data
        $form_configuration['0']['form'] = [

            'legend' => [
                'title' => 'Configuration',
            ],
            'input' => [
                [

                    'type' => 'text',
                    'label' => $this->l('Quiz 1 title'),
                    'name' => 'QUIZ1_TITLE',
                    'required' => true
                ],
                [

                    'type' => 'text',
                    'label' => $this->l('Quiz 2 title'),
                    'name' => 'QUIZ2_TITLE',
                    'required' => true
                ],
                /* safe delete later start */
                [
                    'type' => 'text',
                    'label' => $this->l('Question 1'),
                    'name' => 'Q1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q1 Answer 1'),
                    'name' => 'Q1A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q1 Answer 2'),
                    'name' => 'Q1A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q1 Answer 3'),
                    'name' => 'Q1A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q1 Answer 4'),
                    'name' => 'Q1A4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Question 2'),
                    'name' => 'Q2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q2 Answer 1'),
                    'name' => 'Q2A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q2 Answer 2'),
                    'name' => 'Q2A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q2 Answer 3'),
                    'name' => 'Q2A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q2 Answer 4'),
                    'name' => 'Q2A4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Question 3'),
                    'name' => 'Q3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q3 Answer 1'),
                    'name' => 'Q3A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q3 Answer 2'),
                    'name' => 'Q3A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q3 Answer 3'),
                    'name' => 'Q3A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q3 Answer 4'),
                    'name' => 'Q3A4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Question 4'),
                    'name' => 'Q4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q4 Answer 1'),
                    'name' => 'Q4A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q4 Answer 2'),
                    'name' => 'Q4A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q4 Answer 3'),
                    'name' => 'Q4A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q4 Answer 4'),
                    'name' => 'Q4A4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Question 5'),
                    'name' => 'Q5',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q5 Answer 1'),
                    'name' => 'Q5A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q5 Answer 2'),
                    'name' => 'Q5A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q5 Answer 3'),
                    'name' => 'Q5A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q5 Answer 4'),
                    'name' => 'Q5A4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Question 6'),
                    'name' => 'Q6',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q6 Answer 1'),
                    'name' => 'Q6A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q6 Answer 2'),
                    'name' => 'Q6A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q6 Answer 3'),
                    'name' => 'Q6A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q6 Answer 4'),
                    'name' => 'Q6A4',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Question 7'),
                    'name' => 'Q7',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q7 Answer 1'),
                    'name' => 'Q7A1',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q7 Answer 2'),
                    'name' => 'Q7A2',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q7 Answer 3'),
                    'name' => 'Q7A3',
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Q7 Answer 4'),
                    'name' => 'Q7A4',
                    'required' => true
                ],
                /* safe delete later end */
            ],
            'submit' => [
                'title' => $this->l('Save'),
                'class' => 'btn btn-default pull-right'
            ]
        ];

        $helper = new HelperForm();

        $helper->module = $this; // tells helper which module we seek
        $helper->name_controller = $this->name; // fetches technical name of module
        $helper->token = Tools::getAdminTokenLite('AdminModules'); // security key needed
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name; // to generate form's action="" (the link to the page that will use the data)
        $helper->default_form_language = (int)Configuration::get('PS-LANG_DEFAULT'); // fetches shop's langage ID
        $helper->title = $this->displayName; // form name
        $helper->submit_action = 'submit_ab_skinquiz'; // sets name attribute of submit button

        $helper->fields_value['QUIZ1_TITLE'] = Tools::getValue('QUIZ1_TITLE', Configuration::get('QUIZ1_TITLE'));
        $helper->fields_value['QUIZ2_TITLE'] = Tools::getValue('QUIZ2_TITLE', Configuration::get('QUIZ2_TITLE'));

        /* safe delete later start */
        $helper->fields_value['Q1'] = Tools::getValue('Q1', Configuration::get('Q1'));
        $helper->fields_value['Q1A1'] = Tools::getValue('Q1A1', Configuration::get('Q1A1'));
        $helper->fields_value['Q1A2'] = Tools::getValue('Q1A2', Configuration::get('Q1A2'));
        $helper->fields_value['Q1A3'] = Tools::getValue('Q1A3', Configuration::get('Q1A3'));
        $helper->fields_value['Q1A4'] = Tools::getValue('Q1A4', Configuration::get('Q1A4'));

        $helper->fields_value['Q2'] = Tools::getValue('Q2', Configuration::get('Q2'));
        $helper->fields_value['Q2A1'] = Tools::getValue('Q2A1', Configuration::get('Q2A1'));
        $helper->fields_value['Q2A2'] = Tools::getValue('Q2A2', Configuration::get('Q2A2'));
        $helper->fields_value['Q2A3'] = Tools::getValue('Q2A3', Configuration::get('Q2A3'));
        $helper->fields_value['Q2A4'] = Tools::getValue('Q2A4', Configuration::get('Q2A4'));

        $helper->fields_value['Q3'] = Tools::getValue('Q3', Configuration::get('Q3'));
        $helper->fields_value['Q3A1'] = Tools::getValue('Q3A1', Configuration::get('Q3A1'));
        $helper->fields_value['Q3A2'] = Tools::getValue('Q3A2', Configuration::get('Q3A2'));
        $helper->fields_value['Q3A3'] = Tools::getValue('Q3A3', Configuration::get('Q3A3'));
        $helper->fields_value['Q3A4'] = Tools::getValue('Q3A4', Configuration::get('Q3A4'));

        $helper->fields_value['Q4'] = Tools::getValue('Q4', Configuration::get('Q4'));
        $helper->fields_value['Q4A1'] = Tools::getValue('Q4A1', Configuration::get('Q4A1'));
        $helper->fields_value['Q4A2'] = Tools::getValue('Q4A2', Configuration::get('Q4A2'));
        $helper->fields_value['Q4A3'] = Tools::getValue('Q4A3', Configuration::get('Q4A3'));
        $helper->fields_value['Q4A4'] = Tools::getValue('Q4A4', Configuration::get('Q4A4'));

        $helper->fields_value['Q5'] = Tools::getValue('Q5', Configuration::get('Q5'));
        $helper->fields_value['Q5A1'] = Tools::getValue('Q5A1', Configuration::get('Q5A1'));
        $helper->fields_value['Q5A2'] = Tools::getValue('Q5A2', Configuration::get('Q5A2'));
        $helper->fields_value['Q5A3'] = Tools::getValue('Q5A3', Configuration::get('Q5A3'));
        $helper->fields_value['Q5A4'] = Tools::getValue('Q5A4', Configuration::get('Q5A4'));

        $helper->fields_value['Q6'] = Tools::getValue('Q6', Configuration::get('Q6'));
        $helper->fields_value['Q6A1'] = Tools::getValue('Q6A1', Configuration::get('Q6A1'));
        $helper->fields_value['Q6A2'] = Tools::getValue('Q6A2', Configuration::get('Q6A2'));
        $helper->fields_value['Q6A3'] = Tools::getValue('Q6A3', Configuration::get('Q6A3'));
        $helper->fields_value['Q6A4'] = Tools::getValue('Q6A4', Configuration::get('Q6A4'));

        $helper->fields_value['Q7'] = Tools::getValue('Q7', Configuration::get('Q7'));
        $helper->fields_value['Q7A1'] = Tools::getValue('Q7A1', Configuration::get('Q7A1'));
        $helper->fields_value['Q7A2'] = Tools::getValue('Q7A2', Configuration::get('Q7A2'));
        $helper->fields_value['Q7A3'] = Tools::getValue('Q7A3', Configuration::get('Q7A3'));
        $helper->fields_value['Q7A4'] = Tools::getValue('Q7A4', Configuration::get('Q7A4'));
        /* safe delete later end */

        return $helper->generateForm($form_configuration);
    }


    public function hookDisplaySkinQuiz()
    {
        $linkSkinQuiz = $this->context->link->getModuleLink('ab_skinquiz', 'skintype_quiz');
        $linkHairQuiz = $this->context->link->getModuleLink('ab_skinquiz', 'hairtype_quiz');

        $this->context->smarty->assign(array(
            'linkSkinQuiz' => $linkSkinQuiz,
            'linkHairQuiz' => $linkHairQuiz,
        ));

        return $this->display(__FILE__, 'ab_skinquiz.tpl');
    }

    public function hookDisplayHome()
    {
        $linkSkinQuiz = $this->context->link->getModuleLink('ab_skinquiz', 'skintype_quiz');
        $linkHairQuiz = $this->context->link->getModuleLink('ab_skinquiz', 'hairtype_quiz');

        $this->context->smarty->assign(array(
            'linkSkinQuiz' => $linkSkinQuiz,
            'linkHairQuiz' => $linkHairQuiz
        ));

        return $this->display(__FILE__, 'ab_skinquiz.tpl');
    }

    public function hookActionFrontControllerSetMedia()
    {
        $this->context->controller->registerStylesheet(
            'module-ab_skinquiz-style',
            'modules/'.$this->name.'/views/assets/css/ab_skinquiz.css'
        );
    }

    // method to add a new tab in back office
    public function installTabSkinQuiz($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function installTabSkinQuizQuestions($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function installTabHairQuizQuestions($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function installTabSkinQuizAnswers($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function installTabHairQuizAnswers($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function installTabSkinQuizResults($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }

    public function installTabHairQuizResults($parent, $classcontroller, $name)
    {
        $tab = new Tab();
        $tab->id_parent = (int)Tab::getIdFromClassName($parent);
        $tab->name = array();

        foreach(Language::getLanguages(true) as $lang){
            $tab->name[$lang['id_lang']] = $name;
        }

        $tab->class_name = $classcontroller;
        $tab->module = $this->name;
        $tab->active = 1;

        return $tab->add();
    }
}