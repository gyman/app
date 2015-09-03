<?php
namespace Gyman\Bundle\EntriesBundle\Tests\Unit\Services;

use Gyman\Bundle\EntriesBundle\Services\EntryHandler;
use Gyman\Component\Test\UnitTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;

class EntryHandlerTest extends UnitTestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $entryManagerMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $requestMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $routerMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $entryMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $entryTypeMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $formFactoryMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $formMock;

    /**
     * @var EntryHandler $entryHandler
     */
    private $entryHandler;

    protected function setUp()
    {
        parent::setUp();

        $this->entryManagerMock = $this->getEntryManagerMock();
        $this->requestMock = $this->getRequestMock();
        $this->routerMock = $this->getRouterMock();
        $this->entryMock = $this->getEntryMock();
        $this->entryTypeMock = $this->getEntryTypeMock();
        $this->formFactoryMock = $this->getFormFactoryMock();
        $this->templatingMock = $this->getTemplatingMock();
        $this->formMock = $this->getFormMock();

        $this->entryHandler = new EntryHandler();

        $this->entryHandler->setEntryManager($this->entryManagerMock);
        $this->entryHandler->setRequest($this->requestMock);
        $this->entryHandler->setRouter($this->routerMock);
        $this->entryHandler->setEntryType($this->entryTypeMock);
        $this->entryHandler->setFormFactory($this->formFactoryMock);
        $this->entryHandler->setTemplating($this->templatingMock);
    }

    /**
     * @test
     */
    public function member_has_opened_entry_is_redirected()
    {
        $this->routerMock->expects($this->once())
            ->method('generate')
            ->will($this->returnValue('/entry/close/999'));

        $this->entryMock->expects($this->once())
            ->method('getId')
            ->will($this->returnValue(999));

        $memberMock = $this->getMemberMock();

        $memberMock->expects($this->once())
            ->method('hasOpenedEntry')
            ->will($this->returnValue(true));

        $memberMock->expects($this->once())
            ->method('getLastEntry')
            ->will($this->returnValue($this->entryMock));

        $response = $this->entryHandler->handleOpen($memberMock);

        $this->assertTrue($response instanceof RedirectResponse);
        $this->assertEquals(true, $response->isRedirection());
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals('/entry/close/999', $response->getTargetUrl());
    }

    /**
     * @test
     */
    public function renders_opening_form()
    {
        $memberMock = $this->getMemberMock();

        $memberMock->expects($this->once())
            ->method('hasOpenedEntry')
            ->will($this->returnValue(false));

        $memberMock->expects($this->exactly(2))
            ->method('getCurrentVoucher')
            ->will($this->returnValue(null));

        $this->templatingMock->expects($this->once())
            ->method('render')
            ->will($this->returnValue('renderedTemplate'));

        $this->entryMock->expects($this->once())
            ->method('getMember')
            ->will($this->returnValue($memberMock));

        $this->formMock->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($this->entryMock));

        $this->formMock->expects($this->once())
            ->method('createView')
            ->will($this->returnValue(null));

        $this->entryManagerMock->expects($this->once())
            ->method('createNewEntry')
            ->will($this->returnValue($this->entryMock));

        $this->formFactoryMock->expects($this->once())
            ->method('create')
            ->will($this->returnValue($this->formMock));

        $response = $this->entryHandler->handleOpen($memberMock);

        $this->assertInstanceOf("Symfony\Component\HttpFoundation\Response", $response);
        $this->assertEquals(false, $response->isRedirection());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('renderedTemplate', $response->getContent());
    }

    /**
     * @test
     */
    public function handles_posted_open_form_successful()
    {
        $memberMock = $this->getMemberMock();

        $memberMock->expects($this->once())
            ->method('hasOpenedEntry')
            ->will($this->returnValue(false));

        $memberMock->expects($this->exactly(2))
            ->method('getCurrentVoucher')
            ->will($this->returnValue(null));

        $this->requestMock->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('POST'));

//         mocking a factored form

        $this->formMock->expects($this->once())
            ->method('handleRequest')
            ->will($this->returnValue(null));

        $this->formMock->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(true));

        $this->formMock->expects($this->exactly(2))
            ->method('getData')
            ->will($this->returnValue($this->entryMock));

        $this->formMock->expects($this->once())
            ->method('createView')
            ->will($this->returnValue(null));

//         mocking a template

        $this->templatingMock->expects($this->once())
            ->method('render')
            ->will($this->returnValue('renderedTemplate'));

//        mocking entry

        $this->entryMock->expects($this->once())
            ->method('getMember')
            ->will($this->returnValue($memberMock));

//        mocking entry manager

        $this->entryManagerMock->expects($this->once())
            ->method('createNewEntry')
            ->will($this->returnValue($this->entryMock));

        $this->entryManagerMock->expects($this->once())
            ->method('save')
            ->will($this->returnValue(null));

