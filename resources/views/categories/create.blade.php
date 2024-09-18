@extends('layouts.app')
@section('title',__('Create New Category'))
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card pt-0">
                        <div class="card-header text-center text-light">{{__('Create New Category')}}</div>
                        <form action="{{route('categories.store')}}" method="post">
                            @include('categories._form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
