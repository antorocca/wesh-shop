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

<div class="testsearch">
    <input class="inputSearch" id="search1" type="text" value="" placeholder="rechercher">
</div>

<div style="margin-top:3vh;">
    <div id="result-search" style="text-align:center;"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#search1').keyup(function(){
            $('#result-search').html("");


            let utilisateur = $(this).val();

            if(utilisateur != ""){
                $.ajax({
                    type: 'GET',
                    url: 'function/search-user.php',
                    data: 'user=' + encodeURIComponent(utilisateur),
                    success: function(data){
                        if(data != ""){
                            $('#result-search').append(data);
                        }else{
                            document.getElementById('result-search').innerHTML = '<div style="fontsize:20px; text-align:center; margin-top:10px;">Aucun utilisateurs</div>'
                        }
                    }
                })
                console.log(utilisateur);
            }
        });
    });
</script>
<?php include('include/footer.php'); ?>