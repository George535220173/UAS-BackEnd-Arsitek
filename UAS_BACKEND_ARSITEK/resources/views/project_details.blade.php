@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->project_name }}</h1>
    <p><strong>Client:</strong> {{ $project->client }}</p>
    <p><strong>Time Taken:</strong> {{ $project->time_taken }}</p>
    <p><strong>Location:</strong> {{ $project->location }}</p>
    <img src="{{ asset('storage/' . $project->image) }}" alt="Project Image" class="img-fluid">
    <div class="mt-4">
        <p>{{ $project->description }}</p>
    </div>
    <!-- Favorite Icon -->
    <button class="favorite-btn" data-project-id="{{ $project->id }}">
        @if(in_array($project->id, session('favorites', [])))
            <i class="fa fa-star text-warning"></i>
        @else
            <i class="fa fa-star text-muted"></i>
        @endif
    </button>
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
