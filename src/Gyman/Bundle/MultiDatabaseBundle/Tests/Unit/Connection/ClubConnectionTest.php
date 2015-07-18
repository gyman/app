<?php
namespace Gyman\Bundle\MultiDatabaseBundle\Tests\Unit\Connection;

use Gyman\Bundle\MultiDatabaseBundle\Connection\ClubConnection;
use Gyman\Bundle\MultiDatabaseBundle\Exception\UserHasNoClubsException;
use Mockery as m;

class ClubConnectionTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @test
     * @throws \Exception
     */
    public function connection_is_not_switched_if_no_user_is_logged_in()
    {
        $securityContext = m::mock('Symfony\Component\Security\Core\SecurityContext');
        $securityContext->shouldReceive('getToken')->once()->andReturnNull();
        $securityContext->shouldReceive('getToken->getUser')->never();

        $connection = new ClubConnection();
        $connection->setSecurityContext($securityContext);
        $connection->onKernelRequest();
    }

    /**
     * @test
     * @throws UserHasNoClubsException
     * @expectedException Gyman\Bundle\MultiDatabaseBundle\Exception\UserHasNoClubsException
     * @expectedExceptionMessage User 'testowy@mail.pl' has no clubs assigned!
     */
    public function connection_is_not_switched_if_user_has_no_clubs()
    {
        $userMock = m::mock('Gyman\Bundle\UserBundle\Entity\User');
        $userMock->shouldReceive('getCurrentClub')->once()->andReturnNull();
        $userMock->shouldReceive('getClubs->first')->once()->andReturnNull();
        $userMock->shouldReceive('getEmail')->once()->andReturn('testowy@mail.pl');

        $securityContext = m::mock('Symfony\Component\Security\Core\SecurityContext');
        $securityContext->shouldReceive('getToken->getUser')->once()->andReturn($userMock);

        $connection = new ClubConnection();
        $connection->setSecurityContext($securityContext);
        $connection->onKernelRequest();
    }

    /**
     * @test
     */
    public function connection_is_set_because_user_has_current_club()
    {
        $dbConfig = ['name' => 'someName', 'user' => 'someUser', 'password' => 'somePass'];
        $connectionWrapperMock = m::mock('Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper');
        $connectionWrapperMock->shouldReceive('forceSwitch')->with('someName', 'someUser', 'somePass')->once();

        $clubMock = m::mock('Club');
        $clubMock->shouldReceive('getDatabase')->once()->andReturn($dbConfig);

        $userMock = m::mock('Gyman\Bundle\UserBundle\Entity\User');
        $userMock->shouldReceive('getCurrentClub')->once()->andReturn($clubMock);
        $userMock->shouldReceive('getClubs->first')->never();

        $securityContext = m::mock('Symfony\Component\Security\Core\SecurityContext');
        $securityContext->shouldReceive('getToken->getUser')->once()->andReturn($userMock);

        $connection = new ClubConnection();
        $connection->setSecurityContext($securityContext);
        $connection->setDoctrineConnection($connectionWrapperMock);
        $connection->onKernelRequest();
    }

    /**
     * @test
     */
    public function connection_is_set_with_first_club_from_collection()
    {
        $dbConfig = ['name' => 'someName', 'user' => 'someUser', 'password' => 'somePass'];
        $connectionWrapperMock = m::mock('Gyman\Bundle\MultiDatabaseBundle\Connection\ConnectionWrapper');
        $connectionWrapperMock->shouldReceive('forceSwitch')->with('someName', 'someUser', 'somePass')->once();

        $clubMock = m::mock('Club');
        $clubMock->shouldReceive('getDatabase')->once()->andReturn($dbConfig);

        $userMock = m::mock('Gyman\Bundle\UserBundle\Entity\User');
        $userMock->shouldReceive('getCurrentClub')->once()->andReturnNull();
        $userMock->shouldReceive('getClubs->first')->once()->andReturn($clubMock);

        $securityContext = m::mock('Symfony\Component\Security\Core\SecurityContext');
        $securityContext->shouldReceive('getToken->getUser')->once()->andReturn($userMock);

        $connection = new ClubConnection();
        $connection->setSecurityContext($securityContext);
        $connection->setDoctrineConnection($connectionWrapperMock);
        $connection->onKernelRequest();
    }
}
