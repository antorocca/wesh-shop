<?php
session_start();

require_once 'functionDatabase.php';
$bdd = Database::connect();

/*for the loop at the end*/
$stmt = $bdd->prepare('SELECT * FROM article');
$stmt->execute();
$articles = $stmt->fetchAll();

/*top categories*/
$topC = $bdd->prepare('SELECT * FROM category ORDER BY visitCounter DESC LIMIT 0,6');
$topC->execute();
$topCats = $topC->fetchAll();

/*top article*/
$topA = $bdd->prepare('SELECT * FROM article ORDER BY viewCount DESC LIMIT 0,1');
$topA ->execute();
$topArt = $topA->fetch();

/*for the promotion slider*/
$p = $bdd->prepare('SELECT article.id AS idArticle, article.nom, article.photo, article.prix, article.idPromo, promotion.id, promotion.percentage FROM article INNER JOIN promotion WHERE article.idPromo = promotion.id AND article.idPromo IS NOT NULL ORDER BY `idPromo` DESC LIMIT 0,10');
$p->execute();
$promotions = $p->fetchAll();

/*for christmas section*/
$n = $bdd->prepare('SELECT * FROM article WHERE idCat > 599 AND idCat < 700');
$n->execute();
$christmasD = $n->fetchAll();

/* for last viewed product*/
if(isset($_COOKIE['lastViewedProduct'])){
    $ls = $bdd->prepare('SELECT id, nom,photo,prix FROM article WHERE id=?');
    $ls->execute([$_COOKIE['lastViewedProduct']]);
    $lastSeen = $ls->fetch();
}

/* for the doriane brand*/
$brand = $bdd->prepare('SELECT * FROM article WHERE marque=\'Doriane\'');
$brand->execute();
$brandA = $brand->fetchAll();



/*LVP method*/
$dateDiff='';
if(isset($_COOKIE['dateLVP'])){
    if(time() - $_COOKIE['dateLVP'] < 3600){
        $dateDiff = 'il y a moins d\' 1 heures';
    }
    elseif(time() - $_COOKIE['dateLVP'] < 21600){
        $dateDiff = 'il y a moins de 6 heures';
    }
    elseif(time() - $_COOKIE['dateLVP'] < 43200){
        $dateDiff = 'il y a moins de 12 heures';
    }
    elseif(time() - $_COOKIE['dateLVP'] < 86400){
        $dateDiff = 'il y a moins de 24 heures';
    }
    elseif(time() - $_COOKIE['dateLVP']<172800){
        $dateDiff = 'hier';
    }
    else{
        $dateDiff = 'le' . date('d/m/y');
    }
}
?>

<?php include('include/head&header.php'); ?>

    <main class="shop">
        <figure class="promo">
            <img src="assets/picture/pub.jpg" alt="pub">
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
                <?php
                if(isset($_COOKIE['lastViewedProduct'])){

                    $lastSeen['prix'] = number_format($lastSeen['prix'], 2,',','');

                echo '<h3>Reprenez où vous en étiez</h3>
                    <a href="article.php?id=' . $lastSeen['id']. '">
                        <img src="assets/uploads/' . $lastSeen['photo'] . '" alt="' . $lastSeen['nom'] . '">
                        <p>' . $lastSeen['nom'] . '</p></a>
                        <div>
                            <p>Consulté ' . $dateDiff . '</p>
                            <p>' . $lastSeen['prix'] . ' €</p>
                        </div>';
                }
                else{
                    $topArt['prix'] = number_format($topArt['prix'], 2,',','');

                    echo '<h3>Article le plus consulté hier</h3>
                        <a href="article.php?id=' . $topArt['id'] . '">
                            <img src="assets/uploads/' . $topArt['photo'] . '" alt="">
                            <p>' . $topArt['nom'] . '</p>
                        </a>
                        <div>
                            <p>Consulté ' . $topArt['viewCount'] . ' fois</p>
                            <p>' . $topArt['prix'] . ' €</p>
                        </div>';
                }  
                ?>
            </div>
            <div>
                <div class="sliderI1">
                    <?php
                    foreach($promotions as $promotion){

                        $Ppromo = $promotion['percentage']*$promotion['prix']/100;
                        $fPrice = $promotion['prix']-$Ppromo;

                        $promotion['prix'] = number_format($promotion['prix'], 2,',','');
                        $fPrice = number_format($fPrice, 2,',','');

                    echo '<a class="card4" href="article.php?id=' . $promotion['idArticle'] . '">
                            <img src="assets/uploads/' . $promotion['photo'] . '" alt="' . $promotion['nom'] . '">';
                            if(strlen($promotion['nom'])>20){
                                $promotion['nom'] = substr( $promotion['nom'],0,18);
                                echo '<p>' . $promotion['nom'] . '...</p>';
                            }
                            else{
                                echo '<p>' . $promotion['nom'] . '</p>';
                            }
                        echo'<p><span>' . $promotion['prix'] . ' €</span> ' . ' <i class="fas fa-arrow-right"></i> ' . ' ' . $fPrice . ' €</p>
                        </a>';
                    }
                    ?>
                </div>
                <a href="#">Voir toutes les promotions</a>
            </div>
        </section>

        <section class="highLighted2">
            <div>
                <h3>C'est bientot noël ! Des offres pour ravir les plus petits</h3>
                <div class="sliderI3">
                <?php
                    foreach($christmasD as $christmas){

                        $christmas['prix'] = number_format($christmas['prix'], 2,',','');

                    echo '<a class="card5" href="article.php?id=' . $christmas['id'] . '">
                            <img src="assets/uploads/' . $christmas['photo'] . '" alt="' . $christmas['nom'] . '">';
                            if(strlen($christmas['nom'])>20){
                                $christmas['nom'] = substr( $christmas['nom'],0,18);
                                echo '<p>' . $christmas['nom'] . '...</p>';
                            }
                            else{
                                echo '<p>' . $christmas['nom'] . '</p>';
                            }
                        echo '<p>' . $christmas['marque'] . '</p>
                            <p>' . $christmas['prix'] . ' €</p>
                        </a>';
                    }
                    ?>
                </div>
            </div>
            <div>
                <h3>Article le plus consulté hier</h3>
                <?php
                    $topArt['prix'] = number_format($topArt['prix'], 2,',','');

                    echo '<a href="article.php?id=' . $topArt['id'] . '">
                            <img src="assets/uploads/' . $topArt['photo'] . '" alt="">
                            <p>' . $topArt['nom'] . '</p>
                        </a>
                        <div>
                            <p>Consulté ' . $topArt['viewCount'] . ' fois</p>
                            <p>' . $topArt['prix'] . ' €</p>
                        </div>';
                ?>
            </div>
        </section>
        
        <article class="promo-ad">
            <img src="assets/picture/publicite3.jpg" alt="">
            <img src="assets/picture/publicite5.png" alt="">
            <img src="assets/picture/publicite6.png" alt="">
        </article>

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