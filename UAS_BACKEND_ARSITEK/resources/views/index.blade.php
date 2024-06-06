@extends('layouts.app')

@section('content')
    <!-- Main content from index.html -->
    <section id="hero">
        <h1>Welcome to Our Website</h1>
        <p>Your success is our commitment.</p>
        <a href="#services" class="cta-btn">Learn More</a>
    </section>
    <section id="about">
        <h2>About Us</h2>
        <p>Information about your company.</p>
    </section>
    <section id="services">
        <h2>Our Services</h2>
        <div class="services-list">
            <div class="service-item">
                <h3>Service One</h3>
                <p>Details about service one.</p>
            </div>
            <div class="service-item">
                <h3>Service Two</h3>
                <p>Details about service two.</p>
            </div>
            <div class="service-item">
                <h3>Service Three</h3>
                <p>Details about service three.</p>
            </div>
        </div>
    </section>
    <section id="portfolio">
        <h2>Our Portfolio</h2>
        <div class="portfolio-list">
            <div class="portfolio-item">
                <img src="path/to/image1.jpg" alt="Portfolio Item 1">
                <h3>Portfolio Item 1</h3>
            </div>
            <div class="portfolio-item">
                <img src="path/to/image2.jpg" alt="Portfolio Item 2">
                <h3>Portfolio Item 2</h3>
            </div>
            <div class="portfolio-item">
                <img src="path/to/image3.jpg" alt="Portfolio Item 3">
                <h3>Portfolio Item 3</h3>
            </div>
        </div>
    </section>
    <section id="contact">
        <h2>Contact Us</h2>
        <p>Contact information and form.</p>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/index.js') }}"></script>
@endpush
