@extends('layouts.app')

@section('content')
<div class="container-profile">
<h1>Profile</h1>
    <div class="profile-info">
        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Created At:</strong> {{ Auth::user()->created_at }}</p>
    </div>
    <button id="change-username-btn" class="btn btn-secondary"
            data-route-change-username="{{ route('profile.change-username') }}"
            data-route-send-auth-code="{{ route('profile.send-auth-code') }}">Change Username</button>
    <button id="change-email-btn" class="btn btn-secondary"
            data-route-change-email="{{ route('profile.change-email') }}"
            data-route-send-auth-code="{{ route('profile.send-auth-code') }}">Change Email</button>
    <button id="change-password-btn" class="btn btn-secondary"
            data-route-change-password="{{ route('profile.change-password') }}"
            data-route-send-auth-code="{{ route('profile.send-auth-code') }}">Change Password</button>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</div>

<!-- Popup Modal -->
<div id="popup-modal" class="popup-modal">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
        <h2 id="popup-title">Change Username</h2>
        <form id="popup-form" method="POST" action="#">
            @csrf
            <div id="popup-inputs">
                <!-- Dynamic content goes here -->
            </div>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        </form>
    </div>
</div>
@endsection
