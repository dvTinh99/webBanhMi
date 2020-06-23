<?php

include('include/header.php');
require_once('model/Product_Model.php');

?>
<div class="rev-slider">
	<div class="fullwidthbanner-container">
		<div class="fullwidthbanner">
			<div class="bannercontainer" >
				<div class="banner" >
					<ul>
						<!-- THE FIRST SLIDE -->
						<?php
						require_once('Model/Product_Model.php');
						$arr = getSlide();
						for($x=0;$x<count($arr);$x++){
							?>
							<li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
								<div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
									<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src= "<?php echo"image/slide/".$arr[$x] ?>"
										data-src= <?php echo"image/slide/".$arr[$x] ?>"" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(<?php echo"image/slide/".$arr[$x] ?>); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
									</div>
								</div>

							</li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>

			<div class="tp-bannertimer"></div>
		</div>
	</div>
	<!--slider-->
</div>
<div class="container">
	<div id="content" class="space-top-none">
		<div class="main-content">
			<div class="space60">&nbsp;</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="beta-products-list">
						<?php
							require_once('Model/Product_Model.php');
							if (isset($_GET["search"])) {
								$search = $_GET["search"] ;
								$arr = searchProduct($search);
							}else{
								$arr = getAllProducts();
							}
							
						?>
						<h4>New Products</h4>

						<div class="beta-products-details">
							<p class="pull-left"><?php echo count($arr)?>kết quả</p>
							<div class="clearfix"></div>
						</div>

						<div class="row">
							<?php
							
							foreach ($arr as $value) {
										//echo $value->name;
								?>
								<form method="POST" action="index.php">
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href=<?php echo "product.php?id=".$value->id?>><img width="262" height="212"  src=<?php echo "image/product/".$value->image ?>> </a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title"><?php echo $value->name ?></p>
												<p class="single-item-price">
													<span><?php $value->unit_price?></span>
												</p>
											</div>
											<div class="single-item-caption">
												<input type="hidden" name="item_image" value = <?php echo $value->image ?>>
												<input type="hidden" name="item_id" value = <?php echo $value->id ?>>
												<input type="hidden" name="item_name" value = "<?php echo $value->name ?>">
												<input type="hidden" name="item_price" value = <?php echo $value->unit_price ?>>
												<input type="submit" name="addToCart" class="add-to-cart pull-left" value="Thêm">
													<!-- <i class="fa fa-shopping-cart"></i>
													
												</button> -->
												<a class="beta-btn primary" href=<?php echo "product.php?id=".$value->id?>>Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div> 
									</form>
									<?php
								}
								?>


							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Top Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<?php
								require_once('Model/Product_Model.php');
								$arrTop = getTopProducts();
								foreach ($arrTop as $value) {
										//echo $value->name;
									?>
									<form method="POST" action="index.php">
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href=<?php echo "product.php?id=".$value->id?>><img width="262" height="212"  src=<?php echo "image/product/".$value->image ?>> </a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title"><?php echo $value->name ?></p>
												<p class="single-item-price">
													<span><?php $value->unit_price?></span>
												</p>
											</div>
											<div class="single-item-caption">
												<input type="hidden" name="item_image" value = <?php echo $value->image ?>>
												<input type="hidden" name="item_id" value = <?php echo $value->id ?>>
												<input type="hidden" name="item_name" value = "<?php echo $value->name ?>">
												<input type="hidden" name="item_price" value = <?php echo $value->unit_price ?>>
												<input type="submit" name="addToCart" class="add-to-cart pull-left" value="Thêm">
													<!-- <i class="fa fa-shopping-cart"></i>
													
												</button> -->
												<a class="beta-btn primary" href=<?php echo "product.php?id=".$value->id?>>Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div> 
									</form>
									<?php
								}
								?>
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
							<!-- 	<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="product.html"><img src="assets/dest/images/products/1.jpg" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">Sample Woman Top</p>
											<p class="single-item-price">
												<span>$34.55</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="shopping_cart.html"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div> -->
								
							</div>
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	<?php 
	include("include/footer.php");
	?>
	<div class="copyright">
		<div class="container">
			<p class="pull-left">Privacy policy. (&copy;) 2014</p>
			<p class="pull-right pay-options">
				<a href="#"><img src="assets/dest/images/pay/master.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/pay.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/visa.jpg" alt="" /></a>
				<a href="#"><img src="assets/dest/images/pay/paypal.jpg" alt="" /></a>
			</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->


	<!-- include js files -->
	<script src="assets/dest/js/jquery.js"></script>
	<script src="assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="assets/dest/vendors/animo/Animo.js"></script>
	<script src="assets/dest/vendors/dug/dug.js"></script>
	<script src="assets/dest/js/scripts.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/dest/js/waypoints.min.js"></script>
	<script src="assets/dest/js/wow.min.js"></script>
	<!--customjs-->
	<script src="assets/dest/js/custom2.js"></script>
	<script>
		$(document).ready(function($) {    
			$(window).scroll(function(){
				if($(this).scrollTop()>150){
					$(".header-bottom").addClass('fixNav')
				}else{
					$(".header-bottom").removeClass('fixNav')
				}}
				)
		})
	</script>
</body>
</html>
