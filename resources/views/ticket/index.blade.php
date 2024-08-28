
@extends('layouts.app')
@section('content')

<div class="container">
     <div class="row justify-content-center">

         <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-light">Tickets</div>

                <div class="card-body text-center">

                       <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ticket Title</th>
                                    <th scope="col">Ticket Category</th>
                                    <th scope="col">Ticket Content</th>
                                    <th scope="col">Customer Email</th>
                                    <th scope="col">Agent Email</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($tickets)>0)
                                @foreach($tickets as $row)
                                <tr>
                                <td>{{$row->id }}</td>
                                <td>{{$row->title}}</td>
                                <td>{{$row->category_id}}</td>
                                <td>{{$row->content}}</td>
                                 <td>dff</td>
                                <td>iiii</td>
                                <td><a href="{{route('ticket.edit',$row->id)}}"><button class="btn btn-primary ">Update</button></a></td>
                                <td><a href="{{route('ticket.delete',$row->id)}}" class="btn btn-danger" id="delete">Delete</a></td>
                                </tr>
                                @endforeach
                                @else
                                <p>No Tickets Registered Yet</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
     </div>


 @endsection
