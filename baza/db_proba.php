<?php

class DB {

    private $conn;
    private $dbhost = "localhost";
    private $dbname = "procena_nepokretnosti";
    private $dbusername = "root";
    private $dbpassword = "";

    public function __construct() {
        $this->conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, 
                $this->dbusername, $this->dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public function getLastRealestateID() {
        return $this->conn->lastInsertId();
    }
/*   
     public function getLastAdminID() {
        return $this->conn->lastInsertId();
    }
    
    public function getLastTypeID() {
        return $this->conn->lastInsertId();
    }
    
    public function getLastMunicipalityID() {
        return $this->conn->lastInsertId();
    }
    
     public function getLastCatastralID() { 
        return $this->conn->lastInsertId();
    }*/
    
    function InsertIntoRealestate($email_client, $quadrature, $comment_client, 
                                 $ip, $typeID, $municipalityID, $catastralID, $optionID, $classID) {

        try {
            $statement = $this->conn->prepare("INSERT INTO realestate 
                (`email_client`, `quadrature`, `comment_client`, `ip`, 
                `id_type`, `id_municipality`, `id_catastral`, `id_option`, 
                `id_class`)
				VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $email_client);
            $statement->bindParam(2, $quadrature);
            $statement->bindParam(3, $comment_client);
            $statement->bindParam(4, $ip);
            $statement->bindParam(5, $typeID, PDO::PARAM_INT);
            $statement->bindParam(6, $municipalityID, PDO::PARAM_INT);
            $statement->bindParam(7, $catastralID, PDO::PARAM_INT);
            $statement->bindParam(8, $optionID, PDO::PARAM_INT);
            $statement->bindParam(9, $classID, PDO::PARAM_INT);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function InsertIntoComments($realestateID, $adminID, $comment_admin, $price) {
        try {
            $statement = $this->conn->prepare("INSERT INTO comments (`id_realestate`, `id_admin`,
                                                `comment_admin`, `price`)
				VALUES( ?, ?, ?, ?)");
            $statement->bindParam(1, $realestateID, PDO::PARAM_INT);
            $statement->bindParam(2, $adminID, PDO::PARAM_INT);
            $statement->bindParam(3, $comment_admin);
            $statement->bindParam(4, $price);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function InsertIntoImages($content, $image_name, $image_type, $image_size, $realestateID) {
        try {
            $statement = $this->conn->prepare("INSERT INTO images 
                (`image_data`, `image_name`, `image_type`, `image_size`, `id_realestate`)
				VALUES ( ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $content);
            $statement->bindParam(2, $image_name);
            $statement->bindParam(3, $image_type);
            $statement->bindParam(4, $image_size);
            $statement->bindParam(5, $realestateID, PDO::PARAM_INT);

            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function InsertIntoAdmin($first_name, $last_name, $email_admin, $password) {

        try {
            $statement = $this->conn->prepare("INSERT INTO admin (`first_name`, `last_name`, `email_admin`, `password`)
				VALUES( ?, ?, ?, ?)");
            $statement->bindParam(1, $first_name);
            $statement->bindParam(2, $last_name);
            $statement->bindParam(3, $email_admin);
            $statement->bindParam(4, $password);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromAdmin($email_admin, $password) {
        try {
            $statement = $this->conn->prepare("SELECT * FROM admin WHERE `email_admin` = ? AND `password` = ?");
            $statement->bindParam(1, $email_admin);
            $statement->bindParam(2, $password);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromRealestate($email) {

        $var = '%' . $email . '%';

        try {
            $statement = $this->conn->prepare("SELECT r.id_realestate, r.email_client, m.name AS m_name, c.community 
                    FROM realestate AS r
                    left join municipality AS m on m.id_municipality = r.id_municipality
                    left join catastral_municipality AS c on m.id_municipality = c.id_catastral
                    WHERE `email_client` LIKE ? OR `name` LIKE ? OR `community` LIKE ?");
            $statement->bindParam(1, $var);
            $statement->bindParam(2, $var);
            $statement->bindParam(3, $var);
            $statement->execute();
            //$names = $conn->fetchAll();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromRealestateLimit($limit = 20, $checked) {
        
        try {
            $sql = "SELECT r.id_realestate, r.email_client, m.name AS m_name, c.community 
                        FROM realestate AS r
                        left join municipality AS m on m.id_municipality = r.id_municipality
                        left join catastral_municipality AS c on c.id_catastral = r.id_catastral                    
                        LIMIT ?";
            if (!$checked) {
                $sql .= " where co.id_realestate is not null";
            }
            
            $statement = $this->conn->prepare($sql);
            $statement->bindParam(1, $limit, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /* napraviti
    function SelectFromRealestatePagination($limit, $offset, $checkbox) {
        
        try {
            $statement = $this->conn->prepare("SELECT r.id_realestate, r.email_client, m.name AS m_name, c.community 
                        FROM realestate AS r
                        left join municipality AS m on m.id_municipality = r.id_municipality
                        left join catastral_municipality AS c on c.id_catastral = r.id_catastral                    
                        LIMIT ?");
            $statement->bindParam(1, $limit, PDO::PARAM_INT);
            $statement->bindParam(2, $offset, PDO::PARAM_INT);
            $statement->bindParam(3, $checkbox);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }*/
    
    function countFromRealestateCheckbox($checked, $partialName = '') {
         $var = '%' . $partialName . '%';
        
        try {
            $sql = "SELECT count(*) as broj
                        FROM realestate AS r
                        left join municipality AS m on m.id_municipality = r.id_municipality
                        left join catastral_municipality AS c on c.id_catastral = r.id_catastral      
                        left join comments as co on r.id_realestate = co.id_realestate
                       ";
            if ($checked) {
                $sql .= " where co.id_realestate is not null";
            } else {
                $sql .= " where co.id_realestate is null";
            }
            
            if ($partialName != '') {
                if (!$checked) {
                    $sql .= " where ";
                } else {
                    $sql .= " and ";
                }
                $sql .= " (r.email_client LIKE ? OR m.name LIKE ? OR c.community LIKE ?)";
            }
            
            $statement = $this->conn->prepare($sql);
            
            if ($partialName != '') {
                $statement->bindParam(1, $var, PDO::PARAM_INT);
                $statement->bindParam(2, $var, PDO::PARAM_INT);
                $statement->bindParam(3, $var, PDO::PARAM_INT);
            } 
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromRealestateCheckbox($limit = 20, $offset= 0, $checked, $partialName = '') {
        
        $var = '%' . $partialName . '%';
        
        try {
            $sql = "SELECT r.id_realestate, r.email_client, m.name AS m_name, c.community 
                        FROM realestate AS r
                        left join municipality AS m on m.id_municipality = r.id_municipality
                        left join catastral_municipality AS c on c.id_catastral = r.id_catastral      
                        left join comments as co on r.id_realestate = co.id_realestate
                       ";
            if ($checked) {
                $sql .= " where co.id_realestate is not null";
            } else {
                $sql .= " where co.id_realestate is null";
            }
            
            if ($partialName != '') {
                if (!$checked) {
                    $sql .= " where ";
                } else {
                    $sql .= " and ";
                }
                $sql .= " (r.email_client LIKE ? OR m.name LIKE ? OR c.community LIKE ?)";
            }
            
            $sql .= " LIMIT ? OFFSET ?";
            
            $statement = $this->conn->prepare($sql);
            
            if ($partialName != '') {
                $statement->bindParam(1, $var, PDO::PARAM_INT);
                $statement->bindParam(2, $var, PDO::PARAM_INT);
                $statement->bindParam(3, $var, PDO::PARAM_INT);
                $statement->bindParam(4, $limit, PDO::PARAM_INT);
                $statement->bindParam(5, $offset, PDO::PARAM_INT);
            } else {
                $statement->bindParam(1, $limit, PDO::PARAM_INT);
                $statement->bindParam(2, $offset, PDO::PARAM_INT);
            }
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromImage($id){
        try {
            $statement = $this->conn->prepare("SELECT * FROM images WHERE `id_images` = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromImages($id) {
        try {
            $statement = $this->conn->prepare("SELECT * FROM images WHERE `id_realestate` = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectIDsFromImages($id) {
        try {
            $statement = $this->conn->prepare("SELECT `id_images`, `image_name` FROM images WHERE `id_realestate` = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromDetaljnije($id) {
        try {
            $statement = $this->conn->prepare("SELECT r.id_realestate, r.email_client, r.quadrature, r.comment_client,
                            m.name
                            AS m_name, c.community, tof.name AS tof_name, o.option AS o_name, cl.class AS cl_name
                            FROM realestate AS r
                            left join municipality AS m on m.id_municipality = r.id_municipality
                            left join catastral_municipality AS c on c.id_catastral = m.id_municipality
                            left join type_of_realestate AS tof on tof.id_type = r.id_type
                            left join `option` AS o on o.id_option = r.id_option
                            left join `class` AS cl on cl.id_class = r.id_class
                            WHERE r.id_realestate = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function SelectFromMunicipality() {
        try {
            $statement = $this->conn->prepare("SELECT * FROM municipality ORDER BY name");
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
    function SelectFromCatastralMunicipality($id) {
  
        try {
            $statement = $this->conn->prepare("SELECT * FROM catastral_municipality WHERE id_municipality = ? ORDER BY community ");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromType() {
        try {
            $statement = $this->conn->prepare("SELECT * FROM type_of_realestate");
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromOption($id){
        try {
            $statement = $this->conn->prepare("SELECT * FROM `option` WHERE `id_type` = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function SelectFromClass($id){
        try {
            $statement = $this->conn->prepare("SELECT * FROM `class` WHERE `id_type` = ?");
            $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    function getDataForEmail($id){
         try {
             $statement = $this->conn->prepare("SELECT c.*, r.email_client, m.name AS m_name, t.name AS t_name,
                        o.option, cl.class
                        from comments AS c 
                        left join realestate AS r on c.id_realestate = r.id_realestate
                        left join municipality AS m on m.id_municipality = r.id_municipality
                        left join type_of_realestate AS t on t.id_type = r.id_type
                        left join `option` AS o on o.id_option = r.id_option
                        left join `class` AS cl on cl.id_class = r.id_class
                        WHERE c.id_realestate = ?");
             $statement->bindParam(1, $id, PDO::PARAM_INT);
            $statement->execute();
             
         return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    /*
      function email_exists($email){
        try {
            $statement = $pdo->prepare('SELECT id FROM admin WHERE email_admin = ?');
            $statement->bindParam(1, $email_admin);
            $statement->execute();
            if($statement->rowCount() > 0){
                return true;
            }else{
                return false;
            }
      } catch(PDOException $e) {
            echo $e->getMessage();
      } */
}