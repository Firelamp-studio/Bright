<?php /** @var Page $page */
?>
    @{#header}
    <h1 class="lighter-test">Lighter page - @{link test="un cazzo"}</h1>
    <h2 class="lighter-test-class">Eskeeeereeeeh</h2>
    <h3 class="external-class-test">CIAUUUUU</h3>
    <h4 class="global-test-class">GLOBAL</h4>

    Testo tradotto:"<?php echo $page->getHelper()->getLocalizedText('test') ?>";