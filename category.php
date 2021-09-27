<?php
    session_start();
    require_once 'functionDatabase.php';

    $idCat = $_GET['id'];

    if ($_SESSION['role'] != 'admin'){

        Database::connect();
        $cat = Database::$bdd->prepare('UPDATE category SET visitCounter=visitCounter+1 WHERE id=?');
        $cat->execute([$idCat]);
    }

    include('head&header.php');
?>
<main>
    <h2>Catégorie <?php echo $idCat ?></h2>
    <section class="nav-content">
        <div class="mostVisitedCat">
            <h3>Produits en vedettes</h3>
            <div>
                <a href="#"><img src="sans titre2.png" alt=""></a>
                <a href="#"><img src="sans titre2.png" alt=""></a>
                <a href="#"><img src="sans titre2.png" alt=""></a>
                <a href="#"><img src="sans titre2.png" alt=""></a>
            </div>
        </div>
        <?php include('assets/regionSVG/france-liens-region-departement-svg.html');?>
        <div class="topSell">
            <h3>Top vendeur de la semaine</h3>
            <div>
                <a href="#"><img src="sans titre2.png" alt=""></a>
                <a href="#"><img src="sans titre2.png" alt=""></a>
                <a href="#"><img src="sans titre2.png" alt=""></a>
                <a href="#"><img src="sans titre2.png" alt=""></a>
            </div>
        </div>
    </section>
</main>



<?php include('footer.php'); ?>
