<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Inscription</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/inscription.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head
	
	<body>
		<nav class="navbar navbar-expand-md">
			<a class="navbar-brand" href="#">Menu</a>
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<i class="bi bi-house-fill">
							<a class="nav-link" href="index.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
								<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
							</svg> Accueil</a>
						</i>
					</li>
					<li class="nav-item">
						<i class="bi bi-person-lines-fill">
							<a class="nav-link" href="contact.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
								<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
							</svg> Contact</a>
						</i>
					</li>
				</ul>
			</div>
		</nav>
		
		<!-- Container qui contient les forlulaires d'action de l'inscription -->
		<div class="container">
			<h1>Inscription</h1>
			
			<!-- R??cup??re les informations entr??e dans les formulaires-->
			<form class="row g-3" method="post">
				<!-- Formulaire du pr??nom -->
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Pr??nom</label>
						<input type="text" name="prenom" class="form-control">
					</div>
				</div>
				
				<!-- Formulaire du nom -->
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Nom</label>
						<input type="text" name = "nom" class="form-control">
					</div>
				</div>
				
				<!-- Formulaire du pseudo -->
				<div class="col-md-6">
					<div class="col">
						<label for="inputPseudo" class="form-label-inscription">Pseudo</label>
						<input type="text" name="pseudo" class="form-control">
					</div>
				</div>
				
				<!-- Formulaire du mot de passe -->
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Mot de Passe</label>
						<input type="password" name ="password"class="form-control">
					</div>
				</div>
				
				<!-- Formulaire du t??l??phone -->
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription" >T??lephone</label>
						<input class="form-control" name="telephone" type="tel" placeholder="Ex: +33 7 45 23 12 81" >
					</div>
				</div>
				
				
				<!-- Formulaire de l'adresse -->
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Adresse</label>
						<input type="text" name = "adresse"class="form-control"  placeholder="Ex: 12 rue St Placide">
					</div>
					<br/>
				</div>  
				
				<!-- Cr??er un capcha pour v??rifier que ce n'est pas robot qui s'inscrit -->
				<div class="g-recaptcha" data-sitekey="la_cl??_du_site"></div>
				<button class="g-recaptcha" data-sitekey="la_cl??_du_site" data-callback='onReCaptchaValid'>Envoyer</button>

				<script type="text/javascript">
					function onReCaptchaValid(token) {
						document.getElementById('id_du_formulaire').submit();
					}
				</script>
				<!-- Cr??er un bouton pour s'inscrire -->
				<div class="col text-center">
					<button class="btn btn-primary" type="submit" name="bouton">S'inscrire</button>
				</div>
				<br/>
			</form>

			<?php

			/*$motdepasse = password_hash("password", PASSWORD_ARGON2I);

			if(password_verify('password',$motdepasse)){
				echo "c le bon mdp";
			}
			else{
				echo "erreur";
			}*/
			
			if(isset($_POST['bouton'])){
				/*R??cup??re les valeurs du formulaires et les ins??re dans des variables*/
				$prenom=$_POST["prenom"];
				$nom=$_POST["nom"];
				$adresse=$_POST["adresse"];
				$telephone=$_POST["telephone"];
				$pseudo=$_POST["pseudo"];
				$password= $_POST["password"];
				$passwordHash = password_hash($password,PASSWORD_ARGON2I);
				$zero =0;

				
				
				/*Cr??er la connection ?? la base de donn??es*/
				require("parametres.php");
				$connexion=mysqli_connect($host,$user,$mdp) 
					or die("Connexion impossible au serveur $serveur pour $login");
				$bd="quartier_du_haras";
				mysqli_select_db($connexion,$bd)
					or die("impossible d'acceder a la base de donnees");
				
				/*V??rifie si l'identifiant est d??j?? pris*/
				$requeteVerification="SELECT count( login) FROM connexion WHERE login= '".$pseudo."'";
				$resultatVerif=mysqli_query($connexion,$requeteVerification);
				$verif = mysqli_fetch_array($resultatVerif);
				$compte=$verif[0];
				
				if($compte == 0){
					/*Ajoute dans les tables ad??quates de la base de donn??es les informations du formulaires*/
					$requeteajout="INSERT into coordonnees(prenom,nom,adresse,telephone)"; 
					$requeteajout.="values(?,?,?,?) ";
					$reqprepareajout=mysqli_prepare($connexion, $requeteajout);
					
					$requeteajoutConnexion="INSERT into connexion(login,password)";
					$requeteajoutConnexion.="values (?,?)";
					$reqprepareajoutConnexion=mysqli_prepare($connexion,$requeteajoutConnexion);
					
					$requeteCompteur="INSERT into compteur(objets_pretes, objets_empruntes)";
					$requeteCompteur.="values (?,?)";
					$reqprepCompteur=mysqli_prepare($connexion,$requeteCompteur);

					
					mysqli_stmt_bind_param($reqprepareajout,'ssss',$prenom,$nom,$adresse,$telephone);
					mysqli_stmt_execute($reqprepareajout);
					
					mysqli_stmt_bind_param($reqprepareajoutConnexion,'ss',$pseudo,$passwordHash);
					mysqli_stmt_execute($reqprepareajoutConnexion);
					
					mysqli_stmt_bind_param($reqprepCompteur,'ii',$zero,$zero);
					mysqli_stmt_execute($reqprepCompteur);
					
				
					
					/*Affiche la r??ponse ?? l'utilisateur qui positive*/
					echo "
					<div class='alert alert-success' role='alert'>
					Votre compte a ??t?? cr??e ! Connectez-vous!
					</div>";  
				}
				else{
					/*Affiche la r??ponse ?? l'utilisateur qui n??gative*/
					echo "
					<div class='alert alert-danger' role='alert'>
					Inscription impossible, identifiant d??j?? utilis??!
					</div>";
				}
				/*ferme la connection la base de donn??e*/
				mysqli_close($connexion);
			}
			?>
		</div>
		
		<script src="scripts/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="scripts/main.js"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		
	</body>
</html>