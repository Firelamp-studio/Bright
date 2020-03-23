<?php


/**
 * Class PageImplementation
 */
class PageImplementation implements Page
{
    /**
     * @var string $title
     */
    private $title;

    /**
     * @var array $htmlAttrs
     */
    private $htmlAttrs;

    /**
     * @var array $bodyAttrs
     */
    private $bodyAttrs;

    /**
     * @var string $additionalHeadCode
     */
    private $additionalHeadCode;

    /**
     * @var PageHelper $helper
     */
    private $helper;

    /**
     * @var Gear|Core $relatedElement
     */
    private $relatedElement;

    /**
     * Page constructor.
     * @param $relatedElement
     * @param string $title
     * @param bool $isDraftPage
     */
    public function __construct($relatedElement, string $title, bool $isDraftPage)
    {
        $this->relatedElement = $relatedElement;
        $this->additionalHeadCode = '';
        $this->title = $title;
        $this->htmlAttrs = [];
        $this->bodyAttrs = [];

        $this->helper = new PageHelper($isDraftPage);
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return array
     */
    public function getHtmlAttrs(): array
    {
        return $this->htmlAttrs;
    }

    /**
     * @param string $attrName
     * @param string $attrValue
     */
    public function addHtmlAttr(string $attrName, string $attrValue): void
    {
        $this->htmlAttrs[$attrName] = $attrValue;
    }

    /**
     * @param string $additionalHeadCode
     * @return void
     */
    public function addHeadCode(string $additionalHeadCode): void
    {
        $this->additionalHeadCode .= $additionalHeadCode;
    }

    /**
     * @return string
     */
    public function getAdditionalHeadCode(): string
    {
        return $this->additionalHeadCode;
    }

    /**
     * @return PageHelper
     */
    public function getHelper(): PageHelper
    {
        return $this->helper;
    }

    /**
     * @param string $attrName
     * @param string $attrValue
     */
    public function addBodyAttr(string $attrName, string $attrValue): void
    {
        $this->bodyAttrs[$attrName] = $attrValue;
    }

    /**
     * @return array
     */
    public function getBodyAttrs(): array
    {
        return $this->bodyAttrs;
    }

    /**
     * @return Core|Gear
     */
    public function getRelatedElement()
    {
        return $this->relatedElement;
    }


    /**
     * @inheritDoc
     */
    public function sendAsErrorPage(int $error): void
    {

    }
}