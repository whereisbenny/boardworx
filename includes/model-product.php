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
		$this->iPrice = 0;
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

	public function __get($var){

		switch ($var) {
			case "productid": return $this->iProductid; break;
			case "productname": return $this->sProductname; break;
			case "picturelink": return $this->sPicturelink; break;
			case "price":       return $this->fPrice; break;
			
			default: die($var . " Does Not Exist");
		}
	}

}

// $oProduct = new product();
// $oProduct->load(4);

// echo "<pre>";
// print_r($oProduct);
// echo "</pre>";




?>