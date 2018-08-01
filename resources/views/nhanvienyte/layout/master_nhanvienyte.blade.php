<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
@include ('nhanvienyte.layout.style')
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		@include('nhanvienyte.layout.sidebar_nhanvienyte')
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		@include('nhanvienyte.layout.header')
		<!-- //header-ends -->
		<!-- main content start-->
		@yield('content')
		<!--footer-->
		@include('nhanvienyte.layout.footer')
		<!--//footer-->
	</div>
	<!-- Classie -->
	@include ('nhanvienyte.layout.script')
	@yield('script')
</body>
</html>