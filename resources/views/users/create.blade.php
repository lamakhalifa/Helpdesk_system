@extends('layouts.app')

@section('title', __('Create New User'))

@section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>

    <div class="container">
        <h2>{{ __('Create New User') }}</h2>

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            @include('users._form')
        </form>
    </div>

@endsection
