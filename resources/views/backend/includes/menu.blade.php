<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{route('admin-dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#categoryModule"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Property Manage
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="categoryModule" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('amenities.index') }}">Amenities </a>
                        <a class="nav-link" href="{{route('propertyType.index')}}">Property Type</a>
                        <a class="nav-link" href="{{route('location.index')}}">Location</a>
                        <a class="nav-link" href="{{ route('status.index') }}">Property Purpose</a>
                        <a class="nav-link" href="{{ route('properties.index') }}">Properties</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userModule"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Customer
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="userModule" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('user.details')}}">Customer List</a>
                        <a class="nav-link" href="{{route('booking.details')}}">Customer Bookings</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#messageModule"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                    Messages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="messageModule" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('conversation.message')}}">Customer Conversation</a>
                        <a class="nav-link" href="{{route('contact.message')}}">Contact Message</a>
                        <a class="nav-link" href="{{route('agent.message')}}">Agent Message</a>
                    </nav>
                </div>

                <!-- <a class="nav-link" href="{{route('agent.message')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                    Agent Message
                </a> -->

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#setting"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Application Setting
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="setting" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('setting') }}">General Setting </a>
                        <a class="nav-link" href="{{ route('email-setting') }}">Email Setting </a>
                        <a class="nav-link" href="{{ route('application-cache-clear') }}">Cache Clear </a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#titleSetting"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                    Title Setting
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="titleSetting" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('hero-section.index') }}"> Hero Section </a>
                        <a class="nav-link" href="{{ route('protype-section.index') }}"> Property Type </a>
                        <a class="nav-link" href="{{ route('prolocation-section.index') }}"> Property Location </a>
                        <a class="nav-link" href="{{ route('fetureproperty-section.index') }}"> Featured Property </a>
                        <a class="nav-link" href="{{ route('partner-section.index') }}"> Partner Section </a>
                        <a class="nav-link" href="{{ route('faq-section.index') }}"> FAQ Section </a>
                    </nav>
                </div>

                <a class="nav-link" href="{{ route('faqs.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                    FAQ
                </a>

                <a class="nav-link" href="{{ route('partners.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-handshake"></i></div>
                    Our Partner
                </a>

                <a class="nav-link" href="{{route('about.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-info-circle"></i></div>
                    About
                </a>

                <a class="nav-link" href="{{route('privacy.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-shield-alt"></i></div>
                    Privacy Policy
                </a>

                <a class="nav-link" href="{{route('term.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-contract"></i></div>
                    Terms and Condition
                </a>
            </div>
        </div>

    </nav>
</div>