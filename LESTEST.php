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






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="assets/js/search.js"></script>
<!-- 
$(document).ready(function(){

$('#typeSearch').change(function(){

    let type = $(this).val();
    console.log(type)
    if(type) {
            $.ajax({
                type: 'GET',
                url: 'function/search-user.php',
                data: 'type=' + encodeURIComponent(type)
                });
        }
    <script>
    $('#searchU').keyup(function(){
        $('#result-searchU').html("");

        let utilisateur = $(this).val();
        let type = document.getElementById('typeSearch');

        console.log(type);
        if(utilisateur != "") {
            $.ajax({
                type: 'GET',
                url: 'function/search-user.php',
                data: 'article=' + encodeURIComponent(utilisateur) + '&type=' + encodeURIComponent(type.value),
                success: function(data){
                    if(data != ""){
                        $('#result-searchU').append(data);
                    }else{
                        document.getElementById('result-searchU').innerHTML = '<div class="userResult">Aucun utilisateurs</div>'
                    }
                }
            })
        }
    });//here
</script> -->