@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-light text-center">List</div>
                    <div class="card-body text-left">
                        <ul class="list-group">
                            <a href="{{ route('tickets.index') }}"
                                class="list-group-item list-group-item-action">Dashboard</a>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center text-light">Ticket</div>
                    <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body text-left">
                            <div class="form-group">
                                <label for="title">Ticket Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Ticket Title">
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" id="content" name="content"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="customer_email">Customer</label>
                                <input type="text" class="form-control @error('customer_email') is-invalid @enderror"
                                    name="customer_email" id="customer_email" placeholder="Customer Email"
                                    value="{{ old('customer_email') }}">
                                @error('customer_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="agent_email">agent</label>


                                <input type="text" class="form-control @error('agent_email') is-invalid @enderror"
                                    name="agent_email" id="agent_email" placeholder="Agent Email"
                                    value="{{ old('agent_email') }}">
                                @error('agent_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

                                    <div class="form-group">
                                        <label for="files">Upload file</label>
                                        <input type="file" class="form-control" id="files" name="files[]" multiple>
                                        @error('files')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

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
