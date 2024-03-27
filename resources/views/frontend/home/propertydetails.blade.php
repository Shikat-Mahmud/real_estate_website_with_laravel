@extends('frontend.master')
@section('title', 'Property Details')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<div class="bread-crumb-head">
			<div class="breadcrumb-title">
				<h2>Property Details</h2>
			</div>
			<div class="breadcrumb-list">
				<ul>
					<li><a href="{{ route('home') }}">Home </a></li>
					<li>Property Details</li>
				</ul>
			</div>
		</div>
		<div class="breadcrumb-border-img">
			<img src="{{asset('/')}}assets/img/bg/line-bg.png" alt="Line Image">
		</div>
	</div>
</div>
<!-- Breadcrumb -->

<!-- Detail View Section -->
<section class="buy-detailview">
	<div class="container">
		<!-- Details -->
		<div class="row align-items-center page-head">
			<div class="col-lg-8">
				<div class="buy-btn">
					<span class="buy">{{ $property->property_status->name }}</span>
					<span class="appartment">{{ $property->property_type->name ?? '' }}</span>
				</div>
				<div class="page-title">
					<h3>
						{{$property->title}}
						<span>
							<img src="{{asset('assets/img/icons/location-icon.svg')}}" alt="Image">
						</span>
					</h3>
					<p><i class="feather-map-pin"></i> {{ $property->location->name ?? '' }} {{
						$property->location->city ?? '' }}</p>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="latest-update">
					<h5>Listed on : {{ formatDate($property->created_at) }}</h5>
					<p>{{ formatCurrency($property->price) }}</p>
				</div>
			</div>
		</div>
		<!-- /Details -->

		<div class="row">
			<div class="col-lg-8">
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">


						@php
						$images = json_decode($property->property_images);
						@endphp

						@if(count($images ?? []) > 0)
						<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								@foreach($images as $key => $value)
								<div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
									<img src="{{ asset('storage/'.$value) }}" class="d-block w-100"
										alt="Slider {{ $key + 1 }}">
								</div>
								@endforeach
							</div>
							<a class="carousel-control-prev" href="#carouselExampleControls" role="button"
								data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#carouselExampleControls" role="button"
								data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
						@else
						<img src="https://placehold.co/50" alt="" srcset="" style="width: 100%;">
						@endif



					</div>
					<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>


				<!-- /Slider -->

				<!-- Overview -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#overview"
							aria-expanded="false">Overview</a>
					</h4>
					<div id="overview" class="card-collapse collapse show">
						<ul class="property-overview  collapse-view">
							<li>
								<img src="{{asset('assets/img/icons/bed-icon.svg')}}" alt="Image">
								<p>{{$property->bed_room}} Bed Rooms</p>
							</li>
							<li>
								<img src="{{asset('assets/img/icons/bath-icon.svg')}}" alt="Image">
								<p>{{$property->bathroom}} Bathrooms</p>
							</li>
							<li>
								<img src="{{asset('assets/img/icons/building-icon.svg')}}" alt="Image">
								<p>{{$property->sqft}} Sq Feet</p>
							</li>
							<li>
								<img src="{{asset('assets/img/icons/garage-icon.svg')}}" alt="Image">
								<p>{{$property->parking}} Garages</p>
							</li>
							<li>
								<img src="{{asset('assets/img/icons/calender-icon.svg')}}" alt="Image">
								<p>Build at {{ $property->year }}</p>
							</li>
						</ul>
					</div>
				</div>
				<!-- /Overview -->

				<!-- Overview -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#about"
							aria-expanded="false">Description</a>
					</h4>
					<div id="about" class="card-collapse collapse show">
						<div class="about-agent collapse-view">
							<p>{!! $property->description !!}</p>
						</div>
					</div>
				</div>
				<!-- /Overview -->

				<!-- Property Address -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#address" aria-expanded="false">Property
							Address</a>
					</h4>
					<div id="address" class="card-collapse collapse show  collapse-view">
						<ul class="property-address">
							<li>Address : <span> Ferris Park</span></li>
							<li>City : <span> Jersey City </span></li>
							<li>State : <span> New Jersey State</span></li>
							<li>Country : <span> United States</span></li>
							<li>Zip : <span> 07305</span></li>
							<li>Area : <span> Greenville</span></li>
						</ul>
					</div>
				</div>
				<!-- /Property Address -->

				<!-- Property Details -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#details" aria-expanded="false">Property
							Details</a>
					</h4>
					<div id="details" class="card-collapse collapse show  collapse-view">
						<div class="row">
							<div class="col-md-4">
								<ul class="property-details">
									<li>Property Id : <span> {{$property->propertyid}}</span></li>
									<li>Price : <span> {{$property->price}} </span></li>
									<li>Property Size : <span> {{$property->sqft}} sq ft</span></li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="property-details">
									<li>Rooms : <span> {{$property->room}}</span></li>
									<li>Bedrooms : <span> {{$property->bed_room}}</span></li>
									<li>Bathrooms : <span> {{$property->bathroom}}</span></li>
									<li>Garages : <span> {{$property->parking}}</span></li>
								</ul>
							</div>
							<div class="col-md-4">
								<ul class="property-details">
									<li>Year Built : <span> {{ $property->year }}</span></li>
									<li>Structure Type : <span> {{ $property->structure_type }}</span></li>
									<li>Floors No : <span> {{$property->floor}}</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /Property Details -->

				<!-- Amenities -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#amenities"
							aria-expanded="false">Amenities</a>
					</h4>
					<div id="amenities" class="card-collapse collapse show  collapse-view">
						<div class="row">
							<span>
								@php
								$amenities = json_decode($property->amenities);
								@endphp
							</span>
							@foreach ($amenities ?? [] as $key => $value)
							<div class="col-md-4">
								<ul class="amenities-list">
									<li><img src="{{asset('assets/img/icons/amenities-icon-1.svg')}}" alt="Image">{{
										getAmenitieName($value) }}</li>
									<li>
								</ul>
							</div>
							@endforeach

						</div>
					</div>
				</div>
				<!-- /Amenities -->

				<!-- Video -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#video" aria-expanded="false">Video</a>
					</h4>
					<div id="video" class="card-collapse collapse show  collapse-view">
						<div class="sample-video">
							@php
							$videoId = substr(strrchr($property->video_url, '='), 1);
							$embeddedUrl = "https://www.youtube.com/embed/{$videoId}";
							@endphp

							<iframe style="border-radius: 10px;" width="100%" height="400"
								src="{{ $embeddedUrl }}"></iframe>
						</div>
					</div>
				</div>
				<!-- /Video -->

				<!-- Map -->
				<div class="collapse-card">
					<h4 class="card-title">
						<a class="collapsed" data-bs-toggle="collapse" href="#map" aria-expanded="false">Map</a>
					</h4>
					<div id="map" class="card-collapse collapse show collapse-view">
						<div class="map">
							<?php
    						    // Your provided iframe link
    						    $iframeLink = $property->map;

    						    // Extract the src attribute value from the iframe link
    						    preg_match('/src="([^"]+)"/', $iframeLink, $matches);
    						    $embedURL = $matches[1] ?? '';

    						?>
							<iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0"
								marginwidth="0" src="{{ $embedURL }}"></iframe>
						</div>

					</div>
				</div>
				<!-- /Map -->

			</div>

			<!-- Sidebar -->
			<div class="col-lg-4 theiaStickySidebar">
				<div class="right-sidebar">


					@if(session('success'))
					<div class="alert alert-success" id="success-message">
						{{ session('success') }}
					</div>
					<script>
						document.addEventListener('DOMContentLoaded', function() {
						 	setTimeout(function() {
						 		var successMessage = document.getElementById('success-message');
								if (successMessage) {
									successMessage.style.display = 'none';
								}
							}, 5000);
						});
					</script>

                    @elseif(session('warning'))
                        <div class="alert alert-warning" id="warning-message">
                            {{ session('warning') }}
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                setTimeout(function() {
                                    var warningMessage = document.getElementById('warning-message');
                                    if (warningMessage) {
                                        warningMessage.style.display = 'none';
                                    }
                                }, 5000);
                            });
                        </script>

                    @endif



					<form action="{{ route('book-property.storeData') }}" method="POST"
						onsubmit="return confirm('Are you sure to book this property?')">
						@csrf
						<input type="hidden" name="property_id" value="{{ $property->id }}">
						<input type="hidden" name="book_status" value="Pending"> <!-- Set the default value here -->
						<button type="submit" class="btn btn-primary prop-book" onclick="showCongratulationModal()">
							<i class="bx bx-calendar"></i> Book Property
						</button>
					</form>




					@if(session('showCongratulation'))
					<script>
						$(document).ready(function() {
						 	$('#congratulationModal').modal('show');
						});

						function showCongratulationModal() {
							$('#congratulationModal').modal('show');
						}
					</script>
					@endif




					<!-- Modal -->
					<div class="modal fade" id="congratulationModal" tabindex="-1" role="dialog"
						aria-labelledby="congratulationModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="congratulationModalLabel">Congratulations!</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									Your property has been booked successfully.
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>

					<!-- Enquiry -->
					<div class="sidebar-card">
						<div class="sidebar-card-title">
							<h5>Request Info</h5>
						</div>
						<div class="user-active">
							<div class="user-img">
								<a href="javascript:void(0);">
									@if($property->user->photo)
									@php
									$image = $property->user->photo;
									@endphp

									<img class="avatar" src="{{ asset('storage/'.$image) }}" alt="FAQ Image">
									@else
									<img class="avatar"
										src="https://www.pngmart.com/files/21/Admin-Profile-Vector-PNG-Clipart.png">
									@endif
							</div>
							<div class="user-name">
								<h4><a href="javascript:void(0);">{{ $property->user->name ?? '' }}</a></h4>
								<p>{{ $property->user->email ?? ''}}</p>
							</div>
						</div>

						<form action="{{ route('send-message') }}" id="bookingform" method="POST">
							@csrf
							<input type="hidden" name="property_id" value="{{ $property->id }}">
							<div class="review-form">
								<input type="text" class="form-control" name="name" placeholder="Your Name">
								@if($errors->has('name'))
								<div class="text-danger">{{ $errors->first('name') }}</div>
								@endif
							</div>
							<div class="review-form">
								<input type="email" name="email" class="form-control" placeholder="Your Email">
								@if($errors->has('email'))
								<div class="text-danger">{{ $errors->first('email') }}</div>
								@endif
							</div>
							<div class="review-form">
								<input type="text" name="phone" class="form-control" placeholder="Your Phone Number">
								@if($errors->has('phone'))
								<div class="text-danger">{{ $errors->first('phone') }}</div>
								@endif
							</div>
							<div class="review-form">
								<textarea rows="5" name="message" placeholder="Yes, I'm Interested"></textarea>
								@if($errors->has('message'))
								<div class="text-danger">{{ $errors->first('message') }}</div>
								@endif
							</div>
							<div class="review-form submit-btn">
								<button type="submit" class="btn-primary">Send Message</button>
							</div>
						</form>
						<ul class="connect-us">
							<li><a href="tel:{{ $setting->business_number }}"><i class="feather-phone"></i>Call Us</a>
							</li>
							<li><a target="_blank" href="https://wa.me/{{ $setting->business_whatsapp }}"><i
										class="fa-brands fa-whatsapp"></i>Whatsapp</a>
							</li>
						</ul>
					</div>
					<!-- /Enquiry -->

				</div>
			</div>
			<!-- /Sidebar -->

		</div>

	</div>
</section>
<!-- /Detail View Section -->


@endsection
