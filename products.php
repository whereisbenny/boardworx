<?php
require_once("includes/view.php");
require_once("includes/model-collection.php");
session_start();



$oView = new view();                  
$oCollection = new collection();    
$aProductTypeList = $oCollection->getAllProductTypes();


$iTypeid = 1;
if(isset($_GET["typeid"])){		//if there is a query string that has a key of 'TypeID' run the next bit
		$iTypeid = $_GET["typeid"];	//override the '$iTypeID' variable with the value in the query string
	}

	$oType = new productTypes();	//Store the Category class in the '$oType' variable
	$oType->load($iTypeid);		//run the load function in the Category class and pass through the '$iTypeID' value above
	//store the results as $oType overriding the the current class stored under the variable



require_once("includes/header.php"); // includes the header.

echo $oView->renderProducts($oType);

require_once("includes/footer.php");

?>