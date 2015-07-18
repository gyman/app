<?php

namespace Gyman\Bundle\EntriesBundle\Tests\Form;

use Symfony\Component\Form\Test\TypeTestCase;
use Gyman\Bundle\FiltersBundle\Entity\Filter;
use Gyman\Bundle\FiltersBundle\Form\FilterType;
use Gyman\Bundle\FiltersBundle\Filters as Subfilter;

class FilterTypeTest extends TypeTestCase
{
    /**
     * @dataProvider submitValidDataProvider
     */
    public function testSubmitValidData($params, $submitData, $expected)
    {
        $filterEntity = new Filter();
        $filterEntity->setListname("testList");
        $filterEntity->addFilter(new Subfilter\Age());
        $filterEntity->addFilter(new Subfilter\EntryDate());

        $availableSubfiltersArray = [
            new Subfilter\Activities(),
            new Subfilter\Age(),
            new Subfilter\Belt(),
            new Subfilter\CheckedIn(),
            new Subfilter\CurrentVoucher(),
            new Subfilter\EntryDate(),
            new Subfilter\EntryType(),
            new Subfilter\Gender(),
            new Subfilter\Member(),
            new Subfilter\Price(),
            new Subfilter\RegistrationDate(),
            new Subfilter\SearchName(),
            new Subfilter\Starred(),
            new Subfilter\VoucherEnd(),
            new Subfilter\VoucherStart(),
        ];

        $filterType = new FilterType($availableSubfiltersArray);

        $form = $this->factory->create($filterType, $filterEntity, ["update" => $params["update"]]);
        $form->submit($submitData);

        $this->assertTrue($form->isSynchronized());
        $this->assertTrue($form->isValid());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($submitData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }

        $groups = $filterType->getValidationGroups($form);
        $this->assertEquals($expected["groups"], $groups);
    }

    public function submitValidDataProvider()
    {
        return [
            [
                "params"     => [
                    "update" => true
                ],
                "submitData" => [
                    "addFilter" => ["Age", "EntryDate"],
                    "save"      => true,
                    "name"      => "filterName",
                    "pinned"    => true,
                    "listname"  => "listname",
                ],
                "expected"   => [
                    "groups" => "updateFilter"
                ]
            ],
            [
                "params"     => [
                    "update" => false
                ],
                "submitData" => [
                    "addFilter" => ["Age", "EntryDate"],
                    "save"      => true,
                    "name"      => "filterName",
                    "pinned"    => true,
                    "listname"  => "listname",
                ],
                "expected"   => [
                    "groups" => "saveFilter"
                ]
            ],
            [
                "params"     => [
                    "update" => false
                ],
                "submitData" => [
                    "addFilter" => ["Age", "EntryDate"],
                    "save"      => false,
                    "name"      => "filterName",
                    "pinned"    => false,
                    "listname"  => "listname",
                ],
                "expected"   => [
                    "groups" => "setFilter"
                ]
            ],
        ];
    }

    public function getSubfilterMock($label, $name)
    {
        $mock = $this->getMockBuilder("Gyman\Bundle\FiltersBundle\Filters\Subfilter")
            ->disableOriginalConstructor()
            ->getMock();

        $mock->expects($this->any())
            ->method("getLabel")
            ->will($this->returnValue($label));

        $mock->expects($this->any())
            ->method("getName")
            ->will($this->returnValue($name));

        return $mock;
    }
}
