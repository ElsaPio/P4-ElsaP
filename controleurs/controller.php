<?php

require('./modeles/articlemodel.php');

function post()
{
    $post = getPost($_GET['id']);
    $comments = getComments($_GET['id']);
    
    require('./vues/articleview.php');
}

function listPosts()
{
    $posts = getPosts();

    require('vues/homeview.php');
}

function listPostsAdmin()
{
    $posts = getPosts();
    $allcomments = getAllComments();

    require('vues/adminHome.php');
}



function addComment($postId, $author, $comment)
{
    $affectedLines = postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }    
    else {
        header('Location: /index.php?action=post&id=' . $postId);
        exit;
    }
}