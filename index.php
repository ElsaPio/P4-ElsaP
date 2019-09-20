<?php
require('modeles/homemodel.php');

$req = getBillets();

require('vues/homeview.php');
?>