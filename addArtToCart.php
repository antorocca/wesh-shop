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

    $add = $bdd->prepare('INSERT INTO cart(idUser, idArticle, quantity) VALUES(?, ?, ?)');
    $add->execute([$_SESSION['id'],$article[0], $quantity]);

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
            if($article[5] > 0){
            echo '<p style="color:green;font-weight:bolder;">En stock</p>';
            }
            else{
                echo '<p style="color:red;font-weight:bolder;">Stock épuisé</p>';
            } 
        ?>
        <p class="addCartSuccess"><i class="fas fa-check"></i> Article ajouté au panier</p>
        <a href="panier.php">Accéder à mon panier</a>
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
