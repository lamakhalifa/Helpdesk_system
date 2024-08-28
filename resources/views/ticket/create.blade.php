@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="card">
            <div class="card-header text-light text-center">List</div>
            <div class="card-body text-left">
                <ul class="list-group">
                    <a href="{{route('ticket.index')}}" class="list-group-item list-group-item-action">Dashboard</a>
                </ul>
            </div>
        </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center text-light">Ticket</div>
                <form action="{{route('ticket.store')}}" method="post">
                    @csrf
                <div class="card-body text-left">
                <div class="form-group">
                            <label for="title">Ticket Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Ticket Title">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Customer</label>
                            <input type="text" class="form-control" name="customer_id" placeholder="customer Id">
                        </div>
                        <div class="form-group">
                            <label for="title">agent</label>
                            <input type="text" class="form-control" name="agent_id" placeholder="agent Id">
                        </div>

                        <div class="form-group">
                            <h5>Select Category<span class="text-danger">*</span></h5>
                            <div class="controls">

                                <select name="category_id" class="form-control">
                                    <option value="" selected="" disabled="">Category</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>

                                <div class="form-group text-center mt-3">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection