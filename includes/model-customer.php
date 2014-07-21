<?php
require_once("connection.php");

class customer{

	private $iCustomerID;
	private $sFirstName;
	private $sLastName;
	private $sEmail;
	private $sUserName;
	private $sPassword;
	private $sHomeTele;
	private $sMobTele;
	private $sStreet;
	private $sTown;
	private $sCity;
	private $sCountry;

	public function __construct(){

		$this->iCustomerID = "";
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sEmail = "";
		$this->sUserName = "";
		$this->sPassword = "";
		$this->sHomeTele = "";
		$this->sMobTele = "";
		$this->sStreet = "";
		$this->sTown = "";
		$this->sCity = "";
		$this->sCountry = "";

	}
	public function load($iID){

		//make connection

		$oConnection = new Connection();

		// execute query

		$sSQL = "SELECT customerid, firstname, lastname, email, username, password, homenumber, mobilenumber, street, town, city, country
		FROM tbcustomer
		WHERE customerid = ".$iID;

		$oResult = $oConnection->query($sSQL);

		// Extract data from resultset

		$aCustomer = $oConnection->fetch_array($oResult);

		$this->iCustomerID = $aCustomer["customerid"];
		$this->sFirstName = $aCustomer["firstname"];
		$this->sLastName = $aCustomer["lastname"];
		$this->sEmail = $aCustomer["email"];
		$this->sUserName = $aCustomer["username"];
		$this->sPassword = $aCustomer["password"];
		$this->sHomeTele = $aCustomer["homenumber"];
		$this->sMobTele = $aCustomer["mobilenumber"];
		$this->sStreet = $aCustomer["street"];
		$this->sTown = $aCustomer["town"];
		$this->sCity = $aCustomer["city"];
		$this->sCountry = $aCustomer["country"];

        //close connection

		$oConnection->close_connection();

	}
	
}

$oCustomer = new customer();
$oCustomer->load(1);

echo "<pre>";
print_r($oCustomer);
echo "</pre>";

?>