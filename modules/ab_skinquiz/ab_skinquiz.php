<?php

require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/SkinQuizAnswers.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizQuestions.php');
require_once(_PS_ROOT_DIR_.'/modules/ab_skinquiz/classes/HairQuizAnswers.php');

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

            Configuration::updateValue('QUIZ1_TITLE', $quiz1Title);
            Configuration::updateValue('QUIZ2_TITLE', $quiz2Title);
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

    /*
     * commented because of foreign keys causing some issues! TODO for later: replace foreign keys by INNER JOIN SQL
     *
    public function uninstall() {

        Configuration::deleteByName('QUIZ1_TITLE');
        Configuration::deleteByName('QUIZ2_TITLE');

        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'skin_quiz_questions');
        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'hair_quiz_questions');
        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'skin_quiz_answers');
        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'hair_quiz_answers');
        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'skin_quiz_results');
        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'hair_quiz_results');

        return parent::uninstall();
    }
    */

}