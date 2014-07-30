<?php

require_once("includes/view.php");
require_once("includes/model-form.php");
require_once("includes/model-collection.php");
require_once("includes/model-customer.php");
require_once("includes/model-cart.php");
session_start();

$oView = new view();  
$ocollection = new collection(); 
$aProductTypeList = $ocollection->getAllProductTypes();

$oForm = new Form();

if(isset($_POST["login"])){	//if there is post data (if the form has been submitted) then do the following...
		$oForm->data = $_POST;		//send the post data to the form class so when the form is created below it will reload
									//the data in the controls (sticky data)
		//check the posted form data to see if its empty or not
		$oForm->checkRequired("login_username");
		$oForm->checkRequired("login_password");


		if($oForm->isValid){
			
			$oCheckingCustomer = $ocollection->findCustomerByUsername($_POST["login_username"]);

			if($oCheckingCustomer == false){
				
				$oForm->raiseCustomError("login_username","UserName does not exist");

			}else{

				if($oCheckingCustomer->password != $oCheckingCustomer->encrypt($_POST["login_password"])){
					
					$oForm->raiseCustomError("login_password","Password is not correct");
				}
			}

			if($oForm->isValid){

				$_SESSION["customerid"] = $oCheckingCustomer->customerid;

				$oCart = new cart();

				$_SESSION['Cart'] = $oCart;

				if ($oCheckingCustomer->admin == true){

					$_SESSION['admin'] = 1;
				}

				header("location: index.php");	//if save function has successfully run then change the page
				exit();		//stop rnning the page as it will be reloaded after successful insert
			}

		}
	}


	$oForm->addHTML('<div class="productwrapper">');
	$oForm->addHTML('<h2>LOG IN</h2>');
	$oForm->addHTML('<div class="logins">');
	$oForm->makeTextInput('Username','login_username');
	$oForm->makePassInput('Password','login_password');
	$oForm->addHTML('</div>');
	$oForm->addHTML('<div class="loginbuttons">');
	$oForm->makeSubmit('LOGIN','login');
	$oForm->addHTML('</div></div>');

	require_once("includes/header.php");

	echo $oForm->html;

	require_once("includes/footer.php");

	?>