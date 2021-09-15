<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }
    require_once 'functionCrud.php';
    require_once 'functionDatabase.php';

    $bdd=Database::connect();
    $email = $_GET['email'];

    $user = Database::$bdd-> prepare('SELECT * FROM user WHERE email = ?');
    $user-> execute([$email]);
    $userDetails = $user-> fetch();


    Crud::update();
    include('head&header.php');

?>

        <h2 class="userTitle">Modifier un utilisateur</h2>

        <div class="tabUser">
            <div class="afficherUser">    
                    <h3>Informations</h3>    
                    <p>Adresse E-mail: <?php echo $userDetails[1] ?></p>
                    <p>Nom: <?php echo $userDetails[2] ?></p>
                    <p>Prénom: <?php echo $userDetails[3] ?></p>
                    <p>Adresse: <?php echo $userDetails[5] ?></p>
                    <p>Ville: <?php echo $userDetails[6] ?></p>
                    <p>Rôle de l'utilisateur: <?php echo $userDetails[7] ?></p>
            </div>
            <div class="updateUser">
                <h3>Modifier les informations</h3>
                <form action="modifier.php?email=<?php echo $email ?>" method="post">
                        <label>Modifier l'email:</label>
                            <input type="text" name="updateEmail">
                        <label>Modifier le nom:</label>
                            <input type="text" name="updateName">
                        <label>Modifier le prénom:</label>
                            <input type="text" name="updateFirstname">
                        <label>Modifier l'adresse:</label>
                            <input type="text" name="updateAddress">
                        <label>Modifier la ville:</label>
                            <input type="text" name="updateCity">
                        <label>Modifier le rôle:</label>
                            <select name="updateRole">
                                <option value=""></option>
                                <option value="user">Utilisateur</option>
                                <option value="admin">Administrateur</option>
                                <option value="seller">Vendeur</option>
                                <option value="ban">Banni</option>
                            </select>
                        
                    <input class="submitUpdate" type="submit" name='submitModif' value="Sauvegarder les modifications">
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
    