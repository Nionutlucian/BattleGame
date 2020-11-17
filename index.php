<?php

use Game\Controller\EmagiaBattle;

require_once realpath("vendor/autoload.php");

$battle = new EmagiaBattle();
$battle->play();

?>