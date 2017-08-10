<?php 

    require_once 'baza/db_proba.php';

    $db1 = new DB();
    $checked = false;
    $partialName = '';
    if (isset($_POST['Pagination_check']) && $_POST['Pagination_check'] == 'on') {
        $checked = true;
    }
    if (isset($_POST['Pagination_partialName'])) {
        $partialName = $_POST['Pagination_partialName'];
    }
    
    $ukupnoIhIma = 0;
    $res = $db1->CountFromRealestateCheckbox($checked, $partialName);
     while ($new = $res->fetch(PDO::FETCH_ASSOC)) {
         $ukupnoIhIma = $new['broj'];
     }
     
    $limit = 10;
    $offset = 0;
    $first = 0;
    $last = (INT)($ukupnoIhIma / $limit);
    
    if ($ukupnoIhIma > ($last * $limit) && $last != 0) {
        $last += 1;
    }
    
    $page = 0;
    $next = 0;
    $previous = 0;
    
    if (isset($_POST['Pagination_page'])) {
        $page = $_POST['Pagination_page'];
        $offset = $limit * $page;
              
        $previous = $page - 1;
        $next = $page + 1;
    }
     
    $res = $db1->SelectFromRealestateCheckbox($limit, $offset, $checked, $partialName);
    
require_once 'view.php';