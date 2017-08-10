<link href="/realestate/css/lista.css" rel="stylesheet" type="text/css"/>
<script type='text/javascript' src='/realestate/js/main.js'></script>

    <script type="text/javascript">
            function searchMe() {
                var partialName = jQuery("#partialName").val(), 
                    checked = jQuery("#check")[0].checked;
            
                jQuery.post("/realestate/search.php", {Pagination_partialName: partialName, Pagination_check: checked}, function (data) {
                    if (data.length > 0) {
                        jQuery("#all_data").hide();
                        jQuery("#results").html(data);
                    } else {
                        jQuery("#results").html('');
                       jQuery("#all_data").show();
                    }
				
                });
            }
            
            function getChecked(){
                jQuery("#formPagination").submit();
                return true;
            }
            
            function paginate(obj){
                jQuery("#page").val(obj);
                jQuery("#formPagination").submit();
                return true;
            }
    </script>

     <?php
   // require_once "info.php";
    
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
    
//    if ($last == 0) {
//        $last = 1;
//    }
    
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
    } else {
        if ($last > 1) {
            $next = $page + 1;
        }
    }
//    $offset = ((int)($ukupnoIhIma / $limit)) * $limit;
     
    $res = $db1->SelectFromRealestateCheckbox($limit, $offset, $checked, $partialName);
 ?>
        <form id="formPagination" name="formPagination" method="POST" action="">
            
         <table  border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr >
              <td>
              <input <?php if ($checked) echo 'checked' ?> type="checkbox" id="check" name="Pagination_check"
                    onChange="getChecked(this)">Prikazati i obradjene<br /><br />
            <label>Search: </label>
            <input type="text" value="<?php echo $partialName?>" id="partialName" name="Pagination_partialName"
                   style="max-width:170px;min-height:33px;" onkeyUp="searchMe()" /><br /><br />
            <input type="hidden" id="page" name="Pagination_page" value="0"> 
              </td>
            </tr>
           <tr >
               <td id="results">
<?php
    require_once 'view.php';
?>
               </td>
            </tr>
         </table>
        </form>
