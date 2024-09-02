@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
    <script src="{{ asset('js/chart-area-demo.js') }}" defer></script>
    <div class="container-dash-page">
        <div class="left-panel">
            <div class="brand">
                HelpPro
            </div>
            <div>
                <a href="#"><i class="fa-regular fa-comments"></i>Tickets</a>
            </div>
            <div>
                <a href="#"> <i class="fa-regular fa-user"></i>Customers</a>
            </div>
            <div>
                <a href="#"> <i class="fa-solid fa-user-tie"></i> Agents</a>
            </div>
            <div>
                <a href="{{ route('home') }}"> <i class="fa fa-cogs"></i> Home</a>
            </div>
        </div>
        <div class="right-panel">
            <div class="grid-item">
                <h1>Categories </h1>
                <a href="{{route('category.create')}}"><button class="new ticket-btn">{{__('Create new category')}}</button></a>
            </div>
            <div class="grid-item">
                <a href="#" class="tab active" data-target="content1">Categories</a>
                <!--a href="#" class="tab" data-target="content2">Users</a-->
            </div>
            <div class="content" id="content1">
                <div class="grid-item5">
                    <div class="wrapper">
                        <div class="table-contaier">
                            @if(count($categories)>0)
                                <table>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                    <tbody>
                                        @foreach($categories as $row)
                                            <tr>
                                                <td scope="row">{{$row->id }}</td>
                                                <td class="ticket-creator">{{$row->title}}</td>
                                                <td>{{$row->created_at}}</td>
                                                <td>
                                                    <a href="{{ route('category.edit', $row->id) }}"><button class="btn btn-primary " type="submit">Update</button></a>
                                                    <form action="{{route('category.destroy',$row->id)}}" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger" onclick="return confirm('{{__('Are you sure you want to delete this row?')}}')"  type="submit">Delete</button>
                                                    </form>
                                                    <a href="{{route('category.destroy',$row->id)}}"></a>
                                                </td>
                                            </tr>
                                    @endforeach
                                @else
                                    <p>No Categories Yet</p>
                            @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

    </div>

@endsection
