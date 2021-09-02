<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    $email = $_GET['email'];
    $role = $_GET['role'];

    require_once 'functionCrud.php';

    Crud::update();

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

        <h2 class="userTitle">Modifier un utilisateur</h2>

        <div class="tabUser">
            <div class="afficherUser">
                <div class="affichEmail">
                    <p>Adresse E-mail: <?php echo $email ?></p>
                </div>
                <div class="affichRole">
                    <p>Rôle de l'utilisateur: <?php echo $role ?></p>
                </div>
            </div>
            <div class="modifUser">
                <form action="modifier.php?email=<?php echo $email . "&role=" . $role ?>" method="post">
                    <div class="modifEmail">
                        <label>Modifier l'email:</label>
                        <input type="text" name="modifEmail">
                    </div>
                    <div class="modifRole">
                        <label>Modifier le rôle:</label>
                        <select name="modifRole">
                            <option value="user">Utilisateur</option>
                            <option value="admin">Administrateur</option>
                        </select>
                    </div>
                    <input class="submit" type="submit" name='submitModif' value="Sauvegarder les modifications">
                </form>
            </div>
        </div>
        <br>
            <br>
            <br>
            <div class="retourAccueil">
                <a href="admin.php">Accueil administrateur</a>
            </div>
    </body>
</html>
    