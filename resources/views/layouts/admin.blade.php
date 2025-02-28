<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Yuban Dashboard</title>
	<!--<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets')}}/img/favicon.png">-->

	<link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@400,700&display=swap" rel="stylesheet">



	<link rel="stylesheet" href="{{ asset('assets')}}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/toastr.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/bootstrap-datetimepicker.min.css">
	<!--<link rel="stylesheet" href="{{ asset('assets')}}/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="{{ asset('assets')}}/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/feathericon.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/style.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/styless.css">

	<link rel="stylesheet" href="{{ asset('assets')}}/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="{{ asset('assets')}}/css/buttons.dataTables.min.css">
	<style>
		.image-container {
			position: relative;
			overflow: hidden;
			/* max-width: 100%; /* Restrict the container's width */
			/* max-height: 100%;*/
			width: 75px;
			/* Set the desired width */
			height: 75px;
			/* Set the desired height */
		}

		.image-container img {
			width: 100%;
			/* Set the image width to fill the container */
			height: 100%;
			/* Set the image height to fill the container */
			transition: transform 0.3s ease;
		}

		.image-container:hover img {
			transform: scale(1.2);
		}

		.myheader {
			font-family: 'Yanone Kaffeesatz', sans-serif !important;
			font-weight: 700 !important;
		}

		.preview-subject {
			background-color: #f0f0f0;
			border: none;
			padding: 10px 20px;
			font-size: 16px;
			transition: background-color 0.3s ease;
		}

		.preview-subject:hover {
			background-color: #a0a0a0;
			cursor: pointer;
		}

		.dropdown-menu {
			display: none;

		}

		.expanded {
			display: block;
		}
	</style>
</head>

<body>
	<div class="main-wrapper">

		@include('admin.header')

		@include('admin.sidebar')

		@yield('content')
	</div>

	
	<script src="{{ asset('assets')}}/js/jquery-3.5.1.min.js"></script>

	<script src="{{ asset('assets')}}/js/toastr.min.js"></script>

	<script src="{{ asset('assets')}}/js/popper.min.js"></script>
	<script src="{{ asset('assets')}}/js/bootstrap.min.js"></script>

	<script src="{{ asset('assets')}}/js/jquery.dataTables.min.js"></script>

	<script src="{{ asset('assets')}}/js/dataTables.bootstrap4.min.js"></script>



	<script src="{{ asset('assets')}}/js/dataTables.buttons.min.js"></script>
	<script src="{{ asset('assets')}}/js/buttons.html5.min.js"></script>
	<script src="{{ asset('assets')}}/js/buttons.print.min.js"></script>
	<script src="{{ asset('assets')}}/js/jszip.min.js"></script>
	<script src="{{ asset('assets')}}/js/pdfmake.min.js"></script>
	<script src="{{ asset('assets')}}/js/vfs_fonts.js"></script>





	<script src="{{ asset('assets')}}/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{{ asset('assets')}}/js/script.js"></script>

	


</body>

</html>