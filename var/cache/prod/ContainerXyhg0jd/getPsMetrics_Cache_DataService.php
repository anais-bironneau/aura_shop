<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'ps_metrics.cache.data' shared service.

return $this->services['ps_metrics.cache.data'] = new \PrestaShop\Module\Ps_metrics\Cache\DataCache(${($_ = isset($this->services['ps_metrics.cache.directory']) ? $this->services['ps_metrics.cache.directory'] : ($this->services['ps_metrics.cache.directory'] = new \PrestaShop\Module\Ps_metrics\Cache\DirectoryCache())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.env.cache']) ? $this->services['ps_metrics.env.cache'] : ($this->services['ps_metrics.env.cache'] = new \PrestaShop\Module\Ps_metrics\Environment\CacheEnv())) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.json']) ? $this->services['ps_metrics.helper.json'] : $this->load('getPsMetrics_Helper_JsonService.php')) && false ?: '_'}, ${($_ = isset($this->services['ps_metrics.helper.logger']) ? $this->services['ps_metrics.helper.logger'] : ($this->services['ps_metrics.helper.logger'] = new \PrestaShop\Module\Ps_metrics\Helper\LoggerHelper())) && false ?: '_'});
