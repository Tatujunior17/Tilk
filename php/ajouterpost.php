

<?php

session_start();

if (isset($_POST['titre']) AND isset($_POST['description'])AND isset($_POST['utilisateurcodepen'])AND isset($_POST['clef'])) {
    if ($_POST['titre'] != NULL AND $_POST['description'] != NULL AND $_POST['utilisateurcodepen'] != NULL AND $_POST['clef'] != NULL) {

        // insertion du code pour la connexion à MySQL
        require_once("pdoConnectBd.php");

        $titre = $_POST['titre'];
        $description = $_POST['description'];
        $codepenutil = $_POST['utilisateurcodepen'];
        $clef = $_POST['clef'];
        $id = $_SESSION['ID'];
        $lien = "https://codepen.io/$codepenutil/embed/$clef?height=265&theme-id=default&default-tab=css,result";



        $reponse = $bdd->query("SELECT * FROM post WHERE titre_post ='$titre'");
        $nombreEnregistrements = $reponse->rowCount();

//        Test pour savoir si le tilk existe déjà

        if ($nombreEnregistrements != 0) {
            ?>
            <script type="text/javascript">
                alert("Ce tilk existe déjà.");
                document.location.href = "../post.php";
            </script>
            <?php
        }else{

        $rqt = "INSERT INTO post (titre_post, lien_post,description_post, idutil) VALUES('$titre','$lien','$description','$id')";

        // exécution de la requête
        $repRqt = $bdd->query($rqt) OR die ("Erreur dans la requête: " . $rqt);

        if (!$repRqt) {

            ?>
            <script
                type="text/javascript"> alert(" Il y a un problème : Les données ne sont pas enregistrées");
                document.location.href = "../post.php"</script>;<?php

            ?>

            <?php

        } else {

            ?>
            <script
                type="text/javascript"> alert("Vous avez tilké.");
                document.location.href = "../home.php"</script>;<?php
        }
        ?>
        <?php
        }
    }
}
    ?>
