<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    require_once 'functionDatabase.php';
    require_once 'functionArticle.php';
    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        Article::addarticle();
    }
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
    <h3 class="addTitle">Ajouter un article</h3>
    <div class="addTable">
        <div class="addArticle">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="addFormL">
                    <label>*Nom:</label>
                        <input type="text" name="addName">
                    <label>*Description:</label>
                        <textarea name="addDescription" id="" cols="30" rows="8"></textarea>
                    <label>Ajouter une photo:</label>
                        <input type="file" name="addFile">
                </div>
                <div class="addFormR">
                    <label>*Prix:</label>
                        <input type="text" name="addPrize">
                    <label>*Stock:</label>
                        <input type="text" name="addStock">
                    <label>Marque:</label>
                        <input type="text" name="addBrand">
                    <label>*Type:</label>
                        <select id="" name="addType">
                            <option value="Art">Art (sculpture, peinture, dessin...)</option>
                            <option value="Ameublement">Ameublement</option>
                            <option value="Animalerie">Animalerie</option>
                            <option value="Bijoux">Bijoux</option>
                            <option value="Boisson">Boisson</option>
                            <option value="Décoration">Décoration</option>
                            <option value="Épicerie">Épicerie</option>
                            <option value="Jeu de société">Jeu de société</option>
                            <option value="Jeux-vidéo">Jeux-vidéo</option>
                            <option value="Jouet">Jouet</option>
                            <option value="Livre">Livre</option>
                            <option value="Musique">Musique</option>
                            <option value="Vêtement">Vêtement</option>
                        </select>
                    </div>
                <div class="addButton">
                    <?php
                        if(Article::$addSuccess){
                            echo Article::$addSuccess;
                        }
                        elseif(Article::$addError)
                            echo Article::$addError; 
                    ?>
                    <input type="submit" value="Ajouter" name="addArticleSubmit">
                    <p>Les champs marqués d'un (*) sont obligatoire.</p>
                </div>
            </form>

        </div>
    </div>
    <br>
    <?php include('footer.php'); ?>

    




