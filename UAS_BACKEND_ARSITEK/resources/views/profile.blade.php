@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile</h1>
    <div class="profile-info">
        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Created At:</strong> {{ Auth::user()->created_at }}</p>
        <!-- Add more fields as needed -->
    </div>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</div>
@endsection
