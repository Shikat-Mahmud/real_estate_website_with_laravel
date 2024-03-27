<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield('title')</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{  asset('storage/'.$setting->favicon) }}" type="image/x-icon">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{  asset('assets/css/bootstrap.min.css') }}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{  asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
	<link rel="stylesheet" href="{{  asset('assets/plugins/fontawesome/css/all.min.css') }}">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="{{  asset('assets/css/feather.css') }}">

	<!-- Boxicons CSS -->
	<link rel="stylesheet" href="{{  asset('assets/plugins/boxicons/css/boxicons.min.css') }}">

	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="{{  asset('assets/css/owl.carousel.min.css') }}">

	<!-- Animation CSS -->
	<link rel="stylesheet" href="{{  asset('assets/css/aos.css') }}">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{  asset('assets/plugins/select2/css/select2.min.css') }}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{  asset('assets/css/style.css') }}">

	<!-- Fancybox CSS -->
	<link rel="stylesheet" href="{{  asset('assets/plugins/fancybox/jquery.fancybox.min.css') }}">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
		integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="min-height: 100vh !important;">

	<!-- Loader -->
	<!-- <div class="page-loader">
			<div class="page-loader-inner">
				<img src="{{ asset('assets/img/icons/loader.svg') }}" alt="Loader">
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div> -->
	<!-- /Loader -->

	<!-- Main Wrapper -->
	<div class="main-wrapper">
		@include('frontend.partials.header')
		@yield('content')
		@include('frontend.partials.footer')
	</div>
	<!-- /Main Wrapper -->

	<!-- scrollToTop start -->
	<div class="progress-wrap active-progress">
		<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
		</svg>
	</div>
	<!-- scrollToTop end -->

	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>

	<!-- Bootstrap Bundle JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Feather Icon JS -->
	<script src="{{ asset('assets/js/feather.min.js') }}"></script>

	<!-- Owl Carousel JS -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>

	<!-- Animation JS -->
	<script src="{{ asset('assets/js/aos.js') }}"></script>

	<!-- Select2 JS -->
	<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>

	<!-- Counter JS -->
	<script src="{{ asset('assets/js/waypoints.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/script.js') }}"></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			// Get the price-section div
			var priceSection = document.getElementById('price-section');

			// Check if the price-section div exists before trying to remove it
			if (priceSection) {
				// Remove the price-section div
				priceSection.parentNode.removeChild(priceSection);
			}
		});
	</script>

	<!-- Slick JS -->
	<script src="{{ asset('assets/plugins/slick/slick.js') }}"></script>

	<!-- Sticky Sidebar JS -->
	<script src="{{ asset('assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }} "></script>
	<script src="{{ asset('assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }} "></script>

	<!-- Fancybox JS -->
	<script src="{{ asset('assets/plugins/fancybox/jquery.fancybox.min.js') }} "></script>


	<script>
		function bookProperty() {
			$.post('{{ route('book-property.storeData') }}', $('#bookPropertyForm').serialize(), function (response) {
				// Handle the response, show success message or perform other actions
				console.log(response.message);
				showCongratulationModal();
			});
		}
	</script>

	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

	<script>
		$(document).ready(function () {
			// Show or hide the scrollToTop button based on scroll position
			$(window).scroll(function () {
				if ($(this).scrollTop() > 100) {
					$('.progress-wrap').fadeIn();
				} else {
					$('.progress-wrap').fadeOut();
				}
			});

			// Scroll to the top when the scrollToTop button is clicked
			$('.progress-wrap').click(function () {
				$('html, body').animate({ scrollTop: 0 }, 800); // 800 milliseconds for the animation
				return false;
			});
		});
	</script>

	<script>
		$(document).ready(function () {
			$('.slider').carousel();
		});
	</script>

	@stack('script')
</body>

</html>