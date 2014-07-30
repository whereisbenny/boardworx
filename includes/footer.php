<?php

require_once ("model-customer.php");

?>
<footer>

	<div class="wrapper">

		<div class="fbox1">

			<h4>CONTACT</h4>
			<ul>
				<li><a href="">0800 300 3000</a></li>
				<li><a href="mailto:boardworx@gmail.com">Email Us</a></li>
				<li><a href="http://www.facebook.com">Facebook</a></li>
				<li><a href="http://www.twitter.com">Twitter</a></li>
				<li><a href="http://www.google.com">Google+</a></li>
			</ul>

		</div>

		<div class="fbox2">

			<h4>INFORMATION</h4>
			<ul>
				<li><a href="">Exchanges &amp; Returns</a></li>
				<li><a href="">Shipping Information</a></li>
				<li><a href="">Privacy Notice</a></li>
				<li><a href="">Site Map</a></li>
				<li><a href="">About Us</a></li>
			</ul>

		</div>

		<div class="fbox3">

			<?php

			if(isset($_SESSION['admin'])){

				echo '<h4>ADMIN ACCOUNT</h4>';

			}else{
				
				echo '<h4>MY ACCOUNT</h4>';

			}

			?>

			<ul>
				
				<?php
				
				if(isset($_SESSION['admin'])){

					echo '<li><a href="addproduct.php">Add Product</a></li>';

				}else{

					echo '<li><a href="cart.php">View Cart</a></li>';

				}

				?>

				<li><a href="edit-details.php">Update My Details</a></li>
				<li><a href="">Change Password</a></li>
				<li><a href="">Newsletter</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>


		</div>

		<div class="fbox4">

			<h4>QUICK LINKS</h4>
			<ul>
				<li><a href="http://www.burton.com">Burton</a></li>
				<li><a href="http://www.ridesnowboards.com">Ride</a></li>
				<li><a href="http://www.endeavorsnowboards.com">Endeavor</a></li>
				<li><a href="http://www.lib-tech.com">Libtech</a></li>
				<li><a href="http://www.neversummer.com">Never Summer</a></li>
			</ul>


		</div>

	</div>

	<p>© 2014 All Rights Reserved. No part of this website or any of its contents may be reproduced.</p>

</footer>

<script src="./assets/javascript.js" type="text/javascript"></script>


</body>
</html>