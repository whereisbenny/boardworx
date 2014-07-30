<?php
require_once("includes/view.php");
require_once("includes/model-collection.php");
require_once("includes/model-cart.php");

session_start();

$oView = new view();  

$ocollection = new collection(); 

$aProductTypeList = $ocollection->getAllProductTypes();

require_once("includes/header.php");

echo $oView->renderProductTypes($aProductTypeList);

require_once("includes/footer.php");

// instantiate the view class so renderProductTypes can be called

// instantiate the collection class so getAllProductTypes can be called

// all products types are stores in the array which is passed into renderProductTypes

?>