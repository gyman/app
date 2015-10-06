<?php
namespace Gyman\Domain\Model\Section;

final class SectionId
{
    /**
     * @var mixed
     */
    private $id;

    /**
     * SectionId constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }
}