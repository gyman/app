<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'dende_calendar.handler.create_calendar' shared service.

return $this->services['dende_calendar.handler.create_calendar'] = new \Dende\Calendar\Application\Handler\CreateCalendarHandler(${($_ = isset($this->services['dende_calendar.factory.calendar']) ? $this->services['dende_calendar.factory.calendar'] : $this->load(__DIR__.'/getDendeCalendar_Factory_CalendarService.php')) && false ?: '_'}, ${($_ = isset($this->services['dende_calendar.calendar_repository']) ? $this->services['dende_calendar.calendar_repository'] : $this->load(__DIR__.'/getDendeCalendar_CalendarRepositoryService.php')) && false ?: '_'}, ${($_ = isset($this->services['event_dispatcher']) ? $this->services['event_dispatcher'] : $this->getEventDispatcherService()) && false ?: '_'});
