<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
@include ('admin.layout.style')
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		@include('admin.layout.sidebar_nhanvienyte')
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		@include('admin.layout.header')
		<!-- //header-ends -->
		<!-- main content start-->
		@yield('content')
		<!--footer-->
		@include('admin.layout.footer')
		<!--//footer-->
	</div>
	<!-- Classie -->
	@include ('admin.layout.script')
</body>
</html>