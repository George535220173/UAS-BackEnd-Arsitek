@extends('layouts.app')

@section('content')
<div class="container-profile">
    <div class="left-info">
        <h1>Profile</h1>
        <img src="{{ asset('img/userlogo.png') }}" width="300px" height="400px">
    </div>
    <div class="profile-info">
        <p class="profile-info-name"><strong>Name:</strong> {{ Auth::user()->name }}</p>
        <p class="profile-info-name"><strong>Email:</strong> {{ Auth::user()->email }}</p>

        <!--Nomor Hp -->
        <p>
            <strong>Phone:</strong> <span id="phone-display">{{ Auth::user()->phone }}</span>
            <button type="button" id="change-phone-btn" class="btn btn-secondary" data-route-change-phone="{{ route('profile.change-phone') }}">Change Phone</button>
            <form action="{{ route('profile.delete-optional-fields') }}" method="POST" class="delete-optional-field-form">
                @csrf
                <input type="hidden" name="field" value="phone">
                <button type="submit" class="btn btn-danger btn-sm">Delete Phone</button>
            </form>
        </p>

        <!--Alamat-->
        <p><strong>Address:</strong> <span id="address-display">{{ Auth::user()->address }}</span>
            <button type="button" id="change-address-btn" class="btn btn-secondary" data-route-change-address="{{ route('profile.change-address') }}">Change Address</button>
            <form action="{{ route('profile.delete-optional-fields') }}" method="POST" class="delete-optional-field-form" style="display:inline;">
                @csrf
                <input type="hidden" name="field" value="address">
                <button type="submit" class="btn btn-danger btn-sm">Delete Address</button>
            </form>
        </p>

        <!--Jenis Kelamin -->
        <p><strong>Gender:</strong> <span id="gender-display">{{ Auth::user()->gender }}</span>
            <button type="button" id="change-gender-btn" class="btn btn-secondary" data-route-change-gender="{{ route('profile.change-gender') }}">Change Gender</button>
            <form action="{{ route('profile.delete-optional-fields') }}" method="POST" class="delete-optional-field-form" style="display:inline;">
                @csrf
                <input type="hidden" name="field" value="gender">
                <button type="submit" class="btn btn-danger btn-sm">Delete Gender</button>
            </form>
        </p>

        <!--Untuk mengubah username, email, dan password -->
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

    <!-- Modal untuk popup -->
    <div id="popup-modal" class="popup-modal">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2 id="popup-title"></h2>
            <form id="popup-form" method="POST" action="#">
                @csrf
                <div id="popup-inputs">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle delete optional fields form submission
        document.querySelectorAll('.delete-optional-field-form').forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                const field = this.querySelector('input[name="field"]').value;
                const value = document.querySelector(`#${field}-display`).textContent.trim();

                if (!value) {
                    alert('Delete failed: Field is already empty');
                    return;
                }

                const formData = new FormData(this);
                const url = this.getAttribute('action');

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Field deleted successfully');
                        location.reload();
                    } else {
                        alert('Error deleting field');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting field');
                });
            });
        });
    });
</script>
@endpush
