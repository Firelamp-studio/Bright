<?php /** @var Page $page */ ?>
<div id="MBH" class=""><!--Main Backend Header-->
    <div class="hW Cw">
        <div class="hE">
            <a href="">
                <?php echo $page->getHelper()->getSVG('menu-gear', 'svg') ?>
                <p>Home</p>
            </a>
        </div>
        <div class="hE">
            <a href="">
                <?php echo $page->getHelper()->getSVG('menu-gear', 'svg') ?>
                <p>Basemounts</p>
            </a>
        </div>
        <div class="hE">
            <a href="">
                <?php echo $page->getHelper()->getSVG('menu-gear', 'svg') ?>
                <p>Gears</p>
            </a>
        </div>
        <div class="hE">
            <a href="">
                <?php echo $page->getHelper()->getSVG('bright-wrench', 'svg') ?>
                <p>Settings</p>
            </a>
        </div>
    </div>
</div>

<!--TODO make it sticky shrink-->