<?php

require_once 'baza/db_proba.php';
$db1 = new DB();
$statement = $db1->SelectFromCatastralMunicipality( $_GET['idOpstine'] );

$data = [];
          
while ($row = $statement->fetch(PDO::FETCH_ASSOC) ) {
    $data[] = array('id' => $row['id_catastral'], 'naziv' => $row['community']);
}

header('Content-Type: application/json');
echo json_encode($data);