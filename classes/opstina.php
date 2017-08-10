<?php
class Opstina{
	public $id;
	public $name;
	
	function __construct($pId, $pName){
		$this->id = $pId;
		$this->name = $pName;
	}
	
	function setId($pId){
		$this->id = $pId;
	}
	
	function setName($pName){
		$this->name = $pName;
	}
	
	function getName(){
		return $this->name;
	}
	
	function getId(){
		return $this->id;
	}
	
	function createOption(){
		return '<option value="'. $this->id .'">'. $this->name .'</option>\n';
	}
	
	function SelectFromOpstina($name){
		try {
				$statement = $this->conn->prepare("SELECT * FROM opstina WHERE id_opstina = ? AND name = ?");
				$statement->bindParam(1, $name);
				$statement->execute();
				
				return $statement;
			}
			catch(PDOException $e) {
				echo $e->getMessage();
			}
	}
}

//$db1 = new Opstina(1, 'Novi Sad'); 
//$db1 = new Opstina($dbID, $DBName);
//$db1->createOption();