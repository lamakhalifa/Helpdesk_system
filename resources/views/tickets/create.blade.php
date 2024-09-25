@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Ticket</div>
                    <form action="{{ route('tickets.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body text-left">
                            <!-- Ticket Title -->
                            <div class="form-group">
                                <label for="title">Ticket Title</label>
                                <input
                                    type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    name="title"
                                    id="title"
                                    placeholder="Ticket Title"
                                    value="{{ old('title') }}"
                                    required
                                >
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <!-- Content -->
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea
                                    class="form-control @error('content') is-invalid @enderror"
                                    id="content"
                                    name="content"
                                    required
                                ></textarea>
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <!-- Customer Email -->
                            <div class="form-group">
                                <label for="customer_email">Customer</label>
                                <input
                                    type="text"
                                    class="form-control @error('customer_email') is-invalid @enderror"
                                    name="customer_email"
                                    id="customer_email"
                                    placeholder="Customer Email"
                                    value="{{ old('customer_email') }}"
                                    required
                                >
                                @error('customer_email')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <!-- Agent Email -->
                            <div class="form-group">
                                <label for="agent_email">Agent</label>
                                <input
                                    type="text"
                                    class="form-control @error('agent_email') is-invalid @enderror"
                                    name="agent_email"
                                    id="agent_email"
                                    placeholder="Agent Email"
                                    value="{{ old('agent_email') }}"
                                    required
                                >
                                @error('agent_email')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="form-group">
                                <h5>Select Category<span class="text-danger">*</span></h5>
                                <select
                                    name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror"
                                    required
                                >
                                    <option value="" selected disabled>Category</option>
                                    @foreach ($cats as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <!-- File Upload -->
                            <div class="form-group">
                                <label for="files">Upload file</label>
                                <input
                                    type="file"
                                    class="form-control @error('files') is-invalid @enderror"
                                    id="files"
                                    name="files[]"
                                    multiple
                                    accept="application/pdf, image/*" ><!-- Adjust the file types as needed -->

                                @error('files')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
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
