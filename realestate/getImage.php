<?php

$id = $_GET['id'];
// do some validation here to ensure id is safe

require_once 'baza/db_proba.php';

$db1 = new DB;

$statement = $db1->SelectFromImage($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);

header("Content-type: ", $row['image_type']);
echo $row['image_data'];
