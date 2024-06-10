@extends('layouts.app')

@section('content')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">

<div class="register-container">
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
        <div class="register-insides-container">
            <div class="register-logo">
                <img src="{{ asset('img/MRS1.png') }}" width="100px" height="100px">
                <span>please input your information</span>
            </div>
            
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <div class="register-textcluster">
                @csrf
                <div class="register-input">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                </div>
                <div class="register-input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>
                <div class="register-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
                <div class="register-input">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                </div>
                <button type="submit" class="register-button">Register</button>
            </div>
        </div>
    </form>
</div>
@endsection
