<?php

class cart{

	private $aContents;

	public function __construct(){
		$this->aContents = array();
	}

	public function addProduct($iProductID){
		
		if(isset($this->aContents[$iProductID]) == false){
			$this->aContents[$iProductID] = 1;
		}else{
			$this->aContents[$iProductID] += 1;
		}
	}

	public function removeProduct($iProductID){
		$this->aContents[$iProductID] -= 1;
		if($this->aContents[$iProductID] == 0){
			unset($this->aContents[$iProductID]);
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