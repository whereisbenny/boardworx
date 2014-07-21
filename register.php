<?php

require_once("includes/view.php");
require_once("includes/model-collection.php");

$oView = new view();  
$ocollection = new collection(); 
$aProductTypeList = $ocollection->getAllProductTypes();

require_once("includes/header.php");

?>

<div class="productwrapper">



	<h2>REGISTER</h2>

	<div class="register1">

		<form action="">

			<label for="firstName">First Name</label>
			<input type="text" placeholder="First Name" id="firstName" onblur="checkName(this.id);">
			<span id="firstNameMessage"></span>


			<label for="lastName">Last Name</label>
			<input type="text" placeholder="Last Name" id="lastName" onblur="checkName(this.id);">
			<span id="lastNameMessage"></span>


			<label for="email">Email</label>
			<input type="email" placeholder="Email Address" id="email" onblur="checkEmail(this.id);">
			<span id="emailMessage"></span>

			<label for="username">Username</label>
			<input type="text" placeholder="Username" id="username" onblur="checkName(this.id);">
			<span id="usernameMessage"></span>

			<label for="password">Password</label>
			<input type="password" placeholder="Password" id="password" onblur="checkName(this.id);">
			<span id="passwordMessage"></span>

		</form>

	</div>

	<div class="register2">

		<form action="">

			<label for="mobile">Mobile Number</label>
			<input type="tel" placeholder="Contact Number" id="mobile" onblur="checkNumber(this.id);">
			<span id="mobileMessage"></span>

			<label for="address">Street</label>
			<input type="text" placeholder="Street" id="street" onblur="checkName(this.id);">
			<span id="streetMessage"></span>
			
			<label for="address">Town</label>
			<input type="text" placeholder="Town" id="town" onblur="checkName(this.id);">
			<span id="townMessage"></span>
			
			<label for="address">City</label>
			<input type="text" placeholder="City" id="city" onblur="checkName(this.id);">
			<span id="cityMessage"></span>
			
			<label for="address">Country</label>
			<input type="text" placeholder="Country" id="country" onblur="checkName(this.id);">
			<span id="countryMessage"></span>


		</form>

	</div>

	<div class="regbutton">

		<button>REGISTER</button>

	</div>

</div>

<?php
require_once("includes/footer.php");

?>

