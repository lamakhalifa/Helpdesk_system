@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col mb-4">
                <div class="card">
                    <div class="card-header bg-success text-center">Ticket</div>
                    <div class="card-body text-left">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <p>
                                <h3> <strong style="color: seagreen ; font-size: 22px "> Ticket Title : </strong>{{ $ticket->title }}</h3>
                                </p>
                                <p>
                                <h3><strong style="color: seagreen ; font-size: 22px  ">Customer Name : </strong> {{ $ticket->customer->name }}</h3>
                                </p>
                                <p>
                                <h3><strong style="color: seagreen ; font-size: 22px  "> Assignee Agent Name : </strong>{{ $ticket->agent->name }}</h3>
                                </p>
                                <p><h3> <strong style="color: seagreen ; font-size: 22px  ">Ticket Category : </strong>{{ $ticket->category->title}}</h3></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('comments.show')
        </div>
    </div>



    <style>

        .card-header {

            color: #fff;
            font-size: 22px;
        }

    </style>


@endsection

