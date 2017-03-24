<?php

require_once 'baza/db_proba.php';
$db1 = new DB();

$data = [];

if ($_GET['id'] > 2) {
    
    $statement = $db1->SelectFromClass( $_GET['id'] );
    
    while ($row = $statement->fetch(PDO::FETCH_ASSOC) ) {
        $data[] = array('id' => $row['id_class'], 'naziv' => $row['class']);
    }
}


header('Content-Type: application/json');
echo json_encode($data);