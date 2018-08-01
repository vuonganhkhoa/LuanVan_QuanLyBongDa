
<!DOCTYPE html>
<html lang="en">

		@include ('client.layouts.style')

		<body class="kode-football">

			<!--// Main Content //-->
			<div class="kode-wrapper">

			  @include ('client.layouts.header')
			  @yield ('content')
			  
			</div>
			
		  <!--// Contact Footer //-->
		  @include ('client.layouts.footer')

		</body>
		
		@include ('client.layouts.script')
		@yield ('script')

</html>