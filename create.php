<?php 

	include "constants.php";
	include "connect_bdd.php";

	if(isset($_GET['msg'])){
		if($_GET['msg'] == EMAIL_ALREADY_IN_USE){
			echo "<script>alert(\"Adresse email déjà utilisée !\")</script>";
		}
	}

	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		$sth = $dbh->prepare("SELECT email FROM groupe WHERE email=:email");
		$isNotError = $sth->execute(['email' => $_POST['email']]);
		$email_doublon = $sth->fetchAll();

		if(!$email_doublon){
			$sth = $dbh->prepare("INSERT INTO groupe(nom, description, cout, pays_origine, musiciens, email, photo) VALUES (:nom, :description, :cout, :pays, :musiciens, :email, :photo)");
			$isNotError = $sth->execute(['nom' => $_POST['nom'], 'description' => $_POST['desc'], 'cout' => $_POST['cout'], 'pays' => $_POST['pays'], 'musiciens' => $_POST['musiciens'], 'email' => $_POST['email'], 'photo' => $_POST['image']]);
			if($isNotError){
				header("Location: index.php?msg=". SUCCESSFULLY_CREATED);
				exit();
			} else {
				print_r($sth->errorInfo());
			}
		} elseif($email_doublon) {
			header("Location: create.php?msg=". EMAIL_ALREADY_IN_USE);
			exit();
		}
	}


	function data_pays($continent){ 
		//J'ai mis tout les pays sur une base de données et je les récupères ici
		include "connect_bdd.php";
		$sth = $dbh->prepare("SELECT nom_pays FROM pays WHERE continent=:continent");
		$isNotError = $sth->execute(['continent' => $continent]);
		$nom_pays = $sth->fetchAll(PDO::FETCH_ASSOC);

		foreach($nom_pays as $pays){ ?>
			<option value="<?= $pays['nom_pays'];?>"><?= $pays['nom_pays']?></option> <?php 
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header class="head">
		<a href='index.php' class="button-header">HOME</a>
		<a href='create.php' class="button-header">CREATE</a>
	</header>
	<div class="page">
		<form class="flex-page" method="post" action="create.php">
				<input type="text" class="style-input" name="nom" placeholder="Nom du groupe" size="50" required>


				<textarea name="musiciens" class="style-input" maxlength="255" rows="10" cols="50" placeholder="Nom des musiciens" required></textarea>

				<input type="email" class="style-input" name="email" placeholder="Adresse email" size="50" required>

				<textarea name="desc" class="style-input" maxlength="255" rows="10" cols="50" placeholder="Description du groupe" required></textarea>

				<input type="number" class="style-input" name="cout" min="0" step=".01" placeholder="Prix de la place" size="50" required>


				<select class="choisir_pays" name="pays" id="pays" required>
					<option value="" disabled selected>Choisissez un pays</option>
					<optgroup label="Europe">
						<?php data_pays('Europe') ?>
					</optgroup>
					<optgroup label="Amérique">
						<?php data_pays('Amérique') ?>
					</optgroup>
					<optgroup label="Asie">
						<?php data_pays('Asie') ?>
					</optgroup>
					<optgroup label="Afrique">
						<?php data_pays('Afrique') ?>
					</optgroup>
					<optgroup label="Océanie">
						<?php data_pays('Océanie') ?>
					</optgroup>

				</select>

				<input type="url"  class="style-input" name="image" placeholder="Image du groupe" size="50" required>

				<input class="button-submit" type="submit" name="button_create" value="Envoyer">
		</form>
	</div>	
</body>
</html>