<?php

require 'includes/Nps.php';

$responses = [0,0,0,1,3,9,9,2,9,9,8,7];
$nps = new Nps($responses);

//echo $nps->getTotalResponseCount();
echo $nps->getNpsScore();
echo "<br>";
echo $nps->getPassiveCount();