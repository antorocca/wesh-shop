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
        <nav class="header">
            <div class="titre">
                 <a href="index.php">WESH Shop</a>
            </div>

            <form action="#" method="get" class="formSearch">
                <input class="searchBar" type="search" name="search">
                <button type="submit" name="submitSearch"><img class="imgSearch" src="assets/kisspng-computer-icons-magnifier-magnifying-glass-clip-art-lupe-5b4c85ec67c638.1343363915317416764251.png" alt="loupe"></button>
            </form>

            <div class="deco">
                <?php
                if(empty($_SESSION)){
                    echo '<a href="connexion.php">S\'inscrire / Se connecter</a>';
                }else{
                    echo '<a class="btn-deco" href="logout.php">' . $_SESSION['email'] . '<br>Se déconnecter</a>';
                }
                ?>
            </div>
        </nav>

        <div class="main">
        
            <h1>WESH SHOP</h1>
            
        </div>
        <nav class="categorie">
            <a href=""><div>Boisson et alcool</div></a>
            <a href=""><div>Épicerie</div></a>
            <a href=""><div>Ameublement</div></a>
            <a href=""><div>Décoration</div></a>
            <a href=""><div>Bijoux</div></a>
            <a href=""><div>Mode</div></a>
            <a href=""><div>Animalerie</div></a>
            <a href=""><div>Jeux video</div></a>
            <a href=""><div>Téléphonie</div></a>
            <a href=""><div>Livre</div></a>
        </nav>
        <?php 
            if(empty($_SESSION)){

            }
            elseif($_SESSION['role']== 'admin'){
                echo '<br><a class="goShop" href="admin.php"><div>Aller à la page administrateur</div></a>';
            }
        ?>