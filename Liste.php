<?php 

session_start();

try {
	$link = new PDO('mysql:host=localhost;dbname=exophp','root', '');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br>";
    die();
}

$sql = "SELECT * FROM user";

$users = $link->query($sql);
?>
<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h1>liste des user</h1>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table border="1" width="100%">
                        <tr>
                            <th>Nom</th>
                            <th width="20%">Action</th>
                        </tr>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?php echo $user['nom']; ?></td>
                                <td>
                                    <a href="delete_user.php?id=<?=$user['id']?>">Supprimer un user</a>
                                    <a href="edit_user.php?id=<?=$user['id']?>">Editer un user</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
		<form method="link" action="formulaire.php"> <input type="submit" value="Ajouter"></form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
</html>