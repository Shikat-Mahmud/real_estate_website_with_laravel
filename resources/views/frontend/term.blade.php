@extends('frontend.master')
@section('title','Terms and Conditions')
@section('content')

<div style="min-height: 50vh;">

<!-- Terms & Conditions -->
<div class="section privacy-section">
	<div class="container">
		<div class="row">
			<!-- Terms Content -->
			<div class="about-content">
				<h1>Terms and Conditions of Use</h1>
				<div class="col-lg-12">
					<div class="terms-policy" style="margin-top: 20px;">
						@foreach($terms as $item)
						<p>{!! ($item->paragraph) !!}</p>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Terms & Conditions -->

<!-- ScrollToTop -->
<div class="progress-wrap active-progress">
	<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
		<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
	</svg>
</div>
<!-- /ScrollToTop -->

</div>


@endsection