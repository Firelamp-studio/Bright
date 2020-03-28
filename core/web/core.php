<?php /** @var Page $page */ ?>

@{php-set-viewport}

*@{js-utilities}

<!--<br> # ALL ACTIVE BASE GEARS:-->
<?php //foreach ($page->getRelatedElement()->getOriginBaseJoints() as $joint){
//    echo "<br> ## {$joint->getID()} [{$joint->getImplementedJoint()->getID()}]";
//} ?>
<!--<br>-->
<!--<br> # ALL ACTIVE EXTRA GEARS:-->
<?php //foreach ($page->getRelatedElement()->getOriginExtraJoints() as $joint){
//    echo "<br> ## {$joint->getID()} [{$joint->getImplementedJoint()->getID()}]";
//} ?>

*@{main-page-loader}
@{main-backend-header}

<div class="palla" style="background-color: #232323; height: 5000px">
    <div class="cW">
        <div class="Gc"><p>pallino</p></div>
        <div class="Gc"><p>pallino</p></div>
        <div class="Gc"><p>pallino</p></div>
        <div class="Gc"><p>pallino</p></div>
    </div>
</div>


<!--<div class="GoC">-->
<!--    <canvas id="Go"></canvas>-->
<!--</div>-->
<!--<button onclick="document.getElementById('Go').style.width = '500px' ">palla</button>-->


