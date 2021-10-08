<?php
session_start();

    require_once 'functionSubmit.php';
    require_once 'functionDatabase.php';
    
    Submit::submitConnexion();

?>

<?php include('include/head&header.php'); ?>
    
    <div class="formConnexion">
            <h2 class="connexionTitle">S'identifier</h2>
            <form action="" method="post">
            <?php
                if(Submit::$erreurCo || Submit::$ban){
                    echo '<h4 style="color:red; margin:5px 0px;">' . Submit::$erreurCo, Submit::$ban . '</h4>';
                }
                elseif(Submit::$successCo){
                    echo '<h4 style="color:rgb(28, 100, 255); margin:5px 0px;">' . Submit::$successCo . '</h4>';
                }
            ?>
                <label>E-mail:</label>
                <input class="inputConnexion" type="email" name="email">
                <label>Mot de passe:</label>
                <input class="inputConnexion" type="password" name="mdp">
                <input class="btnConnexion" type="submit" name="submitConnexion" value="Se connecter">
            </form>
    </div>
<?php include('include/footer.php'); ?>