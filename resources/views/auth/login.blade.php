@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@section('content')
<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
        @csrf
        <div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>Help<span>Desk</span></div>
        </div>
        <br>
        <div class="box login">
            <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            <input id="password" type="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            <div><span class="textSpan">If you don't have an account,</span><a href="//" class="registerButton"> click
                    here to sign up</a></div>
            {{-- @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="registerButton">Forgot Your Password?</a>
            @endif --}}
            <input type="submit" value="Login">
        </div>
    </form>
@endsection
