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
<div class="userTable">
    <a class="createUser" href="create.php">Créer un nouvel utilisateur</a>
    <div class="usertab">
        <?php
        foreach($userList as $user){
            echo '<div class="ligne">
                    <div class="email">' . $user['email'] . '</div>
                    <div class="role">' . $user['role'] . '</div>
                    <a class="modifyUser" href="modifier.php?email='. urlencode($user['email']) . '">Voir/Modifier</a>
                    <a class="deleteUser" href="supprimer.php?email='. urlencode($user['email']) .'">Supprimer</a>';
                    if($user['role'] == 'ban'){
                        echo '<a class="banUser" href="bannir.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) .'">Débannir</a>
                </div>';
                    }
                    else{
                    echo '<a class="banUser" href="bannir.php?email='. urlencode($user['email']) . '&amp;role=' . urlencode($user['role']) .'">Bannir</a>
                </div>';
            }
        } ?>
    </div>
</div>

<div class="userSearch">
    <h3>Rechercher un utilisateur (Nom, prénom ou id) : </h3>
    <input class="inputSearch" id="searchU" type="text" value="" placeholder=" Rechercher un utilisateur">
    <div id="result-searchU"></div>
</div>

<a class="goShop" href="index.php">Aller dans la boutique</a>

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
                <label>Promotion:</label>
                <select name="promo">
                    <option value="none"></option>
                    <option value="1">10%</option>
                    <option value="2">20%</option>
                    <option value="3">30%</option>
                    <option value="4">40%</option>
                    <option value="5">50%</option>
                    <option value="6">60%</option>
                    <option value="7">70%</option>
                    <option value="8">80%</option>
                    <option value="9">90%</option>
                </select>
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

<div class="articleSearch">
    <h3>Rechercher un article (id, nom, marque, catégorie ou stock) : </h3>
    <input class="inputSearchA" id="searchA" type="text" value="" placeholder=" Rechercher un article">
    <div id="result-searchA"></div>
</div>

<!--user search script-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#searchU').keyup(function(){
            $('#result-searchU').html("");

            let utilisateur = $(this).val();

            if(utilisateur != ""){
                $.ajax({
                    type: 'GET',
                    url: 'function/search-user.php',
                    data: 'user=' + encodeURIComponent(utilisateur),
                    success: function(data){
                        if(data != ""){
                            $('#result-searchU').append(data);
                        }else{
                            document.getElementById('result-searchU').innerHTML = '<div class="userResult">Aucun utilisateurs</div>'
                        }
                    }
                })
                console.log(utilisateur);
            }
        });
    });
</script>
<?php include('include/link.php'); ?>
<?php include('include/footer.php'); ?>




