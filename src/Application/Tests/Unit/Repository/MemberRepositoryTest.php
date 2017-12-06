<?php
namespace Gyman\Application\Tests\Unit\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadata;
use Gyman\Application\Factory\MemberFactory;
use Gyman\Bundle\AppBundle\Repository\MemberRepository;
use Gyman\Domain\Member;
use Mockery as m;

class MemberRepositoryTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown(){
        parent::tearDown();
        m::close();
    }
    
    public function testSaveOneObject(){
        $member = MemberFactory::create();

        $em = m::mock(EntityManager::class);
        $em->shouldReceive("persist")->once()->with($member);
        $em->shouldReceive("flush")->once()->with($member);

        $classMetaData = m::mock(ClassMetadata::class);

        $repository = new MemberRepository($em, $classMetaData);
        $repository->save($member);
    }

    public function testSaveArray(){
        $members = [
            MemberFactory::create(),
            MemberFactory::create(),
            MemberFactory::create()
        ];

        $em = m::mock(EntityManager::class);
        $em->shouldReceive("persist")->times(3);
        $em->shouldReceive("flush")->once()->withNoArgs();

        $classMetaData = m::mock(ClassMetadata::class);

        $repository = new MemberRepository($em, $classMetaData);
        $repository->save($members);
    }

    public function testSaveCollection(){
        $members = new ArrayCollection([
            MemberFactory::create(),
            MemberFactory::create(),
            MemberFactory::create()
        ]);

        $em = m::mock(EntityManager::class);
        $em->shouldReceive("persist")->times(3);
        $em->shouldReceive("flush")->once()->withNoArgs();

        $classMetaData = m::mock(ClassMetadata::class);

        $repository = new MemberRepository($em, $classMetaData);
        $repository->save($members);
    }

    /**
     * @throws \Exception
     * @expectedException \Exception
     * @expectedExceptionMessage Argument is unknown type! Should be Member class or collection/array of Member class!
     */
    public function testSaveNull(){
        $em = m::mock(EntityManager::class);
        $em->shouldReceive("persist")->never();
        $em->shouldReceive("flush")->never();

        $classMetaData = m::mock(ClassMetadata::class);

        $repository = new MemberRepository($em, $classMetaData);
        $repository->save(null);
    }
}