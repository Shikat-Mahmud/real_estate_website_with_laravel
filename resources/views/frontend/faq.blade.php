@extends('frontend.master')
@section('title','FAQ')
@section('content')

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
                <div class="section-heading" data-aos-duration="2000">
                    <h2>{{ $faq->title }}</h2>
                    <div class="sec-line">
                        <span class="sec-line1"></span>
                        <span class="sec-line2"></span>
                    </div>
                    <p>{{ $faq->subtitle }}</p>
                </div>
                @endforeach
                @foreach($faqs as $faq)
                <div class="faq-card" data-aos-duration="2000">
                    <h4 class="faq-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#faq{{ $faq->id }}" aria-expanded="false">{{ $loop->index +1 }}. {{ $faq->question }}</a>
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

@endsection