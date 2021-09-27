<?php
session_start();

require_once 'functionDatabase.php';
    Database::connect();

$article = Database::$bdd->prepare('SELECT * FROM article');
$article->execute();
$resultA = $article->fetchAll();


$topCat = Database::$bdd->prepare('SELECT * FROM category ORDER BY visitCounter DESC LIMIT 0,4');
$topCat->execute();
$resultTopCat = $topCat->fetchAll();
// echo '<pre>';
// var_dump($resultTopCat);
// echo '</pre>';
?>

<?php include('head&header.php'); ?>
        
    <h2 class="titre_boutique">LA BOUTIQUE</h2>
    <main class="shop">          
        <!--<aside class="sidebar">
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
            <li>lorem</li>
        </aside>-->
        <section class="produits">
            <div class="nav-content">
                <div class="mostVisitedCat">
                    <h3>Catégories les plus visitées</h3>
                    <div>
                        <a href="category.php?id=<?php echo $resultTopCat[0][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[0][2] ?>" alt="<?php echo $resultTopCat[0][1] ?>"></a>
                        <a href="category.php?id=<?php echo $resultTopCat[1][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[1][2] ?>" alt="<?php echo $resultTopCat[1][1] ?>"></a>
                        <a href="category.php?id=<?php echo $resultTopCat[2][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[2][2] ?>" alt="<?php echo $resultTopCat[2][1] ?>"></a>
                        <a href="category.php?id=<?php echo $resultTopCat[3][0] ?>"><img src="assets/picture/imgCat/<?php echo $resultTopCat[3][2] ?>" alt="<?php echo $resultTopCat[3][1] ?>"></a>
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
            
            <?php
            foreach($resultA as $article){
                echo '
                <div class="card">
                    <div class="haut">
                        <img src="assets/uploads/' .  $article['photo'] . '" alt="' . $article['nom'] . '">
                    </div>
                    <div class="bas">';
                        if(strlen($article['nom'])>20){
                            $article['nom'] = substr( $article['nom'],0,20);
                        
                        echo '<h3>' . $article['nom'] . '...</h3>';
                        }
                        else{
                            echo '<h3>' . $article['nom'] . '</h3>';
                        }

                        if(strlen($article['description'])>85){
                            $article['description'] = substr( $article['description'],0,85);
                        echo '<p>' . $article['description'] . '... <a href="article.php?id=' . $article['id'] .'"> voir plus</a> </p>';
                        }

                        echo '<div class="detail">
                            <div>
                                <p style="color:rgb(194, 4, 4);font-weight:bolder;">' . $article['prix'] . ' €</p>';
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
    <?php include('footer.php'); ?>


