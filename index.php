<!-- Récupérer billets page accueil -->
<?php
require('modeles/homemodel.php');

$posts = getPosts();

require('vues/homeview.php');