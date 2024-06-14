@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Our Projects</h1>
    
    <!-- Search Form -->
    <form method="GET" action="{{ route('projects.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search projects..." value="{{ request('search') }}">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit">Search</button>
            </span>
        </div>
    </form>

    <div class="row">
        @foreach($projects as $project)
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
    
    <!-- Pagination Links -->
    {{ $projects->links() }}
</div>
@endsection
