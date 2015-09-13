<?php
namespace Gyman\Bundle\MembersBundle\Tests\Integration\Form\DataTransformer;

use Gyman\Bundle\MembersBundle\DTO\MemberDTO;
use Gyman\Bundle\MembersBundle\Factory\MemberFactory;
use Gyman\Bundle\MembersBundle\Form\DataTransformer\MemberDataTransformer;

class MemberDataTransformerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MemberDataTransformer
     */
    private $transformer;

    public function setUp()
    {
        $this->transformer = new MemberDataTransformer();
    }

    public function testTransform()
    {
        $member = MemberFactory::createFromArray([
            'firstname' => 'Andrzej',
            'lastname'  => 'Kaszuba',
            'birthdate' => '18.01.1955',
            'gender'    => 'male',
            'zipcode'   => '81-353',
            'phone'     => '600 000 000',
            'email'     => 'andrzej@gazeta.pl',
            'barcode'   => '123456789',
            'belt'      => 'white',
            'notes'     => 'some admin notes',
        ]);

        $dto = $this->transformer->transform($member);

        $this->assertInstanceOf('Gyman\Bundle\MembersBundle\DTO\MemberDTO', $dto);
        $this->assertEquals($dto->firstname, 'Andrzej');
        $this->assertEquals($dto->lastname, 'Kaszuba');
        $this->assertEquals($dto->birthdate->format('d.m.Y'), '18.01.1955');
        $this->assertEquals($dto->gender, 'male');
        $this->assertEquals($dto->zipcode, '81-353');
        $this->assertEquals($dto->phone, '600 000 000');
        $this->assertEquals($dto->email, 'andrzej@gazeta.pl');
        $this->assertEquals($dto->barcode, '123456789');
        $this->assertEquals($dto->belt, 'white');
        $this->assertEquals($dto->notes, 'some admin notes');
    }

    public function testReverseTransform()
    {
        $dto = new MemberDTO();
        $dto->firstname = 'Andrzej';
        $dto->lastname = 'Kaszuba';
        $dto->birthdate = '18.01.1955';
        $dto->gender = 'male';
        $dto->zipcode = '81-353';
        $dto->phone = '600 000 000';
        $dto->email = 'andrzej@gazeta.pl';
        $dto->barcode = '123456789';
        $dto->belt = 'white';
        $dto->notes = 'some admin notes';

        $member = $this->transformer->reverseTransform($dto);

        $this->assertInstanceOf('Gyman\Bundle\MembersBundle\Entity\Member', $member);
        $this->assertEquals($member->details()->firstname(), 'Andrzej');
        $this->assertEquals($member->details()->lastname(), 'Kaszuba');
        $this->assertEquals($member->details()->birthdate()->format('d.m.Y'), '18.01.1955');
        $this->assertEquals($member->details()->gender(), 'male');
        $this->assertEquals($member->details()->zipcode(), '81-353');
        $this->assertEquals($member->details()->phone(), '600 000 000');
        $this->assertEquals($member->email()->email(), 'andrzej@gazeta.pl');
        $this->assertEquals($member->details()->barcode()->barcode(), '123456789');
        $this->assertEquals($member->details()->belt()->color(), 'white');
        $this->assertEquals($member->details()->notes(), 'some admin notes');
    }
}
