<?php
session_start();
if (!isset($_SESSION['email'])) {
    header ('Location: index.php');
    exit();
}
$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT * FROM client WHERE id = :id');
$req->execute(array(
    'id'=>1
  ));
  $res = $req->fetch();
  if($res){
      $_SESSION['id'] = $res['id_client'];
  }
  if ($_SESSION['id'] == '1') {
    header('Location: espace_admin.php');
  }
  var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a login page template based on Bootstrap 5">
	<title>ESPACE MEMBRES - RAMOVIE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
	<?php
	$bdd = new PDO('mysql:host=localhost;dbname=ramovie_project;charset=utf8', 'root', '');
	$req = $bdd->prepare('SELECT * FROM client WHERE id_client=:id_client');
	$req->execute(array(
	    'id_client'=>$_SESSION['id'],
	));
	$res = $req->fetch();
	$mail = $res['email'];
	$nom = $res['nom'];
	$prenom = $res['prenom'];
	?>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="assets/img/ramov.png" alt="logo" width="200">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">ESPACE MEMBRES</h1>
							<form action="update.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Nom</label>
									<input id="name" type="text" class="form-control" name="nom" value="<?php echo $nom ?>"  autofocus>
									<div class="invalid-feedback">
										Nom requis
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Prénom</label>
									<input id="name" type="text" class="form-control" name="prenom" value="<?php echo $prenom ?>"  autofocus>
									<div class="invalid-feedback">
										Prénom requis
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">Adresse mail</label>
									<input id="email" type="email" class="form-control" name="email" value="<?php echo $mail ?>" >
									<div class="invalid-feedback">
										Adresse mail invalide
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="password">Mot de passe</label>
									<input id="password" type="password" class="form-control" name="mot_de_passe">
								    <div class="invalid-feedback">
								    	Mot de passe requis
							    	</div>
								</div>



								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
									Valider
									</button>
								</div>
							</form>
						</div>
						<div class="card-footer py-3 border-0">
							<div class="text-center">
							Voulez-vous vous déconnectez ? <a href="deco.php" class="text-dark">Déconnexion.</a> <br>
							Voulez-vous retourner à l'accueil ? <a href="index.php" class="text-dark">Cliquez-ici.</a>
							</div>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2021 &mdash; RAMOVIE
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
