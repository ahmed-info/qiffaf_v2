<footer class="main-footer pt-5">
    <div class="container">
        <div class="widgets-section">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="logo-widget footer-widget">
                        <figure class="footer-logo"><a href="index.html"><img src="{{ asset('temp/images/footer-logo.png') }}" alt=""></a></figure>
                        <div class="text">Our corporate policy consistently revolves around the pursuit of excellence in both product quality and service delivery. Alqiffaf Scientific Co. is committed to leveraging its technological prowess to furnish our esteemed clientele with the highest caliber of products, competitive pricing structures, a well-established sales infrastructure, and unparalleled post-sales support</div>
                        <ul class="footer-social clearfix">
                            <li><a href="{{ $social->facebook }}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $social->youtube }}"><i class="fa fa-youtube fa-2x"></i></a></li>
                            <li><a href="{{ $social->linkedin }}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="link-widget footer-widget">
                        <div class="footer-title">Quick Link</div>
                        <ul class="link-list">
                            <li><a href="{{ route('mainHome') }}">Home</a></li>
                            <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                            <li><a href="#">Products</a></li>
                            <li><a href="{{ route('globalPartener') }}">Our Partners</a></li>
                            <li><a href="{{ route('eventNews') }}">Events & News</a></li>
                            <li><a href="{{ route('contactUs') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="event-widget footer-widget">
                        <div class="footer-title">Latest Events</div>
                        @if(count($events) > 0)
                            @foreach ($events as $event)
                            <div class="single-event">
                                <div class="link"><a href="{{ route('event.show',['id'=> $event->id]) }}"> {{ $event->title }}</a></div>
                                <div class="text"><i class="flaticon-small-calendar"></i>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('d') }} {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('M') }}, {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $event->eventDate)->format('Y') }}</div>
                            </div>
                            @endforeach
                        @endif


                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                    <div class="newsletter-widget footer-widget">
                        <div class="footer-title">NewsLetter</div>
                        <div class="text">{{ $events[0]->description }}</div>
                        <form action="{{ route('contactUs') }}" method="GET" class="newsletter-form">

                            <div class="form-group">
                                <button class="theme-btn" type="submit">Join Us<i class="flaticon-next"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->

<!-- footer-bottom -->
<div class="footer-bottom">
    <div class="container">
        <div class="copyright"><a href="#">Al Qiffaf</a> &copy; 2023 All Right Reserved</div>
    </div>
</div>
