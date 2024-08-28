@extends('layouts.app')
@section('title',__('Create ticket'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Edit User')}}</h2>
    <form action="{{route('users.store')}}" method="post">
        @method('PATCH')
        @include('users._form')
    </form>
@endsection
