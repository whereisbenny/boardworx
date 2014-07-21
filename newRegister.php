<?php
require_once("includes/footer.php");
require_once("includes/model-form.php");
require_once("includes/view.php");
require_once("includes/model-collection.php");
require_once("includes/customer-model.php");

$oForm = new Form;

	if(isset($_POST["submit"])){
		$oForm->data = $_POST;

		$oForm->checkRequired("firstName");
		$oForm->checkRequired("lastName");
		$oForm->checkRequired("phone");
		$oForm->checkRequired("email");
		$oForm->checkRequired("userName");

	}


	$oForm->makeTextInput('First Name','firstName');
	$oForm->makeTextInput('Last Name','lastName');
	$oForm->makeTextInput('Phone','phone');
	$oForm->makeTextInput('Email Address','email');
	$oForm->makeTextInput('User Name','userName');
	$oForm->makeTextInput('Password','password');
	$oForm->makeTextInput('Confirm Password','confirm_password');
	$oForm->makeSubmit('Submit','submit' );

	$oView = new View();
	$oCollection = new Collection();
	$aProductTypes = $oCollection->getAllCategories();

	require_once("includes/header.php");












	php echo $oForm->html;

	require_once("includes/footer.php");


?>