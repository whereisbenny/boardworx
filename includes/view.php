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
							$sHTML .= '<li><a href="products.php?typeid='.$oType->typeid.'">'.$oType->typename.'</a></li>';
						}

						$sHTML .= '</ul>
					</li>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="cart.php">Cart(0)</a></li>
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

				<a href="products.php?typeid='.$oType->typeid.'"><img src="assets/img/products/'.$oType->picturelink.'" alt=""></a>
				<h3>'.$oType->typename.'</h3>

			</div>';
		}

		$sHTML .= '</div>';
		
		return $sHTML;
	}


	public function renderProducts($oProductType){

		    

			$sHTML = '<h2>'.$oProductType->typename.'</h2>'; // whats passed in should work 
			                                                 // because typename is stored in $oProductType

			$sHTML .= '<div class="productwrapper">';

			$aProducts = $oProductType->products; // instanciated in model-category???
			
			for ($i=0 ; $i < count($aProducts); $i++ ) { 

			$oProduct = $aProducts[$i];	

			$sHTML .= '<div class="'.strtolower($oProductType->typename).'">';

			$sHTML .= '<img src="assets/img/products/'.$oProduct->picturelink.'"/>';

			$sHTML .= '<h3>'.$oProduct->productname.'</h3>';

			$sHTML .= '<h3> $'.$oProduct->price.'</h3>';

			$sHTML .= '<button>ADD TO CART</button>';

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
				<td>'.$oProduct->ProductName.'</td>
				<td>'.$value.'</td>
				<td>$'.$oProduct->ProductPrice.'</td>
				<td>$'.$oProduct->ProductPrice*$value.'</td>
				<td><a href="remove-from-cart.php?ProductID='.$keyProductId.'"><img src="assets/img/trash.png" /></a></td>
				</tr>';
			}



		return $sHTML .= '</table></div>';
	}

}

?>