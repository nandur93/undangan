<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<?php
include "./php/header.php";
?>

<body>
	<script type="text/javascript" src="js/html5-qrcode.min.js"></script>
	<div class="fh5co-loader"></div>
	<div id="page">
		<nav class="fh5co-nav" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="fh5co-logo"><a href="./">Wedding<strong>.</strong></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="./">Home</a></li>
							<li><a href="about.html">Guest List</a></li>
							<li class="has-dropdown">
								<a href="services.html">Services</a>
								<ul class="dropdown">
									<li><a href="#">Web Design</a></li>
									<li><a href="#">eCommerce</a></li>
									<li><a href="#">Branding</a></li>
									<li><a href="#">API</a></li>
								</ul>
							</li>
							<li class="has-dropdown active">
								<a href="gallery.html">Gallery</a>
								<ul class="dropdown">
									<li><a href="#">HTML5</a></li>
									<li><a href="#">CSS3</a></li>
									<li><a href="#">Sass</a></li>
									<li><a href="#">jQuery</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>

		<div id="fh5co-started" class="fh5co-bg" style="background-image:url(images/img_bg_4.jpg);">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
						<h2>Hello!</h2>
						<h3>Please scan your QR Invitation here</h3>
						<div class="row animate-box">
							<div id="reader" width="600px"></div>
						</div>
						<script type="text/javascript">
							function onScanSuccess(decodedText, decodedResult) {
								// handle the scanned code as you like, for example:
								console.log('Code matched = ${decodedText}', decodedResult);

								var string_ori = decodedText;
								var string1 = decodedText;

								string1 = string1.split('From ')[1];
								string2 = string1.split('Sesi ')[1];
								string3 = string1.split('Sesi ')[1];
								string_ori = string_ori.split(' From')[0];

								var remove_after_sesi = string1.indexOf(' Sesi');
								var remove_after_from = string1.indexOf(' From');
								var result_nama = string1.substring(0, remove_after_from);
								var result_alamat = string1.substring(0, remove_after_sesi);

								$("#nama-tamu").val(string_ori);
								$("#alamat").val(result_alamat);
								$("#sesi").val(string3);
								document.forms[0].submit();
								html5QrCode.stop().then((ignore) => {
									// QR Code scanning is stopped.
									console.log('scan stop')
								}).catch((err) => {
									// Stop failed, handle it.
								});
							}

							function onScanFailure(error) {
								// handle scan failure, usually better to ignore and keep scanning.
								// for example:
								console.warn('Code scan error = ${error}');
							}

							let html5QrcodeScanner = new Html5QrcodeScanner(
								"reader", {
									fps: 10,
									qrbox: {
										width: 250,
										height: 250
									}
								},
								/* verbose= */
								false);
							html5QrcodeScanner.render(onScanSuccess, onScanFailure);
						</script>
						</br>
						<form action="./php/scan_success.php" method="post" id="qr-result">
							<div class="row animate-box">
								<div class="col-md-12 col-md-offset-2">
									<div class="col-md-8 col-sm-4">
										<div class="form-group">
											<label for="name" class="custom-label">Name</label>
											<input type="text" class="form-control" id="nama-tamu" name="nama-tamu" placeholder="Nama" value="">
										</div>
									</div>
								</div>
							</div>
							<div class="row animate-box">
								<div class="col-md-12 col-md-offset-2">
									<div class="col-md-8 col-sm-4">
										<div class="form-group">
											<label for="alamat" class="custom-label">From</label>
											<input type="text" class="form-control" id="alamat" name="alamat" placeholder="From">
										</div>
									</div>
								</div>
							</div>
							<div class="row animate-box">
								<div class="col-md-12 col-md-offset-2">
									<div class="col-md-8 col-sm-4">
										<div class="form-group">
											<label for="sesi" class="custom-label">Sesi</label>
											<input type="text" class="form-control" id="sesi" name="sesi" placeholder="Sesi">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php

		include './php/connection.php';
		$selectquery = "SELECT * FROM tr_tamu ORDER BY tamuId DESC LIMIT 1";
		$reservasi = mysqli_query($conn, $selectquery);
		$row = $reservasi->fetch_assoc();
		$name_guest = $row['name'];
		echo "<script type='text/javascript'>alert('" . $name_guest . "');</script>";
		?>
		<!-- Footer start -->
		<?php
		include "./php/footer.php";
		?>
		<!-- Footer end -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>

	<!-- Main -->
	<script src="js/main.js"></script>
</body>

</html>