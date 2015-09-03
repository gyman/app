<?php
namespace Gyman\Bundle\MembersBundle;

final class MembersEvents
{
    /**
     * Registered event is thrown each time a new member is created
     *
     * @var string
     */
    const CREATED = 'member.CREATED';

    /**
     * Registered event is thrown each time a new member is edited
     *
     * @var string
     */
    const EDITED = 'member.EDITED';
}
