<?php 

session_start();


try {
	$link = new PDO('mysql:host=localhost;dbname=exophp','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

if (isset($_POST['send']) && $_POST['send'] == "envoyer"){
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])){
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$email = $_POST['email'];
	$SQL = $link->prepare('INSERT INTO user(nom,prenom,email) VALUES(?,?,?)');
	$SQL->execute(array($nom,$prenom,$email));
	header('Location: Liste.php');
	}
}

?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
    <body>
        <form method="post">
            <p>Formulaire :</p>
            Nom:<input type="text" name="nom" />
            Prenom:<input type="text" name="prenom" />
            Email:<input type="text" name="email" />
            <input type="submit" name="send" value="envoyer"/>
        </form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>