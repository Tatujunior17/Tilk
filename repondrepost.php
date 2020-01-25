<?php

session_start();
if(!empty ($_SESSION['ID']) )
{?>

  <?php

try {

  include "php/pdoConnectBd.php";


  if (isset($_GET['edit'])) {

      $edit_id = $_GET['edit'];
      $reponse = $bdd->query("SELECT * FROM post JOIN utilisateur ON id_utilisateur = idutil WHERE id_post ='$edit_id'");
      $donnees = $reponse->fetch();

  }
  $bdd = null;


} catch (PDOException $e) {
  echo "Erreur !: " . $e->getMessage() . "<br />";
  die();
}



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Tilk - Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/tilklogo.webp"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="home.php">
							<img src="images/icons/tilklogo.webp" alt="IMG-LOGO" data-logofixed="images/icons/tilklogo.webp">
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="home.php">Home</a>
								</li>
								<li>
									<a href="post.php">Tilker</a>
								</li>
								<li>
									<a href="mestilks.php">Mes Tilks</a>
								</li>

								<li>
									<a href="compte.php">Compte</a>
								</li>

								<li>
									<a href="php/deconnexion.php">Déconnexion</a>
								</li>
							</ul>
						</nav>
					</div>

					<!-- Social -->
					<div class="social flex-w flex-l-m p-r-20">

						<button class="btn-show-sidebar m-l-33 trans-0-4"></button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="home.php" class="txt19">Home</a>
			</li>

			<li class="t-center m-b-13">
				<a href="post.php" class="txt19">Tilker</a>
			</li>

			<li class="t-center m-b-13">
				<a href="mestilks.php" class="txt19">Mes Tilks</a>
			</li>

			<li class="t-center m-b-13">
				<a href="compte.php" class="txt19">Compte</a>
			</li>

			<li class="t-center m-b-13">
				<a href="php/deconnexion.php" class="txt19">Déconexion</a>
			</li>

		</ul>
	</aside>

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/index.jpg);">
		<h2 class="tit6 t-center">
			Aidez le Tilkeur
		</h2>
	</section>


	<!-- Content page -->
	<section>
		<div class="bread-crumb bo5-b p-t-17 p-b-17">
		<div class="container">
			<div class="row ">
				<div class="col-md-8 col-lg-9">
					<div class="p-t-80 p-b-124 bo5-r p-r-50 h-full p-r-0-md bo-none-md">
						<!-- Block4 -->
						<div class="blo4 p-b-63">
							<div class="text-blo4 p-t-33">
								<h4 class="p-b-16">
									<?php echo $donnees['titre_post'];?>
								</h4>

								<div class="txt32 flex-w p-b-24">
									<span>
										par <?php echo $donnees['nom_utilisateur'];?>
										<span class="m-r-6 m-l-4"></span>
									</span>
								</div>

								<p>
									<?php echo $donnees['description_post'];?>
								</p>
                <br/>
                  <h4 class="p-b-16">Demo Codepen.io</h4>
                  <br/>
                <iframe height="265" style="width: 100%;" scrolling="no" src="<?php echo $donnees['lien_post'];?>" frameborder="no" allowtransparency="true" allowfullscreen="true">
                </iframe>
                <br/>
                <h4 class="p-b-16">Les commentaires</h4>
                <br/>
                <?php
                  try {

                      include "php/pdoConnectBd.php";
                      $bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

                      $reponse2 = $bdd2->query("SELECT * FROM commentaire WHERE idpost_commentaire ='$edit_id'");



                      while ($donnees2 = $reponse2->fetch()) {
      									$id = $donnees2['id_commentaire'];
                          if ($donnees2['description_commentaire'] != "") {
                              ?>

                              <p>-
              									<?php echo $donnees2['description_commentaire'];?>
              								</p>
                              <br/>

                              <?php
                          }
                      }



                      $bdd = null;
                  }
                  catch (PDOException $e) {
                      echo "Erreur !: " . $e->getMessage() . "<br />";
                      die();
                  }
                  ?>
							</div>


						</div>

						<!-- Leave a comment -->
						<form class="leave-comment p-t-10" action="php/ajoutercommentaire.php" method="post">
							<h4 class="txt33 p-b-14">
								Tu as une solution ?
							</h4>

							<p>
								N'hésites pas à la proposer
							</p>
							<textarea class="bo-rad-10 size29 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-40" name="commentaire" placeholder="Commenter"></textarea>
              <input id="" name="idcommentaire" value="<?php echo $donnees['id_post'];?>" style="color:white;">
							<!-- Button3 -->
							<button type="submit" class="btn3 flex-c-m size31 txt11 trans-0-4">
								Poster
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
  <footer class="bg1">
		<div class="end-footer bg2">
			<div class="container">
				<div class="flex-sb-m flex-w p-t-22 p-b-22">
					<div class="p-t-5 p-b-5">
						<a href="#" class="fs-15 c-white"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						<a href="#" class="fs-15 c-white"><i class="fa fa-twitter m-l-18" aria-hidden="true"></i></a>
					</div>

					<div class="txt17 p-r-20 p-t-5 p-b-5">
						Copyright &copy; 2019 All rights reserved  |  TILK SA
					</div>
				</div>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

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
