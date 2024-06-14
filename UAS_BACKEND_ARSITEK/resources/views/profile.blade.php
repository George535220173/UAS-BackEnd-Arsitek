@extends('layouts.app')

@section('content')
<div class="container-profile">
    <h1>Profile</h1>
    <div class="profile-info">
        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
        <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
        <p><strong>Gender:</strong> {{ Auth::user()->gender }}</p>
        <p><strong>Created At:</strong> {{ Auth::user()->created_at }}</p>
    </div>

    <form id="optional-fields-form" method="POST" action="{{ route('profile.update-optional-fields') }}">
        @csrf
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ Auth::user()->phone }}" maxlength="16">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="{{ Auth::user()->address }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="" {{ Auth::user()->gender == null ? 'selected' : '' }}>Select Gender</option>
                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    @if(Auth::user()->phone || Auth::user()->address || Auth::user()->gender)
    <form action="{{ route('profile.delete-optional-fields') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Delete Optional Fields</button>
    </form>
    @endif

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
        </form>
    </div>
</div>
@endsection
