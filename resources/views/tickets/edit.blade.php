@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card col-md-12">
                <div class="card-header text-light text-center">List</div>
                <div class="card-body text-left">
                    <ul class="list-group">
                        <a href="{{ route('tickets.index') }}" class="list-group-item list-group-item-action">Ticket List</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center text-light">Edit Ticket</div>
                <form action="{{ route('tickets.update', $ticket->id) }}" method="post">
                    @csrf
                    @method('PUT') <!-- Specify PUT method -->
                    <div class="card-body text-left">
                        <div class="form-group">
                            <label for="title">Ticket Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Ticket Title" value="{{ old('title', $ticket->title) }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Ticket Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content">{{ old('content', $ticket->content) }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customer_email">Customer</label>
                            <input type="text" class="form-control @error('customer_email') is-invalid @enderror" name="customer_email" placeholder="Customer Email" value="{{ old('customer_email', $ticket->customer->email ?? '') }}">
                            @error('customer_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="agent_email">Agent</label>
                            <input type="text" class="form-control @error('agent_email') is-invalid @enderror" name="agent_email" placeholder="Agent Email" value="{{ old('agent_email', $ticket->agent->email ?? '') }}">
                            @error('agent_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h5>Select Category<span class="text-danger">*</span></h5>
                            <select name="category_id" class="form-control">
                                @foreach ($cats as $c)
                                    <option value="{{ $c->id }}" {{ $ticket->category_id == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
                                @endforeach
                            </select>
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
