<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.memcache_server.manager' shared service.

return $this->services['prestashop.adapter.memcache_server.manager'] = new \PrestaShop\PrestaShop\Adapter\Cache\MemcacheServerManager(${($_ = isset($this->services['doctrine.dbal.default_connection']) ? $this->services['doctrine.dbal.default_connection'] : $this->getDoctrine_Dbal_DefaultConnectionService()) && false ?: '_'}, 'pre_aura');
