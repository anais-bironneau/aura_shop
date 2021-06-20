<?php

class Ab_DisplayHours extends Module
{
    public function __construct()
    {
        $this->name = 'ab_displayhours';
        $this->displayName = 'Display hours';
        $this->tab = 'front_office_features';
        $this->version = '0.1.0';
        $this->author = 'Anais Bironneau';
        $this->description = 'Module to fill out Hotline service hours in BO and display them on the website.';
        $this->bootstrap = true;

        parent::__construct();
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayFooter')
        ) {
            return false;
        } else {
            return true;
        }
    }

    // tells presta that said module is customisable & fetch data sent by form
    public function getContent()
    {
        if (Tools::isSubmit('submit_ab_displayhours')){

            $displayHours = Tools::getValue('DISPLAY_HOURS');
            $hotlineNumber = Tools::getValue('HOTLINE_NUMBER');
            $daysHotline = Tools::getValue('DAYS_HOTLINE');
            $hotlineOpeningTime = Tools::getValue('HOTLINE_OPENING_TIME');
            $hotlineClosingTime = Tools::getValue('HOTLINE_CLOSING_TIME');

            Configuration::updateValue('DISPLAY_HOURS', $displayHours);
            Configuration::updateValue('HOTLINE_NUMBER', $hotlineNumber);
            Configuration::updateValue('DAYS_HOTLINE', $daysHotline);
            Configuration::updateValue('HOTLINE_OPENING_TIME', $hotlineOpeningTime);
            Configuration::updateValue('HOTLINE_CLOSING_TIME', $hotlineClosingTime);

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

                    'type' => 'switch',
                    'label' => $this->l('Display hotline hours'),
                    'name' => 'DISPLAY_HOURS',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => true,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => false,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Hotline phone number'),
                    'name' => 'HOTLINE_NUMBER',
                    'placeholder' => $this->l('ex: 01 07 07 07 07'),
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Short sentence to define which days the hotline is available'),
                    'name' => 'DAYS_HOTLINE',
                    'placeholder' => $this->l('ex: From Monday to Friday:')
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Hotline opening time'),
                    'name' => 'HOTLINE_OPENING_TIME',
                    'placeholder' => $this->l('ex: 10am'),
                    'required' => true
                ],
                [
                    'type' => 'text',
                    'label' => $this->l('Hotline closing time'),
                    'name' => 'HOTLINE_CLOSING_TIME',
                    'placeholder' => $this->l('ex: 5pm'),
                    'required' => true
                ]
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
        $helper->submit_action = 'submit_ab_displayhours'; // sets name attribute of submit button

        $helper->fields_value['DISPLAY_HOURS'] = Tools::getValue('DISPLAY_HOURS', Configuration::get('DISPLAY_HOURS'));
        $helper->fields_value['HOTLINE_NUMBER'] = Tools::getValue('HOTLINE_NUMBER', Configuration::get('HOTLINE_NUMBER'));
        $helper->fields_value['DAYS_HOTLINE'] = Tools::getValue('DAYS_HOTLINE', Configuration::get('DAYS_HOTLINE'));
        $helper->fields_value['HOTLINE_OPENING_TIME'] = Tools::getValue('HOTLINE_OPENING_TIME', Configuration::get('HOTLINE_OPENING_TIME'));
        $helper->fields_value['HOTLINE_CLOSING_TIME'] = Tools::getValue('HOTLINE_CLOSING_TIME', Configuration::get('HOTLINE_CLOSING_TIME'));

        return $helper->generateForm($form_configuration);
    }

    public function hookDisplayFooter()
    {
        $displayHours = Configuration::get('DISPLAY_HOURS');
        $hotlineNumber = Configuration::get('HOTLINE_NUMBER');
        $daysHotline = Configuration::get('DAYS_HOTLINE');
        $hotlineOpeningTime = Configuration::get('HOTLINE_OPENING_TIME');
        $hotlineClosingTime = Configuration::get('HOTLINE_CLOSING_TIME');

        $this->context->smarty->assign(array(
            'displayHours' => $displayHours,
            'hotlineNumber' => $hotlineNumber,
            'daysHotline' => $daysHotline,
            'hotlineOpeningTime' => $hotlineOpeningTime,
            'hotlineClosingTime' => $hotlineClosingTime
        ));

        return $this->display(__FILE__, 'ab_displayhours.tpl');
    }

    public function uninstall() {

        Configuration::deleteByName('DISPLAY_HOURS');
        Configuration::deleteByName('HOTLINE_NUMBER');
        Configuration::deleteByName('DAYS_HOTLINE');
        Configuration::deleteByName('HOTLINE_OPENING_TIME');
        Configuration::deleteByName('HOTLINE_CLOSING_TIME');

        return parent::uninstall();
    }
}