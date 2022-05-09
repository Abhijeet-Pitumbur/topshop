<?php
ini_set('display_errors', 'off');
if (empty($title)) {
	header("location:../error");
	exit();
}
?>
<!DOCTYPE html>
<!-- Abhijeet Pitumbur © Topshop 2022 -->
<html lang="EN">
	<head>
		<meta charset="UTF-8">
		<title>Topshop - <?php echo $title; ?></title>
		<base href="http://localhost/topshop/index">
		<meta name="author" content="Abhijeet Pitumbur">
		<meta name="theme-color" content="#004DDA">
		<meta name="robots" content="index, follow">
		<meta name="description" content="Topshop - Your One-Stop Shop - E-Commerce Website by Abhijeet Pitumbur">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="google-site-verification" content="UcV7INLourV-4yyaKZ5zE5p7ufe2OvCml5VUO8Mmtno"/>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="canonical" href="http://localhost/topshop/">
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link href="stylesheets/roboto.css" rel="stylesheet">
		<link href="stylesheets/bootstrap.css" rel="stylesheet">
		<link href="stylesheets/main.css" rel="stylesheet">
		<link href="stylesheets/<?php echo $css; ?>.css" rel="stylesheet">
		<script>
			var currentDate = new Date();
			var currentTime = currentDate.getTime();
			var expireTime = currentTime + 31556952000;
			currentDate.setTime(expireTime);
			if (document.cookie.indexOf('TOPSHOPLANGUAGE=') == -1) {
				document.cookie = 'TOPSHOPLANGUAGE=English; expires=' + currentDate.toUTCString();
			}
			if (document.cookie.indexOf('TOPSHOPCURRENCY=') == -1) {
				document.cookie = 'TOPSHOPCURRENCY=MUR; expires=' + currentDate.toUTCString();
			}
			console.log("Hello World!");
		</script>
		<?php
		if ((!(isset($_SESSION["MURtoUSD"]))) || (!(isset($_SESSION["MURtoEUR"])))) {
			try {
				$requestURL = "https://v6.exchangerate-api.com/v6/751be278f046e0cbefd32837/latest/MUR";
				$responseJSON = file_get_contents($requestURL);
				$response = json_decode($responseJSON);
				$_SESSION["MURtoUSD"] = floatval($response->conversion_rates->USD);
				$_SESSION["MURtoEUR"] = floatval($response->conversion_rates->EUR);
				if ((!(isset($_SESSION["MURtoUSD"]))) || (!(isset($_SESSION["MURtoEUR"]))) || ($_SESSION["MURtoUSD"] == 0) || ($_SESSION["MURtoEUR"] == 0)) {
					throw new Exception("Critical error");
				}
			} catch (Exception $e) {
				$_SESSION["MURtoUSD"] = 0.025;
				$_SESSION["MURtoEUR"] = 0.02;
			}
		}
		?>
		<noscript>
			<h6 style="text-align: center; background-color: #CC0014; padding:5px; margin: 0px">
				<a href="https://www.enablejavascript.io/" target="_blank" rel="noreferrer" style="color: #FFFFFF">Warning! This website requires JavaScript to function properly. Click here for instructions on how to enable JavaScript in your web browser.</a>
			</h6>
		</noscript>
	</head>
	<body>
		<div id="page">
		<header class="version-2">
			<div class="layer" id="layer"></div>
			<div class="main-header">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
							<div id="logo">
								<a href="index"><img src="images/logos/topshop.svg" width="160" height="35"></a>
							</div>
						</div>
						<nav class="col-xl-6 col-lg-7">
							<a class="open-close" type="button">
								<div class="hamburger hamburger--spin">
									<div class="hamburger-box">
										<div class="hamburger-inner"></div>
									</div>
								</div>
							</a>
							<?php
							$sqlQuery = "SELECT *
							FROM `classes`";
							$runQuery = mysqli_query($connection, $sqlQuery);
							$i = 1;
							while ($results = mysqli_fetch_assoc($runQuery)) {
								$classes[$i] = $results;
								$i++;
							}
							$sqlQuery = "SELECT *
							FROM `categories`";
							$runQuery = mysqli_query($connection, $sqlQuery);
							$i = 1;
							while ($results = mysqli_fetch_assoc($runQuery)) {
								$categories[$i] = $results;
								$i++;
							}
							?>
							<div class="main-menu">
								<div id="header-menu">
									<a href="index"><img src="images/logos/topshop-black.svg" width="100" height="35"></a>
									<a type="button" class="open-close" id="close-in"><i class="ti-close"></i></a>
								</div>
								<ul>
									<li class="megamenu submenu">
										<a type="button" class="show-submenu-mega"><?php echo $classes[1]['className']; ?></a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-3">
													<h3><a href="category?id=01"><?php echo $categories[1]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=iPhones">iPhone</a></li>
														<li><a href="search?query=Samsung+Phones">Samsung</a></li>
														<li><a href="search?query=LG+Phones">LG</a></li>
														<li><a href="search?query=Huawei+Phones">Huawei</a></li>
														<li><a href="search?query=OnePlus+Phones">OnePlus</a></li>
														<li><a href="search?query=Nokia+Phones">Nokia</a></li>
														<li><a href="search?query=Xiaomi+Phones">Xiaomi</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=02"><?php echo $categories[2]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Macbooks">MacBook</a></li>
														<li><a href="search?query=Dell+Laptops">Dell</a></li>
														<li><a href="search?query=HP+Laptops">HP</a></li>
														<li><a href="search?query=Lenovo+Laptops">Lenovo</a></li>
														<li><a href="search?query=Acer+Laptops">Acer</a></li>
														<li><a href="search?query=Surface+Laptops">Surface</a></li>
														<li><a href="search?query=Chromebooks">Chromebook</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=03"><?php echo $categories[3]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Macs">Mac</a></li>
														<li><a href="search?query=Dell+Desktops">Dell</a></li>
														<li><a href="search?query=HP+Desktops">HP</a></li>
														<li><a href="search?query=Lenovo+Desktops">Lenovo</a></li>
														<li><a href="search?query=ASUS+Desktops">ASUS</a></li>
														<li><a href="search?query=Intel+Desktops">Intel</a></li>
														<li><a href="search?query=Samsung+Desktops">Samsung</a></li>
														<li><a href="search?query=Acer+Desktops">Acer</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=04"><?php echo $categories[4]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Printers">Printers</a></li>
														<li><a href="search?query=Monitors">Monitors</a></li>
														<li><a href="search?query=Mice">Mice</a></li>
														<li><a href="search?query=Keyboards">Keyboards</a></li>
														<li><a href="search?query=Hard+Disk+Drives">Hard Disk Drives</a></li>
														<li><a href="search?query=Solid+State+Drives">Solid State Drives</a></li>
														<li><a href="search?query=Headphones">Headphones</a></li>
														<li><a href="search?query=Webcams">Webcams</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="megamenu submenu">
										<a type="button" class="show-submenu-mega"><?php echo $classes[2]['className']; ?></a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-3">
													<h3><a href="category?id=05"><?php echo $categories[5]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Ovens">Ovens</a></li>
														<li><a href="search?query=Gas+Stoves">Gas Stoves</a></li>
														<li><a href="search?query=Kitchen+Extractors">Kitchen Extractors</a></li>
														<li><a href="search?query=Dishwashers">Dishwashers</a></li>
														<li><a href="search?query=Coffee+Makers">Coffee Makers</a></li>
														<li><a href="search?query=Microwave+Ovens">Microwave Ovens</a></li>
														<li><a href="search?query=Kettles">Kettles</a></li>
														<li><a href="search?query=Rice+Cookers">Rice Cookers</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=06"><?php echo $categories[6]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Refrigerators">Refrigerators</a></li>
														<li><a href="search?query=Televisions">Televisions</a></li>
														<li><a href="search?query=Air+Conditioners">Air Conditioners</a></li>
														<li><a href="search?query=Fans">Fans</a></li>
														<li><a href="search?query=Lighting">Lighting</a></li>
														<li><a href="search?query=Cleaning+Tools">Cleaning Tools</a></li>
														<li><a href="search?query=Vacuum+Cleaners">Vacuum Cleaners</a></li>
														<li><a href="search?query=Washing+Machines">Washing Machines</a></li>
														<li><a href="search?query=Irons">Irons</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=07"><?php echo $categories[7]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Paper+Shredders">Paper Shredders</a></li>
														<li><a href="search?query=Water+Dispensers">Water Dispensers</a></li>
														<li><a href="search?query=Calculators">Calculators</a></li>
														<li><a href="search?query=Binders+and+Laminators">Binders and Laminators</a></li>
														<li><a href="search?query=Lockers+and+Safes">Lockers and Safes</a></li>
														<li><a href="search?query=Projectors">Projectors</a></li>
														<li><a href="search?query=Networking">Networking</a></li>
														<li><a href="search?query=Labelling+Machines">Labelling Machines</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=08"><?php echo $categories[8]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Water+Tanks">Water Tanks</a></li>
														<li><a href="search?query=Outdoor+Lighting">Outdoor Lighting</a></li>
														<li><a href="search?query=Water+Pumps">Water Pumps</a></li>
														<li><a href="search?query=Pressure+Washers">Pressure Washers</a></li>
														<li><a href="search?query=Security+Cameras">Security Cameras</a></li>
														<li><a href="search?query=Generators">Generators</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="megamenu submenu">
										<a type="button" class="show-submenu-mega"><?php echo $classes[3]['className']; ?></a>
										<div class="menu-wrapper">
											<div class="row small-gutters">
												<div class="col-lg-3">
													<h3><a href="category?id=09"><?php echo $categories[9]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Men+Clothing">Men</a></li>
														<li><a href="search?query=Women+Clothing">Women</a></li>
														<li><a href="search?query=Kids+Clothing">Kids</a></li>
														<li><a href="search?query=Baby+Clothing">Baby</a></li>
														<li><a href="search?query=Unisex+Clothing">Unisex</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=10"><?php echo $categories[10]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Men+Shoes">Men</a></li>
														<li><a href="search?query=Women+Shoes">Women</a></li>
														<li><a href="search?query=Kids+Shoes">Kids</a></li>
														<li><a href="search?query=Sports+Shoes">Sports</a></li>
														<li><a href="search?query=Boots">Boots</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=11"><?php echo $categories[11]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Sunglasses">Sunglasses</a></li>
														<li><a href="search?query=Watches">Watches</a></li>
														<li><a href="search?query=Handbags">Handbags</a></li>
														<li><a href="search?query=Wallets">Wallets</a></li>
														<li><a href="search?query=Laptop+Bags">Laptop Bags</a></li>
														<li><a href="search?query=Backpacks">Backpacks</a></li>
													</ul>
												</div>
												<div class="col-lg-3">
													<h3><a href="category?id=12"><?php echo $categories[12]['categoryName']; ?></a></h3>
													<ul>
														<li><a href="search?query=Necklaces">Necklaces</a></li>
														<li><a href="search?query=Earrings">Earrings</a></li>
														<li><a href="search?query=Rings">Rings</a></li>
														<li><a href="search?query=Bracelets">Bracelets</a></li>
													</ul>
												</div>
											</div>
										</div>
									</li>
									<li class="submenu">
										<a type="button" class="show-submenu"><?php echo $categories[13]['categoryName']; ?></a>
										<ul>
											<h3><a href="category?id=13">All</a></h3>
											<li><a href="search?query=Sofas">Sofas</a></li>
											<li><a href="search?query=Beds">Beds</a></li>
											<li><a href="search?query=Tables+and+Chairs">Tables and Chairs</a></li>
											<li><a href="search?query=Bedroom+Sets">Bedroom Sets</a></li>
											<li><a href="search?query=Office+Chairs">Office Chairs</a></li>
											<li><a href="search?query=TV+Racks">TV Racks</a></li>
											<li><a href="search?query=Bookshelves">Bookshelves</a></li>
											<li><a href="search?query=Computer+Desks">Computer Desks</a></li>
											<li><a href="search?query=Jewellery+Cabinets">Jewellery Cabinets</a></li>
											<li><a href="search?query=Coffee+Tables">Coffee Tables</a></li>
											<li><a href="search?query=Shower+Cabins">Shower Cabins</a></li>
										</ul>
									</li>
									<li class="submenu">
										<a type="button" class="show-submenu"><?php echo $categories[14]['categoryName']; ?></a>
										<ul>
											<h3><a href="category?id=14">All</a></h3>
											<li><a href="search?query=Perfumes">Perfumes</a></li>
											<li><a href="search?query=Music+Instruments">Music Instruments</a></li>
											<li><a href="search?query=Art+Supplies">Art Supplies</a></li>
											<li><a href="search?query=Camping+Kits">Camping Kits</a></li>
											<li><a href="search?query=Car+Seat+Covers">Car Seat Covers</a></li>
											<li><a href="search?query=Personal+Care">Personal Care</a></li>
											<li><a href="search?query=Pet+Care">Pet Care</a></li>
										</ul>
									</li>
								</ul>
							</div>
						</nav>
						<div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-end">
							<a class="phone-top" href="contact"><strong><span>Need Help?</span>Contact Us!</strong></a>
						</div>
					</div>
				</div>
			</div>
			<div class="main-nav Sticky">
				<div class="container">
					<div class="row small-gutters">
						<div class="col-xl-3 col-lg-3 col-md-3">
							<nav class="categories">
								<ul class="clearfix">
									<li>
										<span>
										<a type="button">
										<span class="hamburger hamburger--spin">
										<span class="hamburger-box">
										<span class="hamburger-inner"></span>
										</span>
										</span>
										MENU
										</a>
										</span>
										<div id="menu">
											<ul>
												<li>
													<span><a href="index">Home Page</a></span>
												</li>
												<li>
													<span><a type="button">Account Options</a></span>
													<ul>
														<?php if (isset($_SESSION["customerID"])) { ?>
														<li><a type="button" onclick="location.href='functions/sign-out'">Sign Out</a></li>
														<?php } else { ?>
														<li><a type="button" onclick="location.href='authenticate'">Sign In or Sign Up</a></li>
														<?php } ?>
														<li><a href="account">My Account</a></li>
														<li><a href="orders">Orders</a></li>
														<li><a href="cart">Cart</a></li>
														<li><a href="wishlist">Wishlist</a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Top Categories</a></span>
													<ul>
														<li><a href="category?id=01"><?php echo $categories[1]['categoryName']; ?></a></li>
														<li><a href="category?id=02"><?php echo $categories[2]['categoryName']; ?></a></li>
														<li><a href="category?id=09"><?php echo $categories[9]['categoryName']; ?></a></li>
														<li><a href="category?id=10"><?php echo $categories[10]['categoryName']; ?></a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Topshop Collections</a></span>
													<ul>
														<?php
														$sqlQuery = "SELECT *
														FROM `collections`";
														$runQuery = mysqli_query($connection, $sqlQuery);
														$i = 1;
														while ($results = mysqli_fetch_assoc($runQuery)) {
															$collections[$i] = $results;
															$i++;
														}
														?>
														<li><a href="collection?id=1"><?php echo $collections[1]['collectionName']; ?></a></li>
														<li><a href="collection?id=2"><?php echo $collections[2]['collectionName']; ?></a></li>
														<li><a href="collection?id=3"><?php echo $collections[3]['collectionName']; ?></a></li>
														<li><a href="collection?id=4"><?php echo $collections[4]['collectionName']; ?></a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Customer Services</a></span>
													<ul>
														<li><a href="https://www.google.com/search?q=do+a+barrel+roll" target="_blank" rel="noreferrer">Request a Repair</a></li>
														<li><a href="https://www.google.com/search?q=dvd+screensaver" target="_blank" rel="noreferrer">Refund Policy</a></li>
														<li><a href="https://www.google.com/search?q=blink+html" target="_blank" rel="noreferrer">Warranty Information</a></li>
													</ul>
												</li>
												<li>
													<span><a type="button">Help and Contact</a></span>
													<ul>
														<li><a href="help">Help and FAQ</a></li>
														<li><a href="contact">Contact Topshop </a></li>
														<li><a href="about">About Topshop</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</div>
						<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
							<div class="custom-search-input">
								<form onsubmit="return false" id="searchProducts">
									<?php if (isset($_SESSION["customerID"])) { ?>
									<input type="text" class="form-control" name="query" id="query" placeholder="<?php echo 'Hi, ' . $_SESSION["firstName"] . '! What are you looking for?'; ?>">
									<?php } else { ?>
									<input type="text" class="form-control" name="query" id="query" placeholder="What are you looking for? Search here">
									<?php } ?>
									<button type="submit"><i class="header-icon-search-custom"></i></button>
								</form>
							</div>
						</div>
						<div class="col-xl-3 col-lg-2 col-md-3">
							<ul class="top-tools">
								<li>
									<div class="dropdown dropdown-cart">
										<a href="cart" class="cart-bt" id="headerCartNumItems">
										<?php
										if (isset($_SESSION["customerID"])) {
											$customerID = $_SESSION["customerID"];
											$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
											FROM `carts`
											WHERE `customerID` = '$customerID'";
										} else {
											$ipAddress = getenv("REMOTE_ADDR");
											$sqlQuery = "SELECT COUNT(*) AS `numCartItems`
											FROM `carts`
											WHERE `customerID` = 0 AND `ipAddress` = '$ipAddress'";
										}
										$runQuery = mysqli_query($connection, $sqlQuery);
										$numCartItems = mysqli_fetch_assoc($runQuery)["numCartItems"];
										if ($numCartItems > 99) {
										?>
										<strong>99</strong>
										<?php } else if ($numCartItems > 0) { ?>
										<strong><?php echo $numCartItems; ?></strong>
										<?php } ?>
										</a>
										<div class="dropdown-menu">
											<?php
											if ($numCartItems > 0) {
												if (isset($_SESSION["customerID"])) {
													$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `c`.`quantity`
													FROM `carts` AS `c`
													INNER JOIN `products` AS `p`
													ON `c`.`productID` = `p`.`productID`
													INNER JOIN `brands` AS `b`
													ON `p`.`brandID` = `b`.`brandID`
													WHERE `c`.`customerID` = '$customerID'
													ORDER BY `c`.`cartID` DESC";
												} else {
													$sqlQuery = "SELECT `p`.`productID`, `b`.`brandName`, `p`.`productName`, `p`.`newPrice`, `c`.`quantity`
													FROM `carts` AS `c`
													INNER JOIN `products` AS `p`
													ON `c`.`productID` = `p`.`productID`
													INNER JOIN `brands` AS `b`
													ON `p`.`brandID` = `b`.`brandID`
													WHERE `c`.`customerID` = 0 AND `c`.`ipAddress` = '$ipAddress'
													ORDER BY `c`.`cartID` DESC";
												}
												$runQuery = mysqli_query($connection, $sqlQuery);
												$i = $totalPrice = 0;
												while ($results = mysqli_fetch_assoc($runQuery))
												{
													$cartItems[$i] = $results;
													$totalPrice += ($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice']);
													$i++;
												}
												if ($numCartItems > 5) {
													array_splice($cartItems, 5);
												}
											?>
											<ul id="headerCartItems">
												<?php for ($i = 0; $i < count($cartItems); $i++) { ?>
												<li>
													<a href="product?id=<?php echo sprintf("%06d", $cartItems[$i]['productID']); ?>">
														<figure><img src="images/products/<?php echo $cartItems[$i]['productID']; ?>-1.jpg" width="50" height="50" class="lazy"></figure>
														<strong>
														<span>
														<?php echo $cartItems[$i]['quantity'] . 'x ' . $cartItems[$i]['brandName'] . ' ' . $cartItems[$i]['productName']; ?>
														</span>
														<?php
														if (($_COOKIE["TOPSHOPCURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
															echo '€' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice'] * $_SESSION["MURtoEUR"]);
														} else if (($_COOKIE["TOPSHOPCURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
															echo '$' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice'] * $_SESSION["MURtoUSD"]);
														} else {
															echo 'Rs ' . number_format($cartItems[$i]['quantity'] * $cartItems[$i]['newPrice']);
														}
														?>
														</strong>
													</a>
												</li>
												<?php } ?>
											</ul>
											<?php if ($numCartItems > 5) { ?>
											<div id="headerCartOverflow" class="text-center">
												<p>Showing the 5 most recent <br>products added to cart</p>
											</div>
											<?php
												}
											} else {
											$totalPrice = 0;
											?>
											<div class="text-center">
												<p>Your cart is empty</p>
											</div>
											<?php } ?>
											<div class="total-drop">
												<div class="clearfix">
													<strong>Total</strong>
													<span>
													<?php
													if (($_COOKIE["TOPSHOPCURRENCY"] == "EUR") && (isset($_SESSION["MURtoEUR"]))) {
														echo '€' . number_format($totalPrice * $_SESSION["MURtoEUR"]);
													} else if (($_COOKIE["TOPSHOPCURRENCY"] == "USD") && (isset($_SESSION["MURtoUSD"]))) {
														echo '$' . number_format($totalPrice * $_SESSION["MURtoUSD"]);
													} else {
														echo 'Rs ' . number_format($totalPrice);
													}
													?>
													</span>
												</div>
												<a href="cart" class="btn-1 outline">View Cart</a>
												<a href="checkout" class="btn-1">Checkout</a>
											</div>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="wishlist" class="wishlist"></a>
										<div class="dropdown-menu">
											<div class="text-center">
												<p>Your wishlist is empty</p>
											</div>
											<div class="text-center"><a href="wishlist" class="btn-1 outline">View Wishlist</a></div>
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown dropdown-access">
										<a href="account" class="access-link"><span>Account</span></a>
										<div class="dropdown-menu">
											<?php if (isset($_SESSION["customerID"])) { ?>
											<div class="text-center" id="dropdownName">
												<h6><?php echo 'Hi, ' . $_SESSION["firstName"] . '!'; ?></h6>
												<p><?php echo $_SESSION["email"]; ?></p>
											</div>
											<a type="button" onclick="location.href='functions/sign-out'" class="btn-1">Sign Out</a>
											<?php } else { ?>
											<a type="button" onclick="location.href='authenticate'" class="btn-1">Sign In or Sign Up</a>
											<?php } ?>
											<ul>
												<li>
													<a href="account"><i class="ti-customer"></i>My Account</a>
												</li>
												<li>
													<a href="orders"><i class="ti-package"></i>View Orders</a>
												</li>
												<li>
													<a href="track-order"><i class="ti-truck"></i>Track Order</a>
												</li>
												<li>
													<a href="help"><i class="ti-help-alt"></i>Help and FAQ</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a type="button" class="btn-search-mob"><span>Search</span></a>
								</li>
								<li>
									<a href="#menu" class="btn-cat-mob">
										<div class="hamburger hamburger--spin" id="hamburger">
											<div class="hamburger-box">
												<div class="hamburger-inner"></div>
											</div>
										</div>
										Menu
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="search-mob-wp">
					<form onsubmit="return false" id="searchProductsMobile">
						<input type="text" class="form-control" name="query" id="queryMobile" placeholder="What are you looking for? Search here">
						<input type="submit" class="btn-1 full-width" value="Search">
					</form>
				</div>
			</div>
		</header>
