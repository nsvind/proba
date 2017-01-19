<?php
class Tip_nepo{
	public $id;
        public $nepo;

    function __construct($pId, $pNepo){
		$this->id = $pId;
		$this->nepo = $pNepo;
	}
	
	function setId($pId){
		$this->id = $pId;
	}
	
	function setNepo($pNepo){
		$this->nepo = $pNepo;
	}
	
	function getId(){
		return $this->id;
	}
	
	function getNepo(){
		return $this->nepo;
	}
	
	function createOption(){
		return '<option value="'. $this->id .'">'. $this->nepo .'</option>\n';
	}
        
        
}
?>