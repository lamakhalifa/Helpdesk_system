@extends('layouts.app')

@section('title', __('Create New User'))

@section('content')

    <div class="container bg-form" id="no-sidebar">
        <h2>{{ __('Create New User') }}</h2>

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            @include('users._form')
        </form>
    </div>

@endsection
