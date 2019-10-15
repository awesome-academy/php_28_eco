<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<base href="{{ asset('') }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="iassets/user/mages/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="assets/user/vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="assets/user/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/user/css/main.css">
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('user.layouts.header')
	
	@yield('content')

	<!-- Footer -->
	@include('user.layouts.footer')


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	
	<script src="assets/user/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="assets/user/vendor/animsition/js/animsition.min.js"></script>
	<script src="assets/user/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/user/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/user/vendor/select2/select2.min.js"></script>
	<script src="assets/user/vendor/daterangepicker/moment.min.js"></script>
	<script src="assets/user/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="assets/user/vendor/slick/slick.min.js"></script>
	<script src="assets/user/js/slick-custom.js"></script>
	<script src="assets/user/vendor/parallax100/parallax100.js"></script>
	<script src="assets/user/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script src="assets/user/vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="assets/user/vendor/sweetalert/sweetalert.min.js"></script>
	<script src="assets/user/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="assets/user/js/main.js"></script>

</body>
</html>