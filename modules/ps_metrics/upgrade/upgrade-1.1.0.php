<?php

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */
if (!defined('_PS_VERSION_')) {
    exit;
}

/**
 * Update module if shop version is 1.7
 *
 * @param Module $module
 *
 * @return bool
 */
function upgradeIfIsShop1_7($module)
{
    if (true === \Module::needUpgrade($module)) {
        $moduleManagerBuilder = \PrestaShop\PrestaShop\Core\Addon\Module\ModuleManagerBuilder::getInstance();
        $moduleManager = $moduleManagerBuilder->build();

        return $moduleManager->upgrade('ps_accounts');
    }

    return true;
}

/**
 * Update module if shop version is 1.6
 *
 * @param Module $module
 * @param string $idPsAccounts
 *
 * @return bool
 */
function upgradeIfIsShop1_6($idPsAccounts)
{
    file_put_contents(_PS_MODULE_DIR_ . 'ps_account.zip', \Tools::addonsRequest('module', ['id_module' => $idPsAccounts]));
    \Tools::ZipExtract(_PS_MODULE_DIR_ . 'ps_accounts.zip', _PS_MODULE_DIR_);
    $modulePsAccounts = \Module::getInstanceByName('ps_accounts');
    if (\Module::initUpgradeModule($modulePsAccounts)) {
        $upgrade = $modulePsAccounts->runUpgradeModule();

        return $upgrade['success'];
    }

    return true;
}
/**
 * Update main function for module Version 1.1.0
 *
 * @param Module $module
 *
 * @return bool
 */
function upgrade_module_1_1_0($module)
{
    if (true === (bool) version_compare(_PS_VERSION_, '1.7', '>=')) {
        $modulePsAccounts = \Module::getInstanceByName('ps_accounts');

        return upgradeIfIsShop1_7($modulePsAccounts);
    }

    return upgradeIfIsShop1_6($module->idPsAccounts);
}
