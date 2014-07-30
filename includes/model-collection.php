<?php

require_once("connection.php");
require_once("model-catagory.php");


class collection{

	public function getAllProductTypes(){

		$aCatagories = array(); // store array in variable

		// make connection

		$oConnection = new Connection();

		//execute query

		$sSql = "SELECT typeid FROM tbproducttype"; //typeid will get all additional info

		$oResult = $oConnection->query($sSql);

		// get results

		while ($aRow = $oConnection->fetch_array($oResult)) {  // put results in array and loops through each row untill theres none left to process

			$oProductType = new productTypes(); // Stores catagory class in variable
			
			$iTypeID = $aRow["typeid"];

			$oProductType->load($iTypeID); // run the load function in catagory class and pass in all the typeid's
			
			$aCatagories[] = $oProductType;	//add the results to array

		}

			//close connection

		$oConnection->close_connection();

		return $aCatagories;

	}

	function findCustomerByUsername($userName){
			$aCustomers = array();

			//make connection
			$oConnection = new Connection();

			//execute a query
			$sSql = "SELECT customerid 
						FROM tbcustomer
						WHERE username = '".$userName."'";
						
			$oResult = $oConnection->query($sSql);
		
			$aCustomers = $oConnection->fetch_array($oResult);
			$oConnection->close_connection();
			if ($aCustomers == false) {

				return false;
				
			}else{
				$oCustomer = new customer();
				$oCustomer->load($aCustomers["customerid"]);
				return $oCustomer;
			}


		}



}

?>