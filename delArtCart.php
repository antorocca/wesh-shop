<?php 
session_start();

require_once 'functionDatabase.php';
$bdd = Database::connect();

// $idA = $_POST['delArt'];



$art = implode(',',$_POST['delArt']);


if(isset($_POST["delArtB"])){
    
     foreach($_POST['delArt'] as $value){
     $d = $bdd->prepare('DELETE FROM cart WHERE idUser=? AND idArticle=?');
     $d->execute([$_SESSION['id'], $value]);

    }
    //  var_dump($d->errorInfo());
 }

// die();
 header('Location: panier.php');
?>

