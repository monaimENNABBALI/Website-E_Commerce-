<?php include 'DBConnection.php';
if (isset($_GET["nomCat"])) {
    $text = "";
    $nomCateg = $_GET["nomCat"];
    $sql = "SELECT * FROM produit WHERE CodeFam='" . $_GET["nomCat"] . "'";
    $result = mysqli_query($conn, $sql);
    echo '<div class="row">
						<div class="products-tabs">
							<!-- tab -->
							<div id="tab1" class="tab-pane active">
								<div class="products-slick" data-nav="#slick-nav-1" >';
    while ($row = mysqli_fetch_assoc($result)) {
        ?>

								<div class="product">
											<div class="product-img">
												<?php

        echo "<img  src='data:image/png;base64," . base64_encode($row['Image']) . " alt=''>";
        ?>
												<div class="product-label">
													<span class="sale"><?php echo $row["prixPromotion"] ?>%</span>
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $row["CodeFam"] ?></p>prixPromotion
												<h3 class="product-name"><a href="#"><?php echo $row["nomPro"]; ?></a></h3>
												<h4 class="product-price"><?php echo $row["prixProd"] ?> <del class="product-old-price">$990.00</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<form action="panier.php" method="POST">
													<button class="add-to-cart-btn" type="submit" name="btnCart"><i class="fa fa-shopping-cart"></i> add to cart</button>
													<input type="hidden" name="nomProduit" value="<?php echo $row["nomPro"]; ?>">
													<input type="hidden" name="prixProduit" value="<?php echo $row["prixProd"]; ?>">
												</form>
											</div>
										</div>


									<?php
}
    ?>
	</div>
								<div id="slick-nav-1" class="products-slick-nav"></div>
							</div>
							<!-- /tab -->
						</div>
					</div>
       <?php
}
?>

