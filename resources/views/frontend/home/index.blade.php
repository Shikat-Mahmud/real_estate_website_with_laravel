@extends('frontend.master')
@section('title', 'Home')
@section('content')

<!-- Home Banner -->
<section class="banner-section"
    style="background:url({{ asset('storage/'.$setting->banner_image) }}); background-size: cover;background-position: center;background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($herosection as $hero)
                <div class="banner-content" data-aos="fade-down">
                    <h1 style="color: #0E0E46;">{{ $hero->title }}</h1>
                    <p>{{ $hero->subtitle }}</p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-search" data-aos="fade-down">
                    <div class="tab-content" id="bannerTabContent">
                        <div class="tab-pane fade show active" id="buy_property" role="tabpanel"
                            aria-labelledby="buy-property">
                            <div class="banner-tab-property">

                                <form action="{{ route('find-property') }}" method="POST">
                                    @csrf
                                    <div class="banner-property-info">
                                        <div class="banner-property-grid">
                                            <input type="text" class="form-control" name="title"
                                                placeholder="Enter Keyword">
                                        </div>
                                        <div class="banner-property-grid">
                                            <select class="form-control" name="type_id">
                                                <option value="">Property Type</option>
                                                @foreach($property_types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="banner-property-grid">
                                            <select name="location_id" class="form-control" style="width: 200px">
                                                <option value="">Location</option>
                                                @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="banner-property-grid">
                                            <input type="text" class="form-control" name="min_price"
                                                placeholder="Min Price">
                                        </div>
                                        <div class="banner-property-grid">
                                            <input type="text" class="form-control" name="max_price"
                                                placeholder="Max Price">
                                        </div>
                                        <div class="banner-property-grid">
                                            <button type="submit" class="btn-primary">
                                                <span><i class='feather-search'></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Home Banner -->


<!-- Property Type -->
<section class="property-type-sec">
    <div class="section-shape-imgs">
        <img src="assets/img/shapes/property-sec-bg-1.png" class="rectangle-left" alt="icon">
        <img src="assets/img/shapes/property-sec-bg-2.png" class="rectangle-right" alt="icon">
        <img src="assets/img/icons/red-circle.svg" class="bg-09" alt="Image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                @foreach ($protypesection as $type)
                <div class="section-heading" data-aos="fade-down" data-aos-duration="1000">
                    <h2>{{ $type->title }}</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis mollis et sem sed </p> -->
                    <p>{{ $type->subtitle }}</p>
                </div>
                @endforeach
                <div class="owl-navigation">
                    <div class="owl-nav mynav1 nav-control"></div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="property-type-slider owl-carousel">
                    @foreach($property_types as $item)
                    <div class="property-card" data-aos="fade-down" data-aos-duration="1000">
                        <div class="property-img">
                            @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}" alt="Property types"
                                style="border-radius: 6px;">
                            @else
                            <img src="https://placehold.co/400" alt="Property types" style="border-radius: 6px;">
                            @endif
                        </div>
                        <div class="property-name">
                            <h4><a href="{{ route('get-property-by-type', $item->id) }}">
                                    {{ $item->name }}</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Property Type -->


<!-- Cities List -->
<section class="cities-list-sec">
    <div class="container">
        @foreach( $prolocationsection as $location )
        <div class="section-heading">
            <h2>{{ $location->title }}</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>{{ $location->subtitle }}</p>
        </div>
        @endforeach
        <div class="row">
            <div class="col-lg-12">
                <div class="city-card-slider owl-carousel">
                    @foreach($locations as $item)
                    <div class="city-first-card" data-aos="fade-down" data-aos-duration="2000">
                        <div class="city-list">
                            <div class="city-img">
                                @if($item->photo)
                                <img src="{{ asset('storage/'.$item->photo) }}" alt="City">
                                @else
                                <img src="https://placehold.co/50" alt="" srcset="">
                                @endif
                            </div>
                            <div class="city-name">
                                <h5>{{ $item->name }}</h5>
                            </div>
                            <div class="arrow-overlay">
                                <a href="{{ route('get-property-by-location', $item->id) }}"><i
                                        class='fa-solid fa-arrow-right'></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</section>
<!-- /Cities List -->

