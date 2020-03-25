<?php


class CommentedAtLinkParser extends AtLinksParser
{
    public function __construct(string $text)
    {
        parent::__construct($text);
    }

    /**
     * @inheritDoc
     */
    public function parse(?AtLinkAgent $agent = null): string
    {
        return preg_replace('/(?>\/\*\K|\*)@{\s*[\w\-]*#?[\w\-]+(?:\s+(?:[^"}]+(?:"[^"]*")?+))?\s*}/', '', $this->text);
    }
}