<?php
require_once("modeles/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $posts = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article ORDER BY id DESC LIMIT 0, 5');

        return $posts;
    }

    public function getAllPosts()
    {
        $db = $this->dbConnect();
        $allposts = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article ORDER BY id DESC');

        return $allposts;
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
        $posts = $db->prepare('INSERT INTO article(title, content, date) VALUES(?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content));

        return $affectedLines;
    }

    public function deleteArticle($id)
    {
        $db = $this->dbConnect();
        $delete = $db->prepare("DELETE FROM article WHERE id = :id");
        $delete->execute( array( ':id' => $id ) );
        return $delete;
    }

}






