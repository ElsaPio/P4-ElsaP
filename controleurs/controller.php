<!-- 1_Récupérer billets page accueil -->
<!-- 2_Recup article+commentaires par id -->

<?php

require('./modeles/homemodel.php');

function listPosts()
{
    $posts = getPosts();

    require('vues/homeview.php');
}

require('./modeles/articlemodel.php');

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    
    require('./vues/articleview.php');
}