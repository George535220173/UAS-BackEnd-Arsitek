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
</div>
@endsection
