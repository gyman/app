<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.members.unique_member_email.validator' shared service.

return $this->services['gyman.members.unique_member_email.validator'] = new \Gyman\Bundle\AppBundle\Validator\UniqueMemberEmailValidator(${($_ = isset($this->services['gyman.members.repository']) ? $this->services['gyman.members.repository'] : $this->load(__DIR__.'/getGyman_Members_RepositoryService.php')) && false ?: '_'});
