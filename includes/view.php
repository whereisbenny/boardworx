<?php

class view{

	public function renderNavigation($aProductTypeList){

		$sHTML = '<header>



		<img src="assets/img/logo.fw.png" alt="">
		<div class="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="productTypes.php">Products</a>
					<ul>';

						for ($i=0; $i < count($aProductTypeList); $i++) {  // Loops through all the producttypes to display in navigation

							$oType = $aProductTypeList[$i];
							$sHTML .= '<li><a href="products.php?typeid='.htmlentities($oType->typeid).'">'.htmlentities($oType->typename).'</a></li>';
						}

						$sHTML .= '</ul></li>';

						if(!isset($_SESSION['customerid'])){
							$sHTML .= '<li><a href="register.php">Register</a></li>';

						}else{

							$sHTML .= '<li><a href="edit-details.php">Edit Details</a></li>';

						}

						if(!isset($_SESSION['customerid'])){
							$sHTML .= '<li><a href="login.php">Login</a></li>';

						}else{

							$sHTML .= '<li><a href="logout.php">Logout</a></li>';

						}

						$iCartNumber = 0;

						if (isset($_SESSION['Cart'])) {

							$oCart = $_SESSION['Cart'];
							$iCartNumber = array_sum($oCart->Contents);

						}

						$sHTML .= '<li><a href="cart.php">Cart('.$iCartNumber.')</a></li>;
					</ul>
				</div>
			</header>';


			return $sHTML;
		}



		public function renderProductTypes($aTypes){

			$sHTML='<h2>PRODUCTS</h2>

			<div class="productwrapper">';

				for ($i=0; $i < count($aTypes); $i++) { 

					$oType = $aTypes[$i];

					$sHTML .= '<div class="products">

					<a href="products.php?typeid='.htmlentities($oType->typeid).'"><img src="assets/img/products/'.htmlentities($oType->picturelink).'" alt=""></a>
					<h3>'.htmlentities($oType->typename).'</h3>

				</div>';
			}

			$sHTML .= '</div>';

			return $sHTML;
		}


		public function renderProducts($oProductType){



			$sHTML = '<h2>'.htmlentities($oProductType->typename).'</h2>'; // whats passed in should work 
			                                                 // because typename is stored in $oProductType

			$sHTML .= '<div class="productwrapper">';

			$aProducts = $oProductType->products; // instanciated in model-category???
			
			for ($i=0 ; $i < count($aProducts); $i++ ) { 

				$oProduct = $aProducts[$i];	

				$sHTML .= '<div class="'.strtolower($oProductType->typename).'">';

				$sHTML .= '<img src="assets/img/products/'.htmlentities($oProduct->picturelink).'"/>';

				$sHTML .= '<h3>'.htmlentities($oProduct->productname).'</h3>';

				$sHTML .= '<h3> $'.htmlentities($oProduct->price).'</h3>';

				$sHTML .= '<button><a href="addToCart.php?productid='.htmlentities($oProduct->productid).'">ADD TO CART</a></button>';

				$sHTML .= '</div>';


			}

			$sHTML .= '</div>';

			return $sHTML;     

		}

		public function renderCart($oCart){

			$sHTML = '<div class="productwrapper">

			<h2>CART</h2>
			<table>
				<thead>
					<tr>
						<th>Product</th>
						<th>QTY</th>
						<th>Price</th>
						<th>Total</th>
						<th>Remove</th>
					</tr>
				</thead>';
				

				$aContents = $oCart->Contents;

				foreach ($aContents as $keyProductId => $value) {

					$oProduct = new product();
					$oProduct->load($keyProductId);

					$sHTML .= '<tr>
					<td>'.htmlentities($oProduct->productname).'</td>
					<td>'.$value.'</td>
					<td>$'.htmlentities($oProduct->price).'</td>
					<td>$'.htmlentities($oProduct->price*$value).'</td>
					<td><a href="removeFromCart.php?productid='.$keyProductId.'"><img src="assets/img/trash.png" /></a></td>
				</tr>';

				
			}

			 $sHTML .= '</table></div>';

			 return $sHTML;

		}

	}

	?>