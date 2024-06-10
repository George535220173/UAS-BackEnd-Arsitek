@extends('layouts.app')

@section('content')
    <section class="portfolio-details">
        <h1>{{ $project->project_name }}</h1>
        <p>{{ $project->description }}</p>
    </section>
    <nav class="breadcrumb">
        <a href="{{ route('home') }}">Home</a> / <span>Portfolio Details</span>
    </nav>
    <section class="project-section">
        <div class="carousel">
            <div class="carousel-image">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->project_name }}">
            </div>
        </div>
        <div class="project-info">
            <div class="info-box">
                <h2>Project Information</h2>
                <hr>
                <p><strong>Client:</strong> {{ $project->client }}</p>
                <p><strong>Time Taken:</strong> {{ $project->time_taken }}</p>
                <p><strong>Location:</strong> {{ $project->location }}</p>
            </div>
            <h3>Project Description</h3>
            <p>{{ $project->description }}</p>
        </div>
    </section>
@endsection
