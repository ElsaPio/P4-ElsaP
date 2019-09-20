<?php
$servername = "localhost";
$username = "id10910491_elsa";
$password = "jforteroche";
$database = "id10910491_p4_blogphp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    } catch(PDOException $e) {    
    echo "Connection failed: " . $e->getMessage();
    }

$req = $conn->query('SELECT id, title, content, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') AS date FROM article ORDER BY date DESC LIMIT 0, 5');


require('vues/homeview.php');


?>