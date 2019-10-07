<?php 

session_start();

try {
	$link = new PDO('mysql:host=localhost;dbname=exophp','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

if (isset($_GET["id"])){
    $id = $_GET['id'];
    $SQL = $link->prepare('DELETE FROM user where id = ?');
    $SQL->execute(array($id));
    header('Location: Liste.php');
}
?>