<!-- Feature Property For Rent -->
<section class="feature-property-sec for-rent">
    <div class="container">
        @foreach( $feturepropertysection as $feture )
        <div class="section-heading text-center">
            <h2>{{ $feture->title }}</h2>
            <div class="sec-line">
                <span class="sec-line1"></span>
                <span class="sec-line2"></span>
            </div>
            <p>{{ $feture->subtitle }}</p>
        </div>
        @endforeach
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="feature-slider owl-carousel">
                    @foreach($properties as $item)
                    <div class="slider-col">
                        <div class="product-custom" data-aos="fade-down" data-aos-duration="2000">

                            <div class="profile-widget">

                                <div class="doc-img">
                                    <a href="{{ route('property.details', $item->id) }}" class="property-img">

                                        @if($item->property_images)
                                        @php
                                        $images = json_decode($item->property_images);
                                        @endphp
                                        @foreach($images ?? [] as $key => $value)

                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/'.$value)}}" alt="Property Image">
                                        </div>
                                        @endforeach
                                        @else
                                        <img src="https://placehold.co/50" alt="" srcset="">
                                        @endif

                                    </a>
                                    <div class="product-amount">
                                        <h5><span>{{ formatCurrency($item->price) }}</span></h5>
                                    </div>
                                    <div class="featured">
                                        <span>{{ $item->property_status->name ?? '' }}</span>
                                    </div>
                                </div>
                                <div class="pro-content">
                                    <h3 class="title">
                                        <a href="{{ route('property.details', $item->id) }}">{{ $item->title }}</a>
                                    </h3>
                                    <p><i class="feather-map-pin"></i>
                                        {{ $item->location->name ?? '' }},
                                        {{ $item->location->city ?? '' }}
                                    </p>
                                    <ul class="d-flex details">
                                        <li>
                                            <img src="assets/img/icons/bed-icon.svg" alt="bed-icon">
                                            {{ $item->bed_room }} Beds
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/bath-icon.svg" alt="bath-icon">
                                            {{ $item->bathroom }} Baths
                                        </li>
                                        <li>
                                            <img src="assets/img/icons/building-icon.svg" alt="building-icon">
                                            {{ $item->sqft }} Sqft
                                        </li>
                                    </ul>
                                    <div class="property-category">
                                        <a href="{{ route('property.details', ['id' => $item->id]) }}"
                                            class="btn-primary">Details</a>
                                    </div>

                                    <!-- <ul class="property-category d-flex justify-content-between align-items-center">
                                        <li class="user-info">
                                            <a href="{{ route('property.details', $item->id) }}"><img src="assets/img/profiles/avatar-01.jpg" class="img-fluid avatar" alt="User"></a>
                                            <div class="user-name">
                                                <h6>{{ $item->user->name ?? "" }}
                                                </h6>
                                                <p>{{ $item->user->email ?? "" }}
                                                </p>
                                            </div>
                                        </li>

                                        <li>
                                            <a href="{{ route('property.details', ['id' => $item->id]) }}" class="btn-primary">Details</a>
                                        </li>
                                    </ul> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    <div class="bg-imgs">
        <img src="assets/img/bg/price-bg.png" class="bg-04" alt="Image">
    </div>
</section>
<!-- /Feature Property For Rent -->


<!-- Main Property -->
<section class="main-property-sec">
    <div class="container">
        <!-- Partners -->
        <div class="partners-sec">
            @foreach( $partnersection as $partner )
            <div class="section-heading text-center">
                <h2>{{ $partner->title }}</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p> {{ $partner->subtitle }}</p>
            </div>
            @endforeach
            <div class="row">
                <div class="col-md-12">
                    <div class="partners-slider owl-carousel">
                        @foreach($partners as $partner)
                        <div class="partner-icon">
                            <img src="{{ asset('storage/'.$partner->photo) }}"
                                style="width: 130px; height: 100px; object-fit: cover; border-radius: 6px;"
                                alt="Partners">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /Partners -->

    </div>
    <div class="bg-imgs">
        <img src="assets/img/icons/blue-circle.svg" class="bg-08" alt="icon">
    </div>
</section>
<!-- /Main Property -->


