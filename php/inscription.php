
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['email']) AND isset($_POST['password'])AND isset($_POST['nom'])AND isset($_POST['prenom'])AND isset($_POST['cpassword'])) {
    if ($_POST['email'] != NULL AND $_POST['password'] != NULL AND $_POST['nom'] != NULL AND $_POST['prenom'] != NULL AND $_POST['cpassword'] != NULL) {
        try {
            //connexion à la base de données
            include "pdoConnectBd.php";
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $Login = $_POST['email'];
            $Motdepasse = $_POST['password'];
            $MotdepasseC = $_POST['cpassword'];
            $Nom = $_POST['nom'];
            $Prenom = $_POST['prenom'];
            $vkey = md5(time().$Login);

            //parcourir la liste utilisateurs
            $req1 = $bdd->query("SELECT * FROM utilisateur WHERE email_utilisateur = '$Login' AND mdp_utilisateur = '$Motdepasse'");
            $nombreUtilisateur = $req1->rowCount();
            $donnees=$req1->fetch();



            echo $vkey;

            //dans le cas
            if ($nombreUtilisateur == 1) {
                ?>
                <script type="text/javascript">
                    alert("Ce compte existe déjà.");
                    document.location.href = "../login.php";
                </script>
                <?php
            }
            if ($nombreUtilisateur== 0) {
              if($Motdepasse != $MotdepasseC){
              ?>
              <script type="text/javascript">
                  alert("Les deux mots de passes doivent être identiques.");
                  document.location.href = "../register.php";
              </script>
              <?php
            }
            else {
              $req2 = $bdd->query("INSERT INTO utilisateur (nom_utilisateur, prenom_utilisateur, email_utilisateur, mdp_utilisateur, vkey_utilisateur, verifie_utilisateur) VALUES ('$Nom', '$Prenom', '$Login', '$Motdepasse', '$vkey','0')");

              $to = $Login;
              $sujet = "verification Email";
              $message = "<a href='http://localhost/php/verification.php?vkey=$vkey'>Activation du compte</a>";
              $headers = "De: ivane_rodrigues@hotmail.com";
              $headers = "MIME-Version: 1.0" . "\r\n";
              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
              mail($to,$sujet,$message,$headers);

              ?>
              <script type="text/javascript">
                  alert("Vous avez maintenant un compte.");
                  document.location.href = "../login.php";
              </script>
              <?php
            }
          }

            $bdd = NULL;

            } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br />";
            die();
        }
    }
}
?>
