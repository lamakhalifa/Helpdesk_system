@extends('layouts.app')
@section('title',__('Create New Category'))
    @section('content')
        <div class="container bg-form" id="no-sidebar">
            <h2>{{__('Create New Category')}}</h2>
            <form action="{{route('categories.store')}}" method="post">
                @include('categories._form')
            </form>
        </div>
@endsection
