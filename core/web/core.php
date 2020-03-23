<?php /** @var Page $page */ ?>

@{main-backend-header}

<br> # ALL ACTIVE BASE GEARS:
<?php foreach ($page->getRelatedElement()->getOriginBaseJoints() as $joint){
    echo "<br> ## {$joint->getID()} [{$joint->getImplementedJoint()->getID()}]";
} ?>
<br>
<br> # ALL ACTIVE EXTRA GEARS:
<?php foreach ($page->getRelatedElement()->getOriginExtraJoints() as $joint){
    echo "<br> ## {$joint->getID()} [{$joint->getImplementedJoint()->getID()}]";
} ?>
