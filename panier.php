<?php
    session_start();

    require_once 'functionDatabase.php';
    $bdd = Database::connect();

    $stmt = $bdd->prepare('SELECT * FROM cart INNER JOIN article WHERE cart.idUser=? AND cart.idArticle = article.id');
    $stmt->execute([$_SESSION['id']]);
    $articles = $stmt->fetchAll();

    //final total calculation
    $t = $bdd->prepare('SELECT SUM(article.prix * cart.quantity) FROM cart INNER JOIN article WHERE cart.idUser=? AND cart.idArticle = article.id');
    $t->execute([$_SESSION['id']]);
    $total = $t->fetch();

    include('include/head&header.php');
    // echo '<pre>';
    // var_dump($total);
    // echo '</pre>';
?>
<main>
    <h3>Détails de votre panier:</h3>
    <section class="cart">
        
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
                        <img src="assets/uploads/' . $article['photo'] . '" alt="">
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
            <input type="submit" name="delArtB" value="Supprimer les articles sélectionnés">
        </form>
            <p>Total: <?php echo $total[0] ?> €</p>

    </section>
</main>
<?php include('include/footer.php'); ?>