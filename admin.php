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

    $catN = $bdd->query('SELECT catName FROM category');
    $catName = $catN->fetchAll();

?>
   <?php include('include/head&header.php'); ?>

<h2 class="userTitle">Page administrateur</h2>
<h3 class="userTitle">Liste des utilisateurs</h3>
<div class="test">
<a class="createUser" href="create.php"><div>Créer un nouvel utilisateur</div></a>
<div class="usertab">
    <?php
    foreach($userList as $user){
        echo '<div class="ligne">
                <div class="email">' . $user['email'] . '</div>
                <div class="role">' . $user['role'] . '</div>
                <a class="modifyUser" href="modifier.php?email='. urlencode($user['email']) . '"><div>Voir/Modifier</div></a>
                <a class="deleteUser" href="supprimer.php?email='. urlencode($user['email']) .'"><div>Supprimer</div></a>';
                if($user['role'] == 'ban'){
                    echo '<a class="banUser" href="bannir.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) .'"><div>Débannir</div></a>
            </div>';
                }
                else{
                echo '<a class="banUser" href="bannir.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) .'"><div>Bannir</div></a>
            </div>';
        }
    } ?>
</div></div>

<a class="goShop" href="index.php"><div>Aller dans la boutique</div></a>
<h3 class="addTitle">Ajouter un article</h3>
<div class="addTable">
    <div class="addArticle">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="addFormL">
                <label>*Nom:</label>
                    <input type="text" name="addName">
                <label>*Description:</label>
                    <textarea name="addDescription" id="" cols="30" rows="8"></textarea>
                <label>Ajouter une photo:</label>
                    <input type="file" name="addFile">
            </div>
            <div class="addFormR">
                <label>*Prix:</label>
                    <input type="text" name="addPrize">
                <label>*Stock:</label>
                    <input type="text" name="addStock">
                <label>Marque:</label>
                    <input type="text" name="addBrand">
                <label>*Catégorie:</label>
                <select id="cats" name="">
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
                <label>*Sous-Catégorie:</label>
                <select name="addCat" id="subcats"></select>
                <script src="./assets/js/app.js"></script>
            </div>
            <div class="addButton">
                <?php
                    if(Article::$addSuccess){
                        echo Article::$addSuccess;
                    }
                    elseif(Article::$addError)
                        echo Article::$addError; 
                ?>
                <input type="submit" value="Ajouter" name="addArticleSubmit">
                <p>Les champs marqués d'un (*) sont obligatoire.</p>
            </div>
        </form>
    </div>
</div>
<br>
<?php include('include/footer.php'); ?>


