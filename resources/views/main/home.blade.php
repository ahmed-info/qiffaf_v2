@extends('layouts.user-layout')
@section('content')


    <!-- main-slider -->
    <section class="main-slider slider-style-two">

        <div class="main-slider-carousel owl-carousel owl-theme">

            @if(count($slides) >0)
                @foreach ($slides as $slide)
                <div class="slide" style="background-image:url({{ asset('images'.'/'. $slide->image ) }})">
                    <div class="container">
                        <div class="content-box">
                            <h1>{!! $slide->title !!}<br />{!! $slide->description !!}</h1>
                            <div class="slider-btn">
                                <a href="{{ route('globalPartener') }}" class="theme-btn slide-btn-one">Our Partenters</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif








        </div>
    </section>
    <!-- main-slider end -->
    {{-- start about us --}}
    <section class="about-style-six">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column d-flex">
                    <div class="about-content">
                        <div class="d-flex">
                            <h1 class="" style="display: flex; align-items: center">About Us</h1>

                            <div class="d-flex">
                                <div class="counterExperience" id="counter"></div>
                                <div class="experience">
                                    <div>
                                        <div>Years of</div>
                                        <div>Experience</div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="text">
                            <p>
                                @if($aboutus != null)
                                    {!! $aboutus->title !!}
                                @endif
                            </p>
                        </div>
                        <div class="link"><a href="{{ route('aboutUs') }}" class="theme-btn">Read More</a></div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                    <div class="video-content">
                        <div class="video-gallery">
                            <img src="{{ asset('assets/images/qiffaf_about.png') }}" alt="Awesome Video Gallery">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- end about us --}}

        <!-- news-section -->
        <section class="news-section gray-bg">
            <div class="container">
                <div class="title-box">
                    <div class="title-text">Our Parteners</div>
                </div>
                <div class="news-content">
                    <div class="three-column-carousel">
                        @if(count($companies) > 0)
                            @foreach ($companies as $company)
                            <div class="single-news-content">
                                <a href="{{ route('company.show',["id"=>$company->id]) }}">
                                    <figure class="myhover image-box"><img src="{{ asset('images/'. $company->image) }}" alt="{{ $company->title }}"></figure>
                                </a>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <!-- news-section end -->
    <!-- team-section -->
    <section class="team-section gray-bg">
        <div class="container">
            <div class="title-box">
                <div class="sec-title">Our Customer</div>
            </div>
            <div class="row">
                @if (count($customers) > 0)
                    @foreach ( $customers as $customer)
                    <div class="col-lg-3 col-md-6 col-sm-12 team-column">
                        <div class="single-team-content inner-box" style="border-radius: 50% !important">
                            <figure class="image-box" style="border-radius: 50% !important">
                                <img src="{{ asset('images' .'/'. $customer->image) }}" alt="">
                                <div class="overlay">
                                    <div class="wrapper">
                                        {{ $customer->title }}
<<<<<<< HEAD
                                       
=======

>>>>>>> 3add39a (ok)
                                    </div>
                                </div>
                            </figure>

                        </div>
                    </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
    <!-- team-section end -->
@endsection
