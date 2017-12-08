<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.reports.strategy.per_member' shared service.

return $this->services['gyman.reports.strategy.per_member'] = new \Gyman\Bundle\ReportsBundle\Generator\Strategy\PerMember(${($_ = isset($this->services['gyman.vouchers.repository']) ? $this->services['gyman.vouchers.repository'] : $this->load(__DIR__.'/getGyman_Vouchers_RepositoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['gyman.entries.repository']) ? $this->services['gyman.entries.repository'] : $this->load(__DIR__.'/getGyman_Entries_RepositoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'});
