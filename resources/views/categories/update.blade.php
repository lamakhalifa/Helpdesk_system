@extends('layouts.app')
@section('title',__('Update category'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Edit User')}}</h2>
    <form action="{{route('category.update',$category->id)}}" method="post">
        @method('PATCH')
        @include('categories._form')
    </form>
@endsection
