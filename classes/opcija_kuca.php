<?php
class Opcija_kuca{
	public $id;
	public $optionK;
	
	function __construct($pId, $pOptionK){
		$this->id = $pId;
		$this->optionK = $pOptionK;
	}
	
	function setId($pId){
		$this->id = $pId;
	}
	
	function setName($pOptionK){
		$this->optionK = $pOptionK;
	}
	
	function getName(){
		return $this->optionK;
	}
	
	function getId(){
		return $this->id;
	}
	
	function createOption(){
		return '<option value="'. $this->id .'">'. $this->optionK .'</option>\n';
	}

}

