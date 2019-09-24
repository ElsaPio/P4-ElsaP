<?php

function getPosts()
{
    $db = dbConnect();
    $req = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article ORDER BY date DESC LIMIT 0, 5');

    return $req;
}

function getPost($postId)
{
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article WHERE id = ?');
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
}

function getComments($postId)
{
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comment WHERE FK_post = ? ORDER BY comment_date DESC');
    $comments->execute(array($postId));

    return $comments;
}



// Connexion à la BDD
function dbConnect()
{

$servername = "localhost";
$username = "id10910491_elsa";
$password = "jforteroche";
$database = "id10910491_p4_blogphp";

    try
    {
        $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }



}