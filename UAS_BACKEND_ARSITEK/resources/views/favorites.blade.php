@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Favorites</h1>
    <div class="row">
        @foreach($favorites as $project)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    @php
                        $categoryRoute = strtolower(str_replace(' ', '', $project->category->main_category));
                    @endphp
                    <a href="{{ route('projects.' . $categoryRoute . '.show', $project->id) }}">
                        @if($project->images->isNotEmpty())
                            <img class="card-img-top" src="{{ asset('storage/' . $project->images->first()->path) }}" alt="Project Image">
                        @else
                            <img class="card-img-top" src="path/to/default/image.jpg" alt="No Image Available">
                        @endif
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->project_name }}</h5>
                        <p class="card-text">{{ $project->client }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
