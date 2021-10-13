<?php
session_start();
    if($_SESSION['role']!=="admin"){
        header('Location: logout.php');
    }

    require_once 'functionDatabase.php';
    require_once 'functionArticle.php';
    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        Article::addarticle();
    }

    $bdd = Database::connect();
    $list = $bdd ->query('SELECT * FROM user ORDER BY role ASC');
    $userList = $list->fetchAll();

    $stmt = $bdd->query('SELECT * FROM category WHERE idSubCatOf != 0');
    $cat = $stmt->fetchAll();
// echo '<pre>';
// var_dump($cat);
// echo '</pre>';
?>
   <?php include('include/head&header.php'); ?>
<br><br><br><br><br>
<form action="" method="post">
    <label>*Type:</label>
    <select id="cats" name="addCat">
        <option value="none"></option>
        <option value="11">Ameublement</option>
        <option value="15">Animalerie</option>
        <option value="9">Beauté et bien-être</option>
        <option value="1">Bijoux</option>
        <option value="8">Boisson</option>
        <option value="16">Décoration</option>
        <option value="4">Épicerie</option>
        <option value="14">Jardinerie</option>
        <option value="6">Jeu et jouet</option>
        <option value="12">Puériculture et bébé</option>
        <option value="2">Livre</option>
        <option value="3">Mode</option>
        <option value="7">Musique et Art</option>
        <option value="10">Sport et loisir</option>
        <option value="5">Technologie</option>
    </select>

    <select name="subcat" id="subcats"></select>
    <script src="./assets/js/app.js"></script>
    <input type="submit">
</form>


<?php
    $cat = $_POST['addCat'];
    $subcat = $_POST['subcat'];
    $aCat = [$cat,$subcat];
    $allCat = implode(',', $aCat);
    $arrayEx = explode(",",$allCat);



    echo 'ma caté: ' . $cat . '<br> ma sous caté: ' . $subcat . '<br>les 2 dans un tableau:' . $aCat . '<br>fonction implode:' . $allCat . "<br>la fonction explode:" . $arrayEx;

?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




