@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col mb-4">
                <div class="card pt-0">
                    <h5 class="card-header bg-light text-center text-secondary">Ticket</h5>
                    <div class="card-body text-left">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <p>
                                <h6> <strong> Ticket Title : </strong>{{ $ticket->title }}</h6>
                                </p>
                                <p>
                                <h6><strong>Customer Name : </strong> {{ $ticket->customer->name }}</h6>
                                </p>
                                <p>
                                <h6><strong> Assignee Agent Name : </strong>{{ $ticket->agent->name }}</h6>
                                </p>
                                <p><h6> <strong>Ticket Category : </strong>{{ $ticket->category->title}}</h6></p>
                                <p><h6> <strong >Ticket Content : </strong>{{ $ticket->content}}</h6></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('comments.show')
    </div>


@endsection