<!-- Ignore this section. No need this section -->
<section style="display: none" class="price-section">
    <div class="container">
        <div class="pricing-tab">
            <div class="section-heading">
                <h2>Pricing & Subscriptions</h2>
                <div class="sec-line">
                    <span class="sec-line1"></span>
                    <span class="sec-line2"></span>
                </div>
                <p>Checkout our package, choose your package wisely</p>
            </div>
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#monthly-price" type="button" role="tab" aria-controls="monthly-price"
                        aria-selected="true">Monthly</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#yearly-price"
                        type="button" role="tab" aria-controls="yearly-price" aria-selected="false">Yearly</button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="pills-tabContent">

            <!-- Monthly Price -->
            <div class="tab-pane fade active show" id="monthly-price" role="tabpanel"
                aria-labelledby="pills-profile-tab">
                <div class="row justify-content-center">

                    <!-- Price Item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card aos" data-aos="flip-right" data-aos-easing="ease-out-cubic">
                            <div class="price-title">
                                <h3>Standard</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                    ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="price-features">
                                <h5>Key Features</h5>
                                <ul>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>10 Listing Per Login</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry On Listing</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>24 Hrs Support</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Transaction Tracking</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="login.html" class="btn-primary">Get Quote</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Price Item -->

                    <!-- Price Item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                            data-aos-duration="1000">
                            <div class="price-sticker">
                                <img src="assets/img/icons/pricing-icon.svg" alt="price-sticker">
                            </div>
                            <div class="price-title">
                                <h3>Professional</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                    ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="price-features professional">
                                <h5>Key Features</h5>
                                <ul>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>20 Listing Per Login</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry On Listing</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>24 Hrs Support</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Transaction Tracking</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="login.html" class="btn-primary">Get Quote</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Price Item -->

                    <!-- Price Item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card" data-aos="flip-right" data-aos-easing="ease-out-cubic"
                            data-aos-duration="2000">
                            <div class="price-title">
                                <h3>Enterprise</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                    ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="price-features enterprise">
                                <h5>Key Features</h5>
                                <ul>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>30 Listing Per Login</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>100+ Users</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry On Listing</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>24 Hrs Support</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Transaction Tracking</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="login.html" class="btn-primary">Get Quote</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Price Item -->

                </div>
            </div>
            <!-- /Monthly Price -->

            <!-- Yearly Price -->
            <div class="tab-pane fade" id="yearly-price" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="row justify-content-center">

                    <!-- Price Item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card">
                            <div class="price-title">
                                <h3>Standard</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                    ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="price-features">
                                <h5>Key Features</h5>
                                <ul>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>50 Listing per login</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>150+ Users</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry on listing</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>24 hrs Support</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Transaction tracking</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="login.html" class="btn-primary">Get Quote</a>
                            </div>
                        </div>
                    </div>

                    <!-- Price Item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card">
                            <div class="price-title">
                                <h3>Professional</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                    ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="price-features professional">
                                <h5>Key Features</h5>
                                <ul>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>80 Listing per login</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>200+ Users</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry on listing</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>24 hrs Support</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Transaction tracking</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="login.html" class="btn-primary">Get Quote</a>
                            </div>
                        </div>
                    </div>

                    <!-- Price Item -->
                    <div class="col-lg-4 col-md-6">
                        <div class="price-card">
                            <div class="price-title">
                                <h3>Enterprise</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                                    ullamcorper mattis, pulvinar dapibus leo.</p>
                            </div>
                            <div class="price-features enterprise">
                                <h5>Key Features</h5>
                                <ul>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>70 Listing per login</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>300+ Users</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Enquiry on listing</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>24 hrs Support</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Custom Review</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Impact Reporting</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Onboarding & Account</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>API Access</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Transaction tracking</li>
                                    <li><span><i class="fa-regular fa-square-check"></i></span>Branding</li>
                                </ul>
                            </div>
                            <div class="price-btn">
                                <a href="login.html" class="btn-primary">Get Quote</a>
                            </div>
                        </div>
                    </div>
                    <!-- /Price Item -->

                </div>
            </div>
            <!-- /Yearly Price -->

        </div>
    </div>
</section>
<!-- /Ignore this section. No need this section -->

<!-- Faq -->
<section class="faq-section" id="faq">
    <div class="container">
        <div class="row">
            @foreach( $faqsection as $faq )
            <div class="col-lg-4">
                <div class="faq-img">
                    @if($faq->photo)
                    @php
                    $image = $faq->photo;
                    @endphp

                    <img style="object-fit: cover; width: 300px; height: 600px;"
                        src="{{ asset('storage/'.$image) }}" alt="FAQ Image">
                    @else
                    <img  style="object-fit: cover; width: 300px; height: 600px;" src="https://st.hzcdn.com/simgs/pictures/exteriors/18th-ave-city-homes-unit-c-mb-architecture-interiors-img~f8e1811b02588d32_14-2803-1-100fee4.jpg" >
                    @endif
                </div>
            </div>
            <div class="col-lg-8">
                <div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
                    <h2>{{ $faq->title }}</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>{{ $faq->subtitle }}</p>
                </div>
                @endforeach
                @foreach($faqs as $faq)
                <div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faq{{ $faq->id }}"
                            aria-expanded="false">{{ $loop->index +1 }}. {{ $faq->question }}</a>
                    </h4>
                    <div id="faq{{ $faq->id }}" class="card-collapse collapse">
                        <div class="faq-info">
                            <p>{{ $faq->answer }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- /Faq -->

<!-- Search -->
<div class="search-popup js-search-popup ">
    <a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
        <i class="fa fa-close"></i>
    </a>
    <div class="popup-inner">
        <div class="inner-container">
            <form class="search-form" id="search-form"
                action="https://dreamsestate.dreamstechnologies.com/html/rent-property-grid.html">
                <h3>What Are You Looking for?</h3>
                <div class="search-form-box flex">
                    <input type="text" class="search-input" placeholder="Type a  Keyword...." id="search-input"
                        aria-label="Type to search" role="searchbox" autocomplete="off">
                    <button type="submit" class="search-icon"><i class="bx bx-search"></i></button>
                </div>
                <h5>Popular Properties</h5>
                <ul>
                    <li><a href="rent-property-grid.html">Beautiful Condo Room</a></li>
                    <li><a href="rent-property-grid.html">Royal Apartment</a></li>
                    <li><a href="rent-property-grid.html">Grand Villa House</a></li>
                    <li><a href="rent-property-grid.html">Grand Mahaka</a></li>
                    <li><a href="rent-property-grid.html">Lunaria Residence</a></li>
                    <li><a href="rent-property-grid.html">Stephen Alexander Homes</a></li>
                </ul>
            </form>
        </div>
    </div>
</div>
<!-- /Search -->
@endsection