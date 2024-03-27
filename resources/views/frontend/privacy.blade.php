@extends('frontend.master')
@section('title', 'Privacy and Policy')
@section('content')

<div style="min-height: 50vh;">

<!-- Privacy Policy -->
<div class="privacy-section section">

    <div class="container">
        <div class="row">
            <!-- Privacy Content -->
            <div class="about-content">
                <h1>Our Commitment to Privacy</h1>
                <div class="col-lg-12">
                    <div class="terms-policy" style="margin-top: 20px;">
                        <p>{!! $privacy->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /Privacy Policy -->

<!-- ScrollToTop -->
<div class="progress-wrap active-progress">
    <svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
<!-- /ScrollToTop -->
</div>

@endsection