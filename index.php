<?php
session_start();

require_once 'functionDatabase.php';
$bdd = Database::connect();

/*for the loop at the end*/
$stmt = $bdd->prepare('SELECT * FROM article WHERE RAND() LIMIT 0,35');
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
$p = $bdd->prepare('SELECT article.id AS idArticle, article.nom, article.photo, article.prix, article.idPromo, article.stock, promotion.id, promotion.percentage FROM article INNER JOIN promotion WHERE article.idPromo = promotion.id AND article.idPromo IS NOT NULL ORDER BY `idPromo` DESC LIMIT 0,10');
$p->execute();
$promotions = $p->fetchAll();

/*for christmas section*/
$n = $bdd->prepare('SELECT * FROM article WHERE idCat > 599 AND idCat < 700');
$n->execute();
$christmasD = $n->fetchAll();

/* for the doriane brand*/
$brand = $bdd->prepare('SELECT * FROM article WHERE marque=\'Doriane\'');
$brand->execute();
$brandA = $brand->fetchAll();

/*LVP method*/
$lvp = json_decode($_COOKIE['lastViewedProducts']);
$count=count(json_decode($_COOKIE['lastViewedProducts']));
$countLVP = $count - 1;
$dateDiff='';

//get info of last viewed article
if(isset($_COOKIE['lastViewedProducts'])){
    $ls = $bdd->prepare('SELECT id, nom,photo,prix FROM article WHERE id=?');
    $ls->execute([$lvp[$countLVP]->id]);
    $lastSeen = $ls->fetch();
}
//get all the info of LVP cookie
if(isset($_COOKIE['lastViewedProducts'])){
    $arr = json_decode($_COOKIE['lastViewedProducts'], true);
    $mapped = array_map(function ($elem) {
        return $elem['id'];
    }, $arr);
    $filtered = array_values(array_unique($mapped));

    $implodeArr = implode(', ', array_fill(0, count($filtered), '?'));
    $stmt = $bdd->prepare("SELECT id, nom, photo, prix, marque, stock FROM article WHERE id IN($implodeArr)");
    $stmt->execute($filtered);
    $lvpArticles = $stmt->fetchAll();
    // var_dump($stmt);
}   

if(isset($_COOKIE['lastViewedProducts'])){
    if(time() - $lvp[$countLVP]->date < 3600){
        $dateDiff = 'il y a moins d\' 1 heures';
    }
    elseif(time() - $lvp[$countLVP]->date < 21600){
        $dateDiff = 'il y a moins de 6 heures';
    }
    elseif(time() - $lvp[$countLVP]->date < 43200){
        $dateDiff = 'il y a moins de 12 heures';
    }
    elseif(time() - $lvp[$countLVP]->date < 86400){
        $dateDiff = 'il y a moins de 24 heures';
    }
    elseif(time() - $lvp[$countLVP]->date < 172800){
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
                if(isset($_COOKIE['lastViewedProducts'])){

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
                        // card4
                    echo '<a class="card4" href="article.php?id=' . $promotion['idArticle'] . '">
                            <img src="assets/uploads/' . $promotion['photo'] . '" alt="' . $promotion['nom'] . '">';
                            if(strlen($promotion['nom'])>20){
                                $promotion['nom'] = substr( $promotion['nom'],0,18);
                                echo '<p>' . $promotion['nom'] . '...</p>';
                            }
                            else{
                                echo '<p>' . $promotion['nom'] . '</p>';
                            }
                        echo'<p><span>' . $promotion['prix'] . ' €</span> ' . ' <i class="fas fa-arrow-right"></i> ' . ' ' . $fPrice . ' €</p>';
                        if($promotion['stock']> 1){
                            echo '<p style="color:green;">' . $promotion['stock'] . ' en stock</p>';
                        }
                        else{
                            echo'<p style="color:red;">Stock épuisé</p>';
                        }
                        echo '</a>';
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
                            <div>';
                                if($christmas['stock']> 1){
                                    echo '<p class="christmasStock" style="color:green;">' . $christmas['stock'] . ' en stock</p>';
                                }
                                else{
                                    echo'<p class="christmasStock" style="color:red;">Stock épuisé</p>';
                                }
                                echo '<p class="christmasPrice">' . $christmas['prix'] . ' €</p>
                            </div>
                        </a>';
                    }
                    ?>
                </div>
            </div>
            <div>
                <h3>Article le plus consulté hier</h3>
                <?php
                    $topArt['prix'] = number_format((float) $topArt['prix'], 2,'.',',');

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

        <section class="adSection">
            <article class="promo-ad">
                <img src="assets/picture/publicite3.jpg" alt="">
                <img src="assets/picture/publicite5.png" alt="">
                <img src="assets/picture/publicite6.png" alt="">
            </article>
        </section>

        <section class="PFbrand">
            <h3>Découvrez les produits de la marque Doriane</h3>
            <div class = "sliderI2">
                <?php include('include/SScard.php') ?>
            </div>
        </section>

        <section class="lvp">
            <h3>Articles précédemment consultés</h3>
            <article class="sliderI4">
                    <?php
                    foreach($lvpArticles as $lvpArticle){
                        echo '<a class="card5" href="article.php?id=' . $lvpArticle['id'] . '">
                                <img src="assets/uploads/' . $lvpArticle['photo'] . '" alt="' . $lvpArticle['nom'] . '">';
                                if(strlen($lvpArticle['nom'])>20){
                                    $lvpArticle['nom'] = substr( $lvpArticle['nom'],0,18);
                                    echo '<p>' . $lvpArticle['nom'] . '...</p>';
                                }
                                else{
                                    echo '<p>' . $lvpArticle['nom'] . '</p>';
                                }
                            echo '<p>' . $lvpArticle['marque'] . '</p>
                                <div>';
                                    if($lvpArticle['stock']> 1){
                                        echo '<p class="stockLvp" style="color:green;">' . $lvpArticle['stock'] . ' en stock</p>';
                                    }
                                    else{
                                        echo'<p class="stockLvp" style="color:red;">Stock épuisé</p>';
                                    }
                                    echo '<p class="priceLvp">' . $lvpArticle['prix'] . ' €</p>
                                </div>
                            </a>';
                    }
                    ?>
            </article>
        </section>

        <section class="loop">
            <h3>Produits en vrac</h3>
            <?php include('include/BScard.php') ?>
        </section>
    </main>
    <?php include('include/sliderLink.php'); ?>
    <?php include('include/footer.php'); ?>