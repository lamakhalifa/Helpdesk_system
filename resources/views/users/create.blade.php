@extends('layouts.app')
@section('title',__('Create New User'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Create New User')}}</h2>
    <form action="{{route('users.store')}}" method="post">
        @include('users._form')
    </form>

@endsection
