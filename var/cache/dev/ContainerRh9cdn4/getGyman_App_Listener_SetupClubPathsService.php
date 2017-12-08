<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.app.listener.setup_club_paths' shared service.

return $this->services['gyman.app.listener.setup_club_paths'] = new \Gyman\Bundle\AppBundle\Listener\SetupPathsForClub(${($_ = isset($this->services['gyman.club.repository']) ? $this->services['gyman.club.repository'] : $this->getGyman_Club_RepositoryService()) && false ?: '_'}, ${($_ = isset($this->services['session']) ? $this->services['session'] : $this->load(__DIR__.'/getSessionService.php')) && false ?: '_'}, ${($_ = isset($this->services['twig']) ? $this->services['twig'] : $this->getTwigService()) && false ?: '_'}, array('no_image' => '/bundles/gymanapp/images/no-profile.gif', 'gallerydirectory' => ($this->targetDirs[3].'/app/../web/uploads/gallery/'), 'gallerypath' => '/uploads/gallery/'));
