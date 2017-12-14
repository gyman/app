<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'tactician.commandbus.default.handler.locator' shared service.

return $this->services['tactician.commandbus.default.handler.locator'] = new \League\Tactician\Container\ContainerLocator(new \Symfony\Component\DependencyInjection\ServiceLocator(array('dende_calendar.handler.create_calendar' => function () {
    return ${($_ = isset($this->services['dende_calendar.handler.create_calendar']) ? $this->services['dende_calendar.handler.create_calendar'] : $this->load(__DIR__.'/getDendeCalendar_Handler_CreateCalendarService.php')) && false ?: '_'};
}, 'dende_calendar.handler.create_event' => function () {
    return ${($_ = isset($this->services['dende_calendar.handler.create_event']) ? $this->services['dende_calendar.handler.create_event'] : $this->load(__DIR__.'/getDendeCalendar_Handler_CreateEventService.php')) && false ?: '_'};
}, 'dende_calendar.handler.update_event' => function () {
    return ${($_ = isset($this->services['dende_calendar.handler.update_event']) ? $this->services['dende_calendar.handler.update_event'] : $this->load(__DIR__.'/getDendeCalendar_Handler_UpdateEventService.php')) && false ?: '_'};
}, 'dende_calendar.handler.update_occurrence' => function () {
    return ${($_ = isset($this->services['dende_calendar.handler.update_occurrence']) ? $this->services['dende_calendar.handler.update_occurrence'] : $this->load(__DIR__.'/getDendeCalendar_Handler_UpdateOccurrenceService.php')) && false ?: '_'};
}, 'gyman.app.handler.clear_expired_current_vouchers' => function () {
    return ${($_ = isset($this->services['gyman.app.handler.clear_expired_current_vouchers']) ? $this->services['gyman.app.handler.clear_expired_current_vouchers'] : $this->load(__DIR__.'/getGyman_App_Handler_ClearExpiredCurrentVouchersService.php')) && false ?: '_'};
}, 'gyman.app.handler.close_expired_entries' => function () {
    return ${($_ = isset($this->services['gyman.app.handler.close_expired_entries']) ? $this->services['gyman.app.handler.close_expired_entries'] : $this->load(__DIR__.'/getGyman_App_Handler_CloseExpiredEntriesService.php')) && false ?: '_'};
}, 'gyman.app.handler.update_current_vouchers' => function () {
    return ${($_ = isset($this->services['gyman.app.handler.update_current_vouchers']) ? $this->services['gyman.app.handler.update_current_vouchers'] : $this->load(__DIR__.'/getGyman_App_Handler_UpdateCurrentVouchersService.php')) && false ?: '_'};
}, 'gyman.entries.close_entry' => function () {
    return ${($_ = isset($this->services['gyman.entries.close_entry']) ? $this->services['gyman.entries.close_entry'] : $this->load(__DIR__.'/getGyman_Entries_CloseEntryService.php')) && false ?: '_'};
}, 'gyman.entries.open_entry' => function () {
    return ${($_ = isset($this->services['gyman.entries.open_entry']) ? $this->services['gyman.entries.open_entry'] : $this->load(__DIR__.'/getGyman_Entries_OpenEntryService.php')) && false ?: '_'};
}, 'gyman.landing.create_club_handler' => function () {
    return ${($_ = isset($this->services['gyman.landing.create_club_handler']) ? $this->services['gyman.landing.create_club_handler'] : $this->load(__DIR__.'/getGyman_Landing_CreateClubHandlerService.php')) && false ?: '_'};
}, 'gyman.members.create_member' => function () {
    return ${($_ = isset($this->services['gyman.members.create_member']) ? $this->services['gyman.members.create_member'] : $this->load(__DIR__.'/getGyman_Members_CreateMemberService.php')) && false ?: '_'};
}, 'gyman.members.create_user_for_member' => function () {
    return ${($_ = isset($this->services['gyman.members.create_user_for_member']) ? $this->services['gyman.members.create_user_for_member'] : $this->load(__DIR__.'/getGyman_Members_CreateUserForMemberService.php')) && false ?: '_'};
}, 'gyman.members.update_member' => function () {
    return ${($_ = isset($this->services['gyman.members.update_member']) ? $this->services['gyman.members.update_member'] : $this->load(__DIR__.'/getGyman_Members_UpdateMemberService.php')) && false ?: '_'};
}, 'gyman.settings.sections_handler' => function () {
    return ${($_ = isset($this->services['gyman.settings.sections_handler']) ? $this->services['gyman.settings.sections_handler'] : $this->load(__DIR__.'/getGyman_Settings_SectionsHandlerService.php')) && false ?: '_'};
}, 'gyman.vouchers.close_voucher' => function () {
    return ${($_ = isset($this->services['gyman.vouchers.close_voucher']) ? $this->services['gyman.vouchers.close_voucher'] : $this->load(__DIR__.'/getGyman_Vouchers_CloseVoucherService.php')) && false ?: '_'};
}, 'gyman.vouchers.create_voucher' => function () {
    return ${($_ = isset($this->services['gyman.vouchers.create_voucher']) ? $this->services['gyman.vouchers.create_voucher'] : $this->load(__DIR__.'/getGyman_Vouchers_CreateVoucherService.php')) && false ?: '_'};
}, 'gyman.vouchers.update_voucher' => function () {
    return ${($_ = isset($this->services['gyman.vouchers.update_voucher']) ? $this->services['gyman.vouchers.update_voucher'] : $this->load(__DIR__.'/getGyman_Vouchers_UpdateVoucherService.php')) && false ?: '_'};
})), array('Dende\\Calendar\\Application\\Command\\CreateEventCommand' => 'dende_calendar.handler.create_event', 'Dende\\Calendar\\Application\\Command\\UpdateEventCommand' => 'dende_calendar.handler.update_event', 'Dende\\Calendar\\Application\\Command\\UpdateOccurrenceCommand' => 'dende_calendar.handler.update_occurrence', 'Dende\\Calendar\\Application\\Command\\CreateCalendarCommand' => 'dende_calendar.handler.create_calendar', 'Gyman\\Application\\Command\\CreateVoucherCommand' => 'gyman.vouchers.create_voucher', 'Gyman\\Application\\Command\\UpdateVoucherCommand' => 'gyman.vouchers.update_voucher', 'Gyman\\Application\\Command\\CloseVoucherCommand' => 'gyman.vouchers.close_voucher', 'Gyman\\Application\\Command\\UpdateMemberCommand' => 'gyman.members.update_member', 'Gyman\\Application\\Command\\CreateMemberCommand' => 'gyman.members.create_member', 'Gyman\\Application\\Command\\CreateUserForMemberCommand' => 'gyman.members.create_user_for_member', 'Gyman\\Application\\Command\\OpenEntryCommand' => 'gyman.entries.open_entry', 'Gyman\\Application\\Command\\CloseEntryCommand' => 'gyman.entries.close_entry', 'Gyman\\Application\\Command\\ClearExpiredCurrentVouchersCommand' => 'gyman.app.handler.clear_expired_current_vouchers', 'Gyman\\Application\\Command\\UpdateCurrentVoucherCommand' => 'gyman.app.handler.update_current_vouchers', 'Gyman\\Application\\Command\\CloseExpiredEntriesCommand' => 'gyman.app.handler.close_expired_entries', 'Gyman\\Application\\Command\\CreateClubCommand' => 'gyman.landing.create_club_handler', 'Gyman\\Application\\Command\\UpdateSectionsCommand' => 'gyman.settings.sections_handler'));
