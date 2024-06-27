@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container">
        <h1 class="my-4">My Favorites</h1>
        <div class="row">
            <!--Menampilkan semua project yang di favorite dengan style mereka -->
            @forelse($favorites as $project)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 d-flex flex-column">
                        @php
                            $categoryRoute = strtolower(str_replace(' ', '', $project->category->main_category));
                        @endphp
                        <a href="{{ route('projects.' . $categoryRoute . '.show', $project->id) }}">
                            @if($project->images->isNotEmpty())
                                <img class="card-img-top fixed-size-img-favorites" src="{{ asset('img/Project/' . basename($project->images->first()->path)) }}" alt="Project Image">
                            @else
                                <img class="card-img-top fixed-size-img-favorites" src="path/to/default/image.jpg" alt="No Image Available">
                            @endif
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->project_name }}</h5>
                            <p class="card-text">{{ $project->client }}</p>
                        </div>

                        <div class="mt-auto favorite-btn-container">
                            <button class="favorite-btn" data-project-id="{{ $project->id }}">
                                @if(in_array($project->id, session('favorites', [])))
                                    <i class="fa fa-star text-warning"></i>
                                @else
                                    <i class="fa fa-star text-muted"></i>
                                @endif
                            </button>
                        </div>
                    </div>
                    <div class="container-kosong-kaloada"></div>
                </div>
            @empty
                <div class="container-kosong"><p>No favorited projects found.</p></div>
            @endforelse
        </div>
    </div>
</div>
@endsection
<!--Skript yang dibutuhkan untuk favorite -->
@push('scripts')
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
                                // Refresh the page when a project is unfavorited
                                location.reload();
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
@endpush
