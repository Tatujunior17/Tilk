<?php
session_start();
?>

<?php
if (isset($_POST['email']) AND isset($_POST['password'])) {
    if ($_POST['email'] != NULL AND $_POST['password'] != NULL) {
        try {
            //connexion à la base de données
            include "pdoConnectBd.php";
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $Login = $_POST['email'];
            $Motdepasse = $_POST['password'];



            //Parcourir les utilisateurs
            $req1 = $bdd->query("SELECT * FROM utilisateur WHERE email_utilisateur = '$Login' AND mdp_utilisateur = '$Motdepasse'");
            $nombreUtilisateur = $req1->rowCount();
            $donnees=$req1->fetch();

            //dans le cas
            if ($nombreUtilisateur == 1) {
                $_SESSION['ID'] = $donnees['id_utilisateur'];
                $_SESSION['EMAIL'] = $donnees['email_utilisateur'];
                $_SESSION['NOM'] = $donnees['nom_utilisateur'];

                if ($donnees['verifie_utilisateur']==1) {
                  ?>
                  <script type="text/javascript">
                      alert("Connexion reussie.");
                      document.location.href = "../home.php";
                  </script>
                  <?php
                }
                else {
                  ?>
                  <script type="text/javascript">
                      alert("Verfier email activation.");
                      document.location.href = "../login.php";
                  </script>
                  <?php
                }

            }
            if ($nombreUtilisateur== 0) {
              ?>
              <script type="text/javascript">
                  alert("Votre mot de passe ou identifiant incorrect.");
                  document.location.href = "../index.php";
              </script>
              <?php
            }
            else {
              ?>
              <script type="text/javascript">
                  alert("Erreur survenue.");
                  document.location.href = "../index.php";
              </script>
              <?php
            }

            $bdd = NULL;

            } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br />";
            die();
        }
    }
}
?>
