<table class="only" id="all_data"  border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr class="only" >
                            <th class="only">RB.</th>
            <th class="only">E-mail</th>
            <th class="only">Opština</th>
            <th class="only">Grad</th>
            <th class="only"></th>

           </tr>
          <?php
          $count = 1 + $offset;
            while ($new = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr class='only'>";
                echo "<td class='only'>" . $count . "</td>";
                echo "<td class='only'>" . $new['email_client'] . "</td>";
                echo "<td class='only'>" . $new['m_name'] . "</td>";
                echo "<td class='only'>" . $new['community'] . "</td>";
                echo "<td class='only'><a href='http://www.datainvestment.rs/detaljnije/?id=" .
                        $new['id_realestate'] . "'>Detaljnije</a></tr>";
              $count++;
            }
          ?>	
<tr>
               <td colspan="5" style="text-align: center;">
                   <!-- >>> PAGINATOR <<< -->
                   
                   <a class='first' onclick="paginate(0);" href="#"> << </a>
                   <a class='first' onclick="paginate(<?php echo $previous ?>);" href="#"> < </a>
                   <?php
                    
                       for( $i = 0; $i < $last; $i++){ // SKINUO $last + 1
                        //   if($i == $first){
                           $style = "";
                           if($i == $page){
                                $style = 'style="color: red;"';
                            }
                            echo '<a '.$style.' onclick="paginate('.$i.');" href="#"> ' . ($i + 1) . ' </a>';
                            
                        //   }    //echo 'Ukupno ih ima: ' . $ukupnoIhIma . ' a offset je: ' .$offset. ' a to je strnica br: ' . ($offset+1) . ' <br/>';
                       }
           if($last > 0){
                   ?>
                   <a class='last' onclick="paginate(<?php echo $next ?>);" href="#"> > </a>
                   <a class='last' onclick="paginate(<?php echo $last - 1 ?>);" href="#"> >> </a>
                   <?php
           }
                        
                   
                        if($page == $first){
                            ?>
                                <style>
                                    .first {
                                        display: none;
                                    }
                                </style>
                            <?php
                        }else {
                            ?>
                                <style>
                                    .first {
                                        display: inline;
                                    }
                                </style>
                   <?php
                        }               
                   ?>
                    <?php
                   
                        if($page == ($last - 1)){
                            ?>
                                <style>
                                    .last {
                                        display: none;
                                    }
                                </style>
                    <?php
                        }else {
                    ?>
                                <style>
                                    .last {
                                        display: inline;
                                    }
                                </style>
                   <?php
                        }       
                    ?>         
               </td>
</tr>
</table>
