<?php


class ParamsAtLinksParser extends AtLinksParser
{
    public function __construct(string $text)
    {
        parent::__construct($text);
    }

    /**
     * @param AtLinkAgent $agent
     * @return string
     */
    public function parse(AtLinkAgent $agent): string
    {
        return preg_replace_callback('/@{\s*([\w\-]*#)?([\w\-]+)(?:\s+((?:[^"}]+(?:"[^"]*")?)+))?\s*}/',
            function ($matches) use ($agent) {
                $reference = $matches[1];
                $link = $matches[2];

                $params = [];
                if (isset($matches[3])) {
                    $params = $this->parseLinkParams($matches[3]);
                }

                $actionResult = $agent->action($reference, $link, $params);
                return $actionResult ? $actionResult : $matches[0];
            }, $this->text);
    }

    private function parseLinkParams($paramsText): array
    {
        preg_match_all('/([\w\-]+)\s*=\s*"((?:(?:[^<"]|<(?=[^?]))+|<\?(?:[^?]|\?(?=[^>]))*\?>)*)"/',
            $paramsText, $paramsMatch);

        $params = [];
        for ($i = 0; $i < sizeof($paramsMatch[0]); $i++) {
            $params[$paramsMatch[1][$i]] = $paramsMatch[2][$i];
        }

        return $params;
    }
}