<?php
    session_start();

    require_once 'functionDatabase.php';
    Database::connect();

    include('head&header.php');
?>

<?php include('assets/regionSVG/Ile-de-France.svg.html'); ?>


<?php include('footer.php');