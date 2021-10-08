<?php
session_start();
    if($_SESSION['role']!=="admin"){
        header('Location: logout.php');
    }

    require_once 'functionDatabase.php';
    require_once 'functionCrud.php';

    Crud::create();

    include('include/head&header.php');
    ?>
               <div class="create">
                <h3>Créer un utilisateur</h3>
                <form action="create.php" method="post">
                        <label>Email:</label>
                            <input type="text" name="createEmail">
                        <label>Nom:</label>
                            <input type="text" name="createName">
                        <label>Prénom:</label>
                            <input type="text" name="createFirstname">
                        <label>Adresse:</label>
                            <input type="text" name="createAddress">
                        <label>Ville:</label>
                            <input type="text" name="createCity">
                        <label>Mot de passe:</label>
                            <input type="password" name="createMdp">
                        <label>Confirmer le mot de passe:</label>
                            <input type="password" name="createMdp2">
                        <label>Rôle:</label>
                            <select name="createRole">
                                <option value=""></option>
                                <option value="user">Utilisateur</option>
                                <option value="admin">Administrateur</option>
                                <option value="seller">Vendeur</option>
                                <option value="ban">Banni</option>
                            </select>
                        
                    <input class="submitCreate" type="submit" name='submitCreate' value="Créer l'utilisateur">
                </form>
            </div>
        </div>


    <?php include('include/footer.php'); ?>