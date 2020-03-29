<?php

namespace Bright;

interface Page
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @param string $title
     */
    public function setTitle(string $title): void;

    /**
     * @param string $attrName
     * @param string $attrValue
     */
    public function addHtmlAttr(string $attrName, string $attrValue): void;

    /**
     * @param string $attrName
     * @param string $attrValue
     */
    public function addBodyAttr(string $attrName, string $attrValue): void;

    /**
     * @param string $additionalHeadCode
     * @return void
     */
    public function addHeadCode(string $additionalHeadCode): void;

    /**
     * @return PageHelper
     */
    public function getHelper(): PageHelper;

    /**
     * @return Core|Gear
     */
    public function getRelatedElement();

    /**
     * @param int $error
     */
    public function sendAsErrorPage(int $error): void;
}