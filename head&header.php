<?php
    Database::connect();
    $category = Database::$bdd->prepare('SELECT id FROM category');
    $category->execute();
    $resultC = $category->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Document</title>
    </head>
    <body>
        <header class="header">
            <a class="headerTitle" href="index.php">WESH Shop</a>
            <form action="#" method="get" class="formSearch">
                <input class="searchBar" type="search" name="search">
                <button type="submit" name="submitSearch"><img class="imgSearch" src="assets/picture/kisspng-computer-icons-magnifier-magnifying-glass-clip-art-lupe-5b4c85ec67c638.1343363915317416764251.png" alt="loupe"></button>
            </form>
            <div class="headerRight">
                <?php
                if(!empty($_SESSION)){
                    echo '<div class="account">
                    <button class="dropBtn">' . $_SESSION['name'] . '<br>Mon Compte</button>
                        <div class="dropdownAccount">
                        <a href="#">Mon compte</a>
                        <a href="#">Mes commandes</a>';
                        if($_SESSION['role'] == 'seller'){
                            echo '<a href="magasin.php">Mon magasin</a>';
                        }else{
                            echo '<a href="#">Créer un compte vendeur</a>';
                        }
                        echo '<a href="logout.php">Se déconnecter</a>
                        </div>
                    </div>';
                }else{
                    echo '<div class="goIdentify">
                    <a class="goConnexion" href="connexion.php">S\'identifier</a>
                    <a class="goSubscribe" href="inscription.php">Créer un compte</a>
                    </div>';
                }
                ?>
                <figure class="panier">
                    <a href="panier.php"><img src="assets/picture/panier3.png" alt="panier"></a>
                </figure>
            </div>
        </header>

        <div class="main">
        
            <h1>WESH SHOP</h1>
            
        </div>
        <nav class="categorie">
            <a href="category.php?id=<?php echo $resultC[1]['id'] ?>">Librairie</a>
            <a href="category.php?id=<?php echo $resultC[6]['id'] ?>">Musique et Art</a>
            <a href="category.php?id=<?php echo $resultC[5]['id'] ?>">Jeu et Jouet</a>
            <a href="category.php?id=<?php echo $resultC[2]['id'] ?>">Mode et Bijoux</a>
            <a href="category.php?id=<?php echo $resultC[11]['id'] ?>">Côté Bébé</a>
            <a href="category.php?id=<?php echo $resultC[15]['id'] ?>">Décoration</a>
            <a href="category.php?id=<?php echo $resultC[7]['id'] ?>">Boisson</a>
            <a href="category.php?id=<?php echo $resultC[3]['id'] ?>">Épicerie</a>
            <a href="category.php?id=<?php echo $resultC[4]['id'] ?>">Technologie</a>
            <a href="category.php?id=<?php echo $resultC[14]['id'] ?>">Animalerie</a>
            <a href="category.php?id=<?php echo $resultC[13]['id'] ?>">Jardinerie</a>
            <a href="category.php?id=<?php echo $resultC[8]['id'] ?>">Beauté et Bien-être</a>
            <a href="category.php?id=<?php echo $resultC[9]['id'] ?>">Sport et Loisir</a>
            <a href="category.php?id=<?php echo $resultC[10]['id'] ?>">Ameublement</a>
            <a href="category.php?id=<?php echo $resultC[12]['id'] ?>">Auto-Moto</a>
        </nav>
        <?php 
            if(empty($_SESSION)){

            }
            elseif($_SESSION['role']== 'admin'){
                echo '<br><a class="goShop" href="admin.php"><div>Aller à la page administrateur</div></a>';
            }
        ?>