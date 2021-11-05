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

//strip_tags()
    if(isset($_GET['article'])){
        $article = trim($_GET['article']);

        $stmt = $bdd ->prepare('SELECT * FROM article WHERE nom LIKE :n% OR marque LIKE :n% OR id LIKE :n% OR stock LIKE :n LIMIT 10');
        $stmt-> execute(['n' => "$article"]);
        $stmt = $stmt->fetchAll();
    
        // var_dump($req);
        foreach($stmt as $s){ 
        ?>
        <a class="userResult" href="article.php?id=<?=urlencode($s['id'])?>">
            <?= $s['id'] . ': ' . $s['nom'] . ' / ' . $s['marque'] . ' / ' . $s['stock'] . ' en stock' ?>
        </a>    
        <?php
        }

    }
    ?>