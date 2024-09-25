@extends('layouts.app')
@section('title',__('Update category'))
    @section('content')
        <div class="container bg-form" id="no-sidebar">
           <h2>{{__('Edit User')}}</h2>
            <form action="{{route('categories.update',$category->id)}}" method="post">
                @method('PATCH')
                @include('categories._form')
            </form>
        </div>
@endsection
