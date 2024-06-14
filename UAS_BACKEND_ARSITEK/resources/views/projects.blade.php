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
                        <!-- Favorite Icon -->
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

                    console.log('Button clicked:', button);
                    console.log('Icon element:', icon);

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
                        console.log('Response data:', data);
                        if (icon) {
                            if (data.status === 'added') {
                                icon.classList.remove('text-muted');
                                icon.classList.add('text-warning');
                            } else {
                                icon.classList.remove('text-warning');
                                icon.classList.add('text-muted');
                            }
                        } else {
                            console.error('Icon element not found for button:', button);
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
