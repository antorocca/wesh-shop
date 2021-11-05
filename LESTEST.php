<?php
session_start();
    if($_SESSION['role']!=="admin"){
        header('Location: logout.php');
    }

    require_once 'functionDatabase.php';
    require_once 'functionArticle.php';

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


<?php include('include/footer.php'); ?>



<div class="userSearch">
    <h3>Rechercher un utilisateur (Nom, prénom ou id) : </h3>
    <input class="inputSearch" id="searchU" type="text" value="" placeholder=" Rechercher un utilisateur">
    <div id="result-searchU"></div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
// function search(){
    $(document).ready(function(){
        $('#searchU').keyup(function(){
            $('#result-searchU').html("");

            let utilisateur = $(this).val();

            console.log($(this).val());

            if(utilisateur != ""){
                $.ajax({
                    type: 'GET',
                    url: 'function/search-user.php',
                    data: 'article=' + encodeURIComponent(utilisateur),
                    success: function(data){
                        if(data != ""){
                            $('#result-searchU').append(data);
                        }else{
                            document.getElementById('result-searchU').innerHTML = '<div class="userResult">Aucun utilisateurs</div>'
                        }
                    }
                })
            }
        });
    });

</script>

#searchU    #result-searchU*3  user