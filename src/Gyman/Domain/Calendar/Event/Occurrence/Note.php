<?php
namespace Gyman\Domain\Calendar\Event\Occurrence;

class Note
{
    protected $content;

    /**
     * Subject constructor.
     * @param $content
     */
    public function __construct(string $content = null)
    {
        $this->content = $content;
    }

    public function content(): string
    {
        return $this->content;
    }
}