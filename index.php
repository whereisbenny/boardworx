<?php

require_once("includes/view.php");
require_once("includes/model-collection.php");

$oView = new view();                  
$oCollection = new collection();    
$aProductTypeList = $oCollection->getallproductTypes();

// instanciates the view class and stores it in $oView used in the header to call RenderNavigation.

// instanciates the collection class and stores in $oCollection for RenderNavigation to call the productTypes.

// store all the product types in an array to be passed in to RenderNavigation (header page)

require_once("includes/header.php"); // includes the header.

?>

<div class="productwrapper">
	<div class="special1">
		<img src="assets/img/promo.fw.png" alt="">
	</div>
	<div class="special2">
		<img src="assets/img/promo2.fw.png" alt="">
	</div>
	<div class="weather">
		<img src="assets/img/weather.fw.png" alt="">
	</div>
</div>

<?php

require_once("includes/footer.php"); // includes the footer.



?>




