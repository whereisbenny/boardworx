<?php

require_once("includes/view.php");
require_once("includes/model-form.php");
require_once("includes/model-collection.php");
require_once("includes/model-customer.php");
require_once("includes/model-cart.php");

session_start();

$oView = new view();  
$oCollection = new collection(); 
$aProductTypeList = $oCollection->getAllProductTypes();

$oForm = new Form();

if(isset($_POST["register"])){	//if there is post data (if the form has been submitted) then do the following...
		$oForm->data = $_POST;		//send the post data to the form class so when the form is created below it will reload
									//the data in the controls (sticky data)
		//check the posted form data to see if its empty or not
		$oForm->checkRequired("firstname");
		$oForm->checkRequired("lastname");
		$oForm->checkRequired("phone");
		$oForm->checkRequired("email");
		$oForm->checkRequired("username");
		$oForm->checkRequired("password");
		$oForm->checkRequired("street");
		$oForm->checkRequired("town");
		$oForm->checkRequired("city");
		$oForm->checkRequired("country");

		$oCheckingCustomer = $oCollection->findCustomerByUsername($_POST["username"]);

		if($oCheckingCustomer != false){
			$oForm->raiseCustomError("username","Username is already taken");

		}

		if($oForm->isValid){	//if the form is valid (no errors) then assign the post data to the
								//attributes in the customer class and run the save function

			$oCustomer = new customer();
			$oCustomer->firstname = $_POST["firstname"];
			$oCustomer->lastname = $_POST["lastname"];
			$oCustomer->phone = $_POST["phone"];
			$oCustomer->email = $_POST["email"];
			$oCustomer->username = $_POST["username"];
			$oCustomer->password = $oCustomer->encrypt($_POST["password"]);
			$oCustomer->street = $_POST["street"];
			$oCustomer->town = $_POST["town"];
			$oCustomer->city = $_POST["city"];
			$oCustomer->country = $_POST["country"];



			$oCustomer->save();

			header("location: successful.php");	//if save function has successfully run then change the page
			exit();		//stop running the page as it will be reloaded after successful insert	
		}
	}


	$oForm->addHTML('<div class="productwrapper">');
	$oForm->addHTML('<h2>REGISTER</h2>');
	$oForm->addHTML('<div class="register1">');
	$oForm->makeTextInput('First Name','firstname');
	$oForm->makeTextInput('Last Name','lastname');
	$oForm->makeTextInput('Phone','phone');
	$oForm->makeTextInput('Email Address','email');
	$oForm->makeTextInput('User Name','username');
	$oForm->addHTML('</div><div class="register2">');
	$oForm->makePassInput('Password','password');
	$oForm->makeTextInput('Street','street');
	$oForm->makeTextInput('Town','town');
	$oForm->makeTextInput('City','city');
	$oForm->makeTextInput('Country','country');
	$oForm->addHTML('</div>');
	$oForm->addHTML('<div class="regbutton">');
	$oForm->makeSubmit('REGISTER','register');
	$oForm->addHTML('</div></div>');

	require_once("includes/header.php");

	echo $oForm->html;

	require_once("includes/footer.php");

	?>