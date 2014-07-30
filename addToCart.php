<?php

require_once("includes/model-cart.php");
session_start();

if(!isset($_SESSION["customerid"])){
	header("Location:login.php");
	exit;
}


$iProductid = 1;
if(isset($_GET['productid'])){
	$iProductid = $_GET["productid"];
}
$oCart = $_SESSION["Cart"];
$oCart->addProduct($iProductid);

header("Location:cart.php");
exit;

?>