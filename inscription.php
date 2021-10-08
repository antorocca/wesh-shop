<?php
session_start();

    require_once 'functionSubmit.php';
    require_once 'functionDatabase.php';

    Submit::submitRegister();

?>

<?php include('include/head&header.php'); ?>
    
    <div class="formSubscribe">
            <h2 class="connexionTitle">Créer un compte sur WESH Shop</h2>
            <form action="" method="post">
            <?php
                if(Submit::$erreur){
                    echo '<h4 style="color:red;margin:5px 0px;">' . Submit::$erreur . '</h4>';
                }
                elseif(Submit::$success) {
                    echo '<h4 style="color:rgb(28, 100, 255);margin:5px 0px;">' . Submit::$success . '</h4>';
                }
            ?>
                <label>E-mail:</label>
                    <input class="inputSubscribe" type="email" name="email">
                <label>Votre nom:</label>
                    <input class="inputSubscribe" type="text" name="name">
                <label>Votre pseudo:</label>
                    <input class="inputSubscribe" type="text" name="firstname">
                <label>Votre adresse:</label>
                    <input class="inputSubscribe" type="text" name="address">
                <label>Ville:</label>
                    <input class="inputSubscribe" type="text" name="city">
                <label>Mot de passe:</label>
                    <input class="inputSubscribe" type="password" name="mdp">
                <label>Confirmation du mot de passe:</label>
                    <input class="inputSubscribe" type="password" name="mdp2">
                <input class="btnSubscribe" type="submit" name="submit" value="Créer mon compte">
            </form>
    </div>
<?php include('include/footer.php'); ?>