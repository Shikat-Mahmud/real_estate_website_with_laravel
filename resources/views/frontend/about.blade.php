@extends('frontend.master')
@section('title','About Us')
@section('content')

<div style="min-height: 50vh;">
<!-- Breadcrumb -->
<div class="breadcrumb">
    <div class="container">
        <div class="bread-crumb-head">
            <div class="breadcrumb-title">
                <h2>About Us</h2>
            </div>
            <div class="breadcrumb-list">
                <ul>
                    <li><a href="{{ route('home') }}">Home </a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <div class="breadcrumb-border-img">
            <img src="assets/img/bg/line-bg.png" alt="Line Image">
        </div>
    </div>
</div>
<!-- Breadcrumb -->


<!-- About Us -->
<section class="aboutus-section" style="margin-top: 40px; margin-bottom: 40px;">
	<div class="container">
		<div class="row">
			<!-- About Content -->
			<div class="about-content">
				<h1>We connect building with people</h1>
				<div class="col-lg-12">
					<div class="terms-policy" style="margin-top: 20px;">
						@foreach($abouts as $item)
						<p>{!! ($item->paragraph) !!}</p>
						@endforeach
					</div>

				</div>
			</div>

		</div>
		<!-- /About Content -->
	</div>
</section>
<!-- /About Us -->






<!-- ScrollToTop -->
<div class="progress-wrap active-progress">
	<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
	</svg>
</div>
<!-- /ScrollToTop -->


</div>

@endsection