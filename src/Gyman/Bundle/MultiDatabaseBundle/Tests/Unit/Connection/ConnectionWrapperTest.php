<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Tests\Unit\Connection;

use Doctrine\DBAL\Platforms\MySQL57Platform;
use Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper;
use Gyman\Bundle\MultiDatabaseBundle\Exception\CredentialsUnchangedException;
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
    public function force_switch_test()
    {
        $params = ['some' => 'param'];
        $driver = m::mock('Doctrine\DBAL\Driver');
        $driver->shouldReceive('connect');

        $config = m::mock('Doctrine\DBAL\Configuration');
        $config->shouldReceive('getAutoCommit')->andReturnNull();
        $eventManager = m::mock('Doctrine\Common\EventManager');
        $eventManager->shouldReceive('hasListeners')->once()->andReturn(false);

        $credentialsStorageMock = m::mock('Gyman\Bundle\MultiDatabaseBundle\Services\CredentialsStorage');
        $credentialsStorageMock->shouldReceive('updateCredentials')->with('name', 'user', 'pass')->once();
        $credentialsStorageMock->shouldReceive('updateParamsArray')->with([
            'some'     => 'param',
            'platform' => new MySQL57Platform(),
        ])->once()->andReturn([
            'some'     => 'param',
            'platform' => new MySQL57Platform(),
            'user'     => 'user',
            'password' => 'pass',
        ]);

        $connectionWrapper = new ConnectionWrapper($params, $driver, $config, $eventManager);
        $connectionWrapper->setCredentialsStorage($credentialsStorageMock);

        $this->assertFalse($connectionWrapper->isConnected());

        $connectionWrapper->forceSwitch('name', 'user', 'pass');

        $this->assertTrue($connectionWrapper->isConnected());
    }

    /**
     * @test
     */
    public function credentials_unchanged()
    {
        $params = ['some' => 'param'];
        $driver = m::mock('Doctrine\DBAL\Driver');
        $driver->shouldReceive('connect');

        $config = m::mock('Doctrine\DBAL\Configuration');
        $config->shouldReceive('getAutoCommit')->andReturnNull();
        $eventManager = m::mock('Doctrine\Common\EventManager');

        $credentialsStorageMock = m::mock('Gyman\Bundle\MultiDatabaseBundle\Services\CredentialsStorage');
        $credentialsStorageMock->shouldReceive('updateCredentials')->with('name', 'user', 'pass')->once()->andThrow(new CredentialsUnchangedException());

        $connectionWrapper = new ConnectionWrapper($params, $driver, $config, $eventManager);
        $connectionWrapper->setCredentialsStorage($credentialsStorageMock);

        $this->assertFalse($connectionWrapper->isConnected());

        $connectionWrapper->forceSwitch('name', 'user', 'pass');

        $this->assertFalse($connectionWrapper->isConnected());
    }
}
