<?php /** @var Page $page */
$helper = $page->getHelper();
$page->addHtmlAttr('lang', URL::getLang()); ?>
<div id="TMH">
    <div class="tHe"><a href="<?php echo $helper->getPageURL() ?>" class="<?php echo(URL::getPath() == '/' ? 'mF' : '') ?>">Home</a></div>
    <div class="tHe mD">
        <a class="<?php echo(
            (URL::getPath() == '/team'
                or URL::getPath() == '/russo-simone'
                or URL::getPath() == '/pecchio-lorenzo'
                or URL::getPath() == '/cocero-kevin'
            ) ? ' mF' : '') ?>"><?php echo $helper->getLocalizedText("menu-members", "team") ?> <i class="fas fa-caret-down"></i></a>
        <div class="mDc">
            <a href="<?php echo $helper->getPageURL("russo-simone") ?>" class="<?php echo URL::getPath() == '/russo-simone' ? 'mF' : '' ?>">Russo Simone</a>
            <a href="<?php echo $helper->getPageURL("pecchio-lorenzo") ?>" class="<?php echo URL::getPath() == '/pecchio-lorenzo' ? 'mF' : '' ?>">Pecchio Lorenzo</a>
            <a href="<?php echo $helper->getPageURL("cocero-kevin") ?>" class="<?php echo URL::getPath() == '/cocero-kevin' ? 'mF' : '' ?>">Cocero Kevin</a>
        </div>
    </div>
    <div class="tHe flag">
        <a class="bFlag bFlag-<?php echo URL::getLang() ?>" href="<?php echo $helper->getPageURL(null, (URL::getLang() == "it" ? "en" : "it")) ?>">&nbsp</a>
    </div>
</div>