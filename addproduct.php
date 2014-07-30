<?php
require_once("includes/view.php");
require_once("includes/model-collection.php");
require_once("includes/model-form.php");
require_once("includes/model-product.php");
require_once("includes/model-cart.php");

session_start();

$oForm = new Form();


if(isset($_POST["submit"])){
	 $oForm->data = $_POST;
	 $oForm->files = $_FILES;

	 //$oForm->check

	if($oForm->isValid){

		$oProduct = new product();

		$sPhotoName = "Product".date("Y-m-d-H-i-s").".jpg";
		$oForm->moveFile('picturelink',$sPhotoName);

		$oProduct->productname = $_POST["productname"];
		$oProduct->price = $_POST["price"];
		$oProduct->typeid = $_POST["typeid"];
		$oProduct->PhotoPath = $sPhotoName;


		$oProduct->save();

		header('Location: successful.php');
		exit();

	}


}




$oForm->addHTML('<div class="productwrapper">');
$oForm->addHTML('<h2>ADD PRODUCT</h2>');
$oForm->addHTML('<div class="logins">');
$oForm->makeTextInput('Product Name','productname');
$oForm->makeTextInput('Price','price');
$oForm->makeTextInput('TypeID','typeid');
$oForm->makeUploadBox('Photo','picturelink');
$oForm->makeHiddenField('MAX_FILE_SIZE',10000000);
$oForm->addHTML('</div>');
$oForm->addHTML('<div class="loginbuttons">');
$oForm->makeSubmit('ADD','submit');
$oForm->addHTML('</div></div>');


	$oView = new view();
	$oCollection = new collection();	
	$aProductTypeList = $oCollection->getAllProductTypes();    


	require_once("includes/header.php");

	echo $oForm->html;

	require_once("includes/footer.php");

	?>