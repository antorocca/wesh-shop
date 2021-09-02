<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    try{
        $bdd= new PDO("mysql:host=localhost;dbname=wesh","root", "");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }

    /*$select = $bdd->prepare('SELECT * FROM user');
    $select->execute();
    
    $resultat = $select->fetchAll();*/  
    /*--------------CA ↑ pour appeler simplement OU ca ↓ pour pouvoit trier par odre alphabetique----------*/
    $list = $bdd ->query('SELECT * FROM user ORDER BY role ASC');
    $userList = $list->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <?php include('head&header.php'); ?>

<h2 class="userTitle">Page administrateur</h2>
<h3 class="userTitle">Liste des utilisateurs</h3>
    <div class="usertab">
    <?php
    
    
    foreach($userList as $user){
        echo '<div class="ligne">
                <div class="email">' . $user['email'] . '</div>
                <div class="role">' . $user['role'] . '</div>
                <a class="modifier" href="modifier.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) . '"><div>Voir/Modifier</div></a>
                <a class="supprimer" href="supprimer.php?email='. urlencode($user['email']) .'"><div>Supprimer</div></a>';
                if($user['role'] == 'ban'){
                    echo '<a class="bannir" href="bannir.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) .'"><div>Débannir</div></a>
            </div>';
                }
                else{
                echo '<a class="bannir" href="bannir.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) .'"><div>Bannir</div></a>
            </div>';
        }
    } ?>
    </div>
    <br><br>
    <a class="goShop" href="index.php"><div>Aller dans la boutique</div></a>
    <br><br>
    <?php include('footer.php'); ?>

    




