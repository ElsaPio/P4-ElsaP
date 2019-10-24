<?php
require_once("modeles/Manager.php");

class LoginManager extends Manager
{
    public function registerUser($username, $password)
	{
        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
    	$db = $this->dbConnect();
        $login = $db->prepare('INSERT INTO user(username, password, FKtype_user) VALUES(?, ?, 2)');
        $affectedLines = $login->execute(array($username, $pass_hache));

        return $affectedLines;
	}

    public function sessionUser($username)
    {
        $db = $this->dbConnect();
        $login = $db->prepare('SELECT id, password, FKtype_user FROM user WHERE username= ?');
        $login->execute(array($username));

        return $login;  
    }
}