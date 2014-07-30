<?php
require_once("includes/view.php");
require_once("includes/model-collection.php");
require_once("includes/model-cart.php");
require_once("includes/model-product.php");
session_start();
$oCart = $_SESSION["Cart"];

// print_r($_SESSION['Cart']);

	//redirect to login page if there is no CustomerID in session
if(!isset($_SESSION['customerid'])){
	header("Location: login.php");
}


	$oView = new view();	//store the view class in the '$oView' variable
	$ocollection = new collection();	//store the collection class in the '$oCollection' variable
	$aProductTypeList = $ocollection->getAllProductTypes();

	require_once("includes/header.php");
	
	echo $oView->renderCart($oCart);

	require_once("includes/footer.php");

	?>