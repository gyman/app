<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'voucher_manager' shared service.

$this->services['voucher_manager'] = $instance = new \Gyman\Bundle\AppBundle\Services\Manager\VoucherManager(${($_ = isset($this->services['doctrine.orm.default_entity_manager']) ? $this->services['doctrine.orm.default_entity_manager'] : $this->getDoctrine_Orm_DefaultEntityManagerService()) && false ?: '_'}, ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'});

$instance->setClass('Gyman\\Domain\\Voucher');
$instance->setEntityManager(${($_ = isset($this->services['doctrine.orm.tenant_entity_manager']) ? $this->services['doctrine.orm.tenant_entity_manager'] : $this->getDoctrine_Orm_TenantEntityManagerService()) && false ?: '_'});

return $instance;
