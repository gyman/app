<?php

namespace Gyman\Bundle\FiltersBundle\Tests\Services;

use Gyman\Bundle\FiltersBundle\Entity\Filter;
use Gyman\Bundle\FiltersBundle\Filters as Subfilter;
use Gyman\Bundle\FiltersBundle\Services\FilterProvider;
use Gyman\Bundle\TestBundle\Tests\BaseTest;
use Symfony\Component\HttpFoundation\Request;

class FilterProviderTest extends BaseTest
{
    public function testAddFilterForList()
    {
        $filterProvider = new FilterProvider($this->container);
        $filter = new Subfilter\EntryDate();
        $filter2 = new Subfilter\EntryType();
        $filterProvider->addFilterForList('listName', $filter);
        $filterProvider->addFilterForList('listName', $filter2);

        $list = $filterProvider->getFiltersForList('listName');

        $this->assertEquals(count($list), 2);

        $this->assertTrue(isset($list['EntryDate']));
        $this->assertTrue(isset($list['EntryType']));

        $this->assertEquals($list['EntryDate'], clone($filter));
        $this->assertEquals($list['EntryType'], clone($filter2));
    }

    public function testAttachFilters()
    {
        $filterProvider = new FilterProvider($this->container);

        $filter = new Filter();
        $filter->setListname('listname');

        $subfilter = new Subfilter\EntryDate();
        $subfilter2 = new Subfilter\EntryType();
        $filterProvider->addFilterForList('listname', $subfilter);
        $filterProvider->addFilterForList('listname', $subfilter2);

        $filtersList = ['EntryDate', 'EntryType'];

        $filterProvider->attachFilters($filter, $filtersList);

        $filters = $filter->getFilters()->toArray();

        $this->assertEquals(count($filters), 2);

        $this->assertEquals($filters['EntryDate'], clone($subfilter));
        $this->assertEquals($filters['EntryType'], clone($subfilter2));
    }

    public function testCreateFilterFromRequest()
    {
        $request = new Request(
            [],
            [
                'add' => [
                    'Activities',
                    'Age',
                    'Belt',
                    'CheckedIn',
                    'CurrentVoucher',
                    'EntryDate',
                    'EntryType',
                    'Gender',
                    'Member',
                    'Price',
                    'RegistrationDate',
                    'SearchName',
                    'Starred',
                    'VoucherEnd',
                    'VoucherStart',
                ],
            ],
            [
                'listname' => 'testListName',
            ]
        );

        $filterProvider = new FilterProvider($this->container);
        $filter = $filterProvider->createFilterFromRequest($request);

        $subfilters = $filter->getFilters();

        $this->assertTrue($subfilters['Activities'] instanceof Subfilter\Activities);
        $this->assertTrue($subfilters['Age'] instanceof Subfilter\Age);
        $this->assertTrue($subfilters['Belt'] instanceof Subfilter\Belt);
        $this->assertTrue($subfilters['CheckedIn'] instanceof Subfilter\CheckedIn);
        $this->assertTrue($subfilters['CurrentVoucher'] instanceof Subfilter\CurrentVoucher);
        $this->assertTrue($subfilters['EntryDate'] instanceof Subfilter\EntryDate);
        $this->assertTrue($subfilters['EntryType'] instanceof Subfilter\EntryType);
        $this->assertTrue($subfilters['Gender'] instanceof Subfilter\Gender);
        $this->assertTrue($subfilters['Member'] instanceof Subfilter\Member);
        $this->assertTrue($subfilters['Price'] instanceof Subfilter\Price);
        $this->assertTrue($subfilters['RegistrationDate'] instanceof Subfilter\RegistrationDate);
        $this->assertTrue($subfilters['SearchName'] instanceof Subfilter\SearchName);
        $this->assertTrue($subfilters['Starred'] instanceof Subfilter\Starred);
        $this->assertTrue($subfilters['VoucherEnd'] instanceof Subfilter\VoucherEnd);
        $this->assertTrue($subfilters['VoucherStart'] instanceof Subfilter\VoucherStart);

        $this->assertEquals($filter->getListname(), 'testListName');
    }

    /**
     * @dataProvider getFilterDataProvider
     */
    public function testGetFilter($filterName, $class)
    {
        $filterProvider = new FilterProvider($this->container);
        $subfilter = $filterProvider->getFilter($filterName);
        $this->assertEquals(get_class($class), get_class($subfilter));
    }

    public function getFilterDataProvider()
    {
        return [
            [
                'filterName' => 'Activities',
                'class'      => new Subfilter\Activities(),
            ],
            [
                'filterName' => 'Age',
                'class'      => new Subfilter\Age(),
            ],
            [
                'filterName' => 'Belt',
                'class'      => new Subfilter\Belt(),
            ],
            [
                'filterName' => 'CheckedIn',
                'class'      => new Subfilter\CheckedIn(),
            ],
            [
                'filterName' => 'CurrentVoucher',
                'class'      => new Subfilter\CurrentVoucher(),
            ],
            [
                'filterName' => 'EntryDate',
                'class'      => new Subfilter\EntryDate(),
            ],
            [
                'filterName' => 'EntryType',
                'class'      => new Subfilter\EntryType(),
            ],
            [
                'filterName' => 'Gender',
                'class'      => new Subfilter\Gender(),
            ],
            [
                'filterName' => 'Member',
                'class'      => new Subfilter\Member(),
            ],
            [
                'filterName' => 'Price',
                'class'      => new Subfilter\Price(),
            ],
            [
                'filterName' => 'RegistrationDate',
                'class'      => new Subfilter\RegistrationDate(),
            ],
            [
                'filterName' => 'SearchName',
                'class'      => new Subfilter\SearchName(),
            ],
            [
                'filterName' => 'Starred',
                'class'      => new Subfilter\Starred(),
            ],
            [
                'filterName' => 'VoucherEnd',
                'class'      => new Subfilter\VoucherEnd(),
            ],
            [
                'filterName' => 'VoucherStart',
                'class'      => new Subfilter\VoucherStart(),
            ],
        ];
    }

    /**
     *
     * @dataProvider getFilterInvalidDataProvider
     */
    public function testGetFilterInvalidData($filterName)
    {
        $this->setExpectedException('Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException');

        $filterProvider = new FilterProvider($this->container);
        $filterProvider->getFilter($filterName);
    }

    public function getFilterInvalidDataProvider()
    {
        return [
            [
                'filterName' => 'BadServiceName',
            ],
            [
                'filterName' => '',
            ],
        ];
    }
}
