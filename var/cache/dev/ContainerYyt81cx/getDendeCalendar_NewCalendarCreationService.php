<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'dende_calendar.new_calendar_creation' shared service.

return $this->services['dende_calendar.new_calendar_creation'] = new \Dende\Calendar\Application\Handler\CreateCalendarHandler($this->get($this->getParameter("dende_calendar.calendar_factory_service_name")), $this->get($this->getParameter("dende_calendar.calendar_repository_service_name")), ${($_ = isset($this->services['debug.event_dispatcher']) ? $this->services['debug.event_dispatcher'] : $this->getDebug_EventDispatcherService()) && false ?: '_'});
