<?php
    session_start();

    if(empty($_SESSION || !isset($_SESSION['email']))){
        header('Location: logout.php');
    }

    require_once 'functionDatabase.php';
    Database::connect();

    $articleId = $_GET['id'];

    $articleDesc = Database::$bdd-> prepare('SELECT * FROM article WHERE id = ?');
    $articleDesc-> execute([$articleId]);
    $article = $articleDesc->fetch();

    $similar = Database::$bdd-> prepare('SELECT * FROM article WHERE type = ?');
    $similar-> execute([$article[7]]);
    $similarArticle = $similar->fetchAll();

    include('head&header.php'); 

?>

<div class="allArticle">
    <div class='imgArticle'>
        <img src="assets/uploads/<?php echo $article[3] ?>" alt="<?php echo $article[1] ?>">
    </div>
    <div class="descArticle">
        <h2><?php echo $article[1] ?></h2>
        <p class="articleBrand"><?php echo $article[6] ?></p>
        <p class="articlePrize">Prix: <span><?php echo $article[4] ?> €</span></p>
        <p class="articleDesc"><?php echo $article[2] ?></p>
            <?php 
                if($article[5] > 0){
                echo '<p style="color:green;font-weight:bolder;">En stock</p>';
                }
                else{
                    echo '<p style="color:red;font-weight:bolder;">Stock épuisé</p>';
                } ?>
        <div>
            <form class="formPanier" action="panier.php" method="post">
                Quantité: <select id="quantity" name="quantity"></select>
                <input type="submit" name="submitPanier" value="Ajouter au panier">
            </form>
        </div>
    </div>
</div>
<hr>
<h3>Articles similaire à <?php echo $article[1]; ?></h3>
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
<hr>
<br>
<?php include('footer.php'); ?>


<script>
    var select, i, option;

    select = document.getElementById('quantity');

    for ( i = 0; i <= 30; i += 1 ) {
        option = document.createElement('option');
        option.value = option.text = i;
        select.add( option );
    }
</script>