<?php


class AtLinkParamsAgent
{

    /**
     * @var array $params
     */
    private $params;

    /**
     * AtLinkParamsAgent constructor.
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function action(string $paramName, string $defaultValue): string
    {
        if(array_key_exists($paramName, $this->params)){

            $paramValue = $this->params[$paramName];

            return $paramValue;
        }

        return $defaultValue;
    }
}