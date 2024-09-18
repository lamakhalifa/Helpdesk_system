@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@section('content')
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ route('password.email') }}
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="grad"></div>
    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="box confirm-box">
            <div class="card-header">{{ __('Reset Password') }}</div>
            <label for="password" class="confirm">Please confirm your password before continuing</label>
            <input id="password" type="password" placeholder="password"
                class="form-control @error('password') is-invalid @enderror" name="password" required
                autocomplete="current-password">
            <input type="button" value="Confirm Password">
        </div>
    </form>
@endsection
