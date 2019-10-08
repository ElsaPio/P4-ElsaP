<?php
class PostManager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article ORDER BY id DESC LIMIT 0, 5');

        return $posts;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postArticle($title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO article(title, content, date) VALUES(?, ?, NOW()');
        $affectedLines = $posts->execute(array($title, $content));

        return $affectedLines;
    }

    // Connexion à la BDD
    private function dbConnect()
    {
        $servername = "localhost";
        $username = "id10910491_elsa";
        $password = "jforteroche";
        $database = "id10910491_p4_blogphp";

        $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        return $db;    
    }

}






