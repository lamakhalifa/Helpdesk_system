@extends('layouts.app')
@section('title',__('Create New Category'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Create New Category')}}</h2>
    <form action="{{route('categories.store')}}" method="post">
        @include('categories._form')
    </form>

@endsection
