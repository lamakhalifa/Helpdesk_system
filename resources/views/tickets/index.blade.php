
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
                                <td>{{$row->category->title}}</td>
                                <td>{{$row->content}}</td>
                                <td>{{$row->customer->email}}</td>
                                <td>{{$row->agent->email}}</td>
                                <td>
                                    <a href="{{ route('tickets.edit', $row->id) }}" class="btn btn-primary">Update</a>
                                </td>
                                <td>
                                    <form action="{{ route('tickets.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                </tr>
                                @endforeach
                                @else
                                <p>No Tickets Registered Yet</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div>
                    <a  href="{{ route('tickets.create')}}" class="btn btn-primary m-3">add New Ticket</a>
                    </div>
            </div>
        </div>
     </div>


 @endsection
