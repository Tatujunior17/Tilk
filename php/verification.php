<?php


try {

  include "php/pdoConnectBd.php";


  if (isset($_GET['vkey'])) {

      $vkey = $_GET['vkey'];
      $rqt1 = $bdd->query("SELECT vkey_utilisateur, verifie_utilisateur FROM utilisateur WHERE vkey_utilisateur ='$vkey' AND verifie_utilisateur = 0");
      $nombreUtilisateur = $rqt1->rowCount();
      $donnees = $reponse->fetch();

      if($nombreUtilisateur == 1){
        $bdd->query("UPDATE utilisateur SET verifie_utilisateur = 1 WHERE vkey_utilisateur = '$vkey'");
        ?>
        <script type="text/javascript">
            alert("Le compte est verifié. Connectez-vous.");
            document.location.href = "../login.php";
        </script>
        <?php
      }
      else {
        ?>
        <script type="text/javascript">
            alert("Compte non verifié. Checker votre email.");
            document.location.href = "../login.php";
        </script>
        <?php
      }


  }
  $bdd = null;


} catch (PDOException $e) {
  echo "Erreur !: " . $e->getMessage() . "<br />";
  die();
}



?>
