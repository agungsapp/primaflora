<?php
session_start();
include 'dbconnect.php';

$idk = $_GET['idkategori'];
?>
<!DOCTYPE html>
<html>

<head>
	<title>Prima Flora - Kategori</title>
	<?php
	include 'page-link/link.php'
	?>
</head>

<body>
	<!-- header -->
	<?php
	include 'page-header/header.php'
	?>
	<!-- //header -->
	<!-- navigation -->
	<div class="bg-navbar navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="act">Home</a></li>
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Kategori Produk<b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="multi-gd-img">
										<ul class="multi-column-dropdown">
											<h6>Kategori</h6>

											<?php
											$kat = mysqli_query($conn, "SELECT * from kategori order by idkategori ASC");
											while ($p = mysqli_fetch_array($kat)) {

											?>
												<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><?php echo $p['namakategori'] ?></a></li>

											<?php
											}
											?>
										</ul>
									</div>

								</div>
							</ul>
						</li>
						<li><a href="cart.php">Keranjang Saya</a></li>
						<li><a href="daftarorder.php">Daftar Order</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<!-- //navigation -->
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Kategori</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!--- beverages --->
	<div class="products">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories">
					<h2>Categories</h2>
					<ul class="cate">


						<?php
						$kat = mysqli_query($conn, "SELECT * from kategori order by idkategori ASC");
						while ($p = mysqli_fetch_array($kat)) {

						?>
							<li><a href="kategori.php?idkategori=<?php echo $p['idkategori'] ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i><?php echo $p['namakategori'] ?></a></li>

						<?php
						}
						?>

					</ul>
				</div>
			</div>
			<div class="col-md-8 products-right">
				<div class="agile_top_brands_grids">


					<?php
					$brgs = mysqli_query($conn, "SELECT * from produk where idkategori='$idk' order by idproduk ASC");
					$x = mysqli_num_rows($brgs);

					if ($x > 0) {
						while ($p = mysqli_fetch_array($brgs)) {
					?>

							<div class="col-md-4 top_brand_left">
								<div class="hover14 column">
									<div class="agile_top_brand_left_grid">
										<div class="agile_top_brand_left_grid_pos">
											<img src="images/offer.png" alt=" " class="img-responsive" />
										</div>
										<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block">
													<div class="snipcart-thumb">
														<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><img src="<?php echo $p['gambar'] ?>" width="200px" height="200px"></a>
														<p><?php echo $p['namaproduk'] ?></p>
														<h4>Rp<?php echo number_format($p['hargaafter']) ?> <span>Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
													</div>
													<div class="snipcart-details top_brand_home_details">
														<fieldset>
															<a href="product.php?idproduk=<?php echo $p['idproduk'] ?>"><input onmouseover="this.style.backgroundColor='#85BC27'" onMouseOut="this.style.backgroundColor='#3699C9'" type="submit" class="button" value="Lihat Produk" /></a>
														</fieldset>
													</div>
												</div>
											</figure>
										</div>
									</div>
								</div>
							</div>
					<?php
						}
					} else {
						echo "Data tidak ditemukan";
					}
					?>

					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--- beverages --->
	<!-- //footer -->
	<?php
	include 'page-footer/footer.php'
	?>
	<!-- //footer -->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

	<!-- top-header and slider -->
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {

			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 4000,
				easingType: 'linear'
			};


			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->

	<!-- main slider-banner -->
	<script src="js/skdslider.min.js"></script>
	<link href="css/skdslider.css" rel="stylesheet">
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery('#demo1').skdslider({
				'delay': 5000,
				'animationSpeed': 2000,
				'showNextPrev': true,
				'showPlayButton': true,
				'autoSlide': true,
				'animationType': 'fading'
			});

			jQuery('#responsive').change(function() {
				$('#responsive_wrapper').width(jQuery(this).val());
			});

		});
	</script>
	<!-- //main slider-banner -->
</body>

</html>