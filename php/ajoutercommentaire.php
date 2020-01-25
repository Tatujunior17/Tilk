

<?php

session_start();

if (isset($_POST['commentaire'])) {
    if ($_POST['commentaire'] != NULL) {

        // insertion du code pour la connexion à MySQL
        require_once("pdoConnectBd.php");


        $commentaire = $_POST['commentaire'];
        $id = $_POST['idcommentaire'];

        $reponse = $bdd->query("SELECT * FROM commentaire WHERE description_commentaire ='$commentaire'");
        $nombreEnregistrements = $reponse->rowCount();

//        Test pour savoir si le tilk existe déjà

        if ($nombreEnregistrements != 0) {
            ?>
            <script type="text/javascript">
                alert("Ce commentaire exsite déjà.");
                document.location.href = "../home.php";
            </script>
            <?php
        }else{

        $rqt = "INSERT INTO commentaire (description_commentaire, idpost_commentaire) VALUES('$commentaire','$id')";

        // exécution de la requête
        $repRqt = $bdd->query($rqt) OR die ("Erreur dans la requête: " . $rqt);

        if (!$repRqt) {

            ?>
            <script
                type="text/javascript"> alert(" Il y a un problème : Les données ne sont pas enregistrées");
                document.location.href = "../home.php"</script>;<?php

            ?>

            <?php

        } else {

            ?>
            <script
                type="text/javascript"> alert("Vous avez commenté.");
                document.location.href = "../home.php"</script>;<?php
        }
        ?>
        <?php
        }
    }
}
    ?>
