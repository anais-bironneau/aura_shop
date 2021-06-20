<?php

require_once(_PS_ROOT_DIR_.'/modules/ab_partenaires/classes/Partenaires.php');

class Ab_Partenaires extends Module
{
    public function __construct()
    {
        $this->name = 'ab_partenaires';
        $this->displayName = 'Module Partenaires';
        $this->tab = 'front_office_features';
        $this->version = '0.1.0';
        $this->author = 'Anais Bironneau';
        $this->description = 'Module pour ajouter des faux avis sur les produits.';
        $this->bootstrap = true;

        parent::__construct();
    }

    public function install()
    {
        if (!parent::install()
            || !$this->installTablePartenaires()
            || !$this->installNewTabPartenaires('AdminCatalog', 'AdminPartenaires', 'Partenaires')
            || !$this->registerHook('displayFooterAfter')


        ) {
            return false;

        } else {

            return true;
        }
    }

    public function installTablePartenaires()
    {
        $sql = Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS '._DB_PREFIX_.'partenaires (
                id_partenaires INT UNSIGNED NOT NULL AUTO_INCREMENT,
                nom TEXT NOT NULL,
                description TEXT NOT NULL,
                image TEXT NOT NULL,
                PRIMARY KEY (id_partenaires)
            ) ENGINE = '._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8;'
        );

        return $sql;
    }

    public function installNewTabPartenaires($parent, $classcontroller, $name)
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


    public function hookDisplayFooterAfter()
    {

        $data = Db::getInstance()->executeS('SELECT * FROM '._DB_PREFIX_.'partenaires');

        //Tools::dieObject($data);

        $this->context->smarty->assign(array(

            'data' => $data,

        ));

        return $this->display(__FILE__, 'partenaires.tpl');
    }


    public function uninstall() {

        Db::getInstance()->execute('DROP TABLE IF EXISTS '._DB_PREFIX_.'partenaires');

        return parent::uninstall();
    }


}