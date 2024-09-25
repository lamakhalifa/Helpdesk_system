@extends('layouts.app')
@section('content')

    <div class="container-dash-page">
        <div class="right-panel">
            <div class="grid-item">
                <h1>Tickets </h1>
                <a href="{{ route('tickets.create') }}"><button class="new ticket-btn">new Ticket</button></a>
            </div>
            <div class="grid-item">
                <a href="#" class="tab active" data-target="content1">Tickets</a>
            </div>
            <div class="grid-item5">
                <div class="wrapper">
                    <div class="content" id="content1">
                        <div class="grid-item5">
                            <div>
                                <div class="table-container">
                                    @if (count($tickets) > 0)
                                        <table>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Content</th>
                                                <th scope="col">Customer Email</th>
                                                <th scope="col">Agent Email</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                            </tr>

                                            <tbody>
                                            @foreach ($tickets as $row)
                                                <tr>
                                                    <td  scope="row">{{$row->id }}</td>
                                                    <td class="ticket-creator"><a href="{{route('tickets.show', $row->id)}}">{{$row->title}}</a></td>
                                                    <td>{{$row->category->title}}</td>
                                                    <td>{{$row->content}}</td>
                                                    <td>{{$row->customer->email}}</td>
                                                    <td>{{$row->agent->email}}</td>
                                                    <td class="edit-delete-btn">
                                                        <a href="{{ route('tickets.edit', $row->id) }}" class="btn btn-primary">Update</a>
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('tickets.destroy', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>

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

