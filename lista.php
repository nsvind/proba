<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html" />
        <meta charset="UTF-8" />
        <title>Demystifying Email Design</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style>

            .hide {
                display: none;
            }
            .only table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            .only td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            .only tr:nth-child(even) {
                background-color: #dddddd;
            }
            p {
                line-height: 1.5em;
                margin: 0px 0px 10px 0px;
            }
        </style>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
        <script type="text/javascript">
            function search(value) {
                $.post("search.php", {partialName: value}, function (data) {
                    if (data.length > 10) {
                        $("#all_data").hide();
                        $("#results").html(data);
                    } else {
                        $("#all_data").show();
                    }

                });
            }
        </script>
    </head>
    <body style="margin: 0; padding: 0;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                        <tr>
                            <td align="center" bgcolor="#70bbd9" style="padding: 40px 0 30px 0;">
                             <!--<img src="images/h1.gif" alt="Creating Email Magic" width="300" height="230" style="display: block;" />-->
                                <?php
                                require_once 'inc/header_only.html';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <?php
                                    require_once 'admin.php';
                                    require_once 'baza/db_proba.php';

                                    $db1 = new DB();
                                    ?>

                                    <td class="only" bgcolor="#ffffff" style="padding: 40px 30px 40px 30px;">
                                        <table id="all_data" class="only"><tr class="only">
                                                <?php
                                                $res = $db1->SelectFromPonudaLimit(30);

//$res = $conn->query("SELECT id_ponuda, email, location FROM ponuda LIMIT 20");
                                                if (!empty($email) and ! empty($pass)) {
                                                    ?>

                                                    <th class="only">RB.</th>
                                                    <th class="only">Email</th>
                                                    <th class="only">Location</th>
                                                    <th class="only"></th>


                                                    <label>Search: </label>
                                                    <input type="text" name="search" onkeyUp="search(this.value)" />

                                                </tr>
                                                <?php
                                                while ($new = $res->fetch(PDO::FETCH_ASSOC)) {
                                                    echo "<tr class='only'>";
                                                    echo "<td class='only'>" . $new['id_ponuda'] . "</td>";
                                                    echo "<td class='only'>" . $new['email'] . "</td>";
                                                    echo "<td class='only'>" . $new['location'] . "</td>";
                                                    echo "<td class='only'><a href='detaljnije.php?id=" . $new['id_ponuda'] . "'>Detaljnije</a></td>";
                                                }
                                            } else {
                                                echo "<p>Ulogujte se!<p>"; //die("Ulogujte se!");
                                            }
                                            ?>	

                                            </tr></table></td>

                            </td>
                        </tr>

                        <tr>
                            <!-- ovde ide inicijalna tabela -->
                        </tr>

                        <tr>
                            <td>
                                <p id="results"></p>
                            </td>
                        </tr>
                    </table>   
                </td>
            </tr>

            <tr>
                <td bgcolor="#ee4c50" style="padding: 30px 30px 30px 30px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <td width="75%">
                            &reg; Someone, somewhere 2016<br/>
                            Unsubscribe to this newsletter instantly
                        </td>
                        <td align="right">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <a href="http://www.twitter.com/">
                                            <img src="images/tw.png" alt="Twitter" width="38" height="38" style="display: block;" border="0" />
                                        </a>
                                    </td>
                                    <td style="font-size: 0; line-height: 0;" width="20">&nbsp;</td>
                                    <td>
                                        <a href="http://www.facebook.com/">
                                            <img src="images/fb.jpg" alt="Facebook" width="38" height="38" style="display: block;" border="0" />
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </table>
                </td>
            </tr>
        </table>
        </table>

    </body>
</html>
<?php
session_destroy();
?>