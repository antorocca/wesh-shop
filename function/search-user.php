<?php
    session_start();

    require_once '../functionDatabase.php';

    $bdd = Database::connect();

    if(isset($_GET['user'])){
        $user = trim($_GET['user']);

        $req = $bdd ->prepare('SELECT * FROM user WHERE name LIKE :n OR firstname LIKE :n OR id LIKE :n LIMIT 10');
        $req-> execute(['n' => "$user%"]);
        $req = $req->fetchAll();
    
        // var_dump($req);
        foreach($req as $r){ 
        ?>
        <a class="userResult" href="modifier.php?email=<?=urlencode($r['email'])?>">
            <?= $r['name'] . ' ' . $r['firstname'] ?>
        </a>    
        <?php
        }

    }
    ?>