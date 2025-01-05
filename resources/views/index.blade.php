@extends('layouts.web')
@section('content')
<section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/1.jpg') }}" class="d-block w-100" alt="Digital Marketing Solutions">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Grow Your Business Online</h5>
                    <p>Powerful digital marketing solutions to drive your growth.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/2.jpg') }}" class="d-block w-100" alt="Expert SEO Services">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Expert SEO Services</h5>
                    <p>Enhance your visibility and rank higher on search engines.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/3.jpg') }}" class="d-block w-100" alt="Social Media Marketing">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Social Media Marketing</h5>
                    <p>Engage your audience with impactful social media strategies.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <h1>Our Services</h1>
        <div class="service">
            <img src="{{ asset('images/seo.jpg') }}" alt="SEO Service">
            <h2>SEO</h2>
            <p>Boost your website's search engine ranking with our expert SEO services.</p>
        </div>
        <div class="service">
            <img src="{{ asset('images/web.jpg') }}" alt="Web Development">
            <h2>Web Development</h2>
            <p>Build a responsive, professional website to showcase your business.</p>
        </div>
        <div class="service">
            <img src="{{ asset('images/ppc.jpg') }}" alt="PPC Advertising">
            <h2>Pay-Per-Click (PPC) Advertising</h2>
            <p>Drive targeted traffic to your site and increase conversions.</p>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section id="customer-reviews" class="carousel slide" data-ride="carousel">
        <h2 class="text-center my-5">What Our Clients Say</h2>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="review">
                    <p>"Market Masters helped our business grow tremendously with their SEO expertise! Our traffic increased by 50% in just a few months."</p>
                    <h5>- Sarah J., Business Owner</h5>
                </div>
            </div>
            <div class="carousel-item">
                <div class="review">
                    <p>"The team at Market Masters is fantastic. Our new website looks amazing, and their PPC campaigns brought us more leads than ever."</p>
                    <h5>- Michael R., Marketing Director</h5>
                </div>
            </div>
            <div class="carousel-item">
                <div class="review">
                    <p>"Highly recommend their social media services. We saw a huge increase in engagement across all platforms."</p>
                    <h5>- Amanda K., Social Media Manager</h5>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#customer-reviews" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#customer-reviews" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    @endsection