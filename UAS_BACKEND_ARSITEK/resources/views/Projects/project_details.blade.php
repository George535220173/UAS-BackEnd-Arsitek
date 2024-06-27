@extends('layouts.app')

@section('content')
<div class="project-details-container">
    <h1>{{ $project->project_name }}</h1>
    <div class="project-inside-container">
        @if($project->images->isNotEmpty())
            <div id="projectCarousel" class="carousel slide project-details-carousel" data-ride="carousel"
                data-interval="5000">
                <!-- Indicators -->
                <ol class="carousel-indicators project-details-carousel-indicators">
                    @foreach($project->images as $key => $image)
                        <li data-target="#projectCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                        </li>
                    @endforeach
                </ol>

                <div class="carousel-inner project-details-carousel-inner">
                    @foreach($project->images as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ asset('img/Project/' . basename($image->path)) }}"
                                class="d-block w-100 project-details-carousel-image" alt="Project Image">
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev project-details-carousel-control-prev" href="#projectCarousel" role="button"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next project-details-carousel-control-next" href="#projectCarousel" role="button"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        @else
            <p>No images available for this project.</p>
        @endif
        <div class="project-details-desc">
            <p><strong>Client:</strong> {{ $project->client }}</p>
            <p><strong>Time Taken:</strong> {{ $project->time_taken }}</p>
            <p><strong>Location:</strong> {{ $project->location }}</p>

            <div class="mt-4">
                <p>{{ $project->description }}</p>
            </div>
        </div>
    </div>
</div>
@endsection