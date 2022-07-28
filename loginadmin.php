<?php
session_start();

if (isset($_SESSION['login'])) {
	header('location:admin/index.php');
} else {
};

include 'dbconnect.php';
date_default_timezone_set("Asia/Bangkok");
$timenow = date("j-F-Y-h:i:s A");

if (isset($_POST['login'])) {
	$nama = mysqli_real_escape_string($conn, $_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST['pass']);
	// $queryuser = mysqli_query($conn, "SELECT * FROM login WHERE email='$nama'");
	// $cariuser = mysqli_fetch_assoc($queryuser);

	if ($nama == 'admin1' && $pass == 'admin123') {
		$_SESSION['login'] = 'true';
		$_SESSION['nama'] = $nama;
		header('location:admin/index.php');
		exit;
	} else if ($nama == 'admin2' && $pass == 'admin123') {
		$_SESSION['login'] = 'true';
		$_SESSION['nama'] = $nama;
		header('location:admin/index.php');
		exit;
	} else if ($nama == 'admin3' && $pass == 'admin123') {
		$_SESSION['login'] = 'true';
		$_SESSION['nama'] = $nama;
		header('location:admin/index.php');
		exit;
	} else {
		$err = true;
	}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>Prima Flora - Welcome admin</title>

	<?php
	include 'page-link/link.php'
	?>
	<style>
		.login {
			margin-top: 9rem;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		h2::after {
			width: 50%;
			content: '';
			background: #3399cc;
			height: 2px;
			position: absolute;
			bottom: 0%;
			left: 43%;
		}
	</style>
</head>

<body>
	<div class="login">
		<div class="container">
			<h2>Welcome admin</h2>

			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">
					<?php if (isset($err)) : ?>
						<label style="color: red; font-style:italic;">Username/ Password Anda Salah !</label>
					<?php endif ?>
					<input type="text" name="username" placeholder="nama pengguna" required>
					<input type="password" name="pass" placeholder="Password" required>
					<input type="submit" name="login" value="Masuk">
				</form>
			</div>
		</div>
	</div>
	<!-- //login -->

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