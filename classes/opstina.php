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

}

//$db1 = new Opstina(1, 'Novi Sad'); 
//$db1 = new Opstina($dbID, $DBName);
//$db1->createOption();