<?php
    foreach($brandA as $brandA){
        // $v = var_export($brandA);
        $price = number_format($brandA['prix'], 2,',','');
        echo '<a class="cardLink" href="article.php?id=' . $brandA['id'] .'">
                <div class="cardSS">
                    <div class="topCard">
                        <img src="assets/uploads/' .  $brandA['photo'] . '" alt="' . $brandA['nom'] . '">
                    </div>
                    <div class="bottomCardSS">';
                        if(strlen($brandA['nom'])>20){
                            $brandA['nom'] = substr( $brandA['nom'],0,20);
                            echo '<h3 style="margin:2px 0px;">' . $brandA['nom'] . '...</h3>';
                        }
                        else{
                            echo '<h3 style="margin:2px 0px;">' . $brandA['nom'] . '</h3>';
                        }
                        echo '
                            <div class="detail">
                                <p style="color:rgb(194, 4, 4);font-weight:bolder;">' . $price . ' €</p>
                            </div>
                    </div>
                </div>
            </a>';
    }
?>