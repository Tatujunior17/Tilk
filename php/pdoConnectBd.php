<?php
// pas d'entête HTML car ce fichier est inclu dans des page HTML

$user = 'root';
$password = 'root';
$dbname = 'tilk';

$bds = 'mysql:host=localhost;charset=utf8;dbname='.$dbname;
try
{
    $bdd = new PDO($bds, $user, $password);
}
catch(Exception $e)
{
    die("Echec de la connexion à la base de données : " . $e->getMessage());
}

try
{
    $bdd2 = new PDO($bds, $user, $password);
}
catch(Exception $e)
{
    die("Echec de la connexion à la base de données : " . $e->getMessage());
}
?>
