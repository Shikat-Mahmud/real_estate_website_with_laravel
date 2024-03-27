<style>
    .logo-set {
        width: 200px; 
        height: auto; 
        padding: 10px;
    }
</style>

<footer style="clear: both;" class="footer">
    <!-- Footer Top -->
    <div class="footer-top">
        <div class="footer-border-img">
            <img src="{{asset('/')}}assets/img/bg/line-bg.png" alt="image">
        </div>
        <div class="container">
            <div class="row">
                    
                    <div class="col-lg-3 col-md-3 col-sm-4  d-flex align-items-center">
                        <div class="row mx-auto d-flex">
                            @if($setting->logo)
                            <a href="{{ route('home') }}">
                            <img src="{{ asset('storage/'.$setting->logo) }}" class="img-fluid d-block mx-auto logo-set" alt="Logo">
                            </a>
                            @endif
                            
                            <h3 style="color: white;">{{ gs()->business_name ?? '' }}</h3>
                            <p style="color: white;">  <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;{{ gs()->business_address ?? '' }}</p>
                            <p style="color: white;"> <i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;{{ gs()->business_number ?? '' }}</p>
                            <p style="color: white;"><i class="fab fa-whatsapp"></i>&nbsp;&nbsp;{{ gs()->business_whatsapp ?? '' }}</p>
                            
                        </div>
                    </div>

                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Explore</h4>
                        </div>
                        <ul>

                            <li><a href="{{route('register')}}">Register</a></li>
                            <li><a href="{{route('login')}}">Login</a></li>
                            <li><a href="{{route('home')}}">Home</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Property</h4>
                        </div>
                        @foreach(\App\Models\Property::latest()->take(4)->get() as $item)
                        <ul>
                            <li><a href="{{ route('property.details', $item->id) }}">{{ \Str::limit($item->title, $limit = 5, '..') }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Locations</h4>
                        </div>
                        @foreach(\App\Models\Location::latest()->take(4)->get() as $item)
                        <ul>
                            <li><a href="{{ route('get-property-by-location', $item->id) }}">{{ \Str::limit($item->name, $limit = 5, '..') }}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-4">
                    <div class="footer-widget-list">
                        <div class="footer-content-heading">
                            <h4>Quick Links</h4>
                        </div>
                        <ul>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                            <li><a href="{{route('term')}}">Terms & Conditions</a></li>
                            <li><a href="{{route('privacy')}}">Privacy Policy</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Footer Top -->



</footer>