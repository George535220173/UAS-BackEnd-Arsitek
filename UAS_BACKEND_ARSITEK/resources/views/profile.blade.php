@extends('layouts.app')

@section('content')
<div class="container-profile">
    <h1>Profile</h1>
    <div class="profile-info">
        <form id="optional-fields-form" method="POST" action="{{ route('profile.update-optional-fields') }}">
            @csrf
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

            @if (!Auth::user()->phone || !Auth::user()->address || !Auth::user()->gender)
                <p><strong>Phone:</strong> 
                    <input type="number" id="phone" name="phone" value="{{ Auth::user()->phone }}" maxlength="16"> 
                </p>
                <p><strong>Address:</strong> 
                    <input type="text" id="address" name="address" value="{{ Auth::user()->address }}"> 
                </p>
                <p><strong>Gender:</strong> 
                    <select id="gender" name="gender">
                        <option value="" {{ Auth::user()->gender == null ? 'selected' : '' }}>Select Gender</option>
                        <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </p>
                <button type="submit" class="btn btn-primary">Update</button>
            @else
                <p><strong>Phone:</strong> <span id="phone-display">{{ Auth::user()->phone }}</span>
                    <button type="button" id="change-phone-btn" class="btn btn-secondary" data-route-change-phone="{{ route('profile.change-phone') }}">Change Phone</button>
                </p>
                <p><strong>Address:</strong> <span id="address-display">{{ Auth::user()->address }}</span>
                    <button type="button" id="change-address-btn" class="btn btn-secondary" data-route-change-address="{{ route('profile.change-address') }}">Change Address</button>
                </p>
                <p><strong>Gender:</strong> <span id="gender-display">{{ Auth::user()->gender }}</span>
                    <button type="button" id="change-gender-btn" class="btn btn-secondary" data-route-change-gender="{{ route('profile.change-gender') }}">Change Gender</button>
                </p>
            @endif

            <p><strong>Created At:</strong> {{ Auth::user()->created_at }}</p>
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
            <h2 id="popup-title"></h2>
            <form id="popup-form" method="POST" action="#">
                @csrf
                <div id="popup-inputs">
                    <!-- Dynamic content goes here -->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
