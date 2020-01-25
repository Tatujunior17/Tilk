<?php

session_start();
if(!empty ($_SESSION['ID']) )
{?>

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
  <link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
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
		<h2 class="tit6 t-center" style="color:black;">
			Mes Tilks
		</h2>
	</section>

	<section class="section-intro">
		<div class="content-intro bg-white p-t-77 p-b-133">
			<div class="container">
				<div class="row">

					<?php
            try {

                include "php/pdoConnectBd.php";
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $id = $_SESSION['ID'];

                $reponse = $bdd->query("SELECT * FROM post WHERE idutil ='$id'");



                while ($donnees = $reponse->fetch()) {
                  $id = $donnees['id_post'];
                    if ($donnees['titre_post'] != "") {
                        ?>

												<div class="col-md-4 p-t-30">
													<!-- Block1 -->
													<div class="blo1">
														<div class="wrap-text-blo1 p-t-35">
															<h4 class="txt5 color0-hov trans-0-4 m-b-13">
                            <?php
                                echo $donnees['titre_post'];
                            ?>
													</h4>
													<p class="m-b-20">
                                <?php echo $donnees['description_post']; ?>
                        </div>
											</p>
                      <div class="container-login100-form-btn">
            						<div class="wrap-login100-form-btn">
            							<div class="login100-form-bgbtn"></div>
            							<a href="repondrepost.php?edit=<?php echo $id;?>"><button class="login100-form-btn" type="submit">
            								Consulter
            							</button></a>
            						</div>
            					</div>
										</div>
									</div>



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
			</div>
		</div>
	</section>

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
