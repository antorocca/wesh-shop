<?php
session_start();

require_once 'functionDatabase.php';
Database::connect();

$select = Database::$bdd->prepare('SELECT * FROM article');
$select->execute();

$resultat = $select->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Document</title>
    </head>
    <body>
        <?php include('head&header.php'); ?>
        
        <h2 class="titre_boutique">LA BOUTIQUE</h2>
        <main class="shop">          
            <aside class="sidebar">
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
                <li>lorem</li>
            </aside>
            <section class="produits">

                <?php
                foreach($resultat as $article){
                    echo '
                    <div class="card">
                        <div class="haut">
                            <img src="assets/picture/' .  $article['photo'] . '" alt="">
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
        <br>
        <?php include('footer.php'); ?>


