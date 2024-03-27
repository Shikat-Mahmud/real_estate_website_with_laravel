@extends('frontend.master')
@section('title', 'Search Property')
@section('content')
<section class="feature-property-sec for-rent bg-white listing-section" data-select2-id="11">
    <div class="container" data-select2-id="10">

        <div class="row justify-content-center buy-list">

            @foreach ($searchProperties as $item)
            <!-- Buy List -->
            <div class="col-lg-12">
                <div class="product-custom">
                    <div class="profile-widget rent-list-view">
                        <div class="doc-img">
                            @php
                            $images = json_decode($item->property_images);

                            @endphp
                            <a href="{{route('property.details', $item->id)}}" class="property-img">
                                @foreach($images ?? [] as $key => $value)
                                @if($loop->index == 0)
                                <img class="img-fluid" alt="{{ $item->title }}" src="{{ asset('storage/'.$value) }}">
                                @endif
                                @endforeach
                            </a>
                            <div class="featured">
                                <span>{{ $item->property_status->name ?? '' }}</span>
                            </div>
                            <!-- <div class="user-avatar">
                                @if(isset($item->user->photo))
                                <img src="{{ asset('storage/'.$item->user->photo) }}" alt="User">
                                @else
                                <img src="https://placehold.co/50" alt="" srcset="">
                                @endif
                            </div> -->
                        </div>
                        <div class="pro-content">
                            <div class="list-head">
                                <div class="rating">
                                    <div class="product-name-price">
                                        <h3 class="title">
                                            <a href="{{route('property.details', $item->id)}}" tabindex="-1">{{$item->title}}</a>
                                        </h3>
                                        <div class="product-amount">
                                            <h5><span>{{ formatCurrency($item->price) }}</span></h5>
                                        </div>
                                    </div>
                                    <p><i class="feather-map-pin"></i> {{ $item->location->name ?? ''  }}, {{ $item->location->city ?? '' }}</p>
                                </div>
                            </div>
                            <ul class="d-flex details">
                                <li>
                                    <img src="{{ asset('assets/img/icons/bed-icon.svg') }}" alt="bed-icon">
                                    {{ $item->bed_room }} Beds
                                </li>
                                <li>
                                    <img src="{{ asset('assets/img/icons/bath-icon.svg') }}" alt="bath-icon">
                                    {{ $item->bathroom }} Baths
                                </li>
                                <li>
                                    <img src="{{ asset('assets/img/icons/building-icon.svg') }}" alt="building-icon">
                                    {{ $item->sqft }} Sqft
                                </li>
                            </ul>
                            <ul class="property-category d-flex justify-content-between">
                                <li>
                                    <span class="list">Listed on : </span>
                                    <span class="date">{{ formatDate($item->created_at) }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Buy List -->
            @endforeach

        </div>


        <div class="row">
          {{$searchProperties->links()}}
        </div>



</section>
@endsection