//        mocking form factory

        $this->formFactoryMock->expects($this->once())
            ->method('create')
            ->will($this->returnValue($this->formMock));

        $response = $this->entryHandler->handleOpen($memberMock);

        $this->assertInstanceOf("Symfony\Component\HttpFoundation\Response", $response);
        $this->assertEquals(false, $response->isRedirection());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('renderedTemplate', $response->getContent());
    }

    /**
     * @test
     */
    public function handles_posted_open_form_errors()
    {
        $memberMock = $this->getMemberMock();

        $memberMock->expects($this->once())
            ->method('hasOpenedEntry')
            ->will($this->returnValue(false));

        $memberMock->expects($this->exactly(2))
            ->method('getCurrentVoucher')
            ->will($this->returnValue(null));

        $this->requestMock->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('POST'));

//         mocking a factored form

        $this->formMock->expects($this->once())
            ->method('handleRequest')
            ->will($this->returnValue(null));

        $this->formMock->expects($this->once())
            ->method('isValid')
            ->will($this->returnValue(false));

        $this->formMock->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($this->entryMock));

        $this->formMock->expects($this->once())
            ->method('createView')
            ->will($this->returnValue(null));

//         mocking a template

        $this->templatingMock->expects($this->once())
            ->method('render')
            ->will($this->returnValue('renderedTemplate'));

//        mocking entry

        $this->entryMock->expects($this->once())
            ->method('getMember')
            ->will($this->returnValue($memberMock));

//        mocking entry manager

        $this->entryManagerMock->expects($this->once())
            ->method('createNewEntry')
            ->will($this->returnValue($this->entryMock));

//        mocking form factory

        $this->formFactoryMock->expects($this->once())
            ->method('create')
            ->will($this->returnValue($this->formMock));

        $response = $this->entryHandler->handleOpen($memberMock);

        $this->assertInstanceOf("Symfony\Component\HttpFoundation\Response", $response);
        $this->assertEquals(false, $response->isRedirection());
        $this->assertEquals(400, $response->getStatusCode());
        $this->assertEquals('renderedTemplate', $response->getContent());
    }

    /**
     * @test
     */
    public function entry_closing_form_is_rendered()
    {
        $this->templatingMock->expects($this->once())
            ->method('render')
            ->will($this->returnValue('renderedTemplate'));

        $entryMock = $this->getEntryMock();
        $entryMock->expects($this->once())
            ->method('getStartDate')
            ->will($this->returnValue(new \DateTime()));

        $response = $this->entryHandler->handleClose($entryMock);

        $this->assertInstanceOf("Symfony\Component\HttpFoundation\Response", $response);
        $this->assertEquals(false, $response->isRedirection());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('renderedTemplate', $response->getContent());
    }

    /**
     * @test
     */
    public function entry_closing_is_posted_and_performed()
    {
        $this->requestMock->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('POST'));

        $entryMock = $this->getEntryMock();

        $entryMock->expects($this->once())
            ->method('setEndDate')
            ->will($this->returnValue(null));

        $this->entryManagerMock->expects($this->once())
            ->method('save')
            ->will($this->returnValue(null));

        $response = $this->entryHandler->handleClose($entryMock);

        $this->assertInstanceOf("Symfony\Component\HttpFoundation\Response", $response);
        $this->assertEquals(false, $response->isRedirection());
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(null, $response->getContent());
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getEntryManagerMock()
    {
        $entryMock = $this->getMockBuilder("Gyman\Bundle\EntriesBundle\EntityManager\EntryManager")
            ->disableOriginalConstructor()
            ->getMock();

        return $entryMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getRequestMock()
    {
        $requestMock = $this->getMockBuilder("Symfony\Component\HttpFoundation\Request")
            ->disableOriginalConstructor()
            ->getMock();

        return $requestMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getRouterMock()
    {
        $routerMock = $this->getMockBuilder("Symfony\Bundle\FrameworkBundle\Routing\Router")
            ->disableOriginalConstructor()
            ->getMock();

        return $routerMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getEntryMock()
    {
        $entryMock = $this->getMockBuilder("Gyman\Bundle\EntriesBundle\Entity\Entry")
            ->disableOriginalConstructor()
            ->getMock();

        return $entryMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getMemberMock()
    {
        $memberMock = $this->getMockBuilder("Gyman\Bundle\MembersBundle\Entity\Member")
            ->disableOriginalConstructor()
            ->getMock();

        return $memberMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getEntryTypeMock()
    {
        $entryTypeMock = $this->getMockBuilder("Gyman\Bundle\EntriesBundle\Form\EntryType")
            ->disableOriginalConstructor()
            ->setMethods(['getData', 'createView', 'isValid', 'handleRequest'])
            ->getMock();

        return $entryTypeMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getFormFactoryMock()
    {
        $entryTypeMock = $this->getMockBuilder("Symfony\Component\Form\FormFactory")
            ->disableOriginalConstructor()
            ->getMock();

        return $entryTypeMock;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function getTemplatingMock()
    {
        $entryTypeMock = $this->getMockBuilder("Symfony\Bundle\TwigBundle\TwigEngine")
            ->disableOriginalConstructor()
            ->getMock();

        return $entryTypeMock;
    }

    private function getFormMock()
    {
        $formMock = $this->getMockBuilder("Symfony\Component\Form\Form")
            ->disableOriginalConstructor()
            ->getMock();

        return $formMock;
    }
}
