@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Our Projects</h1>
    
    <!-- Search Form and Sorting Dropdown -->
    <form method="GET" action="{{ route('projects.index') }}" class="mb-4 d-flex flex-column form-inline">
        <div class="d-flex w-100 mb-2">
            <div class="input-group mr-2 sort-group">
                <select name="sort" class="form-control" onchange="this.form.submit()">
                    <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>A-Z</option>
                    <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>Z-A</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest to Latest</option>
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest to Oldest</option>
                </select>
            </div>
            <div class="input-group flex-grow-1 search-group">
                <input type="text" name="search" class="form-control" placeholder="Search projects..." value="{{ request('search') }}">
                <span class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </span>
            </div>
        </div>
        <!-- Category Dropdown -->
        <div class="input-group category-group mt-2">
            <select name="category" class="form-control" onchange="this.form.submit()">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="row">
        @foreach($projects as $project)
            <div class="card h-100 d-flex flex-column">
                <a href="{{ route('projects.show', $project->id) }}">
                @if($project->images->isNotEmpty())
                    <img class="card-img-top" src="{{ asset('img/Project/' . basename($project->images->first()->path)) }}" alt="Project Image">
                @else
                    <img class="card-img-top" src="path/to/default/image.jpg" alt="No Image Available">
                @endif
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

<!-- Script here -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isAuthenticated = {{ Auth::check() ? 'true' : 'false' }};
        
        document.querySelectorAll('.favorite-btn').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent default action

                if (isAuthenticated) {
                    const projectId = button.getAttribute('data-project-id');
                    const icon = button.querySelector('i, svg');

                    fetch('{{ route("projects.favorite") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({ project_id: projectId })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (icon) {
                            if (data.status === 'added') {
                                icon.classList.remove('text-muted');
                                icon.classList.add('text-warning');
                            } else {
                                icon.classList.remove('text-warning');
                                icon.classList.add('text-muted');
                            }
                        }
                    })
                    .catch(error => console.error('Error:', error));
                } else {
                    alert('You need to be logged in to add to favorites.');
                }
            });
        });
    });
</script>


@endsection
