<?php
session_start();
include 'dbconnect.php';

$idproduk = $_GET['idproduk'];





require 'functions/disablepesan.php';

if (isset($_POST['addprod'])) {
	echo '
	<script>
	 alert("$_POST["mulai"]")
    </script>';
	require 'functions/funbeli.php';
};
?>
<!DOCTYPE html>
<html>

<head>
	<title>Prima Flora - Produk</title>

	<style>
		div.input-group {
			margin-top: 1rem;
			width: 120px;
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
		}

		input.button {
			box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.7);
		}

		.set-tanggal {
			margin-top: 2rem;
		}

		.mulai,
		.akhir {
			margin-top: 1rem;
			display: flex;
			width: 400px;
			justify-content: space-between;
		}
	</style>
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
						<li><a href="konfirmasi.php">Daftar Order</a></li>
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
				<li class="active"><?php
									$p = mysqli_fetch_array(mysqli_query($conn, "Select * from produk where idproduk='$idproduk'"));
									echo $p['namaproduk'];
									?>
				</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				<!-- allert tidak tersedia  -->
				<?php if ($tersedia == false) : ?>
					<div class='alert alert-danger text-center'>Barang tidak dapat di pesan ! atau sedang disewa </div>
				<?php endif ?>
				<!-- end allert -->
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="<?php echo $p['gambar'] ?>" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<h2><?php echo $p['namaproduk'] ?></h2>
					<div class="rating1">
						<span class="starRating">
							<?php
							$bintang = '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
							$rate = $p['rate'];

							for ($n = 1; $n <= $rate; $n++) {
								echo '<i class="fa fa-star blue-star" aria-hidden="true"></i>';
							};
							?>
						</span>
					</div>
					<div class="w3agile_description">
						<h4>Deskripsi :</h4>
						<p><?php echo $p['deskripsi'] ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing">Rp<?php echo number_format($p['hargaafter']) ?> <span>Rp<?php echo number_format($p['hargabefore']) ?></span></h4>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<form action="" method="post">
								<!-- tambah barang -->
								<!-- <label style="margin-top: 1rem; margin-left:-40px;" for="quant">Jumlah Barang :</label>
								<div class="input-group">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="kuantiti">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
									<input type="text" name="kuantiti" id="quant" class="form-control input-number" value="1" min="1" max="10">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="kuantiti">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div> -->
								<!-- tambah barang end -->
								<!-- lama sewa -->
								<!-- <label style="margin-top: 1rem; margin-left:-70px;" for="quant">Lama Sewa :</label>
								<div class="input-group">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="lamasewa">
											<span class="glyphicon glyphicon-minus"></span>
										</button>
									</span>
									<input type="text" name="lamasewa" id="quant" class="form-control input-number" value="5" min="5" max="10">
									<span class="input-group-btn">
										<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="lamasewa">
											<span class="glyphicon glyphicon-plus"></span>
										</button>
									</span>
								</div> -->
								<!-- lama sewa end -->

								<!-- date picker -->
								<div class="set-tanggal">
									<div class="mulai">
										<label for="mulai">Tangal Mulai</label>
										<input id="mulai" autocomplete="off" name="mulai" id="mulai" type="text" class="datepicker">
									</div>
									<div class="akhir">
										<label for="akhir">Tangal Akhir</label>
										<input id="akhir" autocomplete="off" name="akhir" id="akhir" type="text" class="datepicker">
									</div>
								</div>

								<!-- date picker end -->
								<fieldset style="margin-top: 2rem;">
									<input type="hidden" name="idprod" value="<?php echo $idproduk ?>">
									<input id="beli" type="submit" name="addprod" value="Tambah Ke Keranjang" class="button">
								</fieldset>

							</form>
						</div>
					</div>


				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

	<!-- footer -->
	<?php
	include 'page-footer/footer.php'
	?>
	<!-- footer -->
	<!-- Bootstrap Core JavaScript -->

	<!-- disable jika status tidak tersedia -->
	<?php if (isset($disabled)) : ?>
		<script>
			var mulai = document.getElementById('mulai');
			var akhir = document.getElementById('akhir');
			var beli = document.getElementById('beli');
			mulai.disabled = true;
			akhir.disabled = true;
			beli.disabled = true;
		</script>
	<?php else : ?>
	<?php endif ?>
	<!-- disable end -->


	<script src="js/bootstrap.min.js"></script>
	<script>
		<?php
		require 'functions/funsweet.php';
		?>
	</script>

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

	<script src="js/tambah.js"></script>
	<script src="js/datepicker.js"></script>
</body>

</html>