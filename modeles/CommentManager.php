<?php
class CommentManager
{
    public function getComments($postId)
	{
    	$db = $this->dbConnect();
    	$comments = $db->prepare('SELECT comment.id, user.username, comment.content, DATE_FORMAT(comment.comment_date, \'%d/%m/%Y\') AS comment_date  FROM comment 

        INNER JOIN user ON comment.author = user.id
        INNER JOIN article ON comment.FK_post = article.id 
        WHERE FK_POST = ? ORDER BY comment.id DESC');
    	$comments->execute(array($postId));

    	return $comments;
	}
    
    public function getAllComments()
	{
    	$db = $this->dbConnect();
    	$allcomments = $db->query('SELECT comment.id, article.title, user.username, comment.content, comment.signalement, DATE_FORMAT(comment.comment_date, \'%d/%m/%Y\') AS comment_date  FROM comment 

        INNER JOIN user ON comment.author = user.id
        INNER JOIN article ON comment.FK_post = article.id ORDER BY comment.signalement DESC');


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









