@extends('layouts.app')

@section('content')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">

<div class="register-container">
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
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
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                <div class="register-input">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="register-button">Login</button>
            </div>
        </div>
    </form>
</div>
@endsection
