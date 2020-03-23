<?php


class PageLighter
{
    /**
     * @var PageImplementation $page
     */
    private $page;

    /**
     * @var string $pageDir
     */
    private $pageDir;

    /**
     * PageRender constructor.
     * @param PageImplementation $page
     * @param string $pageDir
     */
    public function __construct(PageImplementation $page, string $pageDir)
    {
        $this->page = $page;
        $this->pageDir = $pageDir;
    }

    /**
     * @return string
     * @throws PageNotFoundException
     */
    public function getPage(): string
    {
        if (!file_exists($this->pageDir))
            throw new PageNotFoundException();

        ob_start();
        $page = $this->page;
        include $this->pageDir;
        $result = ob_get_contents();
        ob_end_clean();

        // SET RUNTIME HTML ATTRIBUTES
        if ($this->page->getHtmlAttrs())
            $result = str_replace('<html>', '<html' . $this->htmlAttrsToString($this->page->getHtmlAttrs()) . '>', $result);

        // SET RUNTIME HEAD TITLE AND ADDITIONAL CODE
        $result = str_replace('<head>', '<head>' . '<title>' . $this->page->getTitle() . '</title>' . $this->page->getAdditionalHeadCode(), $result);

        // SET RUNTIME BODY ATTRIBUTES
        if ($this->page->getBodyAttrs())
            $result = str_replace('<body>', '<body' . $this->htmlAttrsToString($this->page->getBodyAttrs()) . '>', $result);

        return $result;
    }

    private function htmlAttrsToString(array $htmlAttrs): string
    {
        $html = '';

        foreach ($htmlAttrs as $attrName => $attrValue) {

            $html .= " {$attrName} = \"{$attrValue}\"";
        }

        return $html;
    }
}