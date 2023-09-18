
@extends('layouts.user-layout')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" style="height:60vh">
        <img src="{{ asset('assets/images/qiffaqScientific.png') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          {{-- <h1>Baghdad Headquarter</h1> --}}
          {{-- <p>Some representative placeholder content for the first slide.</p> --}}
        </div>
      </div>
      <div class="carousel-item" style="height:60vh">
        <img src="{{ asset('assets/images/2.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item" style="height:60vh">
        <img src="{{ asset('assets/images/3.jpg') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <section class="py-5" id="5">
    <div class="container px-5" style="text-align: lift">
        <div class="card border-0 shadow rounded-3 overflow-hidden">
            <div class="card-body p-0">
                <div class="row gx-0">
                    <div class="col-md-7 col-xl-7 py-lg-1">
                        <div class="p-4 p-md-5">
                            <div class="h2 fw-bolder">About Us</div>
                            <p>we moved 2000 in Baghdad as a small Bureau, in 1991 Established in
                                to Al-Qiffaf scientific company, today we are recognized as a leader
                                in providing comprehensive laboratory instruments and solutions
                                for all kinds of labs, healthcare, and medical instruments. After more
                                than Thirty years from inception, we managed to establish a reliable
                                organization through our headquarters in Baghdad supported by
                                two branches in the North of Iraq (Kurdistan)in Erbil and the second
                                one in the south of Iraq in Basra(oil & Gas industry center in Iraq ), to
                                cover All Iraq governorates and to facilitate the customer's service.
                                making its signature in the Iraqi market for representing the highest
                                .quality from leading companies which we represent</p>
                        </div>
                    </div>
                    <div class="col-md-5 col-xl-5">
                        <div class="bg-featured-blog" style="background-image: url({{ asset('assets/images/qiffaf_about.png') }})">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid d-flex">
    <div class="counterExperience" id="counter"></div>
    <div class="experience">
        <div>
            <div>Years of</div>
            <div>Experience</div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="globalHeader">
        <div style="display: inline;border-bottom: 10px solid #666;">
            <span style="color: #FF1D25">Global</span> <span>Parteners</span>
        </div>
    </div>

    <div class="carousel carousel2 slide" style="background-color: #f2f2f2" data-bs-ride="carousel" id="carouselCaptions">
        <div class="carousel-inner" style="width: 100%">
            <div class="carousel-item carousel-item2 active">
                <div class="col-md-4">
                    <div>
                        <div>
                            <img src="{{ asset('assets/images/zwick.png') }}" style="" alt="one" class="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-item2">
                <div class="col-md-4">
                    <div >
                        <div>
                            <img src="{{ asset('assets/images/shimadzu.png') }}" style="" alt="two" class="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-item2">
                <div class="col-md-4">
                    <div>
                        <div>
                            <img src="{{ asset('assets/images/thermoFisher.png') }}" style="" alt="three" class="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item carousel-item2">
                <div class="col-md-4">
                    <div>
                        <div>
                            <img src="{{ asset('assets/images/shimadzu.png') }}" style="" alt="four" class="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- create next or prev --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

    <div class="globalHeader">
        <div style="display: inline;border-bottom: 10px solid #666;">
            <span style="color: #FF1D25">Our</span> <span>Customers</span>
        </div>
    </div>
    <div class="row">
        <div style="">
            <div style="float: right !important">
                <div style="display:block;text-align: center;margin-bottom: 25px;border-radius: 50%">
                    <img src="{{ asset('assets/images/customer1.png') }}" style="width: 150px;height:150px;border-radius: 50%" alt="">
                </div>
                <div style="display:block;width: 150px;height:150px;text-align: center;margin-bottom: 25px;border-radius: 50%">
                    <img src="{{ asset('assets/images/customer2.png') }}" style="width: 150px;height:150px;border-radius: 50%" alt="">
                </div>
                <div style="display:block;width: 150px;height:150px;text-align: center;margin-bottom: 25px;border-radius: 50%">
                    <img src="{{ asset('assets/images/customer3.png') }}" style="width: 150px;height:150px;border-radius: 50%" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="separator1"></div>
    <div class="separator2"></div>
    <div class="contactUs">
        <div class="content">
            Contact <span style="color: #ff1d25">Us</span>
            <div style="border-bottom: 4px solid #666666;width:65px"></div>
            <h5 style="font-weight: normal;padding-top: 15px">Iraq -Baghdad Al-Sarafia, nex to Almukhtar 7 Building 26 Street 120 Hospital -quarter</h5>
            <div class="pt-4" >
                <h5 style="color: #1A1A1A">+964 770 581 4343</h5>
                <h5 style="color: #1A1A1A">+964 790 190 7434</h5>
            </div>
            <div class="pt-4" >
                <h5>gm@alqiffaf.com.iq</h5>
                <h5>info@alqiffaf.com.iq</h5>
            </div>

            <div style="justify-content: right;">
                <img src="{{ asset('assets/images/logoFooter.png') }}" style="justify-content: right;" alt="">
            </div>
        </div>
    </div>
    <div class="social">
        social media
    </div>
    {{-- <div class="row">
        <div class="col-md-4 offset-md-4" style="display:inline;height:10px;width:10px;background-color: #666666">
        </div>
    </div> --}}

</div>
@endsection
