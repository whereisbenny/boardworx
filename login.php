<?php

require_once("includes/view.php");
require_once("includes/model-collection.php");

$oView = new view();  
$ocollection = new collection(); 
$aProductTypeList = $ocollection->getAllProductTypes();

require_once("includes/header.php");

?>

    
	<div class="productwrapper">

		<h2>LOG IN</h2>

		<div class="login">

			<form action="">

				<label for="username">Username</label>
				<input type="text" placeholder="Username" id="username">

				<label for="password">Password</label>
				<input type="password" placeholder="Password" id="password">

			</form>

		</div>

		<div class="loginbuttons">

			<a href=""><button>LOGIN</button></a>
			
		</div>

	</div>


		<?php
	require_once("includes/footer.php");

	?>