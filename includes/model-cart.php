<?php

class cart{

	private $aContents;

	public function __construct(){
		$this->aContents = array();
	}

	public function addProduct($iProductid){
		
		if(isset($this->aContents[$iProductid]) == false){
			$this->aContents[$iProductid] = 1;
		}else{
			$this->aContents[$iProductid] += 1;
		}
	}

	public function removeProduct($iProductid){
		$this->aContents[$iProductid] -= 1;
		if($this->aContents[$iProductid] == 0){
			unset($this->aContents[$iProductid]);
		}
	}

	//add getter

	public function __get($var){
			switch ($var) {
				case 	"Contents":			return $this->aContents;	break;
			}
		}


}

//Test---

// $oCart = new Cart();
// $oCart->addProduct(2);
// $oCart->addProduct(3);
// $oCart->removeProduct(2);

// echo ("<pre>");
// print_r($oCart);
// echo ("</pre>");

?>