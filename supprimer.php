<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    $email = $_GET['email'];

    require_once 'functionCrud.php';

    Crud::delete();
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
        <nav>
            <div class="titre">
                WESH Shop
            </div>

            <div class="menu">
                <a href="">home</a>
            </div>
            <div class="deco">
                <a class="btn-deco" href="logout.php"><?php echo $_SESSION['email'] . ' (' . $_SESSION['role'] . ')' ?><br>Se déconnecter</a>
            </div>
        </nav>

        <div class="main">
        
            <h1>WESH SHOP</h1>
            
        </div>

        <h2 class="userTitle">Supprimer un utilisateur</h2>

        <div class="deletetab">
            <div class="deleteTxt">
                <p>Voulez-vous vraiment supprimer <?php echo $email ?> ?</p>
            </div>
            <form class="deleteForm" action="supprimer.php?email=<?php echo $email ?>" method="post">
                <input class="deleteBtn" type="submit" name="deleteInput" value="Supprimer">
            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="retourAccueil">
            <a href="admin.php">Accueil administrateur</a>
        </div>
    </body>
</html>