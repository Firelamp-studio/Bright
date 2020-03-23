<?php /**@var Page $page */
$helper = $page->getHelper();

//$page->addBodyAttr('class', 'p');
/*$page->addBodyAttr('id', 'firelamp');
$page->addBodyAttr('data-spy', 'scroll');
$page->addBodyAttr('data-target', '.navbar');
$page->addBodyAttr('data-offset', '60');*/
?>

<!--div class="debug">
    <label><input type="checkbox"> Debug</label>
</div-->

<div class="p">

    @{main-header}
    <nav id="russo-nav" class="navbar navbar-default navbar-sticky-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#presentation">Russo Simone</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#premise"><?php echo strtoupper($helper->getLocalizedText('premise-title', 'russo-simone')) ?></a></li>
                    <li><a href="#prologic">PRO-LOGIC</a></li>
                    <li><a href="#tagshare">TAGSHARE</a></li>
                    <li><a href="#firelamp">FIRELAMP</a></li>
                    <li><a href="#conclusion"><?php echo strtoupper($helper->getLocalizedText('conclusion-title', 'russo-simone')) ?></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="presentation" class="pG bT zup">
        <div class="pL pLbs">
            <div class="jumbotron text-center">
                <video id="firelamp-intro-anim" autoplay="autoplay" muted="muted" class="embed-responsive-item-auto"
                       disableRemotePlayback="disableRemotePlayback">
                    <source src="<?php echo $helper->getResourceFileURL('images/animations/firelamp_logo_animation.webm') ?>"
                            type="video/webm">
                    Your browser does not support the video tag.
                </video>
                <h1><?php echo $helper->getLocalizedText('introduction-title', 'russo-simone') ?></h1>
            </div>
        </div>
        <div class="pL pLfo">
            <div id="particle-container-fo">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>
            <img id="foliage-foreground-ur" class="col-xs-6 col-sm-4"
                 src="<?php echo $helper->getResourceFileURL('images/png/foliage_foreground_ru.png') ?>"
                 alt="foliage_foreground">
            <img id="foliage-foreground-ul" class="col-xs-6 col-sm-4"
                 src="<?php echo $helper->getResourceFileURL('images/png/foliage_foreground_lu.png') ?>"
                 alt="foliage_foreground">
        </div>
        <div class="pL pLbk jumbotron-background">
            <div id="particle-container-bk">
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
                <div class="particle"></div>
            </div>
        </div>
    </div>


    <div id="premise" class="pG zup">
        <div class="pL pLbs vcF bg-opaque-gradient">
            <!-- Container (About Section) -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8">
                        <h2><?php echo $helper->getLocalizedText('premise-title', 'russo-simone') ?></h2><br>
                        <h4><?php echo $helper->getLocalizedText('premise-desc', 'russo-simone') ?></h4>
                    </div>
                    <div class="col-sm-4 text-center">
                        <span class="glyphicon glyphicon-warning-sign logo"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="prologic" class="pG">
        <div class="pL pLbs vcF">
            <div class="container-fluid bg-grey">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2><?php echo $helper->getLocalizedText('pro-logic-title', 'russo-simone') ?></h2><br>
                    </div>
                    <div class="col-sm-12 text-justify">
                        <h4><?php echo $helper->getLocalizedText('pro-logic-desc', 'russo-simone') ?></h4><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="pL pLbk vcF">
            <img class="img-responsive"
                 src="http://www.pro-logic.it/wp-content/uploads/2017/07/Palazzo-Lascaris-522.jpg"
                 alt="pro-logic-background" style="filter: grayscale(1) blur(7px) brightness(0.5);">
        </div>
    </div>
    <div class="pG zup">
        <div class="pL pLbs vcF bg-opaque-gradient">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                        <h2 class="margin-lateral" style="margin-bottom: 10vh"><?php echo $helper->getLocalizedText('pro-logic-first-title', 'russo-simone') ?></h2><br>
                        <h4 style="margin-bottom: 20vh"><?php echo $helper->getLocalizedText('pro-logic-first', 'russo-simone') ?></h4>
                    </div>
                    <div class="col-sm-12 text-center bg-opaque-grey">
                        <h3 class="margin"><?php echo $helper->getLocalizedText('pro-logic-first-app', 'russo-simone') ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pG zup" style="height: 10px; background: #222">
    </div>
    <div class="pG zup">
        <div class="pL pLbs vcF bg-opaque-gradient-inverse">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 pull-right text-right">
                        <h2 style="margin-bottom: 10vh" class="margin-lateral"><?php echo $helper->getLocalizedText('pro-logic-second-title', 'russo-simone') ?></h2><br>
                        <h4 style="margin-bottom: 20vh"><?php echo $helper->getLocalizedText('pro-logic-second', 'russo-simone') ?></h4>
                    </div>
                </div>
                <div class="col-sm-12 text-center bg-opaque-grey">
                    <h3 class="margin"><?php echo $helper->getLocalizedText('pro-logic-second-site', 'russo-simone') ?></h3>
                </div>
            </div>
        </div>
    </div>



    <div id="tagshare" class="pG">
        <div class="pL pLbs vcF">
            <div class="container-fluid bg-grey">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2><?php echo $helper->getLocalizedText('tagshare-title', 'russo-simone') ?></h2><br>
                    </div>
                    <div class="col-sm-12 text-justify">
                        <h4><?php echo $helper->getLocalizedText('tagshare-desc', 'russo-simone') ?></h4><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="pL pLbk vcF">
            <img class="img-responsive"
                 src="https://www.tagshare.it/img/content/horizon.jpg"
                 alt="pro-logic-background" style="filter: grayscale(1) blur(7px);">
        </div>
    </div>
    <div class="pG zup"  style="height: 80rem">
        <div class="pL pLbs vcF bg-opaque-gradient">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                        <h2 class="margin-lateral" style="margin-bottom: 5rem"><?php echo $helper->getLocalizedText('tagshare-stage-title', 'russo-simone') ?></h2><br>
                        <h4 style="margin-bottom: 10rem"><?php echo $helper->getLocalizedText('tagshare-stage', 'russo-simone') ?></h4>
                    </div>
                    <div class="col-sm-12 text-center bg-opaque-grey" style="height: 25px">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="firelamp" class="pG">
        <div class="pL pLbs vcF">
            <div class="container-fluid bg-grey">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2><?php echo $helper->getLocalizedText('firelamp-title', 'russo-simone') ?></h2><br>
                    </div>
                    <div class="col-sm-12 text-justify">
                        <h4><?php echo $helper->getLocalizedText('firelamp-desc', 'russo-simone') ?></h4><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="pL pLbk vcF">
            <img class="img-responsive"
                 src="<?php echo $helper->getResourceFileURL('images/png/The-Undergroud-Hose.png')?>"
                 alt="pro-logic-background" style="filter: grayscale(1) blur(7px) brightness(0.5);">
        </div>
    </div>
    <div class="pG zup" style="height: 100rem">
        <div class="pL pLbs vcF bg-opaque-gradient">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                        <h2 class="margin-lateral"><?php echo $helper->getLocalizedText('firelamp-idea-title', 'russo-simone') ?></h2><br>
                        <h4><?php echo $helper->getLocalizedText('firelamp-idea', 'russo-simone') ?></h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10 pull-right text-right">
                        <h2 class="margin-lateral"><?php echo $helper->getLocalizedText('firelamp-past-title', 'russo-simone') ?></h2><br>
                        <h4><?php echo $helper->getLocalizedText('firelamp-past', 'russo-simone') ?></h4>
                    </div>
                    <div class="col-sm-12 text-center bg-opaque-grey" style="height: 25px">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div id="conclusion" class="pG">
        <div class="pL pLbs vcF">
            <div class="container-fluid bg-grey">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2><?php echo $helper->getLocalizedText('conclusion-title', 'russo-simone') ?></h2><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="pL pLbk vcF">
            <img class="img-responsive"
                 src="<?php echo $helper->getResourceFileURL('images/png/conclusion.jpg')?>"
                 alt="pro-logic-background" style="filter: grayscale(1) blur(7px) brightness(0.5);">
        </div>
    </div>
    <div class="pG zup" style="height: 130rem">
        <div class="pL pLbs vcF bg-opaque-gradient">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                        <h2 class="margin-lateral"><?php echo $helper->getLocalizedText('future-title', 'russo-simone') ?></h2><br>
                        <h4><?php echo $helper->getLocalizedText('conclusion', 'russo-simone') ?></h4>
                    </div>
                </div>
            </div>
            <footer class="container-fluid text-center">
                <a href="#presentation" title="To Top">
                    <span class="glyphicon glyphicon-chevron-up"></span>
                </a>
                <p>Web page created by Simone Russo</p>
            </footer>
        </div>
    </div>
</div>