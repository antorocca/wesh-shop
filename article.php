<?php
    session_start();

    require_once 'functionDatabase.php';
    $bdd = Database::connect();

    $articleId = $_GET['id'];

    $articleDesc = $bdd-> prepare('SELECT * FROM article WHERE id = ?');
    $articleDesc-> execute([$articleId]);
    $article = $articleDesc->fetch();

    $similar = $bdd-> prepare('SELECT * FROM article WHERE idCat = ?');
    $similar-> execute([$article[7]]);
    $similarArticle = $similar->fetchAll();

    $price = number_format($article['prix'], 2,',','');

    include('include/head&header.php');
?>
<div class="allArticle">
    <div class='imgArticle'>
        <img src="assets/uploads/<?php echo $article[3] ?>" alt="<?php echo $article[1] ?>">
    </div>
    <div class="detailArticle">
        <h2><?php echo $article[1] ?></h2>
        <p class="articleBrand"><?php echo $article[6] ?></p>
        <p class="articlePrize">Prix: <span><?php echo $price ?> €</span></p>
        <p class="articleDesc"><?php echo $article[2] ?></p>
            <?php 
                if($article['stock'] >= 50){ ?>
                    <p style="color:green;font-weight:bolder;">En stock</p>
                        <form class="formPanier" action="addArtToCart.php?id=<?=$article[0]?>" method="post">
                            <label>Quantité:</label> 
                            <select id="quantity" name="quantity"></select>
                            <input type="submit" name="submitPanier" value="Ajouter au panier">
                        </form>
                <?php }
                elseif($article['stock'] < 50 && $article['stock'] > 0){ ?>
                    <p style="color:green;font-weight:bolder;"><?=$article['stock']?> en stock</p>
                    <form class="formPanier" action="addArtToCart.php?id=<?=$article[0]?>" method="post">
                        <label for="quantity">Quantité: </label>
                        <select id="quantity" name="quantity"></select>
                        <input type="submit" name="submitPanier" value="Ajouter au panier">
                    </form>
                <?php }
                else{
                    echo '<p style="color:red;font-weight:bolder;">Stock épuisé</p>';
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




<!-- if($article['stock'] == 0){
                echo '<p class="addCartSuccess"><i class="fas fa-times"></i> Article ajouté au panier</p>'             
            } -->