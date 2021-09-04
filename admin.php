<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    require_once 'functionDatabase.php';
    /*$select = $bdd->prepare('SELECT * FROM user');
    $select->execute();
    
    $resultat = $select->fetchAll();*/  
    /*--------------CA ↑ pour appeler simplement OU ca ↓ pour pouvoit trier par odre alphabetique----------*/
    $bdd = Database::connect();
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
    <br>
    <a class="goShop" href="index.php"><div>Aller dans la boutique</div></a>
    <br>
    <h3 class="addTitle">Ajouter un article</h3>
    <div class="addTable">
        <div class="addArticle">
            <form action="" method="post">
                <label for="">Nom:</label>
                    <input type="text" name="articleName">
                <label for="">Description:</label>
                    <textarea name="articleDescription" id="" cols="30" rows="8"></textarea>
                <label for="">Ajouter une photo:</label>
                    <input type="text" name="">
                <label for="">Prix:</label>
                    <input type="text" name="articlePrize">
                <label for="">Stock:</label>
                    <input type="text" name="articleStock">
                <label for="">Marque:</label>
                    <input type="text" name="ArticleBrand">
                <label for="">Type:</label>
                    <select id="" name="articleType">
                        <option value="">Art (sculpture, peinture, dessin...)</option>
                        <option value="">Ameublement</option>
                        <option value="">Animalerie</option>
                        <option value="">Bijoux</option>
                        <option value="">Boisson</option>
                        <option value="">Décoration</option>
                        <option value="">Épicerie</option>
                        <option value="">Jeu de société</option>
                        <option value="">Jeux-vidéo</option>
                        <option value="">Jouet</option>
                        <option value="">Musique</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value="">Vêtement</option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                <input type="submit">

            </form>
        </div>
    </div>
    <br>
    <?php include('footer.php'); ?>

    




