<?php

function getPosts()
{

$servername = "localhost";
$username = "id10910491_elsa";
$password = "jforteroche";
$database = "id10910491_p4_blogphp";

	try
	{
	    $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$posts = $db->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y\') AS date FROM article ORDER BY date DESC LIMIT 0, 5');

	return $posts;
}

?>

