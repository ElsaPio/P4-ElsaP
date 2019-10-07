<?php
class CommentManager
{
    public function getComments($postId)
	{
    	$db = $this->dbConnect();
    	$comments = $db->prepare('SELECT id, author, content, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comment WHERE FK_post = ? ORDER BY id DESC');
    	$comments->execute(array($postId));

    	return $comments;
	}
    
    public function getAllComments()
	{
    	$db = $this->dbConnect();
    	$allcomments = $db->query('SELECT id, FK_post, author, content, signalement, DATE_FORMAT(comment_date, \'%d/%m/%Y\') AS comment_date FROM comment ORDER BY signalement DESC');

    	return $allcomments;
	}

	public function postComment($postId, $author, $comment)
	{
    	$db = $this->dbConnect();
    	$author = 5;
    	$comments = $db->prepare('INSERT INTO comment(FK_post, author, content, comment_date, signalement) VALUES(?, ?, ?, NOW(), false)');
    	$affectedLines = $comments->execute(array($postId, $author, $comment));

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









