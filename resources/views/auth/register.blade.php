@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@section('content')

<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <div class="body"></div>
    <div class="grad"></div>
    <br>
    <div class="box confirm-box">
        <h2 class="register-title">Register</h2>
        
        <input id="name" placeholder="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        
        <input type="submit" value="Register">
    </div>
</form>

@endsection
