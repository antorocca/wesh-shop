<?php
    session_start();

    require_once 'functionDatabase.php';
    $bdd = Database::connect();

    $stmt = $bdd->prepare('SELECT * FROM cart INNER JOIN article WHERE cart.idUser=? AND cart.idArticle = article.id');
    $stmt->execute([$_SESSION['id']]);
    $articles = $stmt->fetchAll();

    $nbA = $bdd->prepare('SELECT COUNT(idArticle) FROM cart WHERE idUser=?');
    $nbA->execute([$_SESSION['id']]);
    $nbArt= $nbA->fetch();

    //final total calculation
    $t = $bdd->prepare('SELECT SUM(article.prix * cart.quantity) FROM cart INNER JOIN article WHERE cart.idUser=? AND cart.idArticle = article.id');
    $t->execute([$_SESSION['id']]);
    $total = $t->fetch();

    $total = number_format($total[0], 2,',','');

    include('include/head&header.php');
    // echo '<pre>';
    // var_dump($nbArt);
    // echo '</pre>';
?>
<main>
    <section class="sctnCaPa">
        <section class="cart">
            <h3>Détails de votre panier:</h3>
            
            <?php 
                foreach($articles as $article){

                    $price = $article['quantity']*$article['prix'];
                    $price = number_format($price, 2,',','');
                    $article['prix'] = number_format($article['prix'], 2,',','');

                    if($article['stock']> 0){
                        $stock = '<p style="color:green;">En stock</p>';
                    }
                    else{
                        $stock = '<p style="color:red;">stock épuisé</p>';
                    }
                    echo'
                    <div>
                        <div>
                            <img src="assets/uploads/' . $article['photo'] . '" alt="' . $article['nom'] . '">
                        </div>
                        <div>
                            <p>' . $article['nom'] . '</p>
                            <p>Marque: ' . $article['marque'] . '</p>'
                            . $stock .'
                        </div>
                        <div>
                            <p>Quantité: <span class="cartSpan">' . $article['quantity'] . '</span></p>';
                            if($article['quantity'] == 1){
                                echo '<p>Unité: <span class="cartSpan">' . $article['prix'] . ' €</span></p>';
                            }
                            elseif($article['quantity'] > 1){
                                echo '<p>Unité: <span class="cartSpan">' . $article['prix'] . ' €</span></p>
                                    <p>Total: <span class="cartSpan">' . $price . ' €</span></p>';
                            }
                    echo '</div>
                        <div>
                        <form method="post" action="delArtCart.php">
                            <input type="checkbox" name="delArt[]" value="' . $article["id"] . '">
                        </div>
                    </div>';
                }
            ?>
            <!-- end of formulary start before the loop-->
            <p class="delbtn"><input type="submit" name="delArtB" value="supprimer les articles sélectionnés"></p>
            </form>
        </section>
        <section class="payment">
            <p><span>Total <?=$nbArt[0]?> article(s):</span><span><?php echo $total ?> €</span></p>
            <a href="#">Passer ma commande</a>
        </section>
    </section>
</main>
<?php include('include/footer.php'); ?>