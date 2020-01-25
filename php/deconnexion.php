<?php
session_start();

session_unset();

session_destroy();
?>

<script type="text/javascript">
    alert("vous etes deconnecte");
    document.location.href = "../index.php";
</script>
