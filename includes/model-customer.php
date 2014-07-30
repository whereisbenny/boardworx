<?php

require_once("connection.php");

class customer{

	private $iCustomerID;
	private $sFirstName;
	private $sLastName;
	private $sEmail;
	private $sUserName;
	private $sPassword;
	private $sPhone;
	private $sStreet;
	private $sTown;
	private $sCity;
	private $sCountry;
	private $bExisting;
	private $bAdmin;

	public function __construct(){

		$this->iCustomerID = "";
		$this->sFirstName = "";
		$this->sLastName = "";
		$this->sEmail = "";
		$this->sUserName = "";
		$this->sPassword = "";
		$this->sPhone = "";
		$this->sStreet = "";
		$this->sTown = "";
		$this->sCity = "";
		$this->sCountry = "";
		$this->bExisting = false;
		$this->bAdmin = false;
	}
	
	public function load($iID){

		//make connection

		$oConnection = new Connection();

		// execute query

		$sSQL = "SELECT customerid, firstname, lastname, email, username, password, phone, street, town, city, country, admin
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
		$this->sPhone = $aCustomer["phone"];
		$this->sStreet = $aCustomer["street"];
		$this->sTown = $aCustomer["town"];
		$this->sCity = $aCustomer["city"];
		$this->sCountry = $aCustomer["country"];
		$this->bAdmin = $aCustomer["admin"];

        //close connection

		$oConnection->close_connection();

		$this->bExisting = true;

	}

	public function encrypt($sValue){

    $sEncValue = md5(sha1(md5($sValue)) + sha1($sValue));

    return $sEncValue;

	}

	public function save(){
		// Make connection
		$oConnection = new Connection();

		if($this->bExisting == false){


			// Execute query
			$sSQL = "INSERT INTO tbcustomer(firstname, lastname, email, username, password, phone, street, town, city, country) 
			VALUES ('".$oConnection->escape_value($this->sFirstName)."',
				'".$oConnection->escape_value($this->sLastName)."',
				'".$oConnection->escape_value($this->sEmail)."',
				'".$oConnection->escape_value($this->sUserName)."',
				'".$oConnection->escape_value($this->sPassword)."',
				'".$oConnection->escape_value($this->sPhone)."',
				'".$oConnection->escape_value($this->sStreet)."',
				'".$oConnection->escape_value($this->sTown)."',
				'".$oConnection->escape_value($this->sCity)."',
				'".$oConnection->escape_value($this->sCountry)."')";


			// intialise query

$bResult = $oConnection->query($sSQL);


if($bResult == true){

	$this->iCustomerID = $oConnection->get_insert_id();

} else {

	die($sSQL . " fails");
}

}else{
	$sSQL = "UPDATE tbcustomer 
	SET	firstname = '".$this->sFirstName."',
	lastname =  '".$this->sLastName."',
	email =  '".$this->sEmail."',
	username =  '".$this->sUserName."',
	password =  '".$this->sPassword."',
	phone =  '".$this->sPhone."',
	street =  '".$this->sStreet."',
	town =  '".$this->sTown."',
	city =  '".$this->sCity."',
	country =  '".$this->sCountry."'
	WHERE
	tbcustomer.CustomerID =".$this->iCustomerID;

	$bResult = $oConnection->query($sSQL);

	if($bResult == false){
		die($sSQL . " fails");
	}

		// close connection


	$oConnection->close_connection();


}
}


public function __get($var){

	switch ($var) {
		case 	"customerid":	return $this->iCustomerID;		break;
		case 	"firstname":	return $this->sFirstName;		break;
		case 	"lastname":		return $this->sLastName;		break;
		case 	"email":	    return $this->sEmail;			break;
		case 	"username":		return $this->sUserName;		break;
		case 	"password":		return $this->sPassword;		break;
		case 	"phone":		return $this->sPhone;			break;
		case 	"street":		return $this->sStreet;			break;
		case 	"town":		    return $this->sTown;			break;
		case 	"city":		    return $this->sCity;			break;
		case 	"country":		return $this->sCountry;			break;
		case 	"admin":		return $this->bAdmin;			break;
		default:	die($var . " does not exist in customer");	break;
	}
}


public function __set($var, $value){
	switch ($var) {
		case 'firstname':
		$this->sFirstName = $value;
		break;
		case 'lastname':
		$this->sLastName = $value;
		break;			
		case 'email':
		$this->sEmail = $value;
		break;
		case 'username':
		$this->sUserName = $value;
		break;		
		case 'password':
		$this->sPassword = $value;
		break;	
		case 'phone':
		$this->sPhone = $value;
		break;
		case 'street':
		$this->sStreet = $value;
		break;
		case 'town':
		$this->sTown = $value;
		break;
		case 'city':
		$this->sCity = $value;
		break;
		case 'country':
		$this->sCountry = $value;
		break;																																		


		default:
		die($var . " could not be set");
	}
}

}


$oCustomer = new customer();
$oCustomer->load(1);

// $oCustomer->firstname = "test2";
// $oCustomer->lastname = "test1";
// $oCustomer->save();

// echo "<pre>";
// print_r($oCustomer);
// echo "</pre>";

?>