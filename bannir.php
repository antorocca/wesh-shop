<?php
session_start();
    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    $email = $_GET['email'];
    $role = $_GET['role'];

    require_once 'functionCrud.php';
    Crud::ban();

include('include/head&header.php');
?>
           
        </div>

        <h2 class="userTitle">Bannir un utilisateur</h2>

        <?php
            if($role == 'ban'){
                echo
                '<div class="bantab">
                    <div class="banTxt">
                        <p>Voulez-vous vraiment débannir ' . $email . ' ?</p>
                    </div>
                    <form class="banForm" action="bannir.php?email=' . $email . '&amp;role=' . $role .'" method="post">
                        <input class="banBtn" type="submit" name="banInput" value="Débannir">
                    </form>
                </div>';
            }
            else{
                echo
                '<div class="bantab">
                    <div class="banTxt">
                        <p>Voulez-vous vraiment bannir <?php echo $email ?> ?</p>
                    </div>
                    <form class="banForm" action="bannir.php?email=' . $email . '&amp;role=' . $role .'" method="post">
                        <input class="banBtn" type="submit" name="banInput" value="Bannir">
                    </form>
                </div>';
            }
        ?>
        <a class="retourAccueil" href="admin.php">Accueil administrateur</a>
        <?php include('include/footer.php'); ?>