<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.vouchers.update_voucher' shared service.

return $this->services['gyman.vouchers.update_voucher'] = new \Gyman\Application\Handler\UpdateVoucherHandler(${($_ = isset($this->services['gyman.vouchers.repository']) ? $this->services['gyman.vouchers.repository'] : $this->load(__DIR__.'/getGyman_Vouchers_RepositoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['event_dispatcher']) ? $this->services['event_dispatcher'] : $this->getEventDispatcherService()) && false ?: '_'});
