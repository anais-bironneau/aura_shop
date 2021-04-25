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

namespace PrestaShop\Module\Ps_metrics\Presenter\Store\Context;

use PrestaShop\AccountsAuth\Service\PsAccountsService;
use PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter;
use PrestaShop\Module\Ps_metrics\Context\PrestaShopContext;
use PrestaShop\Module\Ps_metrics\Module\DashboardModules;
use PrestaShop\Module\Ps_metrics\Presenter\PresenterInterface;
use PrestaShop\Module\Ps_metrics\Provider\ShopsProvider;
use PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository;
use Ps_metrics;

class ContextPresenter implements PresenterInterface
{
    /**
     * @var Ps_metrics
     */
    private $module;

    /**
     * @var PrestaShopContext
     */
    private $context;

    /**
     * @var LinkAdapter
     */
    private $linkAdapter;

    /**
     * @var ConfigurationRepository
     */
    private $configurationRepository;

    /**
     * @var ShopsProvider
     */
    private $shopsProvider;

    /**
     * @var DashboardModules;
     */
    private $dashboardModules;

    public function __construct(
        Ps_metrics $module,
        PrestaShopContext $context,
        LinkAdapter $linkAdapter,
        ConfigurationRepository $configurationRepository,
        ShopsProvider $shopsProvider,
        DashboardModules $dashboardModules
    ) {
        $this->module = $module;
        $this->context = $context;
        $this->linkAdapter = $linkAdapter;
        $this->configurationRepository = $configurationRepository;
        $this->shopsProvider = $shopsProvider;
        $this->dashboardModules = $dashboardModules;
    }

    /**
     * Tells if we can show the Dashboard App by checking if there's a refresh token and Google Linked Value
     *
     * @return bool
     */
    protected function canShowDashboardApp()
    {
        $psxService = new PsAccountsService();

        if (null === $psxService->getFirebaseRefreshToken()) {
            return false;
        }

        if (false === $this->configurationRepository->getGoogleLinkedValue()) {
            return false;
        }

        return true;
    }

    /**
     * Present the Context Vuex
     *
     * @return array
     */
    public function present()
    {
        $psAccountsService = new PsAccountsService();
        $currentShop = $this->shopsProvider->getShopUrl($this->context->getShopId());

        return [
            'context' => [
                'app' => $this->getCurrentVueApp(),
                'canShowDashboard' => $this->canShowDashboardApp(),
                'user' => [
                    'email' => $psAccountsService->getEmail(),
                    'emailIsValidated' => $psAccountsService->isEmailValidated(),
                    'isSuperAdmin' => $psAccountsService->getContext()->employee->isSuperAdmin(),
                    'gaIsOnboarded' => (bool) $this->configurationRepository->getGoogleLinkedValue(),
                ],
                'dashboardModulesState' => $this->dashboardModules->modulesIsEnabled(),
                'version_ps' => _PS_VERSION_,
                'version_module' => $this->module->version,
                'shopId' => $psAccountsService->getShopUuidV4(),
                'isShop17' => version_compare(_PS_VERSION_, '1.7.3.0', '>='),
                'configurationLink' => $this->linkAdapter->getAdminLink('AdminModules', true, [], ['configure' => $this->module->name]),
                'controllersLinks' => [
                    'dashboard' => $this->linkAdapter->getAdminLink($this->module->ajaxDashboardController),
                    'settings' => $this->linkAdapter->getAdminLink($this->module->ajaxSettingsController),
                ],
                'i18n' => [
                    'isoCode' => $this->context->getLanguageIsoCode(),
                    'languageLocale' => $this->context->getLanguageCode(),
                    'currencyIsoCode' => $this->context->getCurrencyIsoCode(),
                ],
                'shop' => [
                    'domain' => $currentShop['domain'],
                    'url' => $currentShop['url'],
                ],
                'readmeUrl' => $this->getReadme(),
            ],
        ];
    }

    /**
     * Get Vue App to use in terms of context Controller Name
     *
     * @return string
     */
    private function getCurrentVueApp()
    {
        if ('AdminDashboard' === $this->context->getControllerName()) {
            return 'dashboard';
        }

        return 'settings';
    }

    /**
     * Get the documentation url depending on the current language
     *
     * @return string path of the doc
     */
    private function getReadme()
    {
        $isoCode = $this->context->getLanguageIsoCode();

        if (!file_exists(_PS_ROOT_DIR_ . _MODULE_DIR_ . $this->module->name . '/docs/readme_' . $isoCode . '.pdf')) {
            $isoCode = 'en';
        }

        return _MODULE_DIR_ . $this->module->name . '/docs/readme_' . $isoCode . '.pdf';
    }
}
