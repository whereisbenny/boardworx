<?php
require_once("includes/view.php");
require_once("includes/model-collection.php");
require_once("includes/model-cart.php");

session_start();

$oView = new view();                  
$oCollection = new collection();    
$aProductTypeList = $oCollection->getAllProductTypes();


require_once("includes/header.php"); 

?>



'<h2 class="message">CONSIDER IT DONE!</h2>'












<?php
require_once("includes/footer.php");
?>