<?php
require_once("modeles/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
	{
    	$db = $this->dbConnect();
    	$comments = $db->prepare('SELECT comment.id, user.username, comment.content, comment.signalement, DATE_FORMAT(comment.comment_date, \'%d/%m/%Y\') AS comment_date  FROM comment 

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
    	$comments = $db->prepare('INSERT INTO comment(FK_post, author, content, comment_date, signalement) VALUES(?, ?, ?, NOW(), false)');
    	$affectedLines = $comments->execute(array($postId, $author, $comment));

	    return $affectedLines;
	}

    public function deleteComment($id)
    {
        $db = $this->dbConnect();
        $delete = $db->prepare('DELETE FROM comment WHERE id = :id');
        $delete->execute( array( ':id' => $id ) );
        return $delete;
    }

    public function signalComment($id)
    {
        $db = $this->dbConnect();
        $signal = $db->prepare('UPDATE comment SET signalement = 1 WHERE id = :id');
        $signal->execute(array( ':id' => $id ));
        return $signal;
    }

    public function unsignalComment($id)
    {
        $db = $this->dbConnect();
        $unsignal = $db->prepare('UPDATE comment SET signalement = 0 WHERE id = :id');
        $unsignal->execute(array( ':id' => $id ));
        return $unsignal;
    }

    

}









