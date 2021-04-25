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

namespace PrestaShop\Module\Ps_metrics\Module;

use Module;
use PrestaShop\AccountsAuth\Service\PsAccountsService;
use PrestaShop\Module\Ps_metrics\Api\AnalyticsApi;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;
use PrestaShop\Module\Ps_metrics\Helper\LoggerHelper;
use PrestaShop\Module\Ps_metrics\Helper\ModuleHelper;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use Ps_metrics;
use Tab;
use Validate;

class Uninstall
{
    /**
     * @var Ps_metrics|Module
     */
    private $module;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var JsonHelper
     */
    private $jsonHelper;

    /**
     * @var ModuleHelper
     */
    private $moduleHelper;

    /**
     * @var LoggerHelper
     */
    private $loggerHelper;

    /**
     * @var AnalyticsApi
     */
    private $analyticsApi;

    /**
     * Uninstall constructor.
     *
     * @param Module $module
     * @param ConfigurationRepository $configurationRepository
     * @param JsonHelper $jsonHelper
     * @param ModuleHelper $moduleHelper
     * @param LoggerHelper $loggerHelper
     * @param AnalyticsApi $analyticsApi
     */
    public function __construct(
        Module $module,
        ConfigurationRepository $configurationRepository,
        JsonHelper $jsonHelper,
        ModuleHelper $moduleHelper,
        LoggerHelper $loggerHelper,
        AnalyticsApi $analyticsApi
    ) {
        $this->module = $module;
        $this->configurationRepository = $configurationRepository;
        $this->jsonHelper = $jsonHelper;
        $this->moduleHelper = $moduleHelper;
        $this->loggerHelper = $loggerHelper;
        $this->analyticsApi = $analyticsApi;
    }

    /**
     * resetConfigurationValues
     *
     * @return bool
     */
    public function resetConfigurationValues()
    {
        return $this->configurationRepository->saveActionGoogleLinked(false);
    }

    /**
     * uninstall tabs
     *
     * @return bool
     */
    public function uninstallTabs()
    {
        $uninstallTabCompleted = true;

        foreach ($this->module->controllers as $controllerName) {
            $idTab = (int) Tab::getIdFromClassName($controllerName);
            $tab = new Tab($idTab);

            if (Validate::isLoadedObject($tab)) {
                $uninstallTabCompleted = $uninstallTabCompleted && $tab->delete();
            }
        }

        return $uninstallTabCompleted;
    }

    /**
     * unsubscribePsEssentials
     *
     * @return bool
     */
    public function unsubscribePsEssentials()
    {
        // if the user is not onboarded, don't process unsubscribe
        if (!$this->isOnboardedWithAccountAndGoogle()) {
            return true;
        }

        return $this->analyticsApi->unsubscribe();
    }

    /**
     * Check if the user is onboarded on prestashop account and google
     *
     * @return bool
     */
    private function isOnboardedWithAccountAndGoogle()
    {
        if (false === (new PsAccountsService())->getShopUuidV4() &&
            false === $this->configurationRepository->getGoogleLinkedValue()
        ) {
            return false;
        }

        return true;
    }
}
