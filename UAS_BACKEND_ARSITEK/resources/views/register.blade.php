@extends('layouts.app')

@section('content')
    <div class="register-container">
        <h2>Register</h2>
        <form method="POST" action="/register">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required autofocus>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <button type="submit" class="register-button">Register</button>
            </div>
        </form>
    </div>
    @endsection
