<?php
    session_start();

    require_once 'functionDatabase.php';
    $bdd = Database::connect();

    $stmt = $bdd->prepare('SELECT * FROM cart INNER JOIN article WHERE cart.idUser=? AND cart.idArticle = article.id');
    $stmt->execute([$_SESSION['id']]);
    $articles = $stmt->fetchAll();

    include('include/head&header.php');
    // echo '<pre>';
    // var_dump($articles);
    // echo '</pre>';

    //$price = number_format($article['prix'], 2,',','');
    
?>
<main>
    <h3>Détails de votre panier:</h3>
    <section class="cart">
        <?php 
            foreach($articles as $article){

                $price = $article['quantity']*$article['prix'];
                $price = number_format($price, 2,',','');

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
                        . $stock .
                        '
                    </div>
                    <div>
                        <p>Quantité: ' . $article['quantity'] . '</p>';
                        if($article['quantity'] == 1){
                            echo '<p>Unité: ' . $article['prix'] . ' €</p>';
                        }
                        elseif($article['quantity'] > 1){
                            echo '<p>Unité: ' . $article['prix'] . ' €</p>
                                <p>Total: ' . $price . ' €</p>';
                        }
                echo '</div>
                    <div>
                        <a href="">gdr</a>
                        <a href=""></a>
                    </div>
                </div>';
            }
        ?>
        <div>
            <p>Total: </p>
        </div>
    </section>
</main>

<?php include('include/footer.php'); ?>