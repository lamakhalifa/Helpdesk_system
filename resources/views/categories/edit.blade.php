@extends('layouts.app')
@section('title',__('Update category'))
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card pt-0">
                    <div class="card-header text-center text-light">{{__('Edit User')}}</div>
                    <form action="{{route('categories.update',$category->id)}}" method="post">
                        @method('PATCH')
                        @include('categories._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
