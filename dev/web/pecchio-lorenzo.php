<?php /** @var Page $page */
$helper = $page->getHelper();
$page->addHtmlAttr('lang', 'it');
$page->setTitle('Pecchio Lorenzo - Firelamp');

$page->addHeadCode('<meta charset="utf-8">');
$page->addHeadCode('<meta name="viewport" content="width=device-width, initial-scale=1">');
?>

<div class="debug">
    <label><input type="checkbox"> Debug</label>
</div>

<div class="p">
    @{main-header}
    <div class="pG bT">
        <div class="pL pLbs ">
            <div class="mC"><?php echo $helper->getLocalizedText("main-title", "pecchio-lorenzo")?></div>
        </div>
        <div class="pL pLbk tWb"></div>
    </div>
    <div class="pG pB-layer">
        <div class="pL pLbs pB-layer">
            <div class="cCl fCl pB">
                <span class="bLt pT"><?php echo $helper->getLocalizedText("premise-title", "pecchio-lorenzo")?></span>
                <div>
                    <span class="pC"><?php echo $helper->getLocalizedText("premise", "pecchio-lorenzo")?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="pG tYb tYw-layer">
        <div class="pL pLbs tYw-layer">
            <div class="cCl fCl tYw">
                <span class="bLt"><?php echo $helper->getLocalizedText("third-year-title", "pecchio-lorenzo")?></span>
                <div class="tYwd">
                    <div>
                        <?php echo $helper->getLocalizedText("third-year", "pecchio-lorenzo")?>
                    </div>
                    <div>
                        <img src="<?php echo $helper->getResourceFileURL('images/png/aceone-logo.png')?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pG fYl-layer">
        <div class="pL pLbs fYl-layer">
            <div class="cCl fCl fYl">
                <div class="mC-little"><?php echo $helper->getLocalizedText("fourth-year-title", "pecchio-lorenzo")?></div>
            </div>
        </div>
        <div class="pL pLbk fYlb"></div>
    </div>
    <div class="pG fYw-layer">
        <div class="pL pLbs fYw-layer">
            <div class="cCl fCl fYw">
                <span class="bLt">TAGSHARE</span>
                <div class="fYc">
                    <img src="<?php echo $helper->getResourceFileURL('images/png/scss-example.png')?>">
                    <div class="content">
                        <span><?php echo $helper->getLocalizedText("fourth-year-1", "pecchio-lorenzo")?><br></span>
                        <span><?php echo $helper->getLocalizedText("fourth-year-2", "pecchio-lorenzo")?><br></span>
                        <span><?php echo $helper->getLocalizedText("fourth-year-3", "pecchio-lorenzo")?><br></span>
                        <span><?php echo $helper->getLocalizedText("fourth-year-4", "pecchio-lorenzo")?><br></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pG fiYw-layer">
        <div class="pL pLbs fiYw-layer">
            <div class="cCl fCl fiYw">
                <div class="sC"><?php echo $helper->getLocalizedText("fifth-year-title", "pecchio-lorenzo")?></div>
                <div class="fiYc">
                    <?php echo $helper->getLocalizedText("fifth-year", "pecchio-lorenzo")?>
                </div>
            </div>
        </div>
    </div>
    <div class="pG pEl-layer">
        <div class="pL pLbs pEl-layer">
            <div class="cCl fCl pEl">
                <div class="mC-little"><?php echo $helper->getLocalizedText("personal-title", "pecchio-lorenzo")?></div>
            </div>
        </div>
        <div class="pL pLbk pElb"></div>
    </div>
    <div class="pG pEw-layer">
        <div class="pL pLbs pEw-layer">
            <div class="cCl fCl pEw">
                <div><?php echo $helper->getLocalizedText("personal", "pecchio-lorenzo")?></div>
            </div>
        </div>
    </div>
    <div class="pG firel-layer">
        <div class="pL pLbs firel-layer">
            <div class="cCl fCl firel">
                <div class="mC-little slideanim slide"><?php echo $helper->getLocalizedText("introduction-title", "pecchio-lorenzo")?></div>
            </div>
        </div>
        <div class="pL pLbk firelb">
            <video id="firelamp-intro-anim" autoplay="autoplay" muted="muted" class="embed-responsive-item-auto"
                   disableRemotePlayback="disableRemotePlayback">
                <source src="<?php echo $helper->getResourceFileURL('images/animations/firelamp_logo_animation.webm') ?>"
                        type="video/webm">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
    <div class="credit-footer"><div><?php echo $helper->getLocalizedText("credit-footer", "pecchio-lorenzo")?></div></div>
</div>















<!--
<div class="p">
    @{main-header}
    <div id="group1" class="pG">
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group2" class="pG">
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
        <div class="pL pLbk">
            <div class="title">Background Layer</div>
        </div>
    </div>
    <div id="group3" class="pG">
        <div class="pL pLfo">
            <div class="title">Foreground Layer</div>
        </div>
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group4" class="pG">
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
        <div class="pL pLbk">
            <div class="title">Background Layer</div>
        </div>
        <div class="pL pLde">
            <div class="title">Deep Background Layer</div>
        </div>
    </div>
    <div id="group5" class="pG">
        <div class="pL pLfo">
            <div class="title">Foreground Layer</div>
        </div>
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group6" class="pG">
        <div class="pL pLbk">
            <div class="title">Background Layer</div>
        </div>
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group7" class="pG">
        <div class="pL pLbs">
            <div class="title">Base Layer</div>
        </div>
    </div>
</div>-->
<!--<div class="parallax">
    @{main-header}
    <div id="group1" class="parallax__group">
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group2" class="parallax__group">
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
        <div class="parallax__layer parallax__layer--back">
            <div class="title">Background Layer</div>
        </div>
    </div>
    <div id="group3" class="parallax__group">
        <div class="parallax__layer parallax__layer--fore">
            <div class="title">Foreground Layer</div>
        </div>
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group4" class="parallax__group">
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
        <div class="parallax__layer parallax__layer--back">
            <div class="title">Background Layer</div>
        </div>
        <div class="parallax__layer parallax__layer--deep">
            <div class="title">Deep Background Layer</div>
        </div>
    </div>
    <div id="group5" class="parallax__group">
        <div class="parallax__layer parallax__layer--fore">
            <div class="title">Foreground Layer</div>
        </div>
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group6" class="parallax__group">
        <div class="parallax__layer parallax__layer--back">
            <div class="title">Background Layer</div>
        </div>
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
    </div>
    <div id="group7" class="parallax__group">
        <div class="parallax__layer parallax__layer--base">
            <div class="title">Base Layer</div>
        </div>
    </div>
</div>-->
