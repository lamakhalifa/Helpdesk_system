@extends('layouts.app')
<<<<<<< HEAD
@section('title', __('Edit User'))

@section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>

    <div class="container">
        <h2>{{ __('Edit User') }}</h2>

        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PATCH')
            @include('users._form')
        </form>
    </div>
=======
@section('title',__('Create ticket'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Edit User')}}</h2>
    <form action="{{route('users.store')}}" method="post">
        @method('PATCH')
        @include('users._form')
    </form>
>>>>>>> 10352d4521f7e77bb8a793ddeb7ade807033514d
@endsection
