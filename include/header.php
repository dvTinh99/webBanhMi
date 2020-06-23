<!doctype html>
<?php
require_once("./Model/Type_Model.php");
require_once("./Bean/Cart.php");
session_start();

if (isset($_GET["action"])) {
		if ($_GET["action"] == "delete") {
			foreach ($_SESSION["cart"] as $key => $value) {
				if ($value["item_id"] == $_GET["id"]) {
					unset($_SESSION['cart'][$key]) ;
					echo '<script>alert("item remove")</script>';
					echo '<script>window.location.reload()</script>';
				}
			}
		}
	}

if (isset($_POST["addToCart"])) {
	$item_image = $_POST['item_image'];
	$item_name = $_POST["item_name"];
	$item_price = $_POST["item_price"];
	$item_id =$_POST["item_id"];
	$iteam_qua = 1;

	if (isset($_SESSION['cart'])) {
		$item_array_id = array_column($_SESSION['cart'], 'item_id');
		//print_r( $item_array_id );
		if (!in_array($item_id, $item_array_id)) {
			$count = count($_SESSION['cart']) +1 ;
			//echo "count = ". $count;
			$item_array = array(
				'item_id' => $item_id,
				'item_name' => $item_name,
				'item_price' => $item_price,
				'item_image' => $item_image,
				'iteam_qua' => $iteam_qua,
			);
			$_SESSION['cart'][$count] = $item_array;
		}else{
		foreach ($_SESSION['cart'] as $key => $value) {
			if ($item_id==$value['item_id']) {
				$_SESSION['cart'][$key]['iteam_qua'] = $_SESSION['cart'][$key]['iteam_qua'] +1;
			}
		}
		}
		
	}else{
		$item_array = array(
			'item_id' => $item_id,
			'item_name' => $item_name,
			'item_price' => $item_price,
			'item_image' => $item_image,
			'iteam_qua' => $iteam_qua,
		);
		$_SESSION['cart'][0] = $item_array;
	}

	
	

}


?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bán Bánh </title>
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/style.css">
	<link rel="stylesheet" href="assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="assets/dest/css/huong-style.css">
</head>
<body>
	<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Địa chỉ</a></li>
						<li><a href=""><i class="fa fa-phone"></i> 0965893632 </a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">

						
						<?php if (isset($_SESSION["name"])){ ?>	
							<li><a href="#"><i class="fa fa-user"></i><?php echo $_SESSION["name"]?></a></li>					
							<li><a href="Model/Logout_model.php">Đăng Xuất</a></li>
							<?php
						//session_destroy();
						}else{
							?>
							<li><a href="signup.php">Đăng kí</a></li>
							<li><a href="login.php">Đăng nhập</a></li>
							<?php
						}
						?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.php" id="logo"><img src="assets/dest/images/logo-cake.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" name="search" action="">
							<input type="text" value="" name="search" id="s" placeholder="Nhập từ khóa..." />
							<button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng (<?php
								if (isset($_SESSION["cart"])) {

									echo count($_SESSION["cart"]);
								}
								
								?>)<i class="fa fa-chevron-down"></i></div>
								<div class="beta-dropdown cart-body">
									<?php
									$total = 0;
									if (isset($_SESSION["cart"])) {
										
										foreach ($_SESSION["cart"] as $value) {

											?>
											<div class="cart-item">
												<div class="media">
													<a class="pull-left" href="#">
														<img width="50" height="50" 
														src= <?php echo "image/product/".$value['item_image'] ?>
														></a>
														<!-- nút xóa -->
														<a class="pull-right" href=<?php echo"index.php?action=delete&id=".$value['item_id']?>>
														<img width="20" height="20" 
														src= "image/button/delete.png"
														></a>
														<div class="media-body">
															<span class="cart-item-title"><?php
															echo $value['item_name'];
															?></span>
															<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
															<span class="cart-item-amount"><?php
															echo $value['iteam_qua'];
															?>*<span><?php
															echo $value['item_price'];
															?></span></span>
														</div>
													</div>
												</div>
												<?php
												$total = $total + ($value['iteam_qua'] * $value['item_price']);
											}
										}
										?>

										<div class="cart-caption">

											<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">
												<?php 
											echo $total ;
											?>
												
											</span></div>
											<div class="clearfix"></div>

											<div class="center">
												<div class="space10">&nbsp;</div>
												<a href="checkout.php" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
											</div>
										</div>
									</div>
								</div> <!-- .cart -->
							</div>
						</div>
						<div class="clearfix"></div>
					</div> <!-- .container -->
				</div> <!-- .header-body -->
				<div class="header-bottom" style="background-color: #0277b8;">
					<div class="container">
						<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
						<div class="visible-xs clearfix"></div>
						<nav class="main-menu">
							<ul class="l-inline ov">
								<li><a href="index.php">Trang chủ</a></li>
								<li><a href="#">Sản phẩm</a>
									<ul class="sub-menu">
										<?php
										$arrType = getAllType();
										foreach ($arrType as  $value) {

											?>
											<li><a href=<?php echo "product_type.php?id_type=".$value->id ?>><?php echo $value->name ?></a></li>
											<?php
										}
										?>
									</ul>
								</li>
								<li><a href="about.php">Giới thiệu</a></li>
								<li><a href="contacts.php">Liên hệ</a></li>
							</ul>
							<div class="clearfix"></div>
						</nav>
					</div> <!-- .container -->
				</div> <!-- .header-bottom -->
	</div> <!-- #header -->