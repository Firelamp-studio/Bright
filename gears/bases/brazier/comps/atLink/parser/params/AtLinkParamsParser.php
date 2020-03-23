<?php

class AtLinkParamsParser
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
     * @param AtLinkParamsAgent $agent
     * @return string
     */
    public function parse(AtLinkParamsAgent $agent): string
    {
        return preg_replace_callback('/\${\s*([\w\-]+)\s*}(?:\[:\s*((?(?!\s*:])\s*\S|\G)+)\s*:])?/',
            function ($matches) use ($agent) {
                $paramName = $matches[1];
                $defaultValue = $matches[2] ? $matches[2] : '';

                return $agent->action($paramName, $defaultValue);
            }, $this->text);
    }
}