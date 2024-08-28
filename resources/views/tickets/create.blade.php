@extends('layouts.app')
@section('title',__('Create ticket'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Create ticket')}}</h2>
    <form action="{{route('tickets.store')}}" method="post">
        <div class="form-group">
            <label for="title">{{__('Title')}}</label>
            <input class="form-control" for="title" type="text"></input>
        </div>
        <div class="form-group">
            <label for="content">{{__('Content')}}</label>
            <textarea class="form-control" for="content" ></textarea>
        </div>
        <div class="form-group">
            <label for="customerName">{{__('Customer name')}}</label>
            <textarea class="form-control" for="customerName" ></textarea>
        </div>
        <select name="customer" class="form-control" required="">
            <option value="" selected="" disabled="">Select Customer Name</option>
            @isset($customers)
                @for ($customer = 0; $customer < count($customers); $customer++)
                    <option value="{{ $customers[$customer] }}">{{$customers[$customer] }}</option>
                @endfor
            @endisset
        </select>
    </form>

@endsection
