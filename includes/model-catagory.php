<?php

require_once("connection.php");
require_once("model-product.php");


class productTypes{

	private $iTypeid;
	private $sTypename;
	private $sPicturelink;
	private $aProducts;

	public function __construct(){

		$this->iTypeid = 0;
		$this->sTypename = "";
		$this->sPicturelink = "";
		$this->aProducts = array();
	}
// 
	public function load($iId){

		// Make connection

		$oConnection = new Connection;
		

		// Execute query

		$sSql = "SELECT typeid, typename, picturelink
		FROM tbproducttype
		WHERE typeid = ".$iId;

		$oResult = $oConnection->query($sSql);
		

		// Extract data from resultset and put into array

		$aProduct = $oConnection->fetch_array($oResult);

		$this->iTypeid = $aProduct['typeid'];
		$this->sTypename = $aProduct['typename'];
		$this->sPicturelink = $aProduct['picturelink'];

		// Load all products belonging to the typeid

		$sSql = "SELECT productid
		FROM tbproduct
		WHERE typeid = ".$iId;

		$oResult = $oConnection->query($sSql);

		while ($aRow = $oConnection->fetch_array($oResult)) {
				$oProduct = new product();
				$oProduct->load($aRow["productid"]);
				$this->aProducts[] = $oProduct;
			}



		// Close Connection

		$oConnection->close_connection();
	}

	public function __get($var){

		switch ($var) {
			case "typeid": return $this->iTypeid; break;
			case "typename": return $this->sTypename; break;
			case "picturelink": return $this->sPicturelink; break;
			case "products": return $this->aProducts; break;
			default: die($var . "Does Not Exist");
		}
	}



}

// $oCatagory = new productTypes();
// $oCatagory->load(1);

// echo "<pre>";
// print_r($oCatagory);
// echo "</pre>";


?>