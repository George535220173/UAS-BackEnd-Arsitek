@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Interior Design Projects</h1>
    @include('projects.partials.search', ['categories' => $categories])
    
    <div class="row">
        @foreach($projects as $project)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <a href="{{ route('projects.show', $project->id) }}">
                        <img class="card-img-top" src="{{ asset('storage/' . $project->image) }}" alt="Project Image">
                    </a>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->project_name }}</h5>
                        <p class="card-text">{{ $project->client }}</p>
                        @php
                            $dateRange = explode(' - ', $project->time_taken);
                            $startDate = \Carbon\Carbon::createFromFormat('d F Y', $dateRange[0] ?? null);
                            $endDate = \Carbon\Carbon::createFromFormat('d F Y', $dateRange[1] ?? null);
                        @endphp
                        @if($startDate && $endDate && $startDate->isValid() && $endDate->isValid())
                            <p class="card-text">{{ $startDate->format('d M Y') }} - {{ $endDate->format('d M Y') }}</p>
                        @else
                            <p class="card-text">Invalid Date</p>
                        @endif
                        <!-- Favorite Icon -->
                        <div class="mt-auto">
                            <button class="favorite-btn" data-project-id="{{ $project->id }}">
                                @if(in_array($project->id, session('favorites', [])))
                                    <i class="fa fa-star text-warning"></i>
                                @else
                                    <i class="fa fa-star text-muted"></i>
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <!-- Pagination Links -->
    {{ $projects->links() }}
</div>

@include('projects.partials.favorite-script')
@endsection
