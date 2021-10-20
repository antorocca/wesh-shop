<?php
    session_start();
    require_once 'functionDatabase.php';

    $idCat = $_GET['id'];

    if ($_SESSION['role'] != 'admin'){
        Database::connect();
        $cat = Database::$bdd->prepare('UPDATE category SET visitCounter=visitCounter+1 WHERE id=?');
        $cat->execute([$idCat]);
    }

    Database::connect();
    $searchCat = Database::$bdd->prepare('SELECT * FROM category WHERE id=?');
    $searchCat->execute([$idCat]);
    $detCat = $searchCat->fetch();

    $a = Database::$bdd->prepare('SELECT * FROM article WHERE idCat >= ? *100 AND idCat < ? *100 + 100 LIMIT 0,20');
    $a->execute([$detCat['id'],$detCat['id']]);
    $articles = $a->fetchAll();

    include('include/head&header.php');
?>
<main>
    <h2 class="shopTitle"><?php echo $detCat[2] ?></h2>
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

    <section class="mWa">
        <h3>Produits les plus recherchés :</h3>
        <div class="sliderC3">
            <?php include('include/card3.php') ?>
        </div>
    </section>
    <section>
        <div class="subCinC"></div>
    </section>
</main>
<?php include('include/sliderLink.php'); ?>
<?php include('include/footer.php'); ?>
