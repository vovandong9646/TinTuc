<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<base href="{{asset('')}}">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	@yield('style')
</head>
<body>
	<!-- menu -->
	@include('layout.menu')
	<!-- end-navbar -->
	@yield('content')
	<!-- end-content -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	@yield('script')
</body>
</html>