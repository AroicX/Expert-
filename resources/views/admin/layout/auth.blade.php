<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	@yield('title')
	    
	   <link rel="stylesheet" type="text/css" href="\css\bootstrap.min.css">
	   <!--     Fonts and icons     -->
	   <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	   <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	   <!-- CSS Files -->
	   <link href="/css/bootstrap.min.css" rel="stylesheet" />
	   <link href="/css/now-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
	   <!-- CSS Just for demo purpose, don't include it in your project -->
	   <link href="/demo/demo.css" rel="stylesheet" />
	@yield('style')
	  

</head>
<body>
	<div class="container">
		@yield('content')
		
	</div>
	
<!--   Core JS Files   -->
<script src="/js/core/jquery.min.js"></script>
<script src="/js/core/popper.min.js"></script>
<script src="/js/core/bootstrap.min.js"></script>
<script src="/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/js/now-ui-dashboard.min.js?v=1.1.0" type="text/javascript"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="/demo/demo.js"></script>
@yield('script')
<script>
  $(document).ready(function() {
    // Javascript method's body can be found in assets/js/demos.js
    demo.initDashboardPageCharts();

  });
</script>

</body>
</html>