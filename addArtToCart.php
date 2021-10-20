<?php
    session_start();

    require_once 'functionDatabase.php';
    $bdd = Database::connect();

    $articleId = $_GET['id'];
    $quantity = $_POST['quantity'];

    $articleDesc = $bdd-> prepare('SELECT * FROM article WHERE id = ?');
    $articleDesc-> execute([$articleId]);
    $article = $articleDesc->fetch();

    $similar = $bdd-> prepare('SELECT * FROM article WHERE idCat = ?');
    $similar-> execute([$article[7]]);
    $similarArticle = $similar->fetchAll();

    $price = number_format($article['prix'], 2,',','');

    // echo '<pre>';
    // var_dump($quantity);
    // var_dump($article['stock']);
    // echo '</pre>';

    include('include/head&header.php'); 
?>

<div class="allArticle">
    <div class='imgArticle'>
        <img src="assets/uploads/<?php echo $article['photo'] ?>" alt="<?php echo $article['nom'] ?>">
    </div>
    <div class="detailArticle">
        <h2><?php echo $article['nom'] ?></h2>
        <p class="articleBrand"><?php echo $article['marque'] ?></p>
        <p class="articlePrize">Prix: <span><?php echo $price ?> €</span></p>
        <p class="articleDesc"><?php echo $article['description'] ?></p>
        <?php 
            if($article['stock'] >= 50){
                echo '<p style="color:green;font-weight:bolder;">En stock</p>';
            }
            elseif($article['stock'] < 50 && $article['stock'] > 0){ 
                echo '<p style="color:green;font-weight:bolder;">Plus que ' . $article['stock'] . ' en stock !</p>';
            }
            else{
                echo '<p style="color:red;font-weight:bolder;">Stock épuisé</p>';
            }
            //if the quantity is too high
            if($article['stock'] < $quantity || $quantity < 1){ ?>
                <p class="stkNtG"><i class="fas fa-times"> Le stock n'est pas suffisant, veuillez choisir une quantité  correcte</i></p>
                <form class="formPanier" action="addArtToCart.php?id=<?=$article[0]?>" method="post">
                    <label for="quantity">Quantité:</label>
                    <select id="quantity" name="quantity"></select>
                    <input type="submit" name="submitPanier" value="Ajouter au panier">
                </form>
            <?php }
            //if it's good
            else{
                $add = $bdd->prepare('INSERT INTO cart(idUser, idArticle, quantity) VALUES(?, ?, ?)');
                $add->execute([$_SESSION['id'],$article['id'], $quantity]);

                echo '<p class="addCartSuccess"><i class="fas fa-check"></i> Article ajouté au panier</p>
                <a href="panier.php">Accéder à mon panier</a>';
            }
        ?>
    </div>
</div>

<h3 class="similarh3">Articles similaire à <?php echo $article[1]; ?></h3>
<div class="similarProduct">
    <?php
        foreach($similarArticle as $similar){

            echo '<a href="article.php?id=' . $similar['id'] .'">
            <div class="similar">
                <div class="similarTop">
                    <img src="assets/uploads/' .  $similar['photo'] . '" alt="">
                </div>
                <div class="similarBottom">
                    <h4>' . $similar['1'] . '</h4>
                    <p class="articleBrand">' . $similar['6'] . '</p>
                    <p class="articlePrize">' . $similar['4'] . ' €</p>
                </div>
            </div></a>';
        }
    ?>
</div>

<?php include('include/footer.php'); ?>

<script>
    const select = document.getElementById('quantity');

    for (let i = 1; i <= 30; i += 1 ) {
        let option = document.createElement('option');
        option.value = option.text = i;
        select.add(option);
    }
</script>