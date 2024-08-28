@extends('layouts.app')
@section('title',__('Create ticket'))
    @section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <h2>{{__('Create ticket')}}</h2>

@endsection
