@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <main>
        <section class="portfolio-details">
            <h1>Portfolio Details</h1>
            <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas 
               consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi 
               ratione sint. Sit quaerat ipsum dolorem.</p>
        </section>
        <nav class="breadcrumb">
            <a href="#">Home</a> / <span>Portfolio Details</span>
        </nav>
        <section class="project-section">
            <div class="carousel">
                <div class="carousel-image">
                    <img src="{{ asset('img/Bunny.jpg') }}" alt="">
                    <img src="{{ asset('img/Snake.jpeg') }}" alt="">
                    <img src="{{ asset('img/Eaglwe.jpeg') }}" alt="">
                </div>
                <div class="carousel-indicators">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
            <div class="project-info">
                <div class="info-box">
                    <h2>Project Information</h2>
                    <hr>
                    <p><strong>Category:</strong> Web design</p>
                    <p><strong>Client:</strong> ASU Company</p>
                    <p><strong>Project Date:</strong> 01 March, 2020</p>
                    <p><strong>Project URL:</strong> <a href="#">www.example.com</a></p>
                </div>
                <h3>Exercitationem repudandae officiis neque suscipit</h3>
                <p>Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.</p>
            </div>
        </section>
    </main>
@endsection