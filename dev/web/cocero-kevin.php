<?php /** @var Page $page */

$page->setTitle('Cocero Kevin - Firelamp');

$page->addHeadCode('<meta charset="utf-8">');
$page->addHeadCode('<meta name="viewport" content="width=device-width, initial-scale=1">');

$page->addBodyAttr('id', 'myPage');
$page->addBodyAttr('data-spy', 'scroll');
$page->addBodyAttr('data-target', '.navbar');
$page->addBodyAttr('data-offset', '60');

$helper = $page->getHelper();

?>

@{main-header}
<nav class="navbar navbar-default navbar-sticky-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#myPage">Cocero Kevin</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about"><?php echo $helper->getLocalizedText('premise-title-search', 'cocero-kevin') ?></a>
                </li>
                <li>
                    <a href="#services"><?php echo $helper->getLocalizedText('fiano-title-search', 'cocero-kevin') ?></a>
                </li>
                <li><a href="#portfolio">ISOLA CHE C'E' ASD</a></li>
                <li><a href="#pricing">FIRELAMP STUDIO</a></li>
                <li>
                    <a href="#contact"><?php echo $helper->getLocalizedText('reflection-title-search', 'cocero-kevin') ?></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron text-center">
    <h1><?php echo $helper->getLocalizedText('introduction-title', 'cocero-kevin') ?></h1>
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid margin-desc">
    <div class="row">
        <div class="col-sm-8">
            <h2><i><strong><?php echo $helper->getLocalizedText('premise-title', 'cocero-kevin') ?></strong></i></h2>
            <br>
            <p><?php echo $helper->getLocalizedText('premise-desc', 'cocero-kevin') ?></p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-education logo"></span>
        </div>
    </div>
</div>

<!-- Container (Fiano Section) -->
<div id="services" class="container-fluid bg-grey text-center margin-desc">
    <div class="text-center">
    <h2><i><strong><?php echo $helper->getLocalizedText('fiano-title', 'cocero-kevin') ?></strong></i></h2>
    <p><?php echo $helper->getLocalizedText('fiano-desc', 'cocero-kevin') ?></p>
    </div>
</div>

<!-- Container (Oratory Section) -->
<div id="portfolio" class="container-fluid margin-desc">
    <div class="text-center">
        <h2><i><strong><?php echo $helper->getLocalizedText('oratory-title', 'cocero-kevin') ?></strong></i></h2>
        <p><?php echo $helper->getLocalizedText('oratory-desc', 'cocero-kevin') ?></p>
    </div>
</div>

<!-- Container (FireLamp Section) -->
<div id="pricing" class="container-fluid bg-grey">
    <div class="text-center">
        <h2><i><strong><?php echo $helper->getLocalizedText('firelamp-title', 'cocero-kevin') ?></strong></i></h2>
        <p><?php echo $helper->getLocalizedText('firelamp-desc', 'cocero-kevin') ?></p>
    </div>
</div>

<!-- Container (Reflection Section) -->
<div id="contact" class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h2 class="text-center"><i><strong><?php echo $helper->getLocalizedText('reflection-title', 'cocero-kevin') ?></strong></i></h2>
            <br>
            <p><?php echo $helper->getLocalizedText('reflection-desc', 'cocero-kevin') ?></p>
        </div>
        <div class="col-sm-4">
            <span class="glyphicon glyphicon-fire logo fire-logo"></span>
        </div>
    </div>
</div>

<footer class="container-fluid text-center bg-grey">
    <a href="#myPage" title="Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
    <p>Home di <a href="<?php echo $helper->getPageURL("") ?>" title="Home">FirelampStudio</a></p>
</footer>