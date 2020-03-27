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
<br><br>
<?php

echo serialize([
    'Zona' => '',
    'Indirizzo' => '',
    'Riscaldamento centralizzato' => '',
    'Classe energetica' => '',
    'Anno di costruzione' => '',
    'Piano immobile' => '',
    'Numero balconi' => '',
    'Esposizione' => '',
    'Spese di condominio' => '',
]);

?>