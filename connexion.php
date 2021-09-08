<?php
session_start();

    require_once 'functionSubmit.php';
    require_once 'functionDatabase.php';

    Submit::submitRegister();
    Submit::submitConnexion();

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
    
    <div class="form">
        <div class="inscription">
            <h2 class="connexionTitle">S'inscrire</h2>
            <form action="" method="post">
            <?php
                if(Submit::$erreur){
                    echo '<h4 style="color:red;margin:5px 0px;">' . Submit::$erreur . '</h4>';
                }
                elseif(Submit::$success) {
                    echo '<h4 style="color:rgb(28, 100, 255);margin:5px 0px;">' . Submit::$success . '</h4>';
                }
            ?>
                <input type="email" name="email" placeholder="Votre e-mail">
                <input type="text" name="pseudo" placeholder="Votre pseudo">
                <input type="text" name="address" placeholder="Votre adresse">
                <input type="text" name="city" placeholder="Votre ville">
                <input type="password" name="mdp" placeholder="Votre mot de passe">
                <input type="password" name="mdp2" placeholder="Confirmer votre mot de passe">
                <input type="submit" name="submit">
                
            </form>
        </div>
        <div class="connexion">
            <h2 class="connexionTitle">Se connecter</h2>
            <form action="" method="post">
            <?php
                if(Submit::$erreurCo || Submit::$ban){
                    echo '<h4 style="color:red; margin:5px 0px;">' . Submit::$erreurCo, Submit::$ban . '</h4>';
                }
                elseif(Submit::$successCo){
                    echo '<h4 style="color:rgb(28, 100, 255); margin:5px 0px;">' . Submit::$successCo . '</h4>';
                }
            ?>
                <!-- <h4 style="color:red;"><?php/* echo $erreurCo, $successCo, $ban;*/ ?></h4> -->
                <input type="email" name="email" placeholder="Votre e-mail">
                <input type="password" name="mdp" placeholder="Votre mot de passe">
                <input type="submit" name="submitConnexion">
            </form>
        </div>

    </div>
<?php include('footer.php'); ?>