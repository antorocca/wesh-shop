<?php
    require_once '../functionDatabase.php';

    header("Content-Type: application/json");

    $catId = $_GET['cat'];

    $bdd = Database::connect();
    $stmt = $bdd->query('SELECT * FROM category WHERE idSubCatOf =' . $catId);
    $cat = $stmt->fetchAll();

    echo json_encode($cat);
?>