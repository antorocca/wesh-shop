<?php
    header("Content-Type: application/json");

    require_once '../functionDatabase.php';

    $bdd = Database::connect();
    $stmt = $bdd->query('SELECT * FROM category WHERE idSubCatOf = 0');
    $cat = $stmt->fetchAll();

    echo json_encode($cat);
?>