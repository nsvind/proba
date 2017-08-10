<?php

class Opcija_zemlja{
	public $id;
	public $optionZ;
	
	function __construct($pId, $pOptionZ){
		$this->id = $pId;
		$this->optionZ = $pOptionZ;
	}
	
	function setId($pId){
		$this->id = $pId;
	}
	
	function setName($pOptionZ){
		$this->optionZ = $pOptionZ;
	}
	
	function getName(){
		return $this->optionZ;
	}
	
	function getId(){
		return $this->id;
	}
	
	function createOption(){
		return '<option value="'. $this->id .'">'. $this->optionZ .'</option>\n';
	}

}

