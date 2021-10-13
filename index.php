<?php
session_start();

require_once 'functionDatabase.php';
    Database::connect();

$stmt = Database::$bdd->prepare('SELECT * FROM article');
$stmt->execute();
$articles = $stmt->fetchAll();

$brand = Database::$bdd->prepare('SELECT * FROM article WHERE marque=\'Doriane\'');
$brand->execute();
$brandA = $brand->fetchAll();

$topCat = Database::$bdd->prepare('SELECT * FROM category ORDER BY visitCounter DESC LIMIT 0,4');
$topCat->execute();
$resultTopCat = $topCat->fetchAll();
// echo '<pre>';
// var_dump($resultTopCat);
// echo '</pre>';
?>

<?php include('include/head&header.php'); ?>
        
    <h2 class="titre_boutique">LA BOUTIQUE</h2>
    <main class="shop">          
        <section class="produits">
            <div class="nav-content">
                <div class="mostVisitedCat">
                    <h3>Catégories les plus visitées</h3>
                    <div>
                        <a href="category.php?id=<?php echo $resultTopCat[0][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[0][3] ?>" alt="<?php echo $resultTopCat[0][1] ?>"></a>
                        <a href="category.php?id=<?php echo $resultTopCat[1][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[1][3] ?>" alt="<?php echo $resultTopCat[1][1] ?>"></a>
                        <a href="category.php?id=<?php echo $resultTopCat[2][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[2][3] ?>" alt="<?php echo $resultTopCat[2][1] ?>"></a>
                        <a href="category.php?id=<?php echo $resultTopCat[3][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[3][3] ?>" alt="<?php echo $resultTopCat[3][1] ?>"></a>
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
            </div>
        </section>
        <article class="PFbrand">
            <h3>Découvrez les produits de la marque Doriane</h3>
            <div class = "sliderT2">
                <?php include('include/SScard.php') ?>
            </div>
        </article>
        <section class="loop">
            <?php include('include/BScard.php') ?>
        </section>
    </main>
    <?php include('include/sliderLink.php'); ?>
    <?php include('include/footer.php'); ?>