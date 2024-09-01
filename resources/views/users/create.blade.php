@extends('layouts.app')
<<<<<<< HEAD
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
=======
@section('title',__('Create New User'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Create New User')}}</h2>
    <form action="{{route('users.store')}}" method="post">
        @include('users._form')
    </form>

>>>>>>> 10352d4521f7e77bb8a793ddeb7ade807033514d
@endsection
