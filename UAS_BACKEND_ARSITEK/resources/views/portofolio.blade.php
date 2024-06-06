@extends('layouts.app')

@section('content')
    <!-- Portfolio Details Section -->
    <section class="portfolio-details">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Home</a> / <span>Portfolio Details</span>
            </div>
            <h2>Portfolio Details</h2>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorem debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>
        </div>
    </section>

    <!-- Carousel and Project Information Section -->
    <section class="project-info">
        <div class="container">
            <div class="carousel">
                <div class="carousel-item">
                    <img src="path/to/image1.jpg" alt="Project Image 1">
                </div>
                <div class="carousel-item">
                    <img src="path/to/image2.jpg" alt="Project Image 2">
                </div>
                <div class="carousel-item">
                    <img src="path/to/image3.jpg" alt="Project Image 3">
                </div>
                <!-- Add more carousel items as needed -->
            </div>
            <div class="project-details">
                <div class="project-information">
                    <h3>Project Information</h3>
                    <div class="divider"></div>
                    <p><strong>Category:</strong> Web design</p>
                    <p><strong>Client:</strong> ASU Company</p>
                    <p><strong>Project Date:</strong> 01 March, 2020</p>
                    <p><strong>Project URL:</strong> <a href="www.example.com">www.example.com</a></p>
                </div>
                <div class="project-description">
                    <h3>Exercitationem repudiandae officiis neque suscipit</h3>
                    <p>Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/portofolio.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('js/portofolio.js') }}"></script>
@endpush
