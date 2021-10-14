<?php
    session_start();

    require_once 'functionDatabase.php';
    $bdd = Database::connect();

    $stmt = $bdd->prepare('SELECT * FROM cart INNER JOIN article WHERE cart.idUser=? AND cart.idArticle = article.id');
    $stmt->execute([$_SESSION['id']]);
    $artCart = $stmt->fetchAll();

    $total = (int)$artCart['prix'] * (int)$artCart['quantity'];

    include('include/head&header.php');
    // echo '<pre>';
    // var_dump($artCart);
    // echo '</pre>';

    //$price = number_format($article['prix'], 2,',','');
?>
<main>
    <h2>Mon panier</h2>
    <section class="gridCart">
        <?php 
            foreach($artCart as $artCart){
                echo' 
                <div>' . $artCart['nom'] . '</div>
                <div><img src="assets/uploads/' . $artCart['photo'] . '" alt=""></div>
                <div>' . $artCart['quantity'] . '</div>
                <div>' . $artCart['prix'] . $total . '</div>';
            }
        ?>
        
    </section>
</main>



<?php include('include/footer.php');