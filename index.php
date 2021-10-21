<?php
session_start();

require_once 'functionDatabase.php';
    $bdd = Database::connect();

$stmt = $bdd->prepare('SELECT * FROM article');
$stmt->execute();
$articles = $stmt->fetchAll();

$brand = $bdd->prepare('SELECT * FROM article WHERE marque=\'Doriane\'');
$brand->execute();
$brandA = $brand->fetchAll();

$topC = $bdd->prepare('SELECT * FROM category ORDER BY visitCounter DESC LIMIT 0,6');
$topC->execute();
$topCats = $topC->fetchAll();

$p = $bdd->prepare('SELECT article.id AS idArticle, article.nom, article.photo, article.prix, article.idPromo, promotion.id, promotion.percentage FROM article INNER JOIN promotion WHERE article.idPromo = promotion.id AND article.idPromo IS NOT NULL ORDER BY `idPromo` DESC LIMIT 0,10');
$p->execute();
$promotions = $p->fetchAll();

echo '<pre>';
var_dump($promotions);
echo '</pre>';
?>

<?php include('include/head&header.php'); ?>

    <main class="shop">
        <figure class="promo">
            <img src="assets/picture/pub.jpg" alt="">
        </figure>    
        <section class="indFirst">
            <h3>Catégories les plus visitées</h3>
            <div>
                <?php foreach($topCats as $topCat){
                    echo '<a href="category.php?id=' . $topCat['id'] . '"><img src="assets/picture/imgCat/' . $topCat['imgCat'] . '" alt="' . $topCat['catName'] . '"></a>';
                }?>
            </div>
        </section>



        <section class="highLighted">
            <div>
                <p>Reprenez ou vous en étiez</p>
            </div>
            <div>
                <p>Toutes les promotions</p>
                <div class="sliderI1">
                    <?php
                    foreach($promotions as $promotion){

                        $Ppromo = $promotion['percentage']*$promotion['prix']/100;
                        $fPrice = $promotion['prix']-$Ppromo;

                        $promotion['prix'] = number_format($promotion['prix'], 2,',','');
                        $fPrice = number_format($fPrice, 2,',','');

                    echo '<a class="card4" href="article.php?id=' . $promotion['idArticle'] . '">
                            <img src="assets/uploads/' . $promotion['photo'] . '" alt="' . $promotion['nom'] . '">';
                            if(strlen($promotion['nom'])>15){
                                $promotion['nom'] = substr( $promotion['nom'],0,15);
                                echo '<p>' . $promotion['nom'] . '...</p>';
                            }
                            else{
                                echo '<p>' . $promotion['nom'] . '</p>';
                            }
                        echo'<div>
                                <p>' . $promotion['prix'] . ' €</p>
                                <p>' . $fPrice . ' €</p>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
                <a href="#">voir plus...</a>
            </div>
        </section>


        <section class="highLighted2">
            <div>
                <p>Reprenez ou vous en étiez</p>
            </div>
            <div>
                <p>Toutes les promotions</p>
            </div>
        </section>



        <section class="PFbrand">
            <h3>Découvrez les produits de la marque Doriane</h3>
            <div class = "sliderI2">
                <?php include('include/SScard.php') ?>
            </div>
        </section>
        
        <section class="loop">
            <?php include('include/BScard.php') ?>
        </section>
    </main>
    <?php include('include/sliderLink.php'); ?>
    <?php include('include/footer.php'); ?>



   <?php if(strlen($promotion['nom'])>15){
                            $promotion['nom'] = substr( $promotion['nom'],0,15);
                            echo '<p>' . $promotion['nom'] . '...</p>';
                        }
                        else{
                            echo '<p>' . $promotion['nom'] . '</p>';
                        }