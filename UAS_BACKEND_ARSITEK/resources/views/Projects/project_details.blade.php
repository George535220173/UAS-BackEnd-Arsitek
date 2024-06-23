@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->project_name }}</h1>
    <p><strong>Client:</strong> {{ $project->client }}</p>
    <p><strong>Time Taken:</strong> {{ $project->time_taken }}</p>
    <p><strong>Location:</strong> {{ $project->location }}</p>
    
    <!-- Image Carousel -->
    @if($project->images->isNotEmpty())
        <div id="projectCarousel" class="carousel slide project-details-carousel" data-ride="carousel" data-interval="5000">
            <!-- Indicators -->
            <ol class="carousel-indicators project-details-carousel-indicators">
                @foreach($project->images as $key => $image)
                    <li data-target="#projectCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner project-details-carousel-inner">
                @foreach($project->images as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $image->path) }}" class="d-block w-100 project-details-carousel-image" alt="Project Image">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev project-details-carousel-control-prev" href="#projectCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next project-details-carousel-control-next" href="#projectCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @else
        <p>No images available for this project.</p>
    @endif
    
    <div class="mt-4">
        <p>{{ $project->description }}</p>
    </div>
    
    <!-- Favorite Icon -->
    <button class="favorite-btn project-details-favorite-btn" data-project-id="{{ $project->id }}">
        @if(in_array($project->id, session('favorites', [])))
            <i class="fa fa-star text-warning"></i>
        @else
            <i class="fa fa-star text-muted"></i>
        @endif
    </button>
</div>
@endsection