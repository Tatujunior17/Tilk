
<?php
session_start();

if (isset($_POST['email']) AND isset($_POST['nom'])AND isset($_POST['prenom'])) {
    if ($_POST['email'] != NULL AND $_POST['nom'] != NULL AND $_POST['prenom'] != NULL) {
        try {
            //connexion à la base de données
            include "pdoConnectBd.php";
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $Login = $_POST['email'];
            $Nom = $_POST['nom'];
            $Prenom = $_POST['prenom'];
            $id = $_SESSION['ID'];

            echo $id;

            $bdd->query("UPDATE utilisateur SET nom_utilisateur = '$Nom', prenom_utilisateur = '$Prenom', email_utilisateur = '$Login' WHERE id_utilisateur = '$id'");
            session_unset();

            session_destroy();
            ?>
            <script type="text/javascript">
                alert("Mise à jour reussie. Connectez-vous.");
                document.location.href = "../index.php";
            </script>
            <?php

            } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br />";
            die();
        }
    }
}
?>
