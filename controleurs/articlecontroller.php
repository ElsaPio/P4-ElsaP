<?php
require('../modeles/articlemodel.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    require('../vues/articleview.php');
}
else {
    echo 'Erreur : aucun identifiant de billet envoyé';
}
