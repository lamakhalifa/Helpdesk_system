@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
        <div class="card">
            <div class="card-header text-light text-center">List</div>
            <div class="card-body text-left">
                <ul class="list-group">

                    <a href="{{route('ticket.index')}}" class="list-group-item list-group-item-action">Ticket List</a>
                </ul>
            </div>
        </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center text-light">Edit Ticket</div>
                <form action="{{route('ticket.update',$ticket->id)}}" method="post" >
                    @csrf
                <div class="card-body text-left">
                <div class="form-group">
                            <label for="title">Ticket Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Ticket Title" value="{{$ticket->title}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Ticket Content</label>
                            <textarea class="form-control" name="content">{{$ticket->content}}</textarea>
                        </div>

                    <div class="form-group">
                        <label for="customer_id">Customer</label>
                        <input type="text" class="form-control" name="customer_id" placeholder="Ticket Title">
                    </div>
                    <div class="form-group">
                        <label for="agent_id">Agent</label>
                        <input type="text" class="form-control" name="agent_id" placeholder="Ticket Title">
                    </div>

                    <div class="form-group">
                        <h5>Select Category<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" class="form-control">
                                <option value="{{$ticket->category_id}}" selected="{{$cat->title}}">{{$cat->title}}</option>
                                @foreach ($cats as $c)
                                    <option value="{{ $c->id }}">{{ $c->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
