<?php

require_once("connection.php");

class product{

	private $iProductid;
	private $sProductname;
	private $fPrice;
	private $iTypeid;
	private $sPicturelink;

	public function __construct(){

		$this->iProductid = 0;
		$this->sProductname = "";
		$this->fPrice = 0;
		$this->iTypeid = 0;
		$this->sPicturelink = "";
	}

	public function load($iId) {

		// Make connection

		$oConnection = new connection;

		// Execute query

		$sSql = "SELECT productid, productname, price, typeid, picturelink
		FROM tbproduct
		WHERE productid = ".$iId;

		$oResult = $oConnection->query($sSql);

		// Extract data from resultset into array

		$aProduct = $oConnection->fetch_array($oResult);

		$this->iProductid = $aProduct['productid'];
		$this->sProductname = $aProduct['productname'];
		$this->fPrice = $aProduct['price'];
		$this->iTypeid = $aProduct['typeid'];
		$this->sPicturelink = $aProduct['picturelink'];

		// Close Connection

		$oConnection->close_connection();
	}



	public function save(){

		$oConnection = new Connection();

		$sSQL = "INSERT INTO tbproduct
		(productname, price, typeid, 
			picturelink)VALUES ('".$this->sProductname."',

		'".$this->fPrice."',
		'".$this->iTypeid."',
		'".$this->sPicturelink."')";

		$bResult = $oConnection->query($sSQL);
		//checks to see if customer exists
		if($bResult == true){
			$this->iProductid = $oConnection->get_insert_id();
		} else {
			die($sSQL . " fails");
		}

		$oConnection->close_connection();

}



public function __get($var){

	switch ($var) {
		case "productid": return $this->iProductid; break;
		case "productname": return $this->sProductname; break;
		case "picturelink": return $this->sPicturelink; break;
		case "price":       return $this->fPrice; break;

		default: die($var . " Does Not Exist");
	}
}


public function __set($var, $value){
	switch ($var) {
		case "productname":
		$this->sProductname = $value;
		break;
		case "price":
		$this->fPrice = $value;
		break;
		case "typeid":
		$this->iTypeid = $value;
		break;
		case "PhotoPath":
		$this->sPicturelink = $value;
		break;
		default:
		die($var . "Product could not be saved");
	}
}




}






// $oProduct = new product();
// $oProduct->load(4);

// echo "<pre>";
// print_r($oProduct);
// echo "</pre>";




?>