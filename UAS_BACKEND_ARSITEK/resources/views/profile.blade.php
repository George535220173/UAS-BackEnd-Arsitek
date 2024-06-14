@extends('layouts.app')

@section('content')
<div class="container-profile">
    <h1>Profile</h1>
    <div class="profile-info">
        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

        <p><strong>Phone:</strong> <span id="phone-display">{{ Auth::user()->phone }}</span>
            <button type="button" id="change-phone-btn" class="btn btn-secondary" data-route-change-phone="{{ route('profile.change-phone') }}">Change Phone</button>
            <form action="{{ route('profile.delete-optional-fields') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="field" value="phone">
                <button type="submit" class="btn btn-danger btn-sm">Delete Phone</button>
            </form>
        </p>

        <p><strong>Address:</strong> <span id="address-display">{{ Auth::user()->address }}</span>
            <button type="button" id="change-address-btn" class="btn btn-secondary" data-route-change-address="{{ route('profile.change-address') }}">Change Address</button>
            <form action="{{ route('profile.delete-optional-fields') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="field" value="address">
                <button type="submit" class="btn btn-danger btn-sm">Delete Address</button>
            </form>
        </p>

        <p><strong>Gender:</strong> <span id="gender-display">{{ Auth::user()->gender }}</span>
            <button type="button" id="change-gender-btn" class="btn btn-secondary" data-route-change-gender="{{ route('profile.change-gender') }}">Change Gender</button>
            <form action="{{ route('profile.delete-optional-fields') }}" method="POST" style="display:inline;">
                @csrf
                <input type="hidden" name="field" value="gender">
                <button type="submit" class="btn btn-danger btn-sm">Delete Gender</button>
            </form>
        </p>

        <p><strong>Created At:</strong> {{ Auth::user()->created_at }}</p>

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
