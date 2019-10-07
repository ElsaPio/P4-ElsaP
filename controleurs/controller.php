<?php

require_once('./modeles/PostManager.php');
require_once('./modeles/CommentManager.php');


function listPosts()
{
    $postManager = new PostManager(); //Création Objet
    $posts = $postManager->getPosts();

    require('vues/homeview.php');
}


function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    
    require('./vues/articleview.php');
}


function listPostsAdmin()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $posts = $postManager->getPosts();
    $allcomments = $commentManager->getAllComments();

    require('vues/adminHome.php');
}


function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        // Erreur gérée. Elle sera remontée jusqu'au bloc try du routeur !
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }    
    else {
        header('Location: /index.php?action=post&id=' . $postId);
        exit;
    }
}