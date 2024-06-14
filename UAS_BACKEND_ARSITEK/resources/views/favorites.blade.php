@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">My Favorites</h1>
    <div class="row">
        @foreach($favorites as $project)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="{{ route('projects.show', $project->id) }}">
                        <img class="card-img-top" src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
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
