@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

    @if ($sliders->count() > 0)
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-inner">
            @foreach ($sliders as $key => $sliderItem)
                <div class="carousel-item {{$key== 0 ? 'active':''}} ">
                    @if ($sliderItem->image)
                        <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="..." style="height: 700px; object-fit: cover;">
                    @endif

                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {!! $sliderItem->title !!}
                            </h1>
                            <p>
                                {!! $sliderItem->description !!}
                            </p>
                            <div>
                                <a href="/collections" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
    @else
    <!-- Hero Banner Section -->
    <section class="position-relative d-flex align-items-center justify-content-center text-center text-white py-5" style="
        background: url('{{ asset('images/hero_bg.png') }}') no-repeat center center;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        aspect-ratio: 16 / 9;
        min-height: 360px;
        border-radius: 0 0 24px 24px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    ">
        <!-- Overlay for better text readability -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="
            background: linear-gradient(135deg, rgba(40, 116, 240, 0.85), rgba(17, 24, 39, 0.9));
            z-index: 1;
        "></div>

        <div class="container position-relative py-5" style="z-index: 2;">
            <span class="badge bg-warning text-dark mb-3 px-3 py-2 text-uppercase fw-bold animate__animated animate__fadeInDown" style="font-size: 0.85rem; letter-spacing: 1.5px; border-radius: 20px;">
                Exclusive Online Store
            </span>
            <h1 class="display-4 fw-bold mb-4 animate__animated animate__zoomIn" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.4); font-family: 'Poppins', sans-serif;">
                Welcome to <span class="text-warning">Techif Store</span>
            </h1>
            <p class="lead mb-5 mx-auto animate__animated animate__fadeInUp" style="max-width: 800px; text-shadow: 1px 1px 4px rgba(0,0,0,0.3); font-size: 1.25rem; opacity: 0.95; line-height: 1.8;">
                Discover a modern shopping experience with trendsetting products, unbeatable deals, and seamless delivery. From high-tech gadgets to the latest fashions, we bring the premium world straight to your door.
            </p>
            <div class="d-flex flex-wrap justify-content-center gap-3 animate__animated animate__fadeInUp">
                <a href="{{ url('/collections') }}" class="btn btn-warning btn-lg px-5 py-3 fw-bold text-dark text-uppercase hover-shadow transition-all" style="border-radius: 30px; letter-spacing: 0.5px;">
                    Start Shopping <i class="fas fa-shopping-bag ms-2"></i>
                </a>
                <a href="{{ url('/new-arrivals') }}" class="btn btn-outline-light btn-lg px-5 py-3 fw-bold text-uppercase hover-shadow transition-all" style="border-radius: 30px; letter-spacing: 0.5px;">
                    New Arrivals <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4 animate__animated animate__fadeInLeft">
                    <div class="p-5 shadow-sm rounded-4 bg-white h-100 hover-shadow border-0 transition-all" style="border-radius: 16px; border: none; transition: all 0.3s ease;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-shipping-fast fa-2x"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Fast & Free Delivery</h5>
                        <p class="text-muted mb-0" style="line-height: 1.6;">Nationwide delivery with reliable logistics partners and no hidden fees.</p>
                    </div>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="p-5 shadow-sm rounded-4 bg-white h-100 hover-shadow border-0 transition-all" style="border-radius: 16px; border: none; transition: all 0.3s ease;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">Top Quality</h5>
                        <p class="text-muted mb-0" style="line-height: 1.6;">Every product is selected and reviewed to ensure maximum quality and value.</p>
                    </div>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInRight">
                    <div class="p-5 shadow-sm rounded-4 bg-white h-100 hover-shadow border-0 transition-all" style="border-radius: 16px; border: none; transition: all 0.3s ease;">
                        <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger rounded-circle mb-4" style="width: 80px; height: 80px;">
                            <i class="fas fa-headset fa-2x"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-3">24/7 Support</h5>
                        <p class="text-muted mb-0" style="line-height: 1.6;">Need help? Our support team is always ready to assist you — day or night.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white text-center rounded-4 mx-3 my-4 position-relative overflow-hidden" style="border-radius: 20px;">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="
            background: linear-gradient(135deg, rgba(40, 116, 240, 0.95), rgba(43, 96, 255, 0.95));
            z-index: 1;
        "></div>
        <div class="container position-relative py-4" style="z-index: 2;">
            <h2 class="fw-bold mb-3 animate__animated animate__zoomIn">Join Thousands of Happy Shoppers</h2>
            <p class="lead mb-4 animate__animated animate__fadeIn">Discover exclusive deals and experience effortless online shopping with Techif Store.</p>
            <a href="{{ url('/collections') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold text-primary text-uppercase hover-shadow" style="border-radius: 30px; letter-spacing: 0.5px; transition: all 0.3s ease;">Start Shopping</a>
        </div>
    </section>

@endsection
