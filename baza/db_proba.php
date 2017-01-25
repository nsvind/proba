<?php

class DB {

    private $conn;
    private $dbhost = "localhost";
    private $dbname = "lokacije_proba";
    private $dbusername = "root";
    private $dbpassword = "";

    public function __construct() {
        $this->conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpassword, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    function InsertIntoPonuda($email, $nepokretnost, $opis, $location, $comment) {

        try {
            $statement = $this->conn->prepare("INSERT INTO ponuda(email, nepokretnost, opis, location, komentar)
				VALUES( ?, ?, ?, ?, ?)");
            $statement->bindParam(1, $email);
            $statement->bindParam(2, $nepokretnost);
            $statement->bindParam(3, $opis);
            $statement->bindParam(4, $location);
            $statement->bindParam(5, $comment);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function InsertIntoAdmin($first_name, $last_name, $email, $password) {

        try {
            $statement = $this->conn->prepare("INSERT INTO admin(first_name, last_name, email, password)
				VALUES( ?, ?, ?, ?)");
            $statement->bindParam(1, $first_name);
            $statement->bindParam(2, $last_name);
            $statement->bindParam(3, $email);
            $statement->bindParam(4, $password);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function SelectFromAdmin($email, $pass) {
        try {
            $statement = $this->conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
            $statement->bindParam(1, $email);
            $statement->bindParam(2, $pass);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function SelectFromPonuda($email) {

        $var = '%' . $email . '%';

        try {
            $statement = $this->conn->prepare("SELECT * FROM ponuda WHERE email LIKE ? OR location LIKE ?");
            $statement->bindParam(1, $var);
            $statement->bindParam(2, $var);
            $statement->execute();
            //$names = $conn->fetchAll();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function SelectFromPonudaLimit($limit = 20) {
        try {
            $statement = $this->conn->prepare("SELECT id_ponuda, email, location FROM ponuda LIMIT ?");
            $statement->bindParam(1, $limit);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function SelectFromDetaljnije($id) {
        try {
            $statement = $this->conn->prepare("SELECT * FROM ponuda WHERE id_ponuda = {$id}");
            $statement->bindParam(1, $id);
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function SelectFromTnepo() {
        try {
            $statement = $this->conn->prepare("SELECT * FROM tip_nepokretnosti");
            $statement->execute();

            return $statement;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    	
	function SelectFromOpstina(){
		try {
				$statement = $this->conn->prepare("SELECT * FROM opstina");
				$statement->execute();
				
				return $statement;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
	}
        
        function SelectFromKuca(){
		try {
				$statement = $this->conn->prepare("SELECT * FROM opcija_kuca");
				$statement->execute();
				
				return $statement;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
	}
        
        function SelectFromZemlja(){
		try {
				$statement = $this->conn->prepare("SELECT * FROM opcija_zemlja");
				$statement->execute();
				
				return $statement;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
	}
}
