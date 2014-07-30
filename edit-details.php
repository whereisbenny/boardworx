<?php 
	require_once("includes/model-form.php");
	require_once("includes/view.php");
	require_once("includes/model-collection.php");
	require_once("includes/model-customer.php");
	require_once("includes/model-cart.php");
	
	session_start();
	
	if(!isset($_SESSION['customerid'])){
		header("Location: login.php");
	}

		$oCustomer = new customer();
		$oCustomer->load($_SESSION["customerid"]);

		$aExisitingData = array();
		$aExisitingData["firstname"] = $oCustomer->firstname;
		$aExisitingData["lastname"] = $oCustomer->lastname;
		$aExisitingData["email"] = $oCustomer->email;
		$aExisitingData["username"] = $oCustomer->username;
		// $aExisitingData["password"] = $oCustomer->password;
		$aExisitingData["phone"] = $oCustomer->phone;
		$aExisitingData["street"] = $oCustomer->street;
		$aExisitingData["town"] = $oCustomer->town;
		$aExisitingData["city"] = $oCustomer->city;
		$aExisitingData["country"] = $oCustomer->country;

	$oForm = new Form;	//store the form class in the '$oForm' variable
	$oForm->data = $aExisitingData;


	if(isset($_POST["register"])){	//if there is post data (if the form has been submitted) then do the following...
		$oForm->data = $_POST;		//send the post data to the form class so when the form is created below it will reload
									//the data in the controls (sticky data)
		//check the posted form data to see if its empty or not
		$oForm->checkRequired("firstname");
		$oForm->checkRequired("lastname");
		$oForm->checkRequired("email");
		$oForm->checkRequired("username");
		$oForm->checkRequired("password");
		$oForm->checkRequired("phone");
		$oForm->checkRequired("street");
		$oForm->checkRequired("town");
		$oForm->checkRequired("city");
		$oForm->checkRequired("country");


		if($oForm->isValid){	//if the form is valid (no errors) then assign the post data to the
								//attributes in the customer class and run the save function
			
			$oCustomer->firstname = $_POST["firstname"];
			$oCustomer->lastname = $_POST["lastname"];
			$oCustomer->phone = $_POST["email"];
			$oCustomer->username = $_POST["username"];
			$oCustomer->password = $oCustomer->encrypt($_POST["password"]);
			$oCustomer->phone = $_POST["phone"];
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
	$oForm->addHTML('<h2>UPDATE DETAILS</h2>');
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
	$oForm->makeSubmit('SAVE','register');
	$oForm->addHTML('</div></div>');

	

	$oView = new view();	//store the view class in the '$oView' variable
	$oCollection = new collection();	//store the collection class in the '$oCollection' variable
	$aProductTypeList = $oCollection->getAllProductTypes();	//access the '$oCollection' variable (which stores the entire class) and run the getAllCategories function
	//Store the results of the function in the $aProductTypes variable

	require_once("includes/header.php");

	echo $oForm->html;
				
	require_once("includes/footer.php");
?>