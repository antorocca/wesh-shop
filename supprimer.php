<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    $email = $_GET['email'];

    require_once 'functionCrud.php';

    Crud::delete();
    include('include/head&header.php');
?>

        <h2 class="userTitle">Supprimer un utilisateur</h2>

        <div class="deletetab">
            <div class="deleteTxt">
                <p>Voulez-vous vraiment supprimer <?php echo $email ?> ?</p>
            </div>
            <form class="deleteForm" action="supprimer.php?email=<?php echo $email ?>" method="post">
                <input class="deleteBtn" type="submit" name="deleteInput" value="Supprimer">
            </form>
        </div>

        <a class="retourAccueil" href="admin.php">Accueil administrateur</a>

<?php include('include/footer.php'); ?>