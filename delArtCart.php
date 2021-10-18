<?php 
session_start();

require_once 'functionDatabase.php';
$bdd = Database::connect();

// $idA = $_POST['delArt'];


$art = implode(',',$_POST['delArt']);
var_dump($art);

 if(isset($_POST["delArtB"])){
     $d = $bdd->prepare('DELETE FROM cart WHERE idUser=? AND idArticle IN (?)');
     $d->execute([$_SESSION['id'], $art]);
     var_dump($d->errorInfo());
 }
//  header('Location: panier.php');
?>

