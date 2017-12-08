<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'tactician.command.debug' shared service.

return $this->services['tactician.command.debug'] = new \League\Tactician\Bundle\Command\DebugCommand(array('default' => array('Dende\\Calendar\\Application\\Command\\CreateEventCommand' => 'dende_calendar.handler.create_event', 'Dende\\Calendar\\Application\\Command\\UpdateEventCommand' => 'dende_calendar.handler.update_event', 'Dende\\Calendar\\Application\\Command\\UpdateOccurrenceCommand' => 'dende_calendar.handler.update_occurrence', 'Dende\\Calendar\\Application\\Command\\CreateCalendarCommand' => 'dende_calendar.handler.create_calendar', 'Gyman\\Application\\Command\\CreateVoucherCommand' => 'gyman.vouchers.create_voucher', 'Gyman\\Application\\Command\\UpdateVoucherCommand' => 'gyman.vouchers.update_voucher', 'Gyman\\Application\\Command\\CloseVoucherCommand' => 'gyman.vouchers.close_voucher', 'Gyman\\Application\\Command\\UpdateMemberCommand' => 'gyman.members.update_member', 'Gyman\\Application\\Command\\CreateMemberCommand' => 'gyman.members.create_member', 'Gyman\\Application\\Command\\CreateUserForMemberCommand' => 'gyman.members.create_user_for_member', 'Gyman\\Application\\Command\\OpenEntryCommand' => 'gyman.entries.open_entry', 'Gyman\\Application\\Command\\CloseEntryCommand' => 'gyman.entries.close_entry', 'Gyman\\Application\\Command\\ClearExpiredCurrentVouchersCommand' => 'gyman.app.handler.clear_expired_current_vouchers', 'Gyman\\Application\\Command\\UpdateCurrentVoucherCommand' => 'gyman.app.handler.update_current_vouchers', 'Gyman\\Application\\Command\\CloseExpiredEntriesCommand' => 'gyman.app.handler.close_expired_entries', 'Gyman\\Application\\Command\\UpdateSectionsCommand' => 'gyman.settings.sections_handler')));
