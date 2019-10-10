<?php
class LoginManager
{
    public function registerUser($username, $password)
	{
    	$db = $this->dbConnect();
        $login = $db->prepare('INSERT INTO user(username, password, FKtype_user) VALUES(?, ?, 2)');
        $affectedLines = $login->execute(array($username, $password));

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