<?php
session_start();

if (!isset($_SESSION['log'])) {
} else {
	header('location:index.php');
};

include 'dbconnect.php';
date_default_timezone_set("Asia/Bangkok");
$timenow = date("j-F-Y-h:i:s A");

if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	$queryuser = mysqli_query($conn, "SELECT * FROM login WHERE email='$email'");
	$cariuser = mysqli_fetch_assoc($queryuser);


	if (password_verify($pass, $cariuser['password'])) {
		$_SESSION['id'] = $cariuser['userid'];
		$_SESSION['role'] = $cariuser['role'];
		$_SESSION['notelp'] = $cariuser['notelp'];
		$_SESSION['name'] = $cariuser['namalengkap'];
		$_SESSION['log'] = "Logged";
		header('location:index.php');
	} else {
		echo 'Username atau password salah';
		header("location:login.php");
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Prima Flora - Masuk</title>
	<?php
	include 'page-link/link.php'
	?>
</head>

<body>
	<!-- header -->
	<?php
	include 'page-header/judul.php'
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
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Halaman Login</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Masuk
				<a href="loginadmin.php" target="_blank"><img style="width: 25px; margin-top: -6px; margin-left: 10px;" src="images/darkadmin.png" alt="adminlogo"></a>
			</h2>

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">
					<input type="text" name="email" placeholder="Email" required>
					<input type="password" name="pass" placeholder="Password" required>
					<input type="submit" name="login" value="Masuk">
				</form>
			</div>
			<h4>Belum terdaftar?</h4>
			<p><a href="registered.php">Daftar Sekarang</a></p>
		</div>
	</div>
	<!-- //login -->
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