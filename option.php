<?php
require_once 'baza/db_proba.php';
$db1 = new DB();

$data = [];

if ($_GET['vrstaId'] > 1) {
    
    $statement = $db1->SelectFromOption( $_GET['vrstaId'] );
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC) ) {
        $data[] = array('id' => $row['id_option'], 'naziv' => $row['option']);
    }
}


header('Content-Type: application/json');
echo json_encode($data);