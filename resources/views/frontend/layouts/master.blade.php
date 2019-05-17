<!DOCTYPE html>
<html>
<head>
	<!-- Header + Title + Style Start -->
	@include('frontend.partial.header')
	<!-- Header + Title + Style End -->
</head>
<body>
	
		<div class="wrapper">
		<!-- Navigation -->
		@include('frontend.partial.nav')
		<!-- End Navbar Part -->

		<!-- Sidebar + Content -->
		@yield('content')
		<!-- End Sidebar + Content -->

		<!-- Footer Start	 -->
		@include('frontend.partial.footer')
		<!-- Footer End -->
		
		</div>	
	
	


<!-- Script Start -->
@include('frontend.partial.script')
<!-- Script End -->
</body>
</html>