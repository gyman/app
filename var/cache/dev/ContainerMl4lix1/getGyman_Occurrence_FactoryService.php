<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'gyman.occurrence.factory' shared service.

return $this->services['gyman.occurrence.factory'] = new \Gyman\Bundle\AppBundle\Factory\OccurrenceFactory(${($_ = isset($this->services['dende_calendar.id_generator']) ? $this->services['dende_calendar.id_generator'] : $this->load(__DIR__.'/getDendeCalendar_IdGeneratorService.php')) && false ?: '_'});
