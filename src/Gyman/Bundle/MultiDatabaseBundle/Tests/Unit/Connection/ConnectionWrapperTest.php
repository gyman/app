<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Tests\Unit\Connection;

use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Mockery as m;

class ConnectionWrapperTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     */
    public function connection_is_not_switched_if_no_user_is_logged_in()
    {
        $params = '';
        $driver = '';
        $config = '';
        $eventManager = '';

        $connectionWrapper = new ConnectionWrapper($params, $driver, $config, $eventManager);
    }
}
