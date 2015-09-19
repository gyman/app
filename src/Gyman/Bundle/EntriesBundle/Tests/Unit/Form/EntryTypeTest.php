<?php
namespace Gyman\Bundle\EntriesBundle\Tests\Unit\Form;

use DateTime;
use Gyman\Bundle\AppBundle\Entity\Voucher;
use Gyman\Bundle\EntriesBundle\Entity\Entry;
use Gyman\Bundle\EntriesBundle\Form\EntryType;
use Gyman\Bundle\ScheduleBundle\Entity\Event;
use Gyman\Bundle\ScheduleBundle\Entity\Serial;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\PreloadedExtension;
use Symfony\Component\Form\Test\TypeTestCase;

class EntryTypeTest extends TypeTestCase
{
    /**
     * @dataProvider submitValidDataProvider
     */
    public function testSubmitValidData($formData, $preparedEntry)
    {
        $occurenceRepositoryMock = $this->getOccurenceRepositoryMock();

        $entry = new Entry();
        $entry->setVoucher(new Voucher());
        $entry->setStartDate(new DateTime($formData['startDate']));

        $type = new EntryType($occurenceRepositoryMock);
        $form = $this->factory->create($type, $entry);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->isValid());
        $this->assertEquals($preparedEntry, $entry);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

    public function submitValidDataProvider()
    {
        $voucher = new Voucher();

        $dataSet1 = [
            'entryType'  => 'paid',
            'entryPrice' => '15',
            'startDate'  => '11.05.2014 06:24',
            'occurence'  => 123,
        ];

        $preparedEntry1 = new Entry();
        $preparedEntry1->setVoucher($voucher);
        $preparedEntry1->setEntryPrice($dataSet1['entryPrice']);
        $preparedEntry1->setStartDate(new DateTime($dataSet1['startDate']));
        $preparedEntry1->setEntryType('paid');

        $dataSet2 = [
            'entryType' => 'free',
            'startDate' => '11.05.2014 06:24',
            'occurence' => 123,
        ];

        $preparedEntry2 = new Entry();
        $preparedEntry2->setVoucher($voucher);
        $preparedEntry2->setStartDate(new DateTime($dataSet2['startDate']));
        $preparedEntry2->setEntryType('free');

        $dataSet3 = [
            'entryType' => 'voucher',
            'startDate' => '11.05.2014 06:24',
            'occurence' => 123,
        ];

        $preparedEntry3 = new Entry();
        $preparedEntry3->setVoucher($voucher);
        $preparedEntry3->setEntryType('voucher');
        $preparedEntry3->setStartDate(new DateTime($dataSet3['startDate']));

        return [
            [
                'formData' => $dataSet1,
                'entry'    => $preparedEntry1,
            ],
            [
                'formData' => $dataSet2,
                'entry'    => $preparedEntry2,
            ],
            [
                'formData'      => $dataSet3,
                'preparedEntry' => $preparedEntry3,
            ],
        ];
    }

    private function getOccurence($id, Event $event, DateTime $startDate)
    {
        $occurence = new Serial();
        $occurence->setId($id);
        $occurence->setEvent($event);
        $occurence->setStartDate($startDate);

        return $occurence;
    }

    private function getOccurenceRepositoryMock()
    {
        $activity = new \Gyman\Bundle\ScheduleBundle\Entity\Activity();
        $activity->setName('someName');

        $event = new \Gyman\Bundle\ScheduleBundle\Entity\Weekly();
        $event->setActivity($activity);

        $startDate = new \DateTime();
        $startDate->modify('22:11:00');

        $occurence = $this->getOccurence(123, $event, $startDate);

        $collection = [$occurence];

        $mock = $this->getMockBuilder("Gyman\Bundle\ScheduleBundle\Entity\OccurenceRepository")
                ->disableOriginalConstructor()
                ->getMock();

        $mock->expects($this->any())
                ->method('getOccurencesForPeriod')
                ->will($this->returnValue($collection));

        return $mock;
    }

    protected function getExtensions()
    {
        $metadataClassMock = $this->getMetadataClassMock();
        $entityManagerMock = $this->getEntityManagerMock($metadataClassMock);
        $mockRegistry = $this->getRegistryMock($entityManagerMock);

        $entityTypeMock = $this->getMockBuilder('Symfony\Bridge\Doctrine\Form\Type\EntityType')
                ->setMethods(['getName'])
                ->setConstructorArgs([$mockRegistry])
                ->getMock();

        $entityTypeMock->expects($this->any())->method('getName')
                ->will($this->returnValue('entity'));

        return [new PreloadedExtension([
                $entityTypeMock->getName() => $entityTypeMock,
                    ], [])];
    }

    private function getMetadataClassMock()
    {
        $metadataClassMock = $this->getMockBuilder("\Doctrine\Common\Persistence\Mapping\ClassMetadata")
                ->getMock();

        $metadataClassMock->expects($this->any())
                ->method('getName')
                ->will($this->returnValue("Gyman\Bundle\ScheduleBundle\Entity\Occurence"));

        return $metadataClassMock;
    }

    private function getEntityManagerMock($metadataClassMock)
    {
        $mockEntityManager = $this->getMockBuilder('\Doctrine\ORM\EntityManager')
                ->disableOriginalConstructor()
                ->setMethods(['getClassMetadata'])
                ->getMock();

        $mockEntityManager->expects($this->any())
                ->method('getClassMetadata')
                ->will($this->returnValue($metadataClassMock));

        return $mockEntityManager;
    }

    private function getRegistryMock($mockEntityManager)
    {
        $mockRegistry = $this->getMockBuilder('Doctrine\Bundle\DoctrineBundle\Registry')
                ->disableOriginalConstructor()
                ->setMethods(['getManagerForClass'])
                ->getMock();

        $mockRegistry->expects($this->any())->method('getManagerForClass')
                ->will($this->returnValue($mockEntityManager));

        return $mockRegistry;
    }

    protected function setUp()
    {
        parent::setUp();

        $this->factory = Forms::createFormFactoryBuilder()
                ->addExtensions($this->getExtensions())
                ->getFormFactory();
    }
}
