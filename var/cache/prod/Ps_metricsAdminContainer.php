<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class Ps_metricsAdminContainer extends Container
{
    private $parameters = [];
    private $targetDirs = [];

    public function __construct()
    {
        $this->services = [];
        $this->methodMap = [
            'ps_metrics.adapter.link' => 'getPsMetrics_Adapter_LinkService',
            'ps_metrics.api.analytics' => 'getPsMetrics_Api_AnalyticsService',
            'ps_metrics.api.client.analytics' => 'getPsMetrics_Api_Client_AnalyticsService',
            'ps_metrics.api.client.factory' => 'getPsMetrics_Api_Client_FactoryService',
            'ps_metrics.api.client.http' => 'getPsMetrics_Api_Client_HttpService',
            'ps_metrics.api.http' => 'getPsMetrics_Api_HttpService',
            'ps_metrics.api.manager' => 'getPsMetrics_Api_ManagerService',
            'ps_metrics.cache.data' => 'getPsMetrics_Cache_DataService',
            'ps_metrics.cache.directory' => 'getPsMetrics_Cache_DirectoryService',
            'ps_metrics.context.prestashop' => 'getPsMetrics_Context_PrestashopService',
            'ps_metrics.data.tipscards' => 'getPsMetrics_Data_TipscardsService',
            'ps_metrics.env.analytics' => 'getPsMetrics_Env_AnalyticsService',
            'ps_metrics.env.cache' => 'getPsMetrics_Env_CacheService',
            'ps_metrics.env.segment' => 'getPsMetrics_Env_SegmentService',
            'ps_metrics.handler.guzzleapi' => 'getPsMetrics_Handler_GuzzleapiService',
            'ps_metrics.helper.data' => 'getPsMetrics_Helper_DataService',
            'ps_metrics.helper.db' => 'getPsMetrics_Helper_DbService',
            'ps_metrics.helper.json' => 'getPsMetrics_Helper_JsonService',
            'ps_metrics.helper.logger' => 'getPsMetrics_Helper_LoggerService',
            'ps_metrics.helper.module' => 'getPsMetrics_Helper_ModuleService',
            'ps_metrics.helper.number' => 'getPsMetrics_Helper_NumberService',
            'ps_metrics.helper.segment' => 'getPsMetrics_Helper_SegmentService',
            'ps_metrics.helper.shop' => 'getPsMetrics_Helper_ShopService',
            'ps_metrics.helper.tools' => 'getPsMetrics_Helper_ToolsService',
            'ps_metrics.kpi.configuration' => 'getPsMetrics_Kpi_ConfigurationService',
            'ps_metrics.kpi.conversion' => 'getPsMetrics_Kpi_ConversionService',
            'ps_metrics.kpi.kpi' => 'getPsMetrics_Kpi_KpiService',
            'ps_metrics.kpi.manager' => 'getPsMetrics_Kpi_ManagerService',
            'ps_metrics.kpi.orders' => 'getPsMetrics_Kpi_OrdersService',
            'ps_metrics.kpi.revenues' => 'getPsMetrics_Kpi_RevenuesService',
            'ps_metrics.kpi.strategyinterface' => 'getPsMetrics_Kpi_StrategyinterfaceService',
            'ps_metrics.kpi.total' => 'getPsMetrics_Kpi_TotalService',
            'ps_metrics.kpi.visits' => 'getPsMetrics_Kpi_VisitsService',
            'ps_metrics.middleware' => 'getPsMetrics_MiddlewareService',
            'ps_metrics.middleware.log' => 'getPsMetrics_Middleware_LogService',
            'ps_metrics.middleware.response' => 'getPsMetrics_Middleware_ResponseService',
            'ps_metrics.middleware.response.default' => 'getPsMetrics_Middleware_Response_DefaultService',
            'ps_metrics.middleware.sentry' => 'getPsMetrics_Middleware_SentryService',
            'ps_metrics.module' => 'getPsMetrics_ModuleService',
            'ps_metrics.module.dashboard.modules' => 'getPsMetrics_Module_Dashboard_ModulesService',
            'ps_metrics.module.gainstaller' => 'getPsMetrics_Module_GainstallerService',
            'ps_metrics.module.install' => 'getPsMetrics_Module_InstallService',
            'ps_metrics.module.uninstall' => 'getPsMetrics_Module_UninstallService',
            'ps_metrics.presenter.store.context' => 'getPsMetrics_Presenter_Store_ContextService',
            'ps_metrics.presenter.store.dashboard' => 'getPsMetrics_Presenter_Store_DashboardService',
            'ps_metrics.presenter.store.settings' => 'getPsMetrics_Presenter_Store_SettingsService',
            'ps_metrics.presenter.store.store' => 'getPsMetrics_Presenter_Store_StoreService',
            'ps_metrics.provider.analyticsaccountslist' => 'getPsMetrics_Provider_AnalyticsaccountslistService',
            'ps_metrics.provider.googletag' => 'getPsMetrics_Provider_GoogletagService',
            'ps_metrics.provider.shops' => 'getPsMetrics_Provider_ShopsService',
            'ps_metrics.repository.configuration' => 'getPsMetrics_Repository_ConfigurationService',
            'ps_metrics.repository.hookmodule' => 'getPsMetrics_Repository_HookmoduleService',
            'ps_metrics.repository.orders' => 'getPsMetrics_Repository_OrdersService',
            'ps_metrics.repository.payment' => 'getPsMetrics_Repository_PaymentService',
            'ps_metrics.tracker.segment' => 'getPsMetrics_Tracker_SegmentService',
            'ps_metrics.translation.dashboard' => 'getPsMetrics_Translation_DashboardService',
            'ps_metrics.translation.settings' => 'getPsMetrics_Translation_SettingsService',
            'ps_metrics.validation.processselectaccountanalytics' => 'getPsMetrics_Validation_ProcessselectaccountanalyticsService',
            'ps_metrics.validation.retrievedata' => 'getPsMetrics_Validation_RetrievedataService',
        ];
        $this->privates = [
            'ps_metrics.adapter.link' => true,
            'ps_metrics.api.analytics' => true,
            'ps_metrics.api.client.analytics' => true,
            'ps_metrics.api.client.factory' => true,
            'ps_metrics.api.client.http' => true,
            'ps_metrics.api.http' => true,
            'ps_metrics.api.manager' => true,
            'ps_metrics.cache.data' => true,
            'ps_metrics.cache.directory' => true,
            'ps_metrics.data.tipscards' => true,
            'ps_metrics.env.analytics' => true,
            'ps_metrics.env.cache' => true,
            'ps_metrics.env.segment' => true,
            'ps_metrics.handler.guzzleapi' => true,
            'ps_metrics.helper.data' => true,
            'ps_metrics.helper.db' => true,
            'ps_metrics.helper.json' => true,
            'ps_metrics.helper.logger' => true,
            'ps_metrics.helper.module' => true,
            'ps_metrics.helper.number' => true,
            'ps_metrics.helper.segment' => true,
            'ps_metrics.helper.shop' => true,
            'ps_metrics.helper.tools' => true,
            'ps_metrics.kpi.configuration' => true,
            'ps_metrics.kpi.conversion' => true,
            'ps_metrics.kpi.kpi' => true,
            'ps_metrics.kpi.manager' => true,
            'ps_metrics.kpi.orders' => true,
            'ps_metrics.kpi.revenues' => true,
            'ps_metrics.kpi.strategyinterface' => true,
            'ps_metrics.kpi.total' => true,
            'ps_metrics.kpi.visits' => true,
            'ps_metrics.middleware' => true,
            'ps_metrics.middleware.log' => true,
            'ps_metrics.middleware.response' => true,
            'ps_metrics.middleware.response.default' => true,
            'ps_metrics.middleware.sentry' => true,
            'ps_metrics.module' => true,
            'ps_metrics.module.dashboard.modules' => true,
            'ps_metrics.module.gainstaller' => true,
            'ps_metrics.module.install' => true,
            'ps_metrics.module.uninstall' => true,
            'ps_metrics.presenter.store.context' => true,
            'ps_metrics.presenter.store.dashboard' => true,
            'ps_metrics.presenter.store.settings' => true,
            'ps_metrics.presenter.store.store' => true,
            'ps_metrics.provider.analyticsaccountslist' => true,
            'ps_metrics.provider.googletag' => true,
            'ps_metrics.provider.shops' => true,
            'ps_metrics.repository.configuration' => true,
            'ps_metrics.repository.hookmodule' => true,
            'ps_metrics.repository.orders' => true,
            'ps_metrics.repository.payment' => true,
            'ps_metrics.tracker.segment' => true,
            'ps_metrics.translation.dashboard' => true,
            'ps_metrics.translation.settings' => true,
            'ps_metrics.validation.processselectaccountanalytics' => true,
            'ps_metrics.validation.retrievedata' => true,
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'ps_metrics.adapter.link' => true,
            'ps_metrics.api.analytics' => true,
            'ps_metrics.api.client.analytics' => true,
            'ps_metrics.api.client.factory' => true,
            'ps_metrics.api.client.http' => true,
            'ps_metrics.api.http' => true,
            'ps_metrics.api.manager' => true,
            'ps_metrics.cache.data' => true,
            'ps_metrics.cache.directory' => true,
            'ps_metrics.data.tipscards' => true,
            'ps_metrics.env.analytics' => true,
            'ps_metrics.env.cache' => true,
            'ps_metrics.env.segment' => true,
            'ps_metrics.handler.guzzleapi' => true,
            'ps_metrics.helper.data' => true,
            'ps_metrics.helper.db' => true,
            'ps_metrics.helper.json' => true,
            'ps_metrics.helper.logger' => true,
            'ps_metrics.helper.module' => true,
            'ps_metrics.helper.number' => true,
            'ps_metrics.helper.segment' => true,
            'ps_metrics.helper.shop' => true,
            'ps_metrics.helper.tools' => true,
            'ps_metrics.kpi.configuration' => true,
            'ps_metrics.kpi.conversion' => true,
            'ps_metrics.kpi.kpi' => true,
            'ps_metrics.kpi.manager' => true,
            'ps_metrics.kpi.orders' => true,
            'ps_metrics.kpi.revenues' => true,
            'ps_metrics.kpi.strategyinterface' => true,
            'ps_metrics.kpi.total' => true,
            'ps_metrics.kpi.visits' => true,
            'ps_metrics.middleware' => true,
            'ps_metrics.middleware.log' => true,
            'ps_metrics.middleware.response' => true,
            'ps_metrics.middleware.response.default' => true,
            'ps_metrics.middleware.sentry' => true,
            'ps_metrics.module' => true,
            'ps_metrics.module.dashboard.modules' => true,
            'ps_metrics.module.gainstaller' => true,
            'ps_metrics.module.install' => true,
            'ps_metrics.module.uninstall' => true,
            'ps_metrics.presenter.store.context' => true,
            'ps_metrics.presenter.store.dashboard' => true,
            'ps_metrics.presenter.store.settings' => true,
            'ps_metrics.presenter.store.store' => true,
            'ps_metrics.provider.analyticsaccountslist' => true,
            'ps_metrics.provider.googletag' => true,
            'ps_metrics.provider.shops' => true,
            'ps_metrics.repository.configuration' => true,
            'ps_metrics.repository.hookmodule' => true,
            'ps_metrics.repository.orders' => true,
            'ps_metrics.repository.payment' => true,
            'ps_metrics.tracker.segment' => true,
            'ps_metrics.translation.dashboard' => true,
            'ps_metrics.translation.settings' => true,
            'ps_metrics.validation.processselectaccountanalytics' => true,
            'ps_metrics.validation.retrievedata' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    /**
     * Gets the public 'ps_metrics.context.prestashop' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext
     */
    protected function getPsMetrics_Context_PrestashopService()
    {
        return $this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext();
    }

    /**
     * Gets the private 'ps_metrics.adapter.link' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter
     */
    protected function getPsMetrics_Adapter_LinkService()
    {
        return $this->services['ps_metrics.adapter.link'] = new \PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.api.analytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\AnalyticsApi
     */
    protected function getPsMetrics_Api_AnalyticsService()
    {
        return $this->services['ps_metrics.api.analytics'] = new \PrestaShop\Module\Ps_metrics\Api\AnalyticsApi(${($_ = isset($this->services['ps_metrics.api.client.analytics']) ? $this->services['ps_metrics.api.client.analytics'] : $this->getPsMetrics_Api_Client_AnalyticsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.env.analytics']) ? $this->services['ps_metrics.env.analytics'] : ($this->services['ps_metrics.env.analytics'] = new \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.api.client.analytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\Client\AnalyticsClient
     */
    protected function getPsMetrics_Api_Client_AnalyticsService()
    {
        return $this->services['ps_metrics.api.client.analytics'] = new \PrestaShop\Module\Ps_metrics\Api\Client\AnalyticsClient(${($_ = isset($this->services['ps_metrics.middleware.response.default']) ? $this->services['ps_metrics.middleware.response.default'] : $this->getPsMetrics_Middleware_Response_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.log']) ? $this->services['ps_metrics.middleware.log'] : $this->getPsMetrics_Middleware_LogService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.sentry']) ? $this->services['ps_metrics.middleware.sentry'] : ($this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response']) ? $this->services['ps_metrics.middleware.response'] : ($this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.handler.guzzleapi']) ? $this->services['ps_metrics.handler.guzzleapi'] : ($this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.api.client.factory' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\Client\ClientManager
     */
    protected function getPsMetrics_Api_Client_FactoryService()
    {
        return $this->services['ps_metrics.api.client.factory'] = new \PrestaShop\Module\Ps_metrics\Api\Client\ClientManager(${($_ = isset($this->services['ps_metrics.middleware.response.default']) ? $this->services['ps_metrics.middleware.response.default'] : $this->getPsMetrics_Middleware_Response_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.log']) ? $this->services['ps_metrics.middleware.log'] : $this->getPsMetrics_Middleware_LogService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.sentry']) ? $this->services['ps_metrics.middleware.sentry'] : ($this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response']) ? $this->services['ps_metrics.middleware.response'] : ($this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.handler.guzzleapi']) ? $this->services['ps_metrics.handler.guzzleapi'] : ($this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.api.client.http' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\Client\HttpClient
     */
    protected function getPsMetrics_Api_Client_HttpService()
    {
        return $this->services['ps_metrics.api.client.http'] = new \PrestaShop\Module\Ps_metrics\Api\Client\HttpClient(${($_ = isset($this->services['ps_metrics.middleware.response.default']) ? $this->services['ps_metrics.middleware.response.default'] : $this->getPsMetrics_Middleware_Response_DefaultService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.log']) ? $this->services['ps_metrics.middleware.log'] : $this->getPsMetrics_Middleware_LogService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.sentry']) ? $this->services['ps_metrics.middleware.sentry'] : ($this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.middleware.response']) ? $this->services['ps_metrics.middleware.response'] : ($this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.handler.guzzleapi']) ? $this->services['ps_metrics.handler.guzzleapi'] : ($this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.api.http' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\HttpApi
     */
    protected function getPsMetrics_Api_HttpService()
    {
        return $this->services['ps_metrics.api.http'] = new \PrestaShop\Module\Ps_metrics\Api\HttpApi(${($_ = isset($this->services['ps_metrics.api.client.http']) ? $this->services['ps_metrics.api.client.http'] : $this->getPsMetrics_Api_Client_HttpService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.api.manager' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Api\ApiManager
     */
    protected function getPsMetrics_Api_ManagerService()
    {
        return $this->services['ps_metrics.api.manager'] = new \PrestaShop\Module\Ps_metrics\Api\ApiManager();
    }

    /**
     * Gets the private 'ps_metrics.cache.data' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Cache\DataCache
     */
    protected function getPsMetrics_Cache_DataService()
    {
        return $this->services['ps_metrics.cache.data'] = new \PrestaShop\Module\Ps_metrics\Cache\DataCache(${($_ = isset($this->services['ps_metrics.cache.directory']) ? $this->services['ps_metrics.cache.directory'] : ($this->services['ps_metrics.cache.directory'] = new \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.env.cache']) ? $this->services['ps_metrics.env.cache'] : ($this->services['ps_metrics.env.cache'] = new \PrestaShop\Module\Ps_metrics\Environment\CacheEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.cache.directory' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache
     */
    protected function getPsMetrics_Cache_DirectoryService()
    {
        return $this->services['ps_metrics.cache.directory'] = new \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache();
    }

    /**
     * Gets the private 'ps_metrics.data.tipscards' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Data\TipsCardsData
     */
    protected function getPsMetrics_Data_TipscardsService()
    {
        return $this->services['ps_metrics.data.tipscards'] = new \PrestaShop\Module\Ps_metrics\Data\TipsCardsData(${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.env.analytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv
     */
    protected function getPsMetrics_Env_AnalyticsService()
    {
        return $this->services['ps_metrics.env.analytics'] = new \PrestaShop\Module\Ps_metrics\Environment\AnalyticsEnv();
    }

    /**
     * Gets the private 'ps_metrics.env.cache' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Environment\CacheEnv
     */
    protected function getPsMetrics_Env_CacheService()
    {
        return $this->services['ps_metrics.env.cache'] = new \PrestaShop\Module\Ps_metrics\Environment\CacheEnv();
    }

    /**
     * Gets the private 'ps_metrics.env.segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv
     */
    protected function getPsMetrics_Env_SegmentService()
    {
        return $this->services['ps_metrics.env.segment'] = new \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv();
    }

    /**
     * Gets the private 'ps_metrics.handler.guzzleapi' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler
     */
    protected function getPsMetrics_Handler_GuzzleapiService()
    {
        return $this->services['ps_metrics.handler.guzzleapi'] = new \PrestaShop\Module\Ps_metrics\Handler\GuzzleApiResponseExceptionHandler();
    }

    /**
     * Gets the private 'ps_metrics.helper.data' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\DataHelper
     */
    protected function getPsMetrics_Helper_DataService()
    {
        return $this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper();
    }

    /**
     * Gets the private 'ps_metrics.helper.db' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\DbHelper
     */
    protected function getPsMetrics_Helper_DbService()
    {
        return $this->services['ps_metrics.helper.db'] = new \PrestaShop\Module\Ps_metrics\Helper\DbHelper(${($_ = isset($this->services['ps_metrics.cache.data']) ? $this->services['ps_metrics.cache.data'] : $this->getPsMetrics_Cache_DataService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.helper.json' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\JsonHelper
     */
    protected function getPsMetrics_Helper_JsonService()
    {
        return $this->services['ps_metrics.helper.json'] = new \PrestaShop\Module\Ps_metrics\Helper\JsonHelper(${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.helper.logger' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper
     */
    protected function getPsMetrics_Helper_LoggerService()
    {
        return $this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper();
    }

    /**
     * Gets the private 'ps_metrics.helper.module' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper
     */
    protected function getPsMetrics_Helper_ModuleService()
    {
        return $this->services['ps_metrics.helper.module'] = new \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper();
    }

    /**
     * Gets the private 'ps_metrics.helper.number' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\NumberHelper
     */
    protected function getPsMetrics_Helper_NumberService()
    {
        return $this->services['ps_metrics.helper.number'] = new \PrestaShop\Module\Ps_metrics\Helper\NumberHelper();
    }

    /**
     * Gets the private 'ps_metrics.helper.segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\SegmentHelper
     */
    protected function getPsMetrics_Helper_SegmentService()
    {
        return $this->services['ps_metrics.helper.segment'] = new \PrestaShop\Module\Ps_metrics\Helper\SegmentHelper(${($_ = isset($this->services['ps_metrics.env.segment']) ? $this->services['ps_metrics.env.segment'] : ($this->services['ps_metrics.env.segment'] = new \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.helper.shop' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ShopHelper
     */
    protected function getPsMetrics_Helper_ShopService()
    {
        return $this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper();
    }

    /**
     * Gets the private 'ps_metrics.helper.tools' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper
     */
    protected function getPsMetrics_Helper_ToolsService()
    {
        return $this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper();
    }

    /**
     * Gets the private 'ps_metrics.kpi.configuration' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration
     */
    protected function getPsMetrics_Kpi_ConfigurationService()
    {
        return $this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration();
    }

    /**
     * Gets the private 'ps_metrics.kpi.conversion' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\ConversionKpi
     */
    protected function getPsMetrics_Kpi_ConversionService()
    {
        return $this->services['ps_metrics.kpi.conversion'] = new \PrestaShop\Module\Ps_metrics\Kpi\ConversionKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.number']) ? $this->services['ps_metrics.helper.number'] : ($this->services['ps_metrics.helper.number'] = new \PrestaShop\Module\Ps_metrics\Helper\NumberHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.visits']) ? $this->services['ps_metrics.kpi.visits'] : $this->getPsMetrics_Kpi_VisitsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.orders']) ? $this->services['ps_metrics.kpi.orders'] : $this->getPsMetrics_Kpi_OrdersService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.revenues']) ? $this->services['ps_metrics.kpi.revenues'] : $this->getPsMetrics_Kpi_RevenuesService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.kpi.kpi' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\Kpi
     */
    protected function getPsMetrics_Kpi_KpiService()
    {
        return $this->services['ps_metrics.kpi.kpi'] = new \PrestaShop\Module\Ps_metrics\Kpi\Kpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.kpi.manager' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\KpiManager
     */
    protected function getPsMetrics_Kpi_ManagerService()
    {
        return $this->services['ps_metrics.kpi.manager'] = new \PrestaShop\Module\Ps_metrics\Kpi\KpiManager(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.kpi.orders' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\OrdersKpi
     */
    protected function getPsMetrics_Kpi_OrdersService()
    {
        return $this->services['ps_metrics.kpi.orders'] = new \PrestaShop\Module\Ps_metrics\Kpi\OrdersKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.data']) ? $this->services['ps_metrics.helper.data'] : ($this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.orders']) ? $this->services['ps_metrics.repository.orders'] : $this->getPsMetrics_Repository_OrdersService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.number']) ? $this->services['ps_metrics.helper.number'] : ($this->services['ps_metrics.helper.number'] = new \PrestaShop\Module\Ps_metrics\Helper\NumberHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.revenues']) ? $this->services['ps_metrics.kpi.revenues'] : $this->getPsMetrics_Kpi_RevenuesService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.payment']) ? $this->services['ps_metrics.repository.payment'] : ($this->services['ps_metrics.repository.payment'] = new \PrestaShop\Module\Ps_metrics\Repository\PaymentRepository())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.kpi.revenues' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\RevenuesKpi
     */
    protected function getPsMetrics_Kpi_RevenuesService()
    {
        return $this->services['ps_metrics.kpi.revenues'] = new \PrestaShop\Module\Ps_metrics\Kpi\RevenuesKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.data']) ? $this->services['ps_metrics.helper.data'] : ($this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.orders']) ? $this->services['ps_metrics.repository.orders'] : $this->getPsMetrics_Repository_OrdersService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.kpi.strategyinterface' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\KpiStrategyInterface
     */
    protected function getPsMetrics_Kpi_StrategyinterfaceService()
    {
        return $this->services['ps_metrics.kpi.strategyinterface'] = new \PrestaShop\Module\Ps_metrics\Kpi\KpiStrategyInterface();
    }

    /**
     * Gets the private 'ps_metrics.kpi.total' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\TotalKpi
     */
    protected function getPsMetrics_Kpi_TotalService()
    {
        return $this->services['ps_metrics.kpi.total'] = new \PrestaShop\Module\Ps_metrics\Kpi\TotalKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.visits']) ? $this->services['ps_metrics.kpi.visits'] : $this->getPsMetrics_Kpi_VisitsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.orders']) ? $this->services['ps_metrics.kpi.orders'] : $this->getPsMetrics_Kpi_OrdersService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.kpi.revenues']) ? $this->services['ps_metrics.kpi.revenues'] : $this->getPsMetrics_Kpi_RevenuesService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.kpi.visits' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Kpi\VisitsKpi
     */
    protected function getPsMetrics_Kpi_VisitsService()
    {
        return $this->services['ps_metrics.kpi.visits'] = new \PrestaShop\Module\Ps_metrics\Kpi\VisitsKpi(${($_ = isset($this->services['ps_metrics.kpi.configuration']) ? $this->services['ps_metrics.kpi.configuration'] : ($this->services['ps_metrics.kpi.configuration'] = new \PrestaShop\Module\Ps_metrics\Kpi\Configuration\KpiConfiguration())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.data']) ? $this->services['ps_metrics.helper.data'] : ($this->services['ps_metrics.helper.data'] = new \PrestaShop\Module\Ps_metrics\Helper\DataHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.cache.data']) ? $this->services['ps_metrics.cache.data'] : $this->getPsMetrics_Cache_DataService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.middleware' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\Middleware
     */
    protected function getPsMetrics_MiddlewareService()
    {
        return $this->services['ps_metrics.middleware'] = new \PrestaShop\Module\Ps_metrics\Middleware\Middleware();
    }

    /**
     * Gets the private 'ps_metrics.middleware.log' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\LogMiddleware
     */
    protected function getPsMetrics_Middleware_LogService()
    {
        return $this->services['ps_metrics.middleware.log'] = new \PrestaShop\Module\Ps_metrics\Middleware\LogMiddleware(${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.middleware.response' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware
     */
    protected function getPsMetrics_Middleware_ResponseService()
    {
        return $this->services['ps_metrics.middleware.response'] = new \PrestaShop\Module\Ps_metrics\Middleware\ResponseMiddleware();
    }

    /**
     * Gets the private 'ps_metrics.middleware.response.default' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\CheckResponseMiddleware
     */
    protected function getPsMetrics_Middleware_Response_DefaultService()
    {
        return $this->services['ps_metrics.middleware.response.default'] = new \PrestaShop\Module\Ps_metrics\Middleware\CheckResponseMiddleware(${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.middleware.sentry' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware
     */
    protected function getPsMetrics_Middleware_SentryService()
    {
        return $this->services['ps_metrics.middleware.sentry'] = new \PrestaShop\Module\Ps_metrics\Middleware\SentryMiddleware();
    }

    /**
     * Gets the private 'ps_metrics.module' shared service.
     *
     * @return \Ps_metrics
     */
    protected function getPsMetrics_ModuleService()
    {
        return $this->services['ps_metrics.module'] = \Module::getInstanceByName('ps_metrics');
    }

    /**
     * Gets the private 'ps_metrics.module.dashboard.modules' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\DashboardModules
     */
    protected function getPsMetrics_Module_Dashboard_ModulesService()
    {
        return $this->services['ps_metrics.module.dashboard.modules'] = new \PrestaShop\Module\Ps_metrics\Module\DashboardModules(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.module.gainstaller' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\GAInstaller
     */
    protected function getPsMetrics_Module_GainstallerService()
    {
        return $this->services['ps_metrics.module.gainstaller'] = new \PrestaShop\Module\Ps_metrics\Module\GAInstaller(${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.module']) ? $this->services['ps_metrics.helper.module'] : ($this->services['ps_metrics.helper.module'] = new \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.module.install' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\Install
     */
    protected function getPsMetrics_Module_InstallService()
    {
        return $this->services['ps_metrics.module.install'] = new \PrestaShop\Module\Ps_metrics\Module\Install(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.hookmodule']) ? $this->services['ps_metrics.repository.hookmodule'] : ($this->services['ps_metrics.repository.hookmodule'] = new \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.module.uninstall' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Module\Uninstall
     */
    protected function getPsMetrics_Module_UninstallService()
    {
        return $this->services['ps_metrics.module.uninstall'] = new \PrestaShop\Module\Ps_metrics\Module\Uninstall(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.module']) ? $this->services['ps_metrics.helper.module'] : ($this->services['ps_metrics.helper.module'] = new \PrestaShop\Module\Ps_metrics\Helper\ModuleHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.presenter.store.context' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\Context\ContextPresenter
     */
    protected function getPsMetrics_Presenter_Store_ContextService()
    {
        return $this->services['ps_metrics.presenter.store.context'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\Context\ContextPresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.shops']) ? $this->services['ps_metrics.provider.shops'] : $this->getPsMetrics_Provider_ShopsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.module.dashboard.modules']) ? $this->services['ps_metrics.module.dashboard.modules'] : $this->getPsMetrics_Module_Dashboard_ModulesService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.presenter.store.dashboard' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\Dashboard\DashboardPresenter
     */
    protected function getPsMetrics_Presenter_Store_DashboardService()
    {
        return $this->services['ps_metrics.presenter.store.dashboard'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\Dashboard\DashboardPresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.translation.dashboard']) ? $this->services['ps_metrics.translation.dashboard'] : $this->getPsMetrics_Translation_DashboardService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.presenter.store.settings' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\Settings\SettingsPresenter
     */
    protected function getPsMetrics_Presenter_Store_SettingsService()
    {
        return $this->services['ps_metrics.presenter.store.settings'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\Settings\SettingsPresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.translation.settings']) ? $this->services['ps_metrics.translation.settings'] : $this->getPsMetrics_Translation_SettingsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.adapter.link']) ? $this->services['ps_metrics.adapter.link'] : $this->getPsMetrics_Adapter_LinkService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.shops']) ? $this->services['ps_metrics.provider.shops'] : $this->getPsMetrics_Provider_ShopsService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.analyticsaccountslist']) ? $this->services['ps_metrics.provider.analyticsaccountslist'] : $this->getPsMetrics_Provider_AnalyticsaccountslistService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.provider.googletag']) ? $this->services['ps_metrics.provider.googletag'] : $this->getPsMetrics_Provider_GoogletagService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.module.gainstaller']) ? $this->services['ps_metrics.module.gainstaller'] : $this->getPsMetrics_Module_GainstallerService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.http']) ? $this->services['ps_metrics.api.http'] : $this->getPsMetrics_Api_HttpService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.presenter.store.store' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Presenter\Store\StorePresenter
     */
    protected function getPsMetrics_Presenter_Store_StoreService()
    {
        return $this->services['ps_metrics.presenter.store.store'] = new \PrestaShop\Module\Ps_metrics\Presenter\Store\StorePresenter(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.presenter.store.context']) ? $this->services['ps_metrics.presenter.store.context'] : $this->getPsMetrics_Presenter_Store_ContextService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.presenter.store.dashboard']) ? $this->services['ps_metrics.presenter.store.dashboard'] : $this->getPsMetrics_Presenter_Store_DashboardService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.presenter.store.settings']) ? $this->services['ps_metrics.presenter.store.settings'] : $this->getPsMetrics_Presenter_Store_SettingsService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.provider.analyticsaccountslist' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Provider\AnalyticsAccountsListProvider
     */
    protected function getPsMetrics_Provider_AnalyticsaccountslistService()
    {
        return $this->services['ps_metrics.provider.analyticsaccountslist'] = new \PrestaShop\Module\Ps_metrics\Provider\AnalyticsAccountsListProvider(${($_ = isset($this->services['ps_metrics.repository.configuration']) ? $this->services['ps_metrics.repository.configuration'] : $this->getPsMetrics_Repository_ConfigurationService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->getPsMetrics_Helper_JsonService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.api.analytics']) ? $this->services['ps_metrics.api.analytics'] : $this->getPsMetrics_Api_AnalyticsService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.provider.googletag' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Provider\GoogleTagProvider
     */
    protected function getPsMetrics_Provider_GoogletagService()
    {
        return $this->services['ps_metrics.provider.googletag'] = new \PrestaShop\Module\Ps_metrics\Provider\GoogleTagProvider(${($_ = isset($this->services['ps_metrics.api.http']) ? $this->services['ps_metrics.api.http'] : $this->getPsMetrics_Api_HttpService()) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.provider.shops' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Provider\ShopsProvider
     */
    protected function getPsMetrics_Provider_ShopsService()
    {
        return $this->services['ps_metrics.provider.shops'] = new \PrestaShop\Module\Ps_metrics\Provider\ShopsProvider(${($_ = isset($this->services['ps_metrics.helper.tools']) ? $this->services['ps_metrics.helper.tools'] : ($this->services['ps_metrics.helper.tools'] = new \PrestaShop\Module\Ps_metrics\Helper\ToolsHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.shop']) ? $this->services['ps_metrics.helper.shop'] : ($this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.repository.configuration' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository
     */
    protected function getPsMetrics_Repository_ConfigurationService()
    {
        return $this->services['ps_metrics.repository.configuration'] = new \PrestaShop\Module\Ps_metrics\Repository\ConfigurationRepository(${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.repository.hookmodule' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository
     */
    protected function getPsMetrics_Repository_HookmoduleService()
    {
        return $this->services['ps_metrics.repository.hookmodule'] = new \PrestaShop\Module\Ps_metrics\Repository\HookModuleRepository();
    }

    /**
     * Gets the private 'ps_metrics.repository.orders' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\OrdersRepository
     */
    protected function getPsMetrics_Repository_OrdersService()
    {
        return $this->services['ps_metrics.repository.orders'] = new \PrestaShop\Module\Ps_metrics\Repository\OrdersRepository(${($_ = isset($this->services['ps_metrics.helper.db']) ? $this->services['ps_metrics.helper.db'] : $this->getPsMetrics_Helper_DbService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.shop']) ? $this->services['ps_metrics.helper.shop'] : ($this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, NULL);
    }

    /**
     * Gets the private 'ps_metrics.repository.payment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Repository\PaymentRepository
     */
    protected function getPsMetrics_Repository_PaymentService()
    {
        return $this->services['ps_metrics.repository.payment'] = new \PrestaShop\Module\Ps_metrics\Repository\PaymentRepository();
    }

    /**
     * Gets the private 'ps_metrics.tracker.segment' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Tracker\Segment
     */
    protected function getPsMetrics_Tracker_SegmentService()
    {
        return $this->services['ps_metrics.tracker.segment'] = new \PrestaShop\Module\Ps_metrics\Tracker\Segment(${($_ = isset($this->services['ps_metrics.env.segment']) ? $this->services['ps_metrics.env.segment'] : ($this->services['ps_metrics.env.segment'] = new \PrestaShop\Module\Ps_metrics\Environment\SegmentEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.segment']) ? $this->services['ps_metrics.helper.segment'] : $this->getPsMetrics_Helper_SegmentService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.shop']) ? $this->services['ps_metrics.helper.shop'] : ($this->services['ps_metrics.helper.shop'] = new \PrestaShop\Module\Ps_metrics\Helper\ShopHelper())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.translation.dashboard' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Translation\DashboardTranslation
     */
    protected function getPsMetrics_Translation_DashboardService()
    {
        return $this->services['ps_metrics.translation.dashboard'] = new \PrestaShop\Module\Ps_metrics\Translation\DashboardTranslation(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.translation.settings' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Translation\SettingsTranslation
     */
    protected function getPsMetrics_Translation_SettingsService()
    {
        return $this->services['ps_metrics.translation.settings'] = new \PrestaShop\Module\Ps_metrics\Translation\SettingsTranslation(${($_ = isset($this->services['ps_metrics.module']) ? $this->services['ps_metrics.module'] : $this->getPsMetrics_ModuleService()) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.context.prestashop']) ? $this->services['ps_metrics.context.prestashop'] : ($this->services['ps_metrics.context.prestashop'] = new \PrestaShop\Module\Ps_metrics\Context\PrestaShopContext())) && false ?: '_'});
    }

    /**
     * Gets the private 'ps_metrics.validation.processselectaccountanalytics' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Validation\SelectAccountAnalytics
     */
    protected function getPsMetrics_Validation_ProcessselectaccountanalyticsService()
    {
        return $this->services['ps_metrics.validation.processselectaccountanalytics'] = new \PrestaShop\Module\Ps_metrics\Validation\SelectAccountAnalytics();
    }

    /**
     * Gets the private 'ps_metrics.validation.retrievedata' shared service.
     *
     * @return \PrestaShop\Module\Ps_metrics\Validation\RetrieveData
     */
    protected function getPsMetrics_Validation_RetrievedataService()
    {
        return $this->services['ps_metrics.validation.retrievedata'] = new \PrestaShop\Module\Ps_metrics\Validation\RetrieveData();
    }
}
