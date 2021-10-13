<?php
    foreach($articles as $article){
        // $v = var_export($article);
        $price = number_format($article['prix'], 2,',','');
        echo '<div class="cardBS">
                <div class="topCard">
                    <img src="assets/uploads/' .  $article['photo'] . '" alt="' . $article['nom'] . '">
                </div>
                <div class="bottomCard">';
                    if(strlen($article['nom'])>20){
                        $article['nom'] = substr( $article['nom'],0,20);
                    
                        echo '<h3 style="margin:2px 0px;">' . $article['nom'] . '...</h3>';
                    }
                    else{
                        echo '<h3 style="margin:2px 0px;">' . $article['nom'] . '</h3>';
                    }
                    
                    echo '<p style="margin:2px 0px;">' . $article['marque'] . '</p>
                        <div class="detail">
                            <div>
                                <p style="color:rgb(194, 4, 4);font-weight:bolder;">' . $price . ' €</p>';
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