<?php

session_start();
if(!empty ($_SESSION['ID']) )
{
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Tilk - Post</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="login/images/tilklogo.webp"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="php/ajouterpost.php" method="post" enctype="multipart/form-data">
					<span class="login100-form-title p-b-26">
						Poster un Tilk
					</span>
					<span class="login100-form-title p-b-48">
						<i><img src="login/images/tilklogo.webp" alt="Tilk"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Inserez un titre">
						<input class="input100" type="text" name="titre">
						<span class="focus-input100" data-placeholder="Titre du post"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Nom utilisateur Codepen">
						<input class="input100" type="text" name="utilisateurcodepen">
						<span class="focus-input100" data-placeholder="Utilisateur Codepen"></span>
					</div>

					<br/>
					<p>La clé du projet se trouve dans le lien url de votre projet. Exemple : https://codepen.io/test/<b style="color:red;">KKwqLQy</b></p>
					<br/>

					<div class="wrap-input100 validate-input" data-validate = "Clef du projet">
						<input class="input100" type="text" name="clef">

						<span class="focus-input100" data-placeholder="Clef du projet"></span>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "Inserez un commentaire">
						<textarea class="input100" type="text" name="description"></textarea>
						<span class="focus-input100" data-placeholder="Description"></span>
					</div>


					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Tilker
							</button>
						</div>
					</div>

					<div class="text-center p-t-115" style="margin-top:-100px;">
						<a class="txt2" href="home.php">
							Retour au fil d'actualité
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>

<?php    }

    else
    {?>
    <script type="text/javascript">
        alert("Acces refuse");
        document.location.href = "index.php";
    </script>
<?php
die();
}?>
