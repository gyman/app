<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.vouchers.repository.entry' shared service.

return $this->services['gyman.vouchers.repository.entry'] = ${($_ = isset($this->services['doctrine.orm.tenant_entity_manager']) ? $this->services['doctrine.orm.tenant_entity_manager'] : $this->getDoctrine_Orm_TenantEntityManagerService()) && false ?: '_'}->getRepository('Gyman\\Domain\\Entry');
