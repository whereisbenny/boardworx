<?php

require_once("includes/model-cart.php");
session_start();


$iProductID = 0;
if(isset($_GET['productid'])){
	$iProductid = $_GET["productid"];
}
$oCart = $_SESSION["Cart"];
$oCart->removeProduct($iProductid);

header("Location:cart.php");
exit;

?>