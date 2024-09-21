@extends('layouts.app')

@section('title', __('Edit User'))

@section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>

    <div class="container bg-form">
        <h2>{{ __('Edit User') }}</h2>

        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('users._form')
        </form>
    </div>
@endsection
