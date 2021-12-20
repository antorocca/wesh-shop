<?php
    session_start();

    require_once '../functionDatabase.php';

    $bdd = Database::connect();

    if(isset($_GET['user'])){
        $user = strip_tags(trim($_GET['user']));

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


    if(isset($_GET['article'])){
        $article = strip_tags(trim($_GET['article']));
        $type = strip_tags(trim($_GET['type']));
        $col = '';

        switch($type){
            case 'nom':
                $col = $type;
                break;
            case 'marque':
                $col = $type;
                break;
            case 'id':
                $col = $type;
                break;
            case 'stock':
                $col = $type;
                break;
        }
        if($_GET['type'] == 'stock' || $_GET['type'] == 'id'){
            $stmt = $bdd ->prepare("SELECT * FROM article WHERE $col LIKE :n");
            $stmt-> execute(['n' => "$article"]);
            $stmt = $stmt->fetchAll();
        }
        else{
            $stmt = $bdd ->prepare("SELECT * FROM article WHERE $col LIKE :n");
            $stmt-> execute(['n' => "$article%"]);
            $stmt = $stmt->fetchAll();
        }
        
        // var_dump($req);
        foreach($stmt as $s){ 
        ?>
        <a class="articleResult" href="article.php?id=<?=urlencode($s['id'])?>">
            <?= $s['id'] . ': ' . $s['nom'] . ' / ' . $s['marque'] . ' / ' . $s['stock'] . ' en stock' ?>
        </a>    
        <?php
        }
    }
    ?>