<?php

class Manager
{
    // Connexion à la BDD
    protected function dbConnect()
    {
        $servername = "localhost";
        $username = "id10910491_elsa";
        $password = "jforteroche";
        $database = "id10910491_p4_blogphp";

        $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        return $db;    
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }
}