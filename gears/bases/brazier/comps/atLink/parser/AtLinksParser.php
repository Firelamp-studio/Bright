<?php
namespace Bright;

abstract class AtLinksParser
{
    /**
     * @var string $text
     */
    protected $text;

    /**
     * atLinkParser constructor.
     * @param string $text
     */
    public function __construct(string $text)
    {
        if (empty($text)) {
            throw new \http\Exception\InvalidArgumentException();
        }

        $this->text = $text;
    }

    /**
     * @param AtLinkAgent $agent
     * @return string
     */
    public abstract function parse(AtLinkAgent $agent): string;
}