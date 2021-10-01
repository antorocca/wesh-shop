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

    $a = Database::$bdd->prepare('SELECT * FROM article WHERE idCat=? LIMIT 0,20');
    $a->execute([$detCat['id']]);
    $articles = $a->fetchAll();

    include('head&header.php');
?>
<main>
    <h2 class="titre_boutique"><?php echo $detCat[1] ?></h2>
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

    <h3>Produits les plus recherchés :</h3>
    <section class="slider">
        <?php
            foreach($articles as $article){
                // $v = var_export($article);
                $price = number_format($article['prix'], 2,',','');
                echo '
                    <div class="img-div">
                        <div class="top">
                            <img src="assets/uploads/' .  $article['photo'] . '" alt="' . $article['nom'] . '">
                        </div>
                        <div class="bottom">';
                            if(strlen($article['nom'])>20){
                                $article['nom'] = substr( $article['nom'],0,20);
                            
                                echo '<h3 style="margin:2px 0px;">' . $article['nom'] . '...</h3>';
                            }
                            else{
                                echo '<h3 style="margin:2px 0px;">' . $article['nom'] . '</h3>';
                            }
                            
                            echo '<p style="margin:2px 0px;">' . $article['marque'] . '</p>
                                <div class="detail">
                                <div>
                                    <p style="color:rgb(194, 4, 4);font-weight:bolder;">' . $price . ' €</p>';
                                    if($article['stock']>0){
                                        echo '<p style="color:green;">En stock</p>';       
                                    }
                                    else{
                                        echo '<p style="color:red;">Stock épuisé</p>';
                                    }
                                    echo'
                                </div>
                                    <div class="btnDetail">
                                        <a class="detailLink" href="article.php?id=' . $article['id'] .'">Détails</a>
                                    </div>
                                
                            </div>
                        </div>
                    </div>';
            }
        ?>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.0.0.js"></script>
<script src="https://code.jquery.com/jquery-migrate-3.3.2.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="assets/js/slider.js"></script>
<?php include('footer.php'); ?>